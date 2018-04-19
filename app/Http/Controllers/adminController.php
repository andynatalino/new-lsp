<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Image;
use Charts;
use App\User;
use App\kontak;
use App\galeri;
use App\tentang;
use App\Setting;
use Illuminate\Http\Request;

class adminController extends Controller
{
  public function dashboard(){
    $chart = Charts::multi('bar', 'material')
            // Setup the chart settings
            ->title("Statistik")
            // A dimension of 0 means it will take 100% of the space
            ->dimensions(0, 400) // Width x Height
            // This defines a preset of colors already done:)
            ->template("material")
            // You could always set them manually
            // ->colors(['#2196F3', '#F44336', '#FFC107'])
            // Setup the diferent datasets (this is a multi chart)
            ->dataset('User', [5,20,100])
            ->dataset('User 2', [15,30,80])
            ->dataset('User 3', [25,10,40])
            // Setup what the values mean
            ->labels(['One', 'Two', 'Three']);

        return view('admin.dashboard', ['chart' => $chart]);    
  }
  
  public function user(){
    if (!Auth::check()){ return abort(404); }
      $users = User::orderBy('created_at', 'desc')->get();
      if (!$users){ return abort(404); }
      return view('admin.users.all', ['users' => $users]);
    }
    public function buat_user(){
      return view('admin.users.buat');
    }

    public function user_save(Request $request){
      $id = Auth::user()->id;
      $this->validate($request, [
       'number' => 'unique:users,number,'.$id,
       'username' => 'unique:users,username,'.$id,
       'password' => 'required|string|min:6',
       'repassword' => 'required|same:password',
       'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);
      $user = new User;
      $user->number = $request->number;
      $user->username = strtolower(str_slug($request->username));
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->instansi = $request->instansi;
      $user->gender = $request->gender;
      $user->place = $request->place;
      $user->date = $request->date;
      $user->religion = $request->religion;
      $user->citizenship = $request->citizenship;
      $user->telp = $request->telp;
      $user->address = $request->address;
      $user->role = $request->role;
      $user->photo = '';
      if($request->hasFile('photo')){
        $image = date('YmdHis').uniqid().".".
        $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path()."/assets/photo",$image);
        $user->photo = $image;
      }
      $user->save();
      return redirect(url('admin/user'));

    }

    public function user_delete($id){
      $users = User::find($id);
  //validasi jika dia menhapus dirinya sendiri maka akan muncul pesan "anda tidak bisa menghapus diri anda sendiri"
    }
    public function settings(){
      $setting = Setting::first();
      return view('admin/settings', ['setting' => $setting]);
    }
    public function save_settings(Request $request){
      $s = new Setting;
      $s->nama_web = $request->nama;
      $s->title = $request->title;
      $s->email = $request->email;
      $s->color_web = $request->webcolor;
      $s->color_admin = $request->admincolor;
      $s->color_operator = $request->opcolor;
      $s->facebook = $request->facebook;
      $s->twitter = $request->twitter;
      $s->instagram = $request->instagram;
      $s->meta_title = $request->meta_title;
      $s->meta_description = $request->meta_description;
      $s->meta_keywords = $request->meta_keywords;
      $s->google_site_verification = $request->google_site_verification;
      $s->bing = $request->bing;
      if($request->file('logo') == "")
      {
        $setting = Setting::first();
        $s->logo = $setting->logo;
      }else{
        $s->logo = '';
        if($request->hasFile('logo')){
          $image = date('YmdHis').uniqid().".". $request->logo->getClientOriginalExtension();
          $request->logo->move(public_path()."/assets/logo",$image);
          $s->logo = $image;
        }
      }
      if($request->file('favicon') == "")
      {
        $setting = Setting::first();
        $s->favicon = $setting->favicon;
      }else{
        $s->favicon = '';
        if($request->hasFile('favicon')){
          $image = date('YmdHis').uniqid().".". $request->favicon->getClientOriginalExtension();
          $request->favicon->move(public_path()."/assets/logo",$image);
          $s->favicon = $image;
        }
      }
      \App\Setting::truncate();
      $s->save();
      return back()->with('sukses', 'Data tersimpan!');
    }
    public function tentang(){
      if (!Auth::check()){ return abort(404); }
        $tentang = tentang::get();
        if (!$tentang){ return abort(404); }
        return view('admin.tentang.all', ['tentang' => $tentang]);
      }

      public function buat_tentang(){
       return view('admin.tentang.buat');
     }

     public function tentang_save(Request $request){
      if ($request->isi == '') {
       return back()->with('gagal', 'Anda tidak bisa mengisi data kosong!');
     }
     $tentang = new tentang;
     $tentang->judul = $request->judul;
     $tentang->tentang = $request->isi;
     $tentang->slug = str_slug($request->judul);    
     $tentang->save();
     return redirect('admin/tentang');
   }

   public function tentang_edit($id){
    $tentang = tentang::find($id);
    return view('admin.tentang.edit', ['tentang' => $tentang]);
  }

  public function tentang_update(Request $request, $id){
    if ($request->isi == '') {
     return back()->with('gagal', 'Anda tidak bisa mengisi data kosong!');
   }
   $tentang = tentang::find($id);
   $tentang->judul = $request->judul;
   $tentang->tentang = $request->isi;
   $tentang->slug = str_slug($request->judul); 
   $tentang->save();
   return redirect('admin/tentang');
 }

 public function tentang_delete($id){
   $tentang = tentang::find($id);
   $tentang->delete();
   return redirect('admin/tentang');
 }

 public function kontak(){
   $kontak = kontak::orderBy('created_at', 'desc')->paginate(10);
   return view('admin.kontak.all', ['kontak' => $kontak]);
 }

 public function show_kontak($id){
    $kontak = kontak::find($id);
   return view('admin.kontak.show', ['kontak' => $kontak]);
 }

 public function kontak_delete($id){
   $kontak = kontak::find($id);
   $kontak->delete();

    return redirect('admin/kontak')->with('sukses', 'Anda berhasil menghapus pesan!');
 }

 public function galeri() {
  if (!Auth::check()){ return abort(404); }
    $galeri = galeri::all();
    if (!$galeri){ return abort(404); }
    return view('admin.galeri.all', ['galeri' => $galeri]);
  }

  public function buat_galeri()
  {
    return view('admin.galeri.buat');
  }

  public function galeri_save(Request $r)
  {
    if($r->input('sampul'));
    { 
      $files = $r->sampul;

      foreach($files as $sampul) {
        $sampul_cek = date("YmdHis").uniqid()."."
        .$sampul->getClientOriginalExtension();
        $sampul->move(public_path('assets/galeri'),$sampul_cek);

        \App\galeri::create([
          'photo' => $sampul_cek,
          'judul' => $r->judul
        ]);

      }
      return redirect(url('admin/galeri'));
    }
  }

}
