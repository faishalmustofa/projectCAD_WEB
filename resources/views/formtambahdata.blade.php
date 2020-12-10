@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah Data Sinyal Pasien</h1>
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
                            <form class="form-horizontal" action="/proses-tambah-data/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $pasien->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-2 col-form-label">Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ $pasien->no_telp }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis-kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select form-control" name="jeniskelamin" id="jeniskelamin" value="{{ $pasien->jeniskelamin }}" disabled>
                                            <option selected>{{ $pasien->jeniskelamin }}</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="alamat" value="{{ $pasien->alamat }}" disabled>{{ $pasien->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Load Data</label>
                                    <div class="col-sm-10">
                                        <input class="btn btn-primary" type="submit" value="Load Data">
                                    </div>
                                </div>
<!--                                 
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                                    </div>
                                </div> -->
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
@include('layouts.footer')
@endsection
