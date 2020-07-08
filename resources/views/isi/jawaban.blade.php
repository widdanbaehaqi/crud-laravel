@extends('master')

@section('title', 'Daftar Jawaban')

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
			{{$pertanyaan->isi}}
		</div>
		<div class="card-footer">
			<p class="card-subtitle">Oleh: {{$pertanyaan->name}}</p>
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
	  <form role="form" action="/jawaban/{{$id}}" method="POST">
	  	@csrf
	  	<input type="hidden" name="question_id" value="{{$id}}">
	  	<div class="card-body">
		  	<label>Tambah Jawaban</label>
			<textarea class="form-control" id="isi" name="isi" rows="3" placeholder="Enter ..."></textarea>
			<label>Nama Anda</label>
	          <select class="form-control select2" id="nama" name="nama" style="width: 100%; height: 50px;">
	            @foreach($pertanyaanAll as $key => $item)
	          	<option value="{{$item->user_id}}">{{$item->name}}</option>
	          	@endforeach
	          </select>
	  	</div>
		<div class="card-footer">
          	<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	  </form>
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