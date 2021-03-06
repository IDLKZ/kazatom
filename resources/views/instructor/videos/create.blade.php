@extends('layouts.default')
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
{{--                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>{{$courses->count()}} ???????? (????)</li>--}}
                                        </ul>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex align-items-center mt-2 mt-md-0">
                                        <a href="{{route('in-courses.create')}}" class="btn btn-success mb-0">?????????????? ????????</a>
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

                        <!-- Course List table START -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 mx-auto text-center">
                                    <!-- Content -->
                                    <h4 class="text-center">
                                        ???????????????? ?????????? ?? {{$course->title}}
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
                                                <h4>??????????</h4>
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
                                                        <h5 class="mb-2 mb-sm-0">??????????????</h5>
                                                        <a href="" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle me-2"></i>????????????????</a>
                                                    </div>

                                                    <!-- Edit lecture START -->
                                                    <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">


                                                        <div class="table-responsive border-0 rounded-3">
                                                            <!-- Table START -->
                                                            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                                                <!-- Table head -->
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col" class="border-0 rounded-start">??????????</th>
                                                                    <th scope="col" class="border-0">????????????????????????</th>
                                                                    <th scope="col" class="border-0">???????????????????? ????????</th>
                                                                    <th scope="col" class="border-0">?????????????????? ????????</th>
                                                                    <th scope="col" class="border-0">????????</th>
                                                                    <th scope="col" class="border-0 rounded-end">????????????????</th>
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
                                                                                <a class="btn btn-sm btn-primary mb-2" target="_blank" href="{{route("in-quizzes.create",["course_id"=>$video->course_id,"video_id"=>$video->id])}}">??????????</a><br>
                                                                                <a class="btn btn-sm btn-warning mb-2" target="_blank" href="{{route("in-materials.create", ['video_id' => $video->id])}}">??????????????????</a><br>
                                                                                <a class="btn btn-sm btn-info mb-2" target="_blank" href="{{route("in-videos.edit",$video->id)}}">????????????????</a><br>
                                                                                @if($video->next_video == null)
                                                                                    <form action="{{route('in-videos.destroy', $video->id)}}" method="post">
                                                                                        @csrf
                                                                                        @method('delete')
                                                                                        <button onclick="return confirm('???? ?????????????? ?')" class="btn btn-sm btn-danger mb-0">??????????????</button>
                                                                                    </form>
                                                                                @endif

                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                @else
                                                                    <div class="d-flex justify-content-between align-items-center my-3">
                                                                        <div class="position-relative">
                                                                            <span class="ms-2 mb-0 h6 fw-light">?????????????????????? ????????????????????</span>
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
                        <!-- Course List table END -->
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{route('in-videos.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">???????????????? ??????????????????</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <label for="titleVideo">???????????????????????? ??????????</label>
                        <input type="text" name="title" class="form-control my-2" id="titleVideo">
                        <input type="file" name="url">
                        <!-- Course category -->
                        <div class="col-md-12 mt-4">
                            <label class="form-label">???????????????????? ????????</label>
                            <select name="prev_video" class="form-control">
                                @foreach($available_videos as $available)
                                    <option value="{{$available->id}}">{{$available->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Course description -->
{{--                        <div class="col-md-12 mt-4">--}}
{{--                            <label class="form-label">???????????????? ????????????????????</label>--}}
{{--                            <textarea name="description" id="editor"></textarea>--}}
{{--                            @if ($errors->has('description'))--}}
{{--                                @foreach ($errors->get('description') as $message)--}}
{{--                                    <div>--}}
{{--                                        <span class="text-danger">{{$message}}</span>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">??????????????????</button>
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
                // console.log( editor );
            } )
            .catch( error => {
                // console.error( error );
            } );


    </script>
@endpush
