@extends('layouts.op.app-operator')

@section('pageTitle', 'Klien Kami')

@section('content')
<style type="text/css">
.pagination{
  float: right;
}
</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('operator/klienkami/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Klien Kami</button></a>   
      </div>      
      <div class="box-body table-responsive">
        <?php $i = 1; ?>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Url</th>      
              <th>Photo</th>             
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($klienkami as $key)
            <tr>
              <td>{{ substr($key->judul, 0, 30) }}</td>
              <td>{{ substr($key->url, 0, 30) }}</td>
              <td> <a href="{{ url('assets/klienkami/'.$key->photo) }}" target="_blank"><img style="width:50px; height:50px;" src="{{ url('assets/klienkami/'.$key->photo) }}"></a></td>
              <td>
                <form action="{{ url('operator/klienkami/'.$key->id)}}" method="post">
                 <a href="{{ url('operator/klienkami/'.$key->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-th-list"></i> Edit</a>
                 <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                 <input type="hidden" name="_method" value="DELETE">
                 {{ csrf_field() }}
               </form>
             </td>
           </tr>
           @endforeach
         </tbody>
       </table>
     </div>     
   </div>   
   {{ $klienkami->links() }}
 </div>
</div>
@endsection
