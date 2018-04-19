<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Jadwal;
use App\Userdata;
use App\Setting;
use App\Kategori;
use App\Transaksi;
use App\Pembayaran;
use Illuminate\Http\Request;

class SertifikasiController extends Controller
{
  public function kategori(){
    $aa = Setting::get();
    $kategori = Kategori::paginate(9);
    return view('users.sertifikasi.portfolio', ['kategori' => $kategori, 'aa' => $aa]);
  }

  public function jadwal($slug){
    $kategori = Kategori::where('slug', $slug)->first();
    if (!$kategori){ abort(404); }
    $jadwal = Jadwal::where('id_kategori', $kategori->id)->get();
    if (!$jadwal){ abort(404); }
    return view('users.sertifikasi.jadwal-new', ['jadwal' => $jadwal, 'kategori' => $kategori]);
  }

  public function jadwal_search(Request $request, $slug)
  { 
    $kategori = Kategori::where('slug', $slug)->first();
    $query = $request->q;
    $jadwal = Jadwal::where('nama','like','%'.$query.'%')->orderBy('id','asc')->where('id_kategori', $kategori->id)->paginate(10); 
    return view('users.sertifikasi.jadwal-search', ['jadwal' => $jadwal, 'kategori' => $kategori]);
  }

  public function show_jadwal($slug1, $slug2){
    $aa = Setting::get();
    $kategori = Kategori::where('slug', $slug1)->first();
    if (!$kategori){ abort(404); }
    $jadwal = Jadwal::where('slug', $slug2)->first();
    if (!$jadwal){ abort(404); }
    // die($aa);
    return view('users.sertifikasi.show-new', ['jadwal' => $jadwal,'kategori' => $kategori, 'aa' => $aa]);
  }

  public function submit(Request $request){    
    $aa = Setting::get();
    // $transaksi = new Transaksi;
    // $transaksi->id_user = Auth::user()->id;
    // $transaksi->id_jadwal = $request->id_jadwal;
    // $transaksi->save();

    $jadwal = $request->id_jadwal;

    // return redirect(url('pembayaran'));
    return view('users.pembayaran.checkout', ['jadwal' => $jadwal, 'aa' => $aa]);
  }
  

  public function pembayaran(){
    if (Auth::check()) {
     $transaksi = Transaksi::where(['id_user' => Auth::user()->id])->get();
   // dd($transaksi);
     return view('users.pembayaran.home', ['transaksi' => $transaksi]);
   }else{
    return redirect(url('login'));
  }
}

public function pembayaran_next(Request $request){
  if (Auth::check()) {
    $aa = Setting::get();
    $transaksi = Transaksi::where(['id' => $request->id])->firstOrFail();
    if (!$transaksi){ abort(404); }
    return view('users.pembayaran.checkout', ['transaksi' => $transaksi, 'aa' => $aa]);
  }else{
    return redirect(url('login'));
  }
}

public function checkout($slug1, $slug2)
{
  if (Auth::check()) {
    $aa = Setting::get();
    $jadwal = Jadwal::where('slug', $slug2)->first();     
    if (Transaksi::where('id_user', '=', Auth::user()->id)->where('status', '=', 1)->whereNull('tunai')->count() > 0) { 

    // dd('pembayaran bank 1');
      return redirect(url('checkout'))->with('status', 'Selesaikan pembayaran sebelumnya');

    }elseif (Transaksi::where(['id_user' => Auth::user()->id])->where('status', '=', 2)->where('tunai', '=', 1)->count() > 0) {   

 // dd('pembayaran tunai 2');
     return redirect(url('checkout'))->with('status', 'Selesaikan pembayaran sebelumnya');

   }elseif (Transaksi::where(['id_user' => Auth::user()->id])->where('status', '=', 2)->whereNull('tunai')->first()) { 

  // dd('pembayaran bank 2');
    return view('users.pembayaran.checkout', ['jadwal' => $jadwal, 'aa' => $aa]);

  }elseif (Transaksi::where(['id_user' => Auth::user()->id])->where('status', '=', 2)->where('tunai', '=', 1)->first()) {    

  // dd('pembayaran tunai 2');  
    return view('users.pembayaran.checkout', ['jadwal' => $jadwal, 'aa' => $aa]);

  }
// dd('masih polos mas');
    // return redirect(url('pembayaran'));
  return view('users.pembayaran.checkout', ['jadwal' => $jadwal, 'aa' => $aa]);
}else{
  return redirect(url('login'));
}

}

public function checkoutSave(Request $request){

 $this->validate($request,[
   'nomoridentitas'=>'required',
   'namalengkap'=>'required',
   'jeniskelamin'=>'required',
   'tempatlahir'=>'required',
   'tanggallahir'=>'required',
   'agama'=>'required',
   'kewarganegaraan'=>'required',
   'alamat'=>'required',
   'notelp'=>'required',
   'instansi'=>'required',
   'pendidikan'=>'required',
   'namainstansi'=>'required',
   'jurusan'=>'required',
   'namaperusahaan'=>'required',
   'alamatperusahaan'=>'required',
   'emailperusahaan'=>'required',
   'bank' => 'required_without_all:tunai',
   'tunai' => 'required_without_all:bank',
 ]);

 $ud = new Userdata;  
 $ud->nomoridentitas = $request->nomoridentitas;
 $ud->namalengkap = $request->namalengkap;
 $ud->jeniskelamin = $request->jeniskelamin;
 $ud->tempatlahir = $request->tempatlahir;
 $ud->tanggallahir = $request->tanggallahir;
 $ud->agama = $request->agama;
 $ud->kewarganegaraan = $request->kewarganegaraan;
 $ud->alamat = $request->alamat;
 $ud->telp = $request->notelp;
 $ud->instansi = $request->instansi;
 $ud->pendidikan_terakhir = $request->pendidikan;
 $ud->nama = $request->namainstansi;
 $ud->jurusan = $request->jurusan;
 $ud->nama_perusahaan = $request->namaperusahaan;
 $ud->alamat_perusahaan = $request->alamatperusahaan;
 $ud->email_perusahaan = $request->emailperusahaan;
 $ud->save();

 $jadwal = Jadwal::find($request->id_jadwal);;

 $transaksi = new Transaksi;
 $transaksi->id_user = Auth::user()->id;
 $transaksi->id_jadwal = $request->id_jadwal;
 $transaksi->id_pembayaran = $request->bank;
 $transaksi->id_userdata = $ud->id;
 $transaksi->kode_transfer = $jadwal->biaya + rand(100, 999);
 $transaksi->tunai = $request->tunai;
 if ($request->tunai == '1') {
  $transaksi->status = 2;
}else{
  $transaksi->status = 1;  
}
$transaksi->save();

return redirect(url('checkout'));
}

public function cek()
{
  if (Auth::check()) {
    $bank = Pembayaran::all();
    $aa = Setting::get();
    $tt = Transaksi::where(['id_user' => Auth::user()->id])->whereNull('nama_pengirim')->first();  
  // dd($tt);
    if (!$tt){ abort(404); }

    if ($tt->tunai == 1 && $tt->status  == 2) {

     $transaksi = Transaksi::where(['id_user' => Auth::user()->id])->where('tunai', '=', 1)->where('status', '=', 2)->first();

     if (!$transaksi){ abort(404); }

     return view('users.pembayaran.konfirmasi', ['bank' => $bank, 'aa' => $aa, 'transaksi' => $transaksi]);

   }elseif ($tt->tunai == NULL && $tt->status  == 1) {

    $transaksi = Transaksi::where(['id_user' => Auth::user()->id])->whereNull('tunai')->where('status', '=', 1)->first();

    if (!$transaksi){ abort(404); }

    return view('users.pembayaran.konfirmasi', ['bank' => $bank, 'aa' => $aa, 'transaksi' => $transaksi]);
  }elseif ($tt->tunai == NULL && $tt->status  == 2) {
    $transaksi = Transaksi::where(['id_user' => Auth::user()->id])->whereNull('tunai')->where('status', '=', 2)->first();
    return view('users.pembayaran.konfirmasi', ['bank' => $bank, 'aa' => $aa, 'transaksi' => $transaksi]);
  }
}else{
  return redirect(url('login'));
}

}

public function checkoutInfoSave(Request $request){
  $bank = $request->bank;
  $id = $request->id;
  $transaksi = Transaksi::find($id);
  $jadwal = Jadwal::find($transaksi->id_jadwal);
  $transaksi->id_user = Auth::user()->id;
  $transaksi->id_pembayaran = $bank;
  // $transaksi->kodepembayaran = $jadwal->biaya + rand(100, 999);
  $transaksi->tipe = 1;
  $transaksi->status = 3;
  $transaksi->save();
  $bank = Pembayaran::where(['id' => $transaksi->id_pembayaran])->first();
  return view('users.pembayaran.konfirmasi', ['transaksi' => $transaksi, 'bank' => $bank]);
}

public function pembayaran_konfirmasi($id){
 if (Auth::check()) {
   // $id = $request->id_transaksi;
  $transaksi = Transaksi::find($id);
  // dd($transaksi);
   // $userdata = Userdata::where(['id_transaksi' => $transaksi->id])->firstOrFail();
  // $bank = Pembayaran::where(['id' => $] )
  return view('users.pembayaran.konfirmasi', ['transaksi' => $transaksi, 'bank' => $bank]);
}else{
  return redirect(url('login'));
}
}

public function pembayaran_delete($id){
  $pembayaran = Transaksi::find($id);    
  $pembayaran->delete();
  return redirect(url('pembayaran'));
}

public function daftar(){
  return redirect(url('pembayaran'));
} 

public function checkout_delete($id)
{
  $transaksi = Transaksi::find($id);    
  $transaksi->delete();
  return redirect(url('sertifikasi'));
}
}
