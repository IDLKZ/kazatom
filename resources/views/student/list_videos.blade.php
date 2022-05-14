@extends('layouts.default')
@push('css')
    <link rel="stylesheet" type="text/css" href="assets/vendor/plyr/plyr.css" />
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
    <style>
        .my-video-dimensions {
            width: 100%!important;
            height: 600px!important;
        }
        .vjs-big-play-button {
            margin: 0;
            position: absolute!important;
            top: 50%!important;
            left: 50%!important;
            transform: translate(-50%, -50%);
        }
		
		@media only screen and (max-width: 800px){
			.my-video-dimensions, #collapseWidthExample, .vh-100 {
				height: 400px!important;
			}
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
{{--                            poster="MY_VIDEO_POSTER.jpg"--}}
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

						<button class="navbar-toggler btn btn-white mt-4 plyr-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
					<span class="navbar-toggler-animation">
						<span></span>
						<span></span>
						<span></span>
					</span>	
				</button>
                        <!-- Collapse body START -->
                        <div class="collapse-horizontal collapse" id="collapseWidthExample" style="">
                            <div class="card vh-100 overflow-auto rounded-0 w-280px w-sm-400px">
                                <!-- Title -->
                                <div class="card-header bg-light rounded-0">
{{--                                    <h1 class="mt-2 fs-5">{{$video->course->title}}</h1>--}}
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

                                                @foreach($videos as $video)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingOne">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$video->id}}" aria-expanded="true" aria-controls="collapseOne{{$video->id}}">
                                                                <span class="mb-0 fw-bold">{{$video->title}}</span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne{{$video->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                            <div class="accordion-body px-3">
                                                                <div class="vstack gap-3">
                                                                    <!-- Course lecture -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            @if($video->results != null && $video->results->where(['user_id' => auth()->id(), 'video_id' => $video->id])->first()->status == 1)
                                                                                <a href="{{route('studentWatchCourse', ['id' => $video->id, 'course_id' => $video->course->id])}}" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                                    <i class="fas fa-play me-0"></i>
                                                                                </a>
                                                                                <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">{{$video->title}}</span>
                                                                            @else
                                                                                <a href="javascript:void (0)" class="btn btn-light btn-round btn-sm mb-0 stretched-link position-static">
                                                                                    <i class="fas fa-lock me-0"></i>
                                                                                </a>
                                                                                <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">{{$video->title}}</span>
                                                                            @endif
                                                                        </div>

                                                                        @if($video->results != null && $video->results->where(['user_id' => auth()->id(), 'video_id' => $video->id])->first()->status == 1)
                                                                            @if($video->quizes->count() > 0)
                                                                                <p class="mb-0 text-truncate">
                                                                                    <a href="{{route('passExam', ['course_id' => Crypt::encrypt($video->course->id), 'video_id' => Crypt::encrypt($video->id)])}}">
                                                                                        Пройти тест
                                                                                    </a>
                                                                                </p>
                                                                            @endif
                                                                        @endif

                                                                    </div>

                                                                    @if($video->materials->count() > 0)
                                                                        @foreach($video->materials as $material)
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <div class="position-relative d-flex align-items-center">
                                                                                        <a href="javascript:void (0)" class="btn btn-primary-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                                            <i class="fas fa-file me-0"></i>
                                                                                        </a>
                                                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">{{$material->title}}</span>
                                                                                </div>
                                                                                @if($video->results != null && $video->results->where(['user_id' => auth()->id(), 'video_id' => $video->id])->first()->status == 1)
                                                                                        <p class="mb-0 text-truncate">
                                                                                            <a href="{{$material->getFile('file')}}" download>
                                                                                                Скачать
                                                                                            </a>
                                                                                        </p>
                                                                                @endif
                                                                            </div>
                                                                        @endforeach
                                                                    @endif

                                                                </div>
                                                            </div>
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
                                        @if($output != null)
                                            @if($output->status == 0)
                                                <a href="{{route('passExam', ['course_id' => Crypt::encrypt($first_video->course->id), 'video_id' => null])}}" class="btn btn-primary-soft mb-0">Завершить курс</a>
                                            @else
                                                <button class="btn btn-outline-info" type="button">Курс пройден</button>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="d-grid">
                                        <a href="{{route('detail-course', $video->course->id)}}" class="btn btn-primary-soft mb-0">Вернуться к курсу</a>
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
    <script>
        var myPlayer = videojs('my-video');
        myPlayer.controlBar.progressControl.disable();
    </script>
@endpush
