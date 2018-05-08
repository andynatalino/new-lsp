<?php
Auth::routes();
Route::post('notifikasi', 'IndexController@notifikasi');
Route::post('statuspembayaran', 'IndexController@statuspembayaran');
Route::get('logout',function ()
{
 return redirect(url('login'));
});
Route::get('/', 'IndexController@index');
Route::post('/pelatihan', 'SertifikasiController@submit');
// Route::get('/pelatihan', 'SertifikasiController@redirect');

Route::group(['prefix' => 'pembayaran'], function(){
  Route::get('/', 'SertifikasiController@pembayaran');  
  Route::post('/', 'SertifikasiController@pembayaran_next');  
  // Route::get('/checkout/{id}', 'SertifikasiController@pembayaran_checkout');  
  Route::post('/checkout', 'SertifikasiController@pembayaran_checkout_save');
  Route::get('/checkout/informasipembayaran/', 'SertifikasiController@pembayaran_informasi'); 
  Route::post('/checkout/informasipembayaran/', 'SertifikasiController@pembayaran_informasi_save'); 
  Route::get('/checkout/konfirmasi/{id}', 'SertifikasiController@pembayaran_konfirmasi');  
  Route::delete('/{id}', 'SertifikasiController@pembayaran_delete');
  Route::post('/daftar', 'SertifikasiController@daftar');
});
Route::get('/galeri', 'IndexController@galeri');
Route::get('/klienkami', 'IndexController@klienkami');  
Route::get('/kontak', 'IndexController@kontak');  
Route::post('/kontak', 'IndexController@kontak_save');  

Route::group(['prefix' => 'tentang'], function(){
  Route::get('/',function ()
  {
   return redirect(url('/'));
 });
  Route::get('/{slug}', 'IndexController@tentang_show');
});
Route::post('pdf', 'ProfileController@pdf');
Route::post('pdf-tunai', 'ProfileController@pdftunai');
Route::post('pdf-tunai2', 'ProfileController@pdftunai2');
Route::group(['prefix' => 'profil'], function(){
  Route::get('/', 'ProfileController@index');
  // Route::get('/',function ()
  // {
  //   return view('errors.coming-soon');
  // });
  Route::get('/konfirmasi', 'ProfileController@konfirmasi');
  Route::post('/konfirmasi', 'ProfileController@konfirmasiSave');
  Route::get('/order', 'ProfileController@order');
  Route::get('/change-photo', 'ProfileController@change_photo');
  Route::post('/change-photo', 'ProfileController@change_photo_save');
  Route::get('/change-email', 'ProfileController@change_email');
  Route::post('/change-email', 'ProfileController@change_email_save');
  Route::get('/change-password', 'ProfileController@change_password');
  Route::post('/change-password', 'ProfileController@change_password_save');
  Route::get('/change-data', 'ProfileController@change_data');
  Route::post('/change-data', 'ProfileController@change_data_save');
  Route::get('sertifikat', 'ProfileController@sertifikat');
  Route::get('transaksi', 'ProfileController@transaksisaya');
});
Route::get('checkout', 'SertifikasiController@cek');
Route::delete('checkout/delete/{id}', 'SertifikasiController@checkout_delete');

Route::group(['prefix' => 'sertifikasi'], function(){
  Route::get('/', 'SertifikasiController@kategori');
  Route::get('/{slug}', 'SertifikasiController@jadwal');
  Route::get('/{slug}/search', 'SertifikasiController@jadwal_search');
  Route::get('{slug1}/{slug2}', 'SertifikasiController@show_jadwal');  
  Route::get('{slug1}/{slug2}/checkout', 'SertifikasiController@checkout');
  Route::post('save', 'SertifikasiController@checkoutSave');
  Route::get('checkout/info', 'SertifikasiController@checkoutInfo');
});

Route::group(['prefix' => 'berita'], function(){
  Route::get('/', 'IndexController@berita_all');
  Route::get('/{slug}', 'IndexController@berita_show');
});

Route::group(['prefix' => 'admin'], function(){
  Route::group(['middleware' => 'admin'], function(){
   Route::get('/', 'adminController@dashboard');
   Route::get('/settings', 'adminController@settings');
   Route::post('/settings', 'adminController@save_settings');
   Route::group(['prefix' => 'user'], function(){
    Route::get('/', 'adminController@user');
    Route::get('/buat', 'adminController@buat_user');
    Route::post('/', 'adminController@user_save');
    Route::get('/{id}/edit', 'adminController@user_edit');
    Route::post('/{id}', 'adminController@user_update');
    Route::delete('/{id}', 'adminController@user_delete');
  });
   Route::group(['prefix' => 'galeri'], function(){
    Route::get('/', 'adminController@galeri');
    Route::get('/buat', 'adminController@buat_galeri');
    Route::post('/', 'adminController@galeri_save');
    Route::get('/{id}/edit', 'adminController@galeri_edit');
    Route::post('/{id}', 'adminController@galeri_update');
    Route::delete('/{id}', 'adminController@galeri_delete');
  });
   Route::group(['prefix' => 'tentang'], function(){
    Route::get('/', 'adminController@tentang');
    Route::get('/buat', 'adminController@buat_tentang');
    Route::post('/', 'adminController@tentang_save');
    Route::get('/{id}/edit', 'adminController@tentang_edit');
    Route::post('/{id}', 'adminController@tentang_update');
    Route::delete('/{id}', 'adminController@tentang_delete');
  });
   Route::group(['prefix' => 'kontak'], function(){
    Route::get('/', 'adminController@kontak');
    Route::get('/{id}', 'adminController@show_kontak');    
    Route::delete('/{id}', 'adminController@kontak_delete');
  });
 });
});

Route::group(['prefix' => 'operator'], function(){
  Route::group(['middleware' => 'op'], function(){
    Route::get('/', 'opController@index');
    Route::group(['prefix' => 'berita'], function(){
      Route::get('/', 'opController@berita');
      Route::get('/search', 'opController@berita_search');
      Route::post('/gambar', 'opController@berita_gambar');
      Route::get('/buat', 'opController@buat_berita');
      Route::post('/', 'opController@berita_save');
      Route::get('/{id}/edit', 'opController@berita_edit');
      Route::post('/{id}', 'opController@berita_update');
      Route::delete('/{id}', 'opController@berita_delete');
    });
    Route::group(['prefix' => 'slider'], function(){
      Route::get('/', 'opController@slider_all');
      Route::get('/buat', 'opController@buat_slider');
      Route::post('/', 'opController@save_slider');
      Route::get('/{id}/edit', 'opController@slider_edit');
      Route::post('/{id}', 'opController@slider_update');
      Route::delete('/{id}', 'opController@slider_delete');
    });    
    Route::group(['prefix' => 'kategori'], function(){
      Route::get('/', 'opController@kategori_all');
      Route::get('/search', 'opController@kategori_search');
      Route::get('/buat', 'opController@kategori_buat');
      Route::post('/', 'opController@kategori_save');
      Route::get('/{id}', 'opController@kategori_show');
      Route::get('/{id}/edit', 'opController@kategori_edit');
      Route::post('/{id}', 'opController@kategori_update');
      Route::delete('/{id}', 'opController@kategori_delete');
    });
    Route::group(['prefix' => 'jadwal'], function(){
      Route::get('/', 'opController@jadwal_all');
      Route::get('/search', 'opController@jadwal_search');
      Route::get('/buat', 'opController@jadwal_buat');
      Route::post('/', 'opController@jadwal_save');
      Route::get('/{id}/edit', 'opController@jadwal_edit');
      Route::post('/{id}', 'opController@jadwal_update');
      Route::delete('/{id}', 'opController@jadwal_delete');
    });
    Route::group(['prefix' => 'pembayaran'], function(){
      Route::get('/', 'opController@pembayaran_all');
      Route::get('/buat', 'opController@pembayaran_buat');
      Route::post('/', 'opController@pembayaran_save');
      Route::get('/{id}/edit', 'opController@pembayaran_edit');
      Route::post('/{id}', 'opController@pembayaran_update');
      Route::delete('/{id}', 'opController@pembayaran_delete');
    });
    Route::group(['prefix' => 'konfirmasi'], function(){
      Route::get('/', 'opController@konfirmasi');
      Route::get('/search', 'opController@konfirmasi_search');     
      Route::get('/tunai', 'opController@konfirmasi_tunai');
      Route::post('/{id}', 'opController@konfirmasi_update');
      Route::delete('/{id}', 'opController@konfirmasi_delete');
    });
    Route::group(['prefix' => 'transaksi'], function(){
      Route::get('/', 'opController@transaksi_all');
      Route::get('/search', 'opController@transaksi_search');  
      Route::get('/buat', 'opController@transaksi_buat');
      Route::post('/', 'opController@transaksi_save');
      Route::get('/{id}/edit', 'opController@transaksi_edit');
      Route::post('/{id}', 'opController@transaksi_update');
      Route::delete('/{id}', 'opController@transaksi_delete');
    });
    Route::group(['prefix' => 'laporan'], function(){
      Route::get('/', 'opController@laporan');
    });
    Route::group(['prefix' => 'sertifikat'], function(){
      Route::get('/', 'opController@sertifikat');
      Route::get('/{id}', 'opController@sertifikat_show');
      Route::post('/', 'opController@sertifikat_save');
    });
     Route::group(['prefix' => 'halaman'], function(){
      Route::get('/', 'opController@halaman'); 
      Route::get('{id}', 'opController@halaman_show'); 
      Route::post('/', 'opController@halaman_save');
    });
    Route::group(['prefix' => 'klienkami'], function(){
      Route::get('/', 'opController@klienkami');
      Route::get('/buat', 'opController@buat_klienkami');
      Route::post('/', 'opController@save_klienkami');
      Route::get('/{id}/edit', 'opController@klienkami_edit');
      Route::post('/{id}', 'opController@klien_update');
      Route::delete('/{id}', 'opController@klien_delete');
    });  
  });
});
