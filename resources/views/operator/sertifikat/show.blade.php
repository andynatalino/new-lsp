@extends('layouts.op.app-operator')

@section('pageTitle', 'Lihat Sertifikat')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">

			<div class="box-body">
				<form method="post" action="{{ url('operator/sertifikat') }}">
					{{csrf_field()}}
					<div class="form-group">
						<label>ID Transaksi</label>
						: {{ $trans->id_transaksi }}
					</div>
					<div class="form-group">
						<label>User</label>
						: {{ $trans->user }}
					</div>
					<div class="form-group">
						<label>Jadwal</label>
						: {{ $trans->jadwal }}
					</div>
					<div class="form-group">
						<label>Kategori</label>
						: {{ $trans->kategori }}
					</div>
					<div class="form-group">
						<label>Tipe Pembayaran</label>
						: {{ $trans->pembayaran }}
					</div>
					<div class="form-group">
						<label>Tanggal Order</label>
						: {{ $trans->tanggal_pesan }}
					</div>
					<div class="form-group">
						<label>Tanggal Konfirmasi</label>
						: {{ $trans->tanggal_konfirmasi }}
					</div>
					<input type="hidden" name="id" value="{{ $trans->id }}">
					<button name="status" value="kompeten" class="btn btn-primary">KOMPETEN</button>
					<button name="status" value="tidakkompeten" class="btn btn-danger">TIDAK KOMPETEN</button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection