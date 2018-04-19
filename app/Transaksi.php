<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	public function jadwal(){
		return $this->belongsTo('App\Jadwal', 'id_jadwal');
	}

	public function pembayaran(){
		return $this->belongsTo('App\Pembayaran', 'id_pembayaran');
	}

	public function user(){
		return $this->belongsTo('App\User', 'id_user');
	}

	public function userdata(){
		return $this->belongsTo('App\Userdata', 'id_userdata');
	}
}
