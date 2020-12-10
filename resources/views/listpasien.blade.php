@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item active">Daftar Pasien</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.card-body -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>No Telepon</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Data jantung</th>
                  <th>Aksi</th>
                  <!-- <th>test</th> -->
                </tr>
                </thead>
                <tbody>
                  @foreach($pasien as $f)
                  <tr>
                    <td>{{$f->name}}</td>
                    <td>{{$f->tanggal_lahir}}</td>
                    <td>{{$f->no_telp}}</td>
                    <td>{{$f->jeniskelamin}}</td>
                    <td>{{$f->alamat}}</td>
                    <td>
                      @if ($f->file == "")

                      @elseif ($f->file == " ")

                      @else
                        {{$f->file}}
                      @endif
                    </td>
                    <td>
                      @if ($f->file == "")
                        <a class="btn btn-success" href="/tambah-data-pasien/{{ $f->id }}" data-toggle="tooltip" title="Ambil Data"><i class="far fa-plus-square"></i></a>
                        <a class="btn btn-danger" href="/hapus-data/{{ $f->id }}" width="10px" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                      @elseif ($f->file == " ")
                      <a class="btn btn-success" href="/tambah-data-pasien/{{ $f->id }}" data-toggle="tooltip" title="Ambil Data"><i class="far fa-plus-square"></i></a>
                      <a class="btn btn-danger" href="/hapus-data/{{ $f->id }}" width="10px" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                      @else
                        @if ($f->status == 0)
                          <a class="btn btn-primary" href="/proses-data/{{ $f->id }}" data-toggle="tooltip" title="Proses"><i class="fas fa-sync-alt"></i></a>
                          <a class="btn btn-danger" href="/hapus-data/{{ $f->id }}" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                        @elseif ($f->status == 1)
                          <a class="btn btn-info" href="/detail-data/{{ $f->id }}" data-toggle="tooltip" title="Detail"><i class="fas fa-info-circle"></i></a>
                          <a class="btn btn-danger" href="/hapus-data/{{ $f->id }}" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                        @endif
                      @endif
                    </td>

                  </tr>
                  @endforeach
                </tfoot>
              </table>
              <center class="loading"><div class="lds-ripple d-flex align-items-center"><div></div><div></div></div></center>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@include('layouts.footer')
@endsection
@push('js')

@endpush