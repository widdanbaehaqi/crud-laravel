@extends('master')

@section('title', 'Edit Pertanyaan')

@push('css')
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section('content')
	
	<div class="col-md-8">
        <!-- general form elements disabled -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Edit Pertanyaan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" action="/pertanyaan/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')
              <!-- text input -->
                <label>Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ $data->judul }}">
              <!-- textarea -->
                <label>Pertanyaan</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" value="{{ $data->isi }}">{{ $data->isi }}</textarea>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
    </div>
@endsection

@push('scripts')
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