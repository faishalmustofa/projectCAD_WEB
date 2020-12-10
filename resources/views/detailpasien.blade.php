@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Pasien</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/list-pasien">Daftar Pasien</a></li>
                            <li class="breadcrumb-item active">Detail Pasien</li>
                        </ol>
                 </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="chartWrapper">
            <div class="chartAreaWrapper">
                <canvas id="myChart" height="300" width="1200"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </section>
    <!-- /.content -->=
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No Telepon</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$hasil['pasien']->name}}</td>
                                        <td>{{$hasil['pasien']->tanggal_lahir}}</td>
                                        <td>{{$hasil['pasien']->no_telp}}</td>
                                        <td>{{$hasil['pasien']->jeniskelamin}}</td>
                                        <td>{{$hasil['pasien']->alamat}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <center class="loading"><div class="lds-ripple d-flex align-items-center"><div></div><div></div></div></center>
                        </div>
                        <a type="button" class="btn btn-primary float-right" href="/list-pasien">Kembali</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
        var label = <?php echo json_encode($label); ?>;
        var dataset = <?php echo json_encode($hasil["dataset"]); ?>;
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: label,
                datasets: [{
                    label: 'Data Signal PCG',
                    borderColor: 'rgb(255, 99, 132)',
                    data: dataset
                }]
            },

            // Configuration options go here
            options: {}
        });
</script>
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>


@endpush