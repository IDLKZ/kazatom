@extends('layouts.admin.default')
@section('content')
    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-2 mb-sm-0">Тьюторы <span class="badge bg-orange bg-opacity-10 text-orange ms-3">{{$instructors->count()}}</span></h1>
            </div>
        </div>

        <!-- Card START -->
        <div class="card bg-transparent">

            <!-- Card header START -->
            <div class="card-header bg-transparent border-bottom px-0">
                <!-- Search and select START -->
                <div class="row g-3 align-items-center justify-content-between">

                    <!-- Search bar -->
                    <div class="col-md-8">
                        <form class="rounded position-relative" action="{{route('adminSearch')}}" method="get">
                            <input type="hidden" name="type" value="instructor">
                            <input name="query" class="form-control bg-transparent" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
                        </form>
                    </div>

                    <!-- Tab buttons -->
                    <div class="col-md-3">
                        <!-- Tabs START -->
                        <ul class="list-inline mb-0 nav nav-pills nav-pill-dark-soft border-0 justify-content-end" id="pills-tab" role="tablist">
                            <!-- Grid tab -->
                            <li class="nav-item">
                                <a href="admin-instructor-list.html#nav-preview-tab-1" class="nav-link mb-0 me-2 active" data-bs-toggle="tab">
                                    <i class="fas fa-fw fa-th-large"></i>
                                </a>
                            </li>
                            <!-- List tab -->
                            <li class="nav-item">
                                <a href="admin-instructor-list.html#nav-html-tab-1" class="nav-link mb-0" data-bs-toggle="tab">
                                    <i class="fas fa-fw fa-list-ul"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Tabs end -->
                    </div>
                </div>
                <!-- Search and select END -->
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
            <div class="card-body px-0">
                <!-- Tabs content START -->
                <div class="tab-content">

                    <!-- Tabs content item START -->
                    <div class="tab-pane fade show active" id="nav-preview-tab-1">
                        <div class="row g-4">
                            @if($instructors->count() > 0)
                                @foreach($instructors as $instructor)
                                    <!-- Card item START -->
                                        <div class="col-md-6 col-xxl-4">
                                            <div class="card bg-transparent border h-100">
                                                <!-- Card header -->
                                                <div class="card-header bg-transparent border-bottom d-flex align-items-sm-center justify-content-between">
                                                    <div class="d-sm-flex align-items-center">
                                                        <!-- Avatar -->
                                                        <div class="avatar avatar-md flex-shrink-0">
                                                            <img class="avatar-img rounded-circle" src="{{$instructor->getFile('image')}}" alt="avatar">
                                                        </div>
                                                        <!-- Info -->
                                                        <div class="ms-0 ms-sm-2 mt-2 mt-sm-0">
                                                            <h5 class="mb-0"><a href="javascript:void (0)">{{$instructor->name}}</a></h5>
{{--                                                            <p class="mb-0 small">Web Designer</p>--}}
                                                        </div>
                                                    </div>

                                                    <!-- Edit dropdown -->
                                                    <div class="dropdown">
                                                        <a href="admin-instructor-list.html#" class="btn btn-sm btn-light btn-round small mb-0" role="button" id="dropdownShare1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots fa-fw"></i>
                                                        </a>
                                                        <!-- dropdown button -->
                                                        <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare1">
{{--                                                            <li><a class="dropdown-item" href="admin-instructor-list.html#"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit</a></li>--}}
                                                            <li>
                                                                <form action="{{route('instructors.destroy', $instructor->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button onclick="return confirm('Вы уверены ?')" type="submit" class="dropdown-item"><i class="bi bi-trash fa-fw me-2"></i>Удалить</button>
                                                                </form>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <!-- Total students -->
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle flex-shrink-0"><i class="fas fa-user-graduate fa-fw"></i></div>
                                                            <h6 class="mb-0 ms-2 fw-light">Всего студентов</h6>
                                                        </div>
                                                        <span class="mb-0 fw-bold">{{array_key_exists($instructor->id, $students) ? count($students[$instructor->id]) : 0}}</span>
                                                    </div>

                                                    <!-- Total courses -->
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-md bg-purple bg-opacity-10 text-purple rounded-circle flex-shrink-0"><i class="fas fa-book fa-fw"></i></div>
                                                            <h6 class="mb-0 ms-2 fw-light">Всего курсов</h6>
                                                        </div>
                                                        <span class="mb-0 fw-bold">{{$instructor->courses->count()}}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Card item END -->
                                @endforeach
                            @endif

                        </div> <!-- Row END -->
                    </div>
                    <!-- Tabs content item END -->

                    <!-- Tabs content item START -->
                    <div class="tab-pane fade" id="nav-html-tab-1">
                        <!-- Table START -->
                        <div class="table-responsive border-0">
                            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                <!-- Table head -->
                                <thead>
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">Имя тьютора</th>
                                    <th scope="col" class="border-0">Количество курсов</th>
                                    <th scope="col" class="border-0">Количество студентов</th>
                                    <th scope="col" class="border-0 rounded-end">Действие</th>
                                </tr>
                                </thead>

                                <!-- Table body START -->
                                <tbody>
                                @if($instructors->count() > 0)
                                    @foreach($instructors as $instructor)
                                        <tr>
                                            <!-- Table data -->
                                            <td>
                                                <div class="d-flex align-items-center position-relative">
                                                    <!-- Image -->
                                                    <div class="avatar avatar-md">
                                                        <img src="{{$instructor->getFile('image')}}" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="mb-0 ms-2">
                                                        <!-- Title -->
                                                        <h6 class="mb-0"><a href="javascript:void (0)" class="stretched-link">{{$instructor->name}}</a></h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Table data -->
                                            <td>{{$instructor->courses->count()}}</td>

                                            <!-- Table data -->
                                            <td>{{array_key_exists($instructor->id, $students) ? count($students[$instructor->id]) : 0}}</td>

                                            <!-- Table data -->
                                            <td>
                                                <form action="{{route('instructors.destroy', $instructor->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Вы уверены ?')" type="submit" class="btn btn-danger-soft btn-round mb-0">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                                <!-- Table body END -->
                            </table>
                        </div>
                        <!-- Table END -->
                    </div>
                    <!-- Tabs content item END -->

                </div>
                <!-- Tabs content END -->
            </div>
            <!-- Card body END -->

            <!-- Card footer START -->
            <div class="card-footer bg-transparent p-0">
                <!-- Pagination START -->
                <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                    <!-- Content -->
                    {!! $instructors->links() !!}
                </div>
                <!-- Pagination END -->
            </div>
            <!-- Card footer END -->
        </div>
        <!-- Card END -->
    </div>
@endsection
