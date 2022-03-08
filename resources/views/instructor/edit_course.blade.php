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
                        <h1 class="text-white">Изменить курс</h1>
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
                            Изменить текущий курс
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
                                <div class="step active" data-target="#step-1">
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

                                <!-- Step 1 content START -->
                                <div id="step-1" role="tabpanel" class="content fade active dstepper-block" aria-labelledby="steppertrigger1">
                                    <!-- Title -->
                                    <h4>Детали курса</h4>

                                    <hr> <!-- Divider -->
                                    <form action="{{route('instructorUpdateCourse', $course->id)}}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                    <!-- Basic information START -->
                                        <div class="row g-4">
                                            <!-- Course title -->
                                            <div class="col-12">
                                                <label class="form-label">Наименование курса</label>
                                                <input name="title" class="form-control" type="text" placeholder="Enter course title" value="{{$course->title}}">
                                                @if ($errors->has('title'))
                                                    @foreach ($errors->get('title') as $message)
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <!-- Short description -->
                                            <div class="col-12">
                                                <label class="form-label">Краткое описание</label>
                                                <textarea name="short_description" class="form-control" rows="2" placeholder="Enter keywords">{{$course->short_description}}</textarea>
                                                @if ($errors->has('short_description'))
                                                    @foreach ($errors->get('short_description') as $message)
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <!-- Course category -->
                                            <div class="col-md-6">
                                                <label class="form-label">Категория</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="{{$course->category->id}}" selected>{{$course->category->title}}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Course level -->
                                            <div class="col-md-6">
                                                <label class="form-label">Уровень</label>
                                                <select name="level_id" class="form-control">
                                                    <option value="{{$course->level->id}}" selected>{{$course->level->title}}</option>
                                                    @foreach($levels as $level)
                                                        <option value="{{$level->id}}">{{$level->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Course time -->
                                            <div class="col-md-6">
                                                <label class="form-label">Дедлайн</label>
                                                <div class="docs-datepicker">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control docs-date" name="deadline" placeholder="Выберите дату" autocomplete="off" value="{{$course->deadline}}">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled="">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="docs-datepicker-container"></div>
                                                </div>
                                                @if ($errors->has('deadline'))
                                                    @foreach ($errors->get('deadline') as $message)
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <!-- Course time -->
                                            <div class="col-md-6">
                                                <label class="form-label">Изображения</label>
                                                <input type="file" class="form-control" name="image">
                                                @if ($errors->has('image'))
                                                    @foreach ($errors->get('image') as $message)
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <!-- Course description -->
                                            <div class="col-md-12 mt-4">
                                                <label class="form-label">Описание</label>
                                                <textarea name="description" id="editor">{{$course->description}}</textarea>
                                                @if ($errors->has('description'))
                                                    @foreach ($errors->get('description') as $message)
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <!-- Step 1 button -->
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-primary next-btn mb-0">Следующий</button>
                                            </div>
                                        </div>
                                        <!-- Basic information START -->
                                    </form>

                                </div>
                                <!-- Step 1 content END -->

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
