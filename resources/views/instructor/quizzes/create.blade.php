@extends('layouts.default')
@push("css")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container{
        z-index:100000;
        }
    </style>
@endpush
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
{{--                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>{{$courses->count()}} курс (ов)</li>--}}
                                        </ul>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex align-items-center mt-2 mt-md-0">
                                        <a href="{{route('in-courses.create')}}" class="btn btn-success mb-0">Создать курс</a>
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
        Steps START -->
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 mx-auto text-center">
                                    <!-- Content -->
                                    <p class="text-center">
                                        Добавьте новый вопрос тест
                                    </p>
                                </div>
                            </div>

                            <div class="card bg-transparent border rounded-3 mb-5">

                                <!-- Card body START -->
                                <div class="card-body">
                                    <!-- Step content START -->
                                    <div class="bs-stepper-content">

                                        <!-- Step 3 content START -->
                                        <div id="step-3" role="tabpanel" class="content show active dstepper-block" aria-labelledby="steppertrigger3">
                                            <!-- Title -->
                                            @if($video)
                                                <h4>Создать новый тест к видеоуроку {{$video->title}}</h4>
                                            @else
                                                <h4>Создать новый тест к курсу {{$course->title}}</h4>
                                            @endif

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <hr> <!-- Divider -->

                                            <div class="row g-4">

                                                <!-- Edit faq START -->
                                                <div class="col-12">
                                                    <div class="bg-light border rounded p-2 p-sm-4">
                                                        <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                                                            <h5 class="mb-2 mb-sm-0">Добавить</h5>
                                                            <button class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#addQuestion"><i class="bi bi-plus-circle me-2"></i>Создать тест</button>
                                                        </div>

                                                        <div class="row g-4">
                                                            @if(count($quizzes) > 0)
                                                                @foreach($quizzes as $quiz)
                                                                    <div class="col-12">
                                                                        <div class="bg-body p-3 p-sm-4 border rounded">
                                                                            <!-- Item 1 -->
                                                                            <div class="d-sm-flex justify-content-sm-between align-items-center mb-2">
                                                                                <!-- Question -->
                                                                                <h6 class="mb-0">{{$quiz->question}}</h6>
                                                                                <!-- Button -->
                                                                                <div class="align-middle">
                                                                                    {{--                                                                            <a href="instructor-create-course.html#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i class="far fa-fw fa-edit"></i></a>--}}
                                                                                    <form action="{{route('in-quizzes.destroy', $quiz->id)}}" method="post">
                                                                                        @csrf
                                                                                        @method('delete')
                                                                                        <button type="submit" class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Content -->
                                                                            <div class="input-group my-3">
                                                                                <span class="input-group-text {{in_array( 'a',$quiz->correct) ? 'text-success' : 'text-danger'}}" id="basic-addon1">A</span>
                                                                                <input type="text" class="form-control" name="a" value="{{$quiz->a}}">
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text {{in_array('b',$quiz->correct) ? 'text-success' : 'text-danger'}}" id="basic-addon1">B</span>
                                                                                <input type="text" class="form-control" name="b" value="{{$quiz->b}}">
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text {{in_array('c',$quiz->correct) ? 'text-success' : 'text-danger'}}" id="basic-addon1">C</span>
                                                                                <input type="text" class="form-control" name="c" value="{{$quiz->c}}">
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text {{in_array('d',$quiz->correct) ? 'text-success' : 'text-danger'}}" id="basic-addon1">D</span>
                                                                                <input type="text" class="form-control" name="d" value="{{$quiz->d}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="col-12">
                                                                    <div class="bg-body p-3 p-sm-4 border rounded">
                                                                        <!-- Content -->
                                                                        <p>Отсутствует тест</p>
                                                                    </div>
                                                                </div>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Edit faq END -->

                                            </div>
                                        </div>
                                        <!-- Step 3 content END -->

                                    </div>
                                </div>
                                <!-- Card body END -->

                            </div>
                        </div>
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Steps END -->

    </main>

    <!-- Modal -->
    <div class="modal modal-fullscreen fade" id="addQuestion" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{route('in-quizzes.store')}}" method="post">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить вопрос</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        @if($video)
                        <input type="hidden" name="video_id" value="{{$video->id}}">
                        @endif
                        <label for="question">Вопрос:</label>
                        <input type="text" name="question" class="form-control" id="question">

                        <div class="input-group my-3">
                            <span class="input-group-text" id="basic-addon1">A</span>
                            <input type="text" class="form-control" name="a">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">B</span>
                            <input type="text" class="form-control" name="b">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">C</span>
                            <input type="text" class="form-control" name="c">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">D</span>
                            <input type="text" class="form-control" name="d">
                        </div>
                        <label for="correct">Выберите правильный ответ</label>
                        <select style="width: 100%" name="correct[]" multiple="multiple" class="select2-multiple w-100" id="correct">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.select2-multiple').select2();

    </script>
@endpush
