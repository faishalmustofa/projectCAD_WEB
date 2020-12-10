@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Form Pendaftaran Pasien</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="aboutme">
                            <!-- Post -->
                            <div class="tab-pane" id="settings">
                            <form class="form-horizontal" action="/tambah-pasien" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal & Tahun Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-2 col-form-label">Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis-kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select form-control" name="jeniskelamin" id="jeniskelamin" required="required">
                                            <option selected>Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dokter" class="col-sm-2 col-form-label">Dokter</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select form-control" name="dokter_id" id="dokter_id" required="required">
                                            <option selected>Dokter</option>
                                            @foreach($dokter as $d)
                                                <option value="{{$d->id}}">{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="file" name="file" class="form-control" hidden disabled>
                                <input type="file" name="hasilproses" class="form-control" hidden disabled>
                                <input type="boolean" name="status" class="form-control" hidden disabled>
                                <input type="boolean" name="label" class="form-control" hidden disabled>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->

                            
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
      <!-- /.content -->
    </div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@include('layouts.footer')
@endsection
