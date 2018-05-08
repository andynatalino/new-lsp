<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use DateTime;
use App\User;
use App\Setting;
use App\Kategori;
use App\Transaksi;
use App\Jadwal;
use App\Userdata;
use App\trans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(){	
    	$id = Auth::user()->id;
    	$aa = Setting::get();
    	$user = User::find($id);
    	$transaksi = Transaksi::where(['id_user' => Auth::user()->id])->orderBy('id','asc')->paginate(1);  
    	return view('users.profil.home', ['user' => $user, 'transaksi' => $transaksi, 'aa' => $aa]);			
    }

    public function konfirmasi(){
    	$transaksi = Transaksi::where(['id_user' => Auth::user()->id])->where('status', '=', 1)->first();
    	if (!$transaksi){ 
        return view('users.profil.nothing-konfirmasi');

      }
      return view('users.profil.konfirmasi', ['transaksi' => $transaksi]);
    }
    public function konfirmasiSave(Request $request){

      $this->validate($request, [
        'asal_bank'=>'required',
        'nama_pengirim'=>'required',
        'jumlah_transfer'=>'required',
        'waktu_pembayaran'=>'required',
        'photo_bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $jadwal = jadwal::find($request->id_jadwal);
      $id = $request->id;
      $now = new DateTime();
      $transaksi = Transaksi::find($id);
      $transaksi->tanggal = $now;
      $transaksi->nama_pengirim = $request->nama_pengirim;
      $transaksi->asal_bank = $request->asal_bank;

      if ($request->jumlah_transfer < $jadwal->biaya) {
          return back()->with('notifikasi', 'Jumlah Transfer Kurang!');
      }else{
        // dd('pas coy');
       $transaksi->tunai = null;
       $transaksi->kode_transfer = $request->jumlah_transfer;
     }

    //  die();
     $transaksi->status = 2;
     $transaksi->photo_bukti = '';
     if($request->hasFile('photo_bukti')){
      $image = date('YmdHis').uniqid().".". $request->photo_bukti->getClientOriginalExtension();
      $request->photo_bukti->move(public_path()."/assets/bukti",$image);
      $transaksi->photo_bukti = $image;
    }
    $transaksi->save();

    return redirect(url('profil/order'))->with('sukses', 'Anda telah mengupload bukti transaksi! 1x24 jam Operator akan memverifikasi bukti Anda');
  }
  public function change_photo(){
   $id = Auth::user()->id;
   $user = User::find($id);
   return view('users.profil.change.photo', ['user' => $user]);
 }

 public function change_photo_save(Request $request){
   $this->validate($request, [
    'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  ]);
   $id = Auth::user()->id;
   $user = User::find($id);
   $user->photo = '';		
   if($request->hasFile('photo')){
    $image = date('YmdHis').uniqid().".". 
    $request->photo->getClientOriginalExtension();
    $request->photo->move(public_path()."/assets/photo",$image);
    $user->photo = $image;
  }
  $user->save();
  return back()->with('sukses', 'Anda berhasil mengubah foto!');
}

public function change_email(){

 $aa = Setting::get();
 $id = Auth::user()->id;
 $user = User::find($id);
 return view('users.profil.change.email', ['user' => $user, 'aa' => $aa]);
}

public function change_email_save(Request $request){	
 $id = Auth::user()->id;
 $this->validate($request, [
  'email' => 'unique:users,email,'.$id,
]);

 $user = User::find($id);
 $user->email = $request->email;
 $user->save();		

 return back()->with('sukses', 'Anda berhasil mengubah email!');
}

public function change_password(){

 $aa = Setting::get();
 $id = Auth::user()->id;
 $user = User::find($id);
 return view('users.profil.change.password', ['user' => $user, 'aa' => $aa]);
}

public function change_password_save(Request $request){
 $a = User::find(Auth::User()->id);
 if (Hash::check($request->oldpw, $a['password']) && $request->newpw == $request->confnewpw) {
  $this->validate($request, [
   'password' => 'required|string|min:6',
 ]);
  $a->password = bcrypt($request->newpw);
  $a->save();
  return back()->with('sukses', 'Anda berhasil mengubah password!');
}else {
  return back()->with('gagal', 'Password yang anda masukan tidak sesuai!');
}
}

public function change_data(){
 $aa = Setting::get();
 $id = Auth::user()->id;
 $user = User::find($id);
 return view('users.profil.change.data', ['user' => $user, 'aa' => $aa]);
}

public function change_data_save(Request $request){
 $id = Auth::user()->id;
 $this->validate($request, [
  'username' => 'unique:users,username,'.$id,
]);
 $user = User::find($id);
 $user->number = $request->number;
 $user->username = strtolower(str_slug($request->username));
 $user->name = $request->name;
 $user->place = $request->place;
 $user->date = $request->date;
 $user->gender = $request->gender;
 $user->religion = $request->religion;
 $user->address = $request->address;
 $user->telp = $request->telp;
 $user->instansi = $request->instansi;
 $user->save();

 return back()->with('sukses', 'Anda berhasil mengubah Data!');
}

public function order(){
 $transaksi = Transaksi::where(['id_user' => Auth::user()->id])->orderBy('id','desc')->paginate(10);     
 return view('users.profil.order', ['transaksi' => $transaksi]);	
}

public function transaksisaya()
{
  $trans = trans::where(['user_id' => Auth::user()->id])->orderBy('id','desc')->paginate(10);  
  return view('users.profil.transaksisaya', ['trans' => $trans]);
}

public function pdf(Request $request){		
$id = $request->id;
 $ss = Setting::first();
 $trans = trans::where(['id_transaksi' => $id])->where('notifikasi','2')->orWhere('tunai','1')->first(); 	
  // dd($trans);	
 $userdata = Userdata::find($trans->id_userdata);
 if(!$trans){					      		
   return redirect(url('/'));
  	
}else{
  return view('users.profil.pdf', ['trans' => $trans, 'ss' => $ss, 'userdata' => $userdata]);
}
}

public function pdftunai(Request $request){		
  $id = $request->id;
   $ss = Setting::first();
   $trans = transaksi::where(['id' => $id])->where('tunai','1')->first(); 	
    // dd($trans);	
  $kategori = Kategori::find($trans->id_kategori);
   $userdata = Userdata::find($trans->id_userdata);
   if(!$trans){					      		
     return redirect(url('/'));
      
  }else{
    return view('users.profil.pdf-tunai', ['trans' => $trans, 'ss' => $ss, 'userdata' => $userdata, 'kategori' => $kategori]);
  }
  }

public function sertifikat()
{
  $trans = trans::where(['user_id' => Auth::user()->id])->orWhere('status','1')->orWhere('status','2')->paginate(10);  
  return view('users.profil.sertifikat', ['trans' => $trans]);
}

}
