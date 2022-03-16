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
                                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{auth()->user()->getFile('image')}}" alt="">
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <h1 class="my-1 fs-4">{{auth()->user()->name}} <i class="bi bi-patch-check-fill text-info small"></i></h1>
                                        <ul class="list-inline mb-0">
{{--                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>--}}
{{--                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled Students</li>--}}
                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>{{$courses->count()}} курс (ов)</li>
                                        </ul>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex align-items-center mt-2 mt-md-0">
                                        <a href="{{route('courses.create')}}" class="btn btn-success mb-0">Создать курс</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profile banner END -->

                        <!-- Advanced filter responsive toggler START -->
                        <!-- Divider -->
                        <hr class="d-xl-none">
                        <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                            <a class="h6 mb-0 fw-bold d-xl-none" href="javascript:void(0)">Menu</a>
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
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="" data-purecounter-delay="200" data-purecounter-duration="0"></h5>
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
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="" data-purecounter-delay="200" data-purecounter-duration="0"></h5>
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
                                        <div class="table-responsive-lg border-0 rounded-3 overflow-scroll">
                                            <!-- Table START -->
                                            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                                <!-- Table head -->
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="border-0 rounded-start">Наименование курса</th>
                                                    <th scope="col" class="border-0">Видеоуроки</th>
                                                    <th scope="col" class="border-0">Вопросы</th>
                                                    <th scope="col" class="border-0">Дата создания</th>
                                                    <th scope="col" class="border-0">Уровень</th>
                                                    <th scope="col" class="border-0 rounded-end">Действие</th>
                                                </tr>
                                                </thead>

                                                <!-- Table body START -->
                                                <tbody>

                                                @if($courses->count() > 0)
                                                    @foreach($courses as $course)
                                                        <tr>
                                                            <!-- Table data -->
                                                            <td>
                                                                <div class="d-flex align-items-center position-relative">
                                                                    <!-- Image -->
                                                                    <div class="w-60px">
                                                                        <img src="{{$course->getFile('image')}}" class="rounded" alt="">
                                                                    </div>
                                                                    <!-- Title -->
                                                                    <h6 class="mb-0 ms-2">
                                                                        <a href="{{route('detail-course', $course->id)}}" class="stretched-link">{{$course->title}}</a>
                                                                    </h6>
                                                                </div>
                                                            </td>

                                                            <td>{{$course->videos_count}}</td>
                                                            <td>{{$course->quizes_count}}</td>
                                                            <!-- Table data -->
                                                            <td>{{$course->created_at->format('d-m-Y')}}</td>

                                                            <!-- Table data -->
                                                            <td> <span class="badge bg-primary text-white">{{$course->level->title}}</span> </td>

                                                            <!-- Table data -->
                                                            <td>
                                                                <a class="btn btn-sm btn-success mb-2" target="_blank" href="{{route("in-videos.create",["course_id"=>Crypt::encrypt($course->id)])}}">Видео</a><br>

                                                                <a class="btn btn-sm btn-primary mb-2" target="_blank" href="{{route("in-quizzes.create",["course_id"=>$course->id])}}">Тесты</a><br>
                                                                <a class="btn btn-sm btn-info mb-2" target="_blank" href="{{route("in-courses.edit",$course->id)}}">Изменить</a><br>
                                                                <form action="{{route('in-courses.destroy', $course->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button onclick="return confirm('Вы уверены ?')" class="btn btn-sm btn-danger mb-0">Удалить</button>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                                </tbody>
                                                <!-- Table body END -->
                                            </table>
                                            <!-- Table END -->
                                        </div>

                                        <!-- Pagination -->
                                        <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-3">
                                            {!! $courses->links() !!}
                                        </div>
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
