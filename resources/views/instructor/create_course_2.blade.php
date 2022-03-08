@extends('layouts.default')
@push('css')
    <link rel="stylesheet" type="text/css" href="assets/vendor/quill/css/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <main>

        <!-- =======================
        Page Banner START -->
        <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
            <!-- Main banner background image -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <!-- Title -->
                        <h1 class="text-white">Создайте новый видеоурок к курсу</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Steps START -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <!-- Content -->
                        <p class="text-center">
                            Используйте популярные видеоформаты для загрузки в видео
                        </p>
                    </div>
                </div>

                <div class="card bg-transparent border rounded-3 mb-5">

                    <div id="stepper" class="bs-stepper stepper-outline">
                        <!-- Card header -->
                        <div class="card-header bg-light border-bottom px-lg-5">
                            <!-- Step Buttons START -->
                            <div class="bs-stepper-header" role="tablist">
                                <!-- Step 1 -->
                                <div class="step" data-target="#step-1">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger1" aria-controls="step-1" aria-selected="false">
                                            <span class="bs-stepper-circle">1</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Детали курса</h6>
                                    </div>
                                </div>
                                <div class="line"></div>

                                <!-- Step 2 -->
                                <div class="step active" data-target="#step-2">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger2" aria-controls="step-2" aria-selected="true">
                                            <span class="bs-stepper-circle">2</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Добавить видеоурок</h6>
                                    </div>
                                </div>
                                <div class="line"></div>

                                <!-- Step 3 -->
                                <div class="step" data-target="#step-3">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger3" aria-controls="step-3" aria-selected="false">
                                            <span class="bs-stepper-circle">3</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Добавить тест</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Step Buttons END -->
                        </div>

                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Step content START -->
                            <div class="bs-stepper-content">

                                <!-- Step 2 content START -->
                                <div id="step-2" role="tabpanel" class="content fade active dstepper-block" aria-labelledby="steppertrigger2">
                                    <!-- Title -->
                                    <h4>Видео</h4>
                                    @if ($errors->has('url'))
                                        @foreach ($errors->get('url') as $message)
                                            <div>
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if ($errors->has('title'))
                                        @foreach ($errors->get('title') as $message)
                                            <div>
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                    <hr> <!-- Divider -->

                                        <div class="row">
                                            <!-- Add lecture Modal button -->
                                            <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                                                <h5 class="mb-2 mb-sm-0">Создать</h5>
                                                <a href="" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle me-2"></i>Добавить</a>
                                            </div>

                                            <!-- Edit lecture START -->
                                            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                                @if(count($videos) > 0)
                                                    @foreach($videos as $video)
                                                        <div class="d-flex justify-content-between align-items-center my-3">
                                                            <div class="position-relative">
                                                                <a href="instructor-create-course.html#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"><i class="fas fa-play"></i></a>
                                                                <span class="ms-2 mb-0 h6 fw-light">{{$video->title}}</span>
                                                            </div>
                                                            <!-- Edit and cancel button -->
                                                            <div>
{{--                                                                <a href="instructor-create-course.html#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i class="far fa-fw fa-edit"></i></a>--}}
                                                                <form action="{{route('instructorDeleteVideo', $video->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                @else
                                                <div class="d-flex justify-content-between align-items-center my-3">
                                                    <div class="position-relative">
                                                        <span class="ms-2 mb-0 h6 fw-light">Отсутствует содержимое</span>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <!-- Edit lecture END -->

                                            <!-- Step 3 button -->
                                            <div class="d-flex justify-content-end mt-5">
{{--                                                <button class="btn btn-secondary prev-btn mb-0">Previous</button>--}}
                                                <a href="{{route('instructorCreateCourseStepThree', ['id' => $id])}}" class="btn btn-primary next-btn mb-0">Следующий</a>
                                            </div>
                                        </div>

                                </div>
                                <!-- Step 2 content END -->

                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>

                </div>
            </div>
        </section>
        <!-- =======================
        Steps END -->

    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{route('instructorStoreCourseStepTwo')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить видеоурок</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="{{$id}}">
                        <label for="titleVideo">Наименование видео</label>
                        <input type="text" name="title" class="form-control my-2" id="titleVideo">
                        <input type="file" name="url">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="assets/vendor/quill/js/quill.min.js"></script>
    <script src="assets/vendor/stepper/js/bs-stepper.min.js"></script>

@endpush
