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
                        <h1 class="text-white">Submit a new Course</h1>
                        <p class="text-white mb-0">Read our <a href="instructor-create-course.html#" class="text-white"><u>"Before you create a course"</u></a> article before submitting!</p>
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
                        <p class="text-center">Use this interface to add a new Course to the portal. Once you are done adding the item it will be reviewed for quality. If approved, your course will appear for sale and you will be informed by email that your course has been accepted.</p>
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
                                <div class="step" data-target="#step-2">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger2" aria-controls="step-2" aria-selected="true">
                                            <span class="bs-stepper-circle">2</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Добавить видеоурок</h6>
                                    </div>
                                </div>
                                <div class="line"></div>

                                <!-- Step 3 -->
                                <div class="step active" data-target="#step-3">
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

                                <!-- Step 3 content START -->
                                <div id="step-3" role="tabpanel" class="content fade active dstepper-block" aria-labelledby="steppertrigger3">
                                    <!-- Title -->
                                    <h4>Additional information</h4>

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
                                                    <h5 class="mb-2 mb-sm-0">Upload FAQs</h5>
                                                    <button class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#addQuestion"><i class="bi bi-plus-circle me-2"></i>Add Question</button>
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
                                                                            <form action="{{route('instructorDeleteQuiz', $quiz->id)}}" method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit" class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Content -->
                                                                    <div class="input-group my-3">
                                                                        <span class="input-group-text {{$quiz->correct == 'a' ? 'text-success' : 'text-danger'}}" id="basic-addon1">A</span>
                                                                        <input type="text" class="form-control" name="a" value="{{$quiz->a}}">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text {{$quiz->correct == 'b' ? 'text-success' : 'text-danger'}}" id="basic-addon1">B</span>
                                                                        <input type="text" class="form-control" name="b" value="{{$quiz->b}}">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text {{$quiz->correct == 'c' ? 'text-success' : 'text-danger'}}" id="basic-addon1">C</span>
                                                                        <input type="text" class="form-control" name="c" value="{{$quiz->c}}">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text {{$quiz->correct == 'd' ? 'text-success' : 'text-danger'}}" id="basic-addon1">D</span>
                                                                        <input type="text" class="form-control" name="d" value="{{$quiz->d}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="col-12">
                                                            <div class="bg-body p-3 p-sm-4 border rounded">
                                                                <!-- Content -->
                                                                <p>No test</p>
                                                            </div>
                                                        </div>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit faq END -->

                                        <!-- Step 4 button -->
                                        <div class="d-md-flex justify-content-end align-items-start mt-4">
{{--                                            <button class="btn btn-secondary prev-btn mb-2 mb-md-0">Previous</button>--}}
{{--                                            <button class="btn btn-light me-auto ms-md-2 mb-2 mb-md-0">Preview Course</button>--}}
                                            <div class="text-md-end">
                                                <a href="{{route('instructorHome')}}" class="btn btn-success mb-2 mb-sm-0">Завершить</a>
{{--                                                <p class="mb-0 small mt-1">Once you click "Submit a Course", your course will be uploaded and marked as pending for review.</p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 3 content END -->

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
    <div class="modal fade" id="addQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{route('instructorStoreCourseStepThree')}}" method="post">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить вопрос</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="{{$id}}">
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
                        <select name="correct" class="form-control" id="correct">
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
    <script src="assets/vendor/quill/js/quill.min.js"></script>
    <script src="assets/vendor/stepper/js/bs-stepper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
        var date = $('.docs-date');

        date.datepicker();
    </script>
@endpush
