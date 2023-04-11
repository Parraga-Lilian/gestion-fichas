@php
    $layout = (auth()->user()->tipo == "administrador") ? 'layouts.sidebar-admin' : 'layouts.sidebar-empleado';
@endphp
@extends($layout)
@section('contenido')
<?php use App\Models\User; ?>
<?php use App\Models\Evaluacion; ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Gráfico de barras') }}</div>

                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="myChart" style="height: 100%;"></canvas>
                    </div>
                    <div class="chart-info">
                        <p><strong>Promedio de calificación:</strong> {{ Evaluacion::obtenerPromedioPuntaje() }}</p>
                        <p><strong>Calificación más alta:</strong> {{ Evaluacion::obtenerMaximoPuntaje() }} </p>
                        <p><strong>Calificación más baja:</strong> {{ Evaluacion::obtenerMinimoPuntaje() }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($evaluaciones as $evaluacion)
                        '{{ $evaluacion->nusuario }}',
                @endforeach
            ],
            datasets: [{
                label: 'Calificación',
                data: [
                    @foreach($evaluaciones as $evaluacion)
                        '{{ $evaluacion->puntajeobtenido }}',
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
    responsive: true, // Hacer el chart responsive
    maintainAspectRatio: true, // Mantener el aspecto del chart
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
            }]
        }
    }
    });

// Agregar evento resize para actualizar el chart
window.addEventListener('resize', function() {
    myChart.update();
});

// Animar el chart
myChart.options.animation = {
    duration: 2000,
    easing: 'easeInOutQuart'
};
myChart.update();

</script>

@endsection
