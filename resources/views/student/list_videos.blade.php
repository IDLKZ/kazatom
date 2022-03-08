@extends('layouts.default')
@push('css')
    <link rel="stylesheet" type="text/css" href="assets/vendor/plyr/plyr.css" />
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
    <style>
        .my-video-dimensions {
            width: 100%!important;
            height: 100%!important;
        }
        .vjs-big-play-button {
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
        <section class="py-0 bg-dark position-relative">

            <div class="row g-0">
                <div class="d-flex">
                    <div class="overflow-hidden fullscreen-video w-100">
                        <!-- Full screen video START -->
                        <video
                            id="my-video"
                            class="video-js"
                            controls
                            preload="auto"
                            width="640"
                            height="264"
                            poster="MY_VIDEO_POSTER.jpg"
                            data-setup="{}"
                        >
                            <source src="{{$first_video->getFile('url')}}" type="video/mp4" />
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

                    <!-- Page content START -->
                    <div class="justify-content-end position-relative">

                        <!-- Collapse body START -->
                        <div class="collapse-horizontal collapse show" id="collapseWidthExample" style="">
                            <div class="card vh-100 overflow-auto rounded-0 w-280px w-sm-400px">
                                <!-- Title -->
                                <div class="card-header bg-light rounded-0">
                                    <h1 class="mt-2 fs-5">{{$course->title}}</h1>
                                    {{--                                    <h6 class="mb-0 fw-normal"><a href="course-video-player.html#">By Jacqueline Miller</a></h6>--}}
                                </div>

                                <!-- Course content START -->
                                <div class="card-body">
                                    <h5>Видеоуроки курса</h5>

                                    <!-- Course START -->
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Accordion START -->
                                            <div class="accordion accordion-flush-light accordion-flush" id="accordionExample">
                                                <!-- Item -->
                                                @foreach($course->videos as $video)
                                                    <div class="accordion-item mb-2 pb-2">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="position-relative d-flex align-items-center">
                                                                <a href="{{route('studentWatchCourse', ['id' => $video->id, 'course_id' => $course->id])}}" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                    <i class="fas fa-play me-0"></i>
                                                                </a>
                                                                <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">{{$video->title}}</span>
                                                            </div>
                                                            {{--                                                        <p class="mb-0 text-truncate">2m 10s</p>--}}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Accordion END -->
                                        </div>
                                    </div>
                                    <!-- Course END -->
                                </div>
                                <!-- Course content END -->

                                <div class="card-footer">
                                    <div class="d-grid mb-3">
                                        @if($res->status == 0)
                                            <a href="{{route('passExam', $course->id)}}" class="btn btn-primary-soft mb-0">Завершить курс</a>
                                        @else
                                            <button class="btn btn-outline-info" type="button">Курс пройден</button>
                                        @endif

                                    </div>
                                    <div class="d-grid">
                                        <a href="{{route('detail-course', $course->id)}}" class="btn btn-primary-soft mb-0">Вернуться к курсу</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Collapse body END -->
                    </div>
                    <!-- Page content END -->
                </div>
            </div>

        </section>
    </main>
@endsection
@push('js')
    <script src="assets/vendor/plyr/plyr.js"></script>
    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
@endpush
