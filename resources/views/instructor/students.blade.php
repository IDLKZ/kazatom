@extends('layouts.default')
@section('content')
    <main>
        <!-- =======================
        Page Banner START -->
        @include('instructor.navbar')
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Page content START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <!-- Right sidebar START -->
                    <div class="col-xl-3">
                        <!-- Responsive offcanvas body START -->
                    @include('instructor.menu')
                    <!-- Responsive offcanvas body END -->
                    </div>
                    <!-- Right sidebar END -->

                    <!-- Main content START -->
                    <div class="col-xl-9">
                        <!-- Card START -->
                        <div class="card border bg-transparent rounded-3">
                            <!-- Card header START -->
                            <div class="card-header bg-transparent border-bottom">
                                <h3 class="mb-0">Мои студенты</h3>
                            </div>
                            <!-- Card header END -->

                            <!-- Card body START -->
                            <div class="card-body">

                                <!-- Search and select START -->
{{--                                <div class="row g-3 align-items-center justify-content-between mb-4">--}}
{{--                                    <!-- Search -->--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <form class="rounded position-relative">--}}
{{--                                            <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">--}}
{{--                                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <!-- Search and select END -->

                                <!-- Student list table START -->
                                <div class="table-responsive border-0">
                                    <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                        <!-- Table head -->
                                        <thead>
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">Имя студента</th>
{{--                                            <th scope="col" class="border-0">Прогресс</th>--}}
{{--                                            <th scope="col" class="border-0">Курс</th>--}}
                                            <th scope="col" class="border-0">Email</th>
                                            <th scope="col" class="border-0 rounded-end">Действие</th>
                                        </tr>
                                        </thead>

                                        <!-- Table body START -->
                                        <tbody>
                                        @if(count($students) > 0)
                                            @foreach($students as $items)
                                                @foreach($items as $student)
                                                    <!-- Table item -->
                                                    <tr>
                                                        <!-- Table data -->
                                                        <td>
                                                            <div class="d-flex align-items-center position-relative">
                                                                <!-- Image -->
                                                                <div class="avatar avatar-md mb-2 mb-md-0">
                                                                    <img src="{{$student->user->getFile('image')}}" class="rounded" alt="">
                                                                </div>
                                                                <div class="mb-0 ms-2">
                                                                    <!-- Title -->
                                                                    <h6 class="mb-0"><a href="" class="stretched-link">{{$student->user->name}}</a></h6>
                                                                    <!-- Address -->
{{--                                                                    <span class="text-body small"><i class="fas fa-fw fa-map-marker-alt me-1 mt-1"></i>Mumbai</span>--}}
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <!-- Table data -->
{{--                                                        <td class="text-center text-sm-start">--}}
{{--                                                            <div class=" overflow-hidden">--}}
{{--                                                                <h6 class="mb-0">85%</h6>--}}
{{--                                                                <div class="progress progress-sm bg-primary bg-opacity-10">--}}
{{--                                                                    <div class="progress-bar bg-primary aos aos-init aos-animate" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </td>--}}

                                                        <!-- Table data -->
{{--                                                        <td>10</td>--}}

                                                        <!-- Table data -->
                                                        <td>{{$student->user->email}}</td>

                                                        <!-- Table data -->
                                                        <td>
                                                            <a href="{{route('instructorGetSendEnvelope', $student->user->id)}}" class="btn btn-success-soft btn-round me-1 mb-0"><i class="far fa-envelope"></i></a>
{{--                                                            <button class="btn btn-danger-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Block" aria-label="Block"><i class="fas fa-ban"></i></button>--}}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif

                                        </tbody>
                                        <!-- Table body END -->
                                    </table>
                                </div>
                                <!-- Student list table END -->

                                <!-- Pagination START -->
{{--                                <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">--}}
{{--                                    <!-- Content -->--}}
{{--                                    <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>--}}
{{--                                    <!-- Pagination -->--}}
{{--                                    <nav class="d-flex justify-content-center mb-0" aria-label="navigation">--}}
{{--                                        <ul class="pagination pagination-sm pagination-primary-soft mb-0 pb-0">--}}
{{--                                            <li class="page-item mb-0"><a class="page-link" href="instructor-studentlist.html#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>--}}
{{--                                            <li class="page-item mb-0"><a class="page-link" href="instructor-studentlist.html#">1</a></li>--}}
{{--                                            <li class="page-item mb-0 active"><a class="page-link" href="instructor-studentlist.html#">2</a></li>--}}
{{--                                            <li class="page-item mb-0"><a class="page-link" href="instructor-studentlist.html#">3</a></li>--}}
{{--                                            <li class="page-item mb-0"><a class="page-link" href="instructor-studentlist.html#"><i class="fas fa-angle-right"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </nav>--}}
{{--                                </div>--}}
                                <!-- Pagination END -->
                            </div>
                            <!-- Card body START -->
                        </div>
                        <!-- Card END -->
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>
@endsection
