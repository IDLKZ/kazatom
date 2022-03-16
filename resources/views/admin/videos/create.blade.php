@extends('layouts.admin.default')
@push('css')
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
    <style>

        .vjs-big-play-button {
            width: 60px!important;
            height: 50px!important;
            margin: 0;
            position: absolute!important;
            top: 50%!important;
            left: 50%!important;
            transform: translate(-50%, -50%);
        }
    </style>
@endpush
@section('content')


    <main>

        <!-- =======================
        Steps START -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <!-- Content -->
                        <h4 class="text-center">
                            Добавить видео к {{$course->title}}
                        </h4>
                    </div>
                </div>

                <div class="card bg-transparent border rounded-3 mb-5">

                    <div id="stepper" class="bs-stepper stepper-outline">
                        <!-- Card header -->

                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Step content START -->
                            <div class="bs-stepper-content">

                                <!-- Step 2 content START -->
                                <div id="step-2" role="tabpanel" class="content active dstepper-block" aria-labelledby="steppertrigger2">
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


                                            <div class="table-responsive border-0 rounded-3">
                                                <!-- Table START -->
                                                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                                    <!-- Table head -->
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" class="border-0 rounded-start">Видео</th>
                                                        <th scope="col" class="border-0">Наименование</th>
                                                        <th scope="col" class="border-0">Предыдущий урок</th>
                                                        <th scope="col" class="border-0">Следующий урок</th>
                                                        <th scope="col" class="border-0">Тест</th>
                                                        <th scope="col" class="border-0 rounded-end">Действие</th>
                                                    </tr>
                                                    </thead>

                                                    <!-- Table body START -->
                                                    <tbody>

                                                    @if($videos->count() > 0)
                                                        @foreach($videos as $video)
                                                            <tr>

                                                                <!-- Table data -->
                                                                <td>
                                                                    <div class="overflow-hidden fullscreen-video w-100">
                                                                        <!-- Full screen video START -->
                                                                        <video
                                                                            id="my-video"
                                                                            class="video-js"
                                                                            controls
                                                                            preload="auto"
                                                                            width="100%"
                                                                            poster="MY_VIDEO_POSTER.jpg"
                                                                            data-setup="{}"
                                                                        >
                                                                            <source src="{{$video->getFile('url')}}" type="video/mp4" />
                                                                            <p class="vjs-no-js">
                                                                                To view this video please enable JavaScript, and consider upgrading to a
                                                                                web browser that
                                                                                <a href="https://videojs.com/html5-video-support/" target="_blank"
                                                                                >supports HTML5 video</a
                                                                                >
                                                                            </p>
                                                                        </video>
                                                                        <!-- Full screen video END -->

                                                                        <!-- Plyr resources and browser polyfills are specified in the pen settings -->
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="d-flex align-items-center mb-3">
                                                                        <!-- Info -->
                                                                        <div class="ms-2">
                                                                            <h6 class="mb-0 fw-light">{{$video->title}}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center mb-3">
                                                                        <!-- Info -->
                                                                        @if($video->prevVideo)
                                                                            <div class="ms-2">
                                                                                <h6 class="mb-0 fw-light">{{$video->prevVideo->title}}</h6>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center mb-3">
                                                                        <!-- Info -->
                                                                        @if($video->nextVideo)
                                                                        <div class="ms-2">
                                                                            <h6 class="mb-0 fw-light">{{$video->nextVideo->title}}</h6>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <!-- Table data -->
                                                                <td>
                                                                    <div class="d-flex align-items-center mb-3">
                                                                        <!-- Info -->
                                                                        <div class="ms-2">
                                                                            <h6 class="mb-0 fw-light">{{$video->quizes_count}}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-primary mb-2" target="_blank" href="{{route("quizzes.create",["course_id"=>$video->course_id,"video_id"=>$video->id])}}">Тесты</a><br>
                                                                    <a class="btn btn-sm btn-warning mb-2" target="_blank" href="{{route("materials.create",["video_id"=>$video->id])}}">Материалы</a><br>
                                                                    <a class="btn btn-sm btn-info mb-2" target="_blank" href="{{route("videos.edit",$video->id)}}">Изменить</a><br>
                                                                    @if($video->next_video == null)
                                                                    <form action="{{route('videos.destroy', $video->id)}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button onclick="return confirm('Вы уверены ?')" class="btn btn-sm btn-danger mb-0">Удалить</button>
                                                                    </form>
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    @else
                                                        <div class="d-flex justify-content-between align-items-center my-3">
                                                            <div class="position-relative">
                                                                <span class="ms-2 mb-0 h6 fw-light">Отсутствует содержимое</span>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    </tbody>
                                                    <!-- Table body END -->
                                                </table>
                                                <!-- Table END -->
                                            </div>

                                        </div>
                                        <!-- Edit lecture END -->

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
        <form action="{{route('videos.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить видеоурок</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <label for="titleVideo">Наименование видео</label>
                        <input type="text" name="title" class="form-control my-2" id="titleVideo">
                        <input type="file" name="url">
                        <!-- Course category -->
                        <div class="col-md-12 mt-4">
                            <label class="form-label">Предыдущий урок</label>
                            <select name="prev_video" class="form-control">
                                @foreach($available_videos as $available)
                                    <option value="{{$available->id}}">{{$available->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Course description -->
                        <div class="col-md-12 mt-4">
                            <label class="form-label">Описание видеоурока</label>
{{--                            <textarea name="description" id="editor"></textarea>--}}
                            @if ($errors->has('description'))
                                @foreach ($errors->get('description') as $message)
                                    <div>
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
@push('js')
    <script src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="assets/vendor/plyr/plyr.js"></script>
    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
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


    </script>
@endpush
