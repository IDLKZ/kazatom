@extends('layouts.admin.default')
@section('content')
    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="h3 mb-2 mb-sm-0">Dashboard</h1>
            </div>
        </div>

        <!-- Counter boxes START -->
        <div class="row g-4 mb-4">
            <!-- Counter item -->
            <div class="col-md-6 col-xxl-3">
                <div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="{{$courses}}" data-purecounter-delay="200">0</h2>
                            <span class="mb-0 h6 fw-light">Всего курсов</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="fas fa-tv fa-fw"></i></div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-md-6 col-xxl-3">
                <div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="{{$instructors}}"	data-purecounter-delay="200">0</h2>
                            <span class="mb-0 h6 fw-light">Инструкторы</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-purple text-white mb-0"><i class="fas fa-user-tie fa-fw"></i></div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-md-6 col-xxl-3">
                <div class="card card-body bg-primary bg-opacity-10 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="{{$students}}"	data-purecounter-delay="200">0</h2>
                            <span class="mb-0 h6 fw-light">Сотрудники</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-user-graduate fa-fw"></i></div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-md-6 col-xxl-3">
                <div class="card card-body bg-success bg-opacity-10 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <div class="d-flex">
                                <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="{{$videos}}"	data-purecounter-delay="200">0</h2>
                                <span class="mb-0 h2 ms-1"></span>
                            </div>
                            <span class="mb-0 h6 fw-light">Всего видеоуроков</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="bi bi-stopwatch-fill fa-fw"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter boxes END -->

        <!-- Chart and Ticket START -->
        <div class="row g-4 mb-4">
            <canvas id="canvas_user" height="280" width="600"></canvas>
        </div>
        <div class="row g-4 mb-4">
            <canvas id="canvas_courses" height="280" width="600"></canvas>
        </div>
        <!-- Chart and Ticket END -->


    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script>
        var year = <?php echo $year; ?>;
        var user = <?php echo $user; ?>;
        var course = <?php echo $course_chart; ?>;
        var barChartData = {
            labels: year,
            datasets: [{
                label: 'Пользователи',
                backgroundColor: "pink",
                data: user
            }]
        };
        var barOption = {
            labels: year,
            datasets: [{
                label: 'Курсы',
                backgroundColor: "green",
                data: course
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas_user").getContext("2d");
            var ctx_course = document.getElementById("canvas_courses").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Статистика пользователей'
                    }
                }
            });
            window.myBar = new Chart(ctx_course, {
                type: 'bar',
                data: barOption,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Статистика курсов'
                    }
                }
            });
        };

    </script>

@endpush
