@extends('layouts.default')
@section('content')
    <main>

        <!-- =======================
        Page Banner START -->
        <section class="pt-0">
            <!-- Main banner background image -->
            <div class="container-fluid px-0">
                <div class="bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
                </div>
            </div>
            <div class="container mt-n4">
                <div class="row">
                    <!-- Profile banner START -->
                    <div class="col-12">
                        <div class="card bg-transparent card-body p-0">
                            <div class="row d-flex justify-content-between">
                                <!-- Avatar -->
                                <div class="col-auto mt-4 mt-md-0">
                                    <div class="avatar avatar-xxl mt-n3">
                                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{$profile->getFile('image')}}" alt="">
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <h1 class="my-1 fs-4">{{$profile->name}} <i class="bi bi-patch-check-fill text-info small"></i></h1>
                                        <ul class="list-inline mb-0">
{{--                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>--}}
{{--                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled Students</li>--}}
                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>{{$profile->courses->count()}} курс (ов)</li>
                                        </ul>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex align-items-center mt-2 mt-md-0">
                                        <a href="{{route('instructorCreateCourse')}}" class="btn btn-success mb-0">Создать курс</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profile banner END -->

                        <!-- Advanced filter responsive toggler START -->
                        <!-- Divider -->
                        <hr class="d-xl-none">
                        <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                            <a class="h6 mb-0 fw-bold d-xl-none" href="instructor-dashboard.html#">Menu</a>
                            <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <i class="fas fa-sliders-h"></i>
                            </button>
                        </div>
                        <!-- Advanced filter responsive toggler END -->
                    </div>
                </div>
            </div>
        </section>
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

                        <!-- Counter boxes START -->
                        <div class="row g-4">
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-6">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
                                    <span class="display-6 text-warning mb-0"><i class="fas fa-tv fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="{{$profile->courses->count()}}" data-purecounter-delay="200" data-purecounter-duration="0">{{$profile->courses->count()}}</h5>
                                        </div>
                                        <span class="mb-0 h6 fw-light">Всего курсов</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-6">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-10 rounded-3">
                                    <span class="display-6 text-purple mb-0"><i class="fas fa-user-graduate fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="25" data-purecounter-delay="200" data-purecounter-duration="0">25</h5>
{{--                                            <span class="mb-0 h5">K+</span>--}}
                                        </div>
                                        <span class="mb-0 h6 fw-light">Всего студентов</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Counter item -->
{{--                            <div class="col-sm-6 col-lg-4">--}}
{{--                                <div class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-10 rounded-3">--}}
{{--                                    <span class="display-6 text-info mb-0"><i class="fas fa-gem fa-fw"></i></span>--}}
{{--                                    <div class="ms-4">--}}
{{--                                        <div class="d-flex">--}}
{{--                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="12" data-purecounter-delay="300" data-purecounter-duration="0">12</h5>--}}
{{--                                            <span class="mb-0 h5">K</span>--}}
{{--                                        </div>--}}
{{--                                        <span class="mb-0 h6 fw-light">Enrolled Students</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <!-- Counter boxes END -->

                        <!-- Course List table START -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card border bg-transparent rounded-3 mt-5">
                                    <!-- Card header START -->
                                    <div class="card-header bg-transparent border-bottom">
                                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                                            <h3 class="mb-2 mb-sm-0">Мои курсы</h3>
{{--                                            <a href="instructor-dashboard.html#" class="btn btn-sm btn-primary-soft mb-0">View all</a>--}}
                                        </div>
                                    </div>
                                    <!-- Card header END -->

                                    <!-- Card body START -->
                                    <div class="card-body">
                                        <div class="table-responsive-lg border-0 rounded-3">
                                            <!-- Table START -->
                                            <table class="table table-dark-gray align-middle p-4 mb-0">
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
                                                @foreach($profile->courses as $course)
                                                    <tr>
                                                        <!-- Course item -->
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- Image -->
                                                                <div class="w-100px w-md-60px">
                                                                    <img src="{{$course->getFile('image')}}" class="rounded" alt="">
                                                                </div>
                                                                <!-- Title -->
                                                                <h6 class="mb-0 ms-2">
                                                                    <a href="instructor-dashboard.html#">{{$course->title}}</a>
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <!-- Selling item -->
                                                        <td>{{$course->videos->count()}}</td>

                                                        <!-- Period item -->
                                                        <td>
                                                            <span class="badge bg-primary bg-opacity-10 text-primary">{{$course->deadline}}</span>
                                                        </td>
                                                        <!-- Action item -->
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('instructorEditCourse', Crypt::encrypt($course->id))}}" class="btn btn-sm btn-success-soft btn-round me-1 mb-0"><i class="far fa-fw fa-edit"></i></a>
                                                                <form action="{{route('instructorDeleteCourse', $course->id)}}" method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <!-- Table body END -->
                                            </table>
                                            <!-- Table END -->
                                        </div>

                                        <!-- Pagination -->
{{--                                        <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-3">--}}
{{--                                            <!-- Content -->--}}
{{--                                            <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>--}}
{{--                                            <!-- Pagination -->--}}
{{--                                            <nav class="d-flex justify-content-center mb-0" aria-label="navigation">--}}
{{--                                                <ul class="pagination pagination-sm pagination-primary-soft mb-0 pb-0">--}}
{{--                                                    <li class="page-item mb-0"><a class="page-link" href="instructor-dashboard.html#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>--}}
{{--                                                    <li class="page-item mb-0"><a class="page-link" href="instructor-dashboard.html#">1</a></li>--}}
{{--                                                    <li class="page-item mb-0 active"><a class="page-link" href="instructor-dashboard.html#">2</a></li>--}}
{{--                                                    <li class="page-item mb-0"><a class="page-link" href="instructor-dashboard.html#">3</a></li>--}}
{{--                                                    <li class="page-item mb-0"><a class="page-link" href="instructor-dashboard.html#"><i class="fas fa-angle-right"></i></a></li>--}}
{{--                                                </ul>--}}
{{--                                            </nav>--}}
{{--                                        </div>--}}
                                    </div>
                                    <!-- Card body START -->
                                </div>
                            </div>
                        </div>
                        <!-- Course List table END -->
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>
@endsection
