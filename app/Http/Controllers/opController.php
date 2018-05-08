<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use DateTime;
use Validator;
use App\User;
use App\Berita;
use App\Jadwal;
use App\Slider;
use App\Kategori;
use App\Transaksi;
use App\Pembayaran;
use App\trans;
use App\kolum;
use DB;
use Illuminate\Http\Request;

class opController extends Controller
{
  public function index(){
    $data['tasks'] = [
      [
        'name' => 'Design New Dashboard',
        'progress' => '100',
        'color' => 'danger'
      ],
      [
        'name' => 'Create Home Page',
        'progress' => '76',
        'color' => 'warning'
      ],
      [
        'name' => 'Some Other Task',
        'progress' => '32',
        'color' => 'success'
      ],
      [
        'name' => 'Start Building Website',
        'progress' => '56',
        'color' => 'info'
      ],
      [
        'name' => 'Develop an Awesome Algorithm',
        'progress' => '10',
        'color' => 'success'
      ]
    ];
    return view('operator.dashboard')->with($data);
  }

  public function dashboard(){
    return view('operator.dashboard');
  }

  public function berita(){    
    $berita = Berita::orderBy('id','desc')->paginate(10); 
    return view('operator.berita.all', ['berita' => $berita]);
  }

  public function berita_search(Request $request){
    $query = $request->q;
    $berita = Berita::where('judul','like','%'.$query.'%')->orderBy('id','asc')->paginate(10);      
    return view('operator.berita.search', ['berita' => $berita, 'query' => $query]); 
  }

  public function buat_berita(){
    return view('operator.berita.buat');
  }

  public function berita_gambar(Request $r)
  {
    $upload = $r->file('upload');
    $funcNum = $r->input('CKEditorFuncNum');

    $validator = Validator::make($r->all(),[
      'upload'=>'mimetypes:image/png,image/jpg,image/jpeg,image/bmp',
    ]);

    if ($validator->fails()) {
      return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$funcNum.'", "", "Gambar hanya bisa berformat .png, .jpg, .jpeg dan .bmp.");</script>';
    }

    $ext = $upload->getClientOriginalExtension();
    $random = round(microtime(true)).str_random(40);
    $upload->move('assets/berita',$random.'.'.$ext);      
    $funcNum = $r->input('CKEditorFuncNum');
    $CKEditor = $r->input('CKEditor');
    $langCode = $r->input('langCode');
    $message = '';
    $url = $url = url('assets/berita'.'/'.$random.'.'.$ext);
    return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$funcNum.'", "'.$url.'", "'.$message.'");</script>';
  }

  public function berita_save(Request $request){
    if ($request->isi == '') {
     return back()->with('gagal', 'Anda tidak bisa mengisi berita kosong!');
   }
   $a = new Berita;
   $a->id_user = Auth::user()->id;
   $a->judul = $request->judul;
   $a->slug = str_slug($request->judul);
   $a->isi = $request->isi;
   $a->save();
   return redirect(url('operator/berita'));
 }

 public function berita_edit($id){
  $berita = Berita::find($id);
  return view('operator.berita.edit', ['berita' => $berita]);
}

public function berita_update(Request $request, $id){
  $a = Berita::find($id);
  $a->id_user = Auth::user()->id;
  $a->judul = $request->judul;
  $a->slug = str_slug($request->judul);
  $a->isi = $request->isi;
  $a->save();
  return redirect(url('operator/berita'));
}

public function berita_delete($id){
  $a = Berita::find($id);
  $a->delete();
  return redirect('operator/berita');
}

public function slider_all(){
  $slider = Slider::all();
  return view('operator.slider.all', ['slider' => $slider]);
}

public function buat_slider(){
  return view('operator.slider.buat');
}

public function save_slider(Request $request){
  $op = new Slider;
  $op->nama_slider = $request->nama;
  $op->gambar = '';
  if($request->hasFile('gambar')){
    $gambar = date('YmdHis').uniqid().".". $request->gambar->getClientOriginalExtension();
    Image::make($request->gambar)->save(public_path("/assets/slider/". $gambar));
    $op->gambar = $gambar;
  }
  $op->save();
  return redirect(url('operator/slider'));
}

public function slider_edit($id){
  $slider = Slider::find($id);
  return view('operator.slider.edit', ['slider' => $slider]);
}

public function slider_update(Request $request, $id){
  $slider = Slider::find($id);
  $slider->nama_slider = $request->nama;
  $slider->gambar = '';
  if($request->hasFile('gambar')){
    $gambar = date('YmdHis').uniqid().".". $request->gambar->getClientOriginalExtension();
    Image::make($request->gambar)->resize(600, 400)->save(public_path("/assets/slider/". $gambar));
    $slider->gambar = $gambar;
  }
  $slider->save();
  return redirect(url('operator/slider'));
}

public function slider_delete($id){
  $slider = Slider::find($id);
  $slider->delete();
  return redirect(url('operator/slider'));
}

public function kategori_all(){
  $kategori = Kategori::orderBy('id','desc')->paginate(10);     
  if (!$kategori){ abort(404); }
  return view('operator.kategori.all', ['kategori' => $kategori]);
}

public function kategori_search(Request $request){
  $query = $request->q;
  $kategori = Kategori::where('nama_sp','like','%'.$query.'%')->orderBy('id','asc')->paginate(10);      
  return view('operator.kategori.search', ['kategori' => $kategori, 'query' => $query]); 
}

public function kategori_buat(){
  return view('operator.kategori.buat');
}

public function kategori_save(Request $request){
  $kategori = new Kategori;
  $kategori->nama_sp = $request->nama;
  $kategori->isi = $request->isi;
  $kategori->slug = str_slug($request->nama);    
  $kategori->image = '';
  if($request->hasFile('image')){
    $image = date('YmdHis').uniqid().".".
    $request->image->getClientOriginalExtension();
    $request->image->move(public_path()."/assets/kategori",$image);
    $kategori->image = $image;
  }
  $kategori->save();
  return redirect(url('operator/kategori'));
}

public function kategori_show(){
  return redirect('operator/kategori');
}

public function kategori_edit($id){
  $kategori = Kategori::find($id);
  return view('operator.kategori.edit', ['kategori' => $kategori]);
}

public function kategori_update(Request $request, $id){
  $kategori = Kategori::find($id);
  $kategori->nama_sp = $request->nama;
  $kategori->isi = $request->isi;
  $kategori->slug = str_slug($request->nama);
  if($request->file('image') == "")
  {
    $kategori->image = $kategori->image;
  } else{
    $kategori->image = '';
    if($request->hasFile('image')){
      $image = date('YmdHis').uniqid().".".
      $request->image->getClientOriginalExtension();
      $request->image->move(public_path()."/assets/kategori",$image);
      $kategori->image = $image;
    }
  }
  $kategori->save();
  return redirect('operator/kategori');
}

public function kategori_delete($id){
  $kategori = Kategori::find($id);
  $kategori->delete();
  return redirect('operator/kategori');
}

public function jadwal_all(){
  $jadwal = Jadwal::orderBy('id','desc')->paginate(10);     
  if (!$jadwal){ abort(404); }
  return view('operator.jadwal.all', ['jadwal' => $jadwal]);
}

public function jadwal_search(Request $request){
  $query = $request->q;
  $jadwal = Jadwal::where('nama','like','%'.$query.'%')->orderBy('id','asc')->paginate(10);      
  return view('operator.jadwal.search', ['jadwal' => $jadwal, 'query' => $query]); 
}
public function jadwal_buat(){
  $kategori = Kategori::all();
  return view('operator.jadwal.buat', ['kategori' => $kategori]);
}

public function jadwal_save(Request $request){
  $jadwal = new Jadwal;
  $jadwal->id_kategori = $request->id_kategori;
  $jadwal->nama = $request->nama;
  $jadwal->tanggal_mulai = $request->tanggal_mulai;
  $jadwal->tanggal_selesai = $request->tanggal_selesai;
  $jadwal->waktu = $request->jam_mulai.' s/d '.$request->jam_selesai;
  $jadwal->lokasi = $request->lokasi;
  $jadwal->kuota = $request->kuota;
  $jadwal->biaya = $request->biaya;
  $jadwal->isi = $request->isi;
  $jadwal->status = $request->status;
  $jadwal->slug = str_slug($request->nama);
  $jadwal->info = $request->info;
  $jadwal->skema = $request->skema;
  // $jadwal->image = '';
  // if($request->hasFile('image')){
  //   $image = date('YmdHis').uniqid().".". $request->image->getClientOriginalExtension();
  //   Image::make($request->image)->resize(600, 400)->save(public_path("/assets/jadwal/". $image));
  //   $jadwal->image = $image;
  // }
  $jadwal->save();
  return redirect(url('operator/jadwal'));
}

public function jadwal_edit($id){
  $jadwal = Jadwal::find($id);
  $kategori = Kategori::all();
  return view('operator.jadwal.edit', ['jadwal' => $jadwal, 'kategori' => $kategori]);
}

public function jadwal_update(Request $request, $id){
  $jadwal = Jadwal::find($id);
  $jadwal->id_kategori = $request->id_kategori;
  $jadwal->nama = $request->nama;
  $jadwal->tanggal_mulai = $request->tanggal_mulai;
  $jadwal->tanggal_selesai = $request->tanggal_selesai;
  $jadwal->waktu = $request->waktu;
  $jadwal->lokasi = $request->lokasi;
  $jadwal->kuota = $request->kuota;
  $jadwal->biaya = $request->biaya;
  $jadwal->isi = $request->isi;
  $jadwal->status = $request->status;
  $jadwal->slug = str_slug($request->nama);
  $jadwal->save();

  return redirect(url('operator/jadwal'));
}

public function jadwal_delete($id){
  $jadwal = Jadwal::find($id);
  $jadwal->delete();
  return redirect(url('operator/jadwal'));
}

public function pembayaran_all(){
  $tipe = Pembayaran::all();
  return view('operator.pembayaran.all', ['tipe' => $tipe]);
}

public function pembayaran_buat(){
  return view('operator.pembayaran.buat');
}

public function pembayaran_save(Request $request){
  $tipe = new Pembayaran;
  $tipe->nama_bank = $request->nama_bank;
  $tipe->no_rek = $request->no_rek;
  $tipe->atas_nama = $request->atas_nama;
  $tipe->logo = '';
  if($request->hasFile('logo')){
    $image = date('YmdHis').uniqid().".". $request->logo->getClientOriginalExtension();
    $request->logo->move(public_path()."/assets/logo",$image);
    $tipe->logo = $image;
  }
  $tipe->save();
  return redirect(url('operator/pembayaran'));
}

public function pembayaran_edit($id){
  $tipe = Pembayaran::find($id);
  return view('operator.pembayaran.edit', ['tipe' => $tipe]);
}

public function pembayaran_update(Request $request, $id){
  $tipe = Pembayaran::find($id);
  $tipe->nama_bank = $request->nama_bank;
  $tipe->no_rek = $request->no_rek;
  $tipe->atas_nama = $request->atas_nama;
  $tipe->save();
  return redirect('operator/pembayaran');
}

public function pembayaran_delete($id){
  $tipe = Pembayaran::find($id);
  $tipe->delete();
  return redirect(url('operator/pembayaran'));
}

public function konfirmasi(){
  $transaksi = Transaksi::orderBy('created_at', 'desc')->where('status', '=', 2)->paginate(10);
  return view('operator.konfirmasi.konfirmasi', ['transaksi' => $transaksi]);
}

public function konfirmasi_search(Request $request){
  $query = $request->q;
  $transaksi = Transaksi::where('id','like','%'.$query.'%')
  ->orWhere('kode_transfer','like','%'.$query.'%')
  ->where('status', '=', 2)
  ->orderBy('id','asc')
  ->paginate(10);
  return view('operator.konfirmasi.search', ['transaksi' => $transaksi, 'query' => $query]); 
}

// public function konfirmasi_tunai(){
//   $transaksi = Transaksi::orderBy('created_at', 'desc')
//   ->where('tipe', '=', 2)->where('status', '=', 4)->get();
//   return view('operator.konfirmasi.tunai', ['transaksi' => $transaksi]);
// }

public function konfirmasi_update($id){
  $now = new DateTime();
  $transaksi = Transaksi::find($id);
  $kategori = Kategori::find($transaksi->jadwal->id_kategori);
  // dd($transaksi->jadwal->id_kategori);
  $transaksi->status = 3;


  $trans = new trans;
  $trans->id_transaksi = $transaksi->id;
  $trans->user = $transaksi->user->name;
  $trans->user_id = $transaksi->user->id;
  $trans->jadwal = $transaksi->jadwal->nama;
  $trans->kategori = $kategori->nama_sp;
  if (!$transaksi->tunai == 1) {
    $trans->pembayaran = $transaksi->pembayaran->nama_bank;
  }
  $trans->id_userdata = $transaksi->userdata->id;
  $trans->tanggal_pesan = $now;
  $trans->tanggal_konfirmasi = $now;
  $trans->nama_pengirim = 1;
  $trans->asal_bank = 1;
  // $trans->kode_transfer = $transaksi->kode_transfer;
  $trans->kode_transfer = 1;
  if ($transaksi->tunai == 1) {
    $trans->photo_bukti = '-';
  }else{
    $trans->photo_bukti = $transaksi->photo_bukti;
  }
  $trans->tunai = $transaksi->tunai;  
  $trans->status = 0;
  $trans->notifikasi = 0;

  // die('berhasil');
  $transaksi->delete();
  $trans->save();
  return redirect('operator/konfirmasi');
}

public function konfirmasi_delete($id){
  $transaksi = Transaksi::find($id);
  $transaksi->delete();
  return redirect('operator/konfirmasi');
}

public function transaksi_all(){
  $transaksi = Transaksi::orderBy('created_at', 'desc')->where('status', '=', 3)->get();
  return view('operator.transaksi.all', ['transaksi' => $transaksi]);
}

public function transaksi_search(Request $request){
 $query = $request->q;
 $transaksi = Transaksi::where('id','like','%'.$query.'%')->where('status', '=', 5)->orderBy('id','asc')->paginate(10);
 return view('operator.transaksi.search', ['transaksi' => $transaksi, 'query' => $query]); 
}

public function sertifikat()
{
  $trans = trans::orderBy('created_at', 'desc')->where('notifikasi', '=', 0)->paginate(10);
  return view('operator.sertifikat.all', ['trans' => $trans]);
}

public function sertifikat_show($id)
{
  $trans = trans::find($id);
  if (!$trans){ abort(404); }
  return view('operator.sertifikat.show', ['trans' => $trans]); 
}

public function sertifikat_save(Request $request)
{
 $trans = trans::find($request->id);
 $trans->status = $request->status;
 $trans->notifikasi = 1;
 $trans->save();
 return redirect('operator/sertifikat');
}

public function halaman()
{
  $kolum = kolum::all();     
  return view('operator.halaman.all', ['kolum' => $kolum]); 
}

public function halaman_show($id)
{
 $kolum = kolum::find($id);
 if (!$kolum){ abort(404); }
 return view('operator.halaman.show', ['kolum' => $kolum]); 
}

public function halaman_save(Request $request)
{
 $kolum = kolum::find($request->id);
 $kolum->judul = $request->judul;
 $kolum->isi =  $request->isi;
 $kolum->save();
 return redirect('operator/halaman');
}

}

