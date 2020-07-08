@extends('master')

@section('title', 'Tambah Pertanyaan')

@push('css')
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section('content')
	
	<div class="col-md-8">
        <!-- general form elements disabled -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Tambah Pertanyaan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" action="/pertanyaan" method="POST">
            @csrf
              <!-- text input -->
                <label>Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" placeholder="Enter ...">
              <!-- textarea -->
                <label>Pertanyaan</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" placeholder="Enter ..."></textarea>
                <label>Nama Anda</label>
                  <select class="form-control select2" id="nama" name="nama" style="width: 100%; height: 50px;">
                    @foreach($pertanyaan as $key => $item)
                  	<option value="{{$item->user_id}}">{{$item->name}}</option>
                  	@endforeach
                  </select>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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