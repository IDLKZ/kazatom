@extends('layouts.default')
@section('content')
    <main>

        <!-- =======================
        Page intro START -->
        <section class="bg-light py-0 py-sm-5">
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-8">
                        <!-- Badge -->
                        <h6 class="mb-3 font-base bg-primary text-white py-2 px-4 rounded-2 d-inline-block">{{$course->category->title}}</h6>
                        <!-- Title -->
                        <h1>{{$course->title}}</h1>
                        <p>{{$course->short_description}}</p>
                        <!-- Content -->
                        <ul class="list-inline mb-0">
{{--                            <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>--}}
{{--                            <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled</li>--}}
                            <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="fas fa-signal text-success me-2"></i>{{$course->level->title}}</li>
{{--                            <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="bi bi-patch-exclamation-fill text-danger me-2"></i>Last updated 09/2021</li>--}}
{{--                            <li class="list-inline-item h6 mb-0"><i class="fas fa-globe text-info me-2"></i>English</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Page intro END -->

        <!-- =======================
        Page content START -->
        <section class="pb-0 py-lg-5">
            <div class="container">
                <div class="row">
                    <!-- Main content START -->
                    <div class="col-lg-8">
                        <div class="card shadow rounded-2 p-0">
                            <!-- Tabs START -->
                            <div class="card-header border-bottom px-4 py-3">
                                <ul class="nav nav-pills nav-tabs-line py-0" id="course-pills-tab" role="tablist">
                                    <!-- Tab item -->
                                    <li class="nav-item me-2 me-sm-4" role="presentation">
                                        <button class="nav-link mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1" aria-selected="true">Описание</button>
                                    </li>
                                    <!-- Tab item -->
                                    <li class="nav-item me-2 me-sm-4" role="presentation">
                                        <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-2" data-bs-toggle="pill" data-bs-target="#course-pills-2" type="button" role="tab" aria-controls="course-pills-2" aria-selected="false">Список видеоуроков</button>
                                    </li>
                                    <!-- Tab item -->
{{--                                    <li class="nav-item me-2 me-sm-4" role="presentation">--}}
{{--                                        <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-3" type="button" role="tab" aria-controls="course-pills-3" aria-selected="false">Instructor</button>--}}
{{--                                    </li>--}}
{{--                                    <!-- Tab item -->--}}
{{--                                    <li class="nav-item me-2 me-sm-4" role="presentation">--}}
{{--                                        <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-4" data-bs-toggle="pill" data-bs-target="#course-pills-4" type="button" role="tab" aria-controls="course-pills-4" aria-selected="false">Reviews</button>--}}
{{--                                    </li>--}}
{{--                                    <!-- Tab item -->--}}
{{--                                    <li class="nav-item me-2 me-sm-4" role="presentation">--}}
{{--                                        <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-5" data-bs-toggle="pill" data-bs-target="#course-pills-5" type="button" role="tab" aria-controls="course-pills-5" aria-selected="false">FAQs </button>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                            <!-- Tabs END -->

                            <!-- Tab contents START -->
                            <div class="card-body p-4">
                                <div class="tab-content pt-2" id="course-pills-tabContent">
                                    <!-- Content START -->
                                    <div class="tab-pane fade show active" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                                        {!! $course->description !!}
                                    </div>
                                    <!-- Content END -->

                                    <!-- Content START -->
                                    <div class="tab-pane fade" id="course-pills-2" role="tabpanel" aria-labelledby="course-pills-tab-2">
                                        <!-- Course accordion START -->
                                        <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                            <!-- Item -->
                                            <div class="accordion-item mb-3">
                                                @if(count($course->videos) > 0)
                                                    @foreach($course->videos as $video)
                                                        <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionExample2">
                                                            <div class="accordion-body mt-3">
                                                                <!-- Course lecture -->
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div class="position-relative d-flex align-items-center">
                                                                        <a href="javascript:void (0)" class="btn btn-light btn-round mb-0 flex-shrink-0"><i class="bi bi-lock-fill"></i></a>
                                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">{{$video->title}}</span>
                                                                    </div>
{{--                                                                    <p class="mb-0">2m 10s</p>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                        <!-- Course accordion END -->
                                    </div>
                                    <!-- Content END -->
                                </div>
                            </div>
                            <!-- Tab contents END -->
                        </div>
                    </div>
                    <!-- Main content END -->

                    <!-- Right sidebar START -->
                    <div class="col-lg-4 pt-5 pt-lg-0">
                        <div class="row mb-5 mb-lg-0">
                            <div class="col-md-6 col-lg-12">
                                <!-- Video START -->
                                <div class="card shadow p-2 mb-4 z-index-9">
                                    <div class="overflow-hidden rounded-3">
                                        <img src="{{$course->getFile('image')}}" class="card-img" alt="course image">
                                        <!-- Overlay -->
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body px-3">
                                        <!-- Info -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Price and time -->
                                            <div>
                                                <div class="d-flex align-items-center">
{{--                                                    <h3 class="fw-bold mb-0 me-2">$150</h3>--}}
{{--                                                    <span class="text-decoration-line-through mb-0 me-2">$350</span>--}}
{{--                                                    <span class="badge bg-orange text-white mb-0">60% off</span>--}}
                                                </div>
                                                <p class="mb-0 text-danger"><i class="fas fa-stopwatch me-2"></i>{{$course->deadline}}</p>
                                            </div>

                                            <!-- Share button with dropdown -->
                                        </div>

                                        <!-- Buttons -->
                                        <div class="mt-3 d-sm-flex justify-content-sm-end">
{{--                                            <a href="course-detail.html#" class="btn btn-outline-primary mb-0">Free trial</a>--}}
                                            @if(auth()->check())
                                                @if(auth()->user()->role_id == 3)
                                                    @if($bool)
                                                        <a href="{{route('studentListVideoCourse', $course->id)}}" class="btn btn-outline-primary mb-0">
                                                            {{$res->status ? 'Посмотреть' : 'Продолжить'}}
                                                        </a>
                                                    @else
                                                        <a href="{{route('studentEnrollCourse', $course->id)}}" class="btn btn-success mb-0">Начать</a>
                                                    @endif
                                                @endif
                                            @else
                                                <a href="{{route('login')}}" class="btn btn-success mb-0">Начать</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Video END -->

                                <!-- Course info START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3">Этот курс включает:</h4>
                                    <ul class="list-group list-group-borderless">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-book-open text-primary"></i>Видеоуроков</span>
                                            <span>{{$course->videos->count()}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>Уровень</span>
                                            <span>{{$course->level->title}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-user-clock text-primary"></i>Deadline</span>
                                            <span>{{$course->deadline}}</span>
                                        </li>
{{--                                        <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-medal text-primary"></i>Certificate</span>--}}
{{--                                            <span>Yes</span>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                                <!-- Course info END -->
                            </div>

                        </div><!-- Row End -->
                    </div>
                    <!-- Right sidebar END -->

                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->


    </main>
@endsection
