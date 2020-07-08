@extends('master')

@section('title', 'Detail Pertanyaan')

@push('css')
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section('content')
	
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Pertanyaan:</h3>
		</div>
		<div class="card-body">
			{{$data->isi}}
		</div>
		<div class="card-footer">
			<p class="card-subtitle">Oleh: {{$data->name}}</p>
			<p class="card-subtitle">Dibuat: {{$data->created_at}}</p>
			<p class="card-subtitle">Diubah: {{$data->updated_at}}</p>
		</div>
	</div>

	<div class="card">
	  <div class="card-header">
	    <h3 class="card-title">Daftar Jawaban</h3>
	  </div>
	  <div class="card-body">
	    <table id="example1" class="table table-bordered table-striped">
		  <thead>                  
		    <tr>
		      <th style="width: 10px">#</th>
		      <th>Jawaban</th>
		      <th>Penjawab</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($jawaban as $key => $item)
		    <tr>
		      <td>{{ $key+1 }}</td>
		      <td>{{ $item->isi }}</td>
		      <td>{{ $item->name }}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	   </div>
	</div>

@endsection

@push('scripts')

	<script src="{{asset('/adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
	<script src="{{asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
	<script>
	  $(function () {
	    $("#example1").DataTable();
	  });
	</script>
	<script src="{{asset('/adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
	<script src="{{asset('/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
	<script src="{{asset('/adminlte/plugins/moment/moment.min.js')}}"></script>
	<script src="{{asset('/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

	<script>
	  $(function () {
	    //Initialize Select2 Elements
	    $('.select2').select2()

	    //Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4'
	    })
	  })
	</script>

@endpush