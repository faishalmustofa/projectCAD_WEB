@extends('layouts.app')

@section('content')
    <canvas id="myChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var label = <?php echo json_encode($label); ?>;
        var dataset = <?php echo json_encode($hasil["dataset"][0]); ?>;
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: label,
                datasets: [{
                    label: 'Data Signal PCG',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: dataset
                }]
            },

            // Configuration options go here
            options: {}
        });

    </script>
@include('layouts.footer')
@endsection