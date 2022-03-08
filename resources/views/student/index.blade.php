@extends('layouts.default')
@section('content')
    <main>

        <!-- =======================
        Page Banner START -->
        @include('student.navbar')
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Page content START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">

                    <!-- Right sidebar START -->
                    @include('student.menu')
                    <!-- Right sidebar END -->

                    <!-- Main content START -->
                    <div class="col-xl-9">

                        <!-- Counter boxes START -->
                        <div class="row mb-4">
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-6 mb-3 mb-lg-0">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-orange bg-opacity-15 rounded-3">
                                    <span class="display-6 lh-1 text-orange mb-0"><i class="fas fa-tv fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="{{$results->count()}}" data-purecounter-delay="200" data-purecounter-duration="0">{{$results->count()}}</h5>
                                        </div>
                                        <p class="mb-0 h6 fw-light">Всего курсов</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Counter item -->

                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-6 mb-3 mb-lg-0">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-10 rounded-3">
                                    <span class="display-6 lh-1 text-success mb-0"><i class="fas fa-medal fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="{{$results->where('status', 1)->count()}}" data-purecounter-delay="300" data-purecounter-duration="0">{{$results->where('status', 1)->count()}}</h5>
                                        </div>
                                        <p class="mb-0 h6 fw-light">Завершенные курсы</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter boxes END -->

                        <div class="card bg-transparent border rounded-3">
                            <!-- Card header START -->
                            <div class="card-header bg-transparent border-bottom">
                                <h3 class="mb-0">Список моих курсов</h3>
                            </div>
                            <!-- Card header END -->

                            <!-- Card body START -->
                            <div class="card-body">

                                <!-- Search and select START -->
{{--                                <div class="row g-3 align-items-center justify-content-between mb-4">--}}
{{--                                    <!-- Content -->--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <form class="rounded position-relative">--}}
{{--                                            <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">--}}
{{--                                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <!-- Search and select END -->

                                <!-- Course list table START -->
                                <div class="table-responsive border-0">
                                    <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                        <!-- Table head -->
                                        <thead>
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">Наименование курса</th>
                                            <th scope="col" class="border-0">Количество видеоуроков</th>
                                            <th scope="col" class="border-0">Дедлайн</th>
                                            <th scope="col" class="border-0 rounded-end">Действие</th>
                                        </tr>
                                        </thead>

                                        <!-- Table body START -->
                                        <tbody>
                                            <!-- Table item -->
                                            @if(count($results) > 0)
                                                @foreach($results as $item)
                                                    <tr>
                                                        <!-- Table data -->
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- Image -->
                                                                <div class="w-100px">
                                                                    <img src="{{$item->course->getFile('image')}}" class="rounded" alt="">
                                                                </div>
                                                                <div class="mb-0 ms-2">
                                                                    <!-- Title -->
                                                                    <h6><a href="{{route('studentListVideoCourse', $item->course->id)}}">{{$item->course->title}}</a></h6>
                                                                    <!-- Info -->
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <!-- Table data -->
                                                        <td>{{$item->course->videos->count()}}</td>

                                                        <!-- Table data -->
                                                        <td>{{$item->course->deadline}}</td>

                                                        <!-- Table data -->
                                                        <td>
                                                            @if($item->status)
                                                                <button class="btn btn-sm btn-success me-1 mb-1 mb-x;-0 disabled"><i class="bi bi-check me-1"></i>Завершено</button>
                                                            @else
                                                                <a href="{{route('studentListVideoCourse', $item->course->id)}}" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-play-circle me-1"></i>Продолжить</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                        <!-- Table body END -->
                                    </table>
                                </div>
                                <!-- Course list table END -->

                                <!-- Pagination START -->
{{--                                <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">--}}
{{--                                    <!-- Content -->--}}
{{--                                    <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>--}}
{{--                                    <!-- Pagination -->--}}
{{--                                    <nav class="d-flex justify-content-center mb-0" aria-label="navigation">--}}
{{--                                        <ul class="pagination pagination-sm pagination-primary-soft mb-0 pb-0">--}}
{{--                                            <li class="page-item mb-0"><a class="page-link" href="student-dashboard.html#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>--}}
{{--                                            <li class="page-item mb-0"><a class="page-link" href="student-dashboard.html#">1</a></li>--}}
{{--                                            <li class="page-item mb-0 active"><a class="page-link" href="student-dashboard.html#">2</a></li>--}}
{{--                                            <li class="page-item mb-0"><a class="page-link" href="student-dashboard.html#">3</a></li>--}}
{{--                                            <li class="page-item mb-0"><a class="page-link" href="student-dashboard.html#"><i class="fas fa-angle-right"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </nav>--}}
{{--                                </div>--}}
                                <!-- Pagination END -->
                            </div>
                            <!-- Card body START -->
                        </div>
                        <!-- Main content END -->
                    </div><!-- Row END -->
                </div>
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>
@endsection
