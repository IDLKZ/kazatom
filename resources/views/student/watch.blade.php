@extends('layouts.default')
@push('css')
    <link rel="stylesheet" type="text/css" href="assets/vendor/plyr/plyr.css" />
@endpush
@section('content')
    <main>
        <section class="py-0 bg-dark position-relative">

            <div class="row g-0">
                <div class="d-flex">
                    <div class="overflow-hidden fullscreen-video w-100">
                        <!-- Full screen video START -->
                        <div class="video-player rounded-3">
                            <div tabindex="0"
                                 class="plyr plyr--full-ui plyr--video plyr--html5 plyr--fullscreen-enabled plyr--paused plyr--stopped plyr--captions-enabled plyr__poster-enabled">
                                <div class="plyr__controls">
                                    <button class="plyr__controls__item plyr__control" type="button" data-plyr="play"
                                            aria-label="Play">
                                        <svg class="icon--pressed" aria-hidden="true" focusable="false">
                                            <use xlink:href="#plyr-pause"></use>
                                        </svg>
                                        <svg class="icon--not-pressed" aria-hidden="true" focusable="false">
                                            <use xlink:href="#plyr-play"></use>
                                        </svg>
                                        <span class="label--pressed plyr__sr-only">Pause</span><span
                                            class="label--not-pressed plyr__sr-only">Play</span></button>
                                    <div class="plyr__controls__item plyr__progress__container">
                                        <div class="plyr__progress"><input data-plyr="seek" type="range" min="0"
                                                                           max="100" step="0.01" value="0"
                                                                           autocomplete="off" role="slider"
                                                                           aria-label="Seek" aria-valuemin="0"
                                                                           aria-valuemax="0" aria-valuenow="0"
                                                                           id="plyr-seek-5533"
                                                                           aria-valuetext="00:00 of 00:00"
                                                                           style="--value: 0%;"
                                                                           seek-value="72.97468549445318">
                                            <progress class="plyr__progress__buffer" min="0" max="100" value="0"
                                                      role="progressbar" aria-hidden="true">% buffered
                                            </progress>
                                            <span class="plyr__tooltip">00:00</span></div>
                                    </div>
                                    <div class="plyr__controls__item plyr__time--current plyr__time"
                                         aria-label="Current time">00:00
                                    </div>
                                    <div class="plyr__controls__item plyr__volume">
                                        <button type="button" class="plyr__control" data-plyr="mute">
                                            <svg class="icon--pressed" aria-hidden="true" focusable="false">
                                                <use xlink:href="#plyr-muted"></use>
                                            </svg>
                                            <svg class="icon--not-pressed" aria-hidden="true" focusable="false">
                                                <use xlink:href="#plyr-volume"></use>
                                            </svg>
                                            <span class="label--pressed plyr__sr-only">Unmute</span><span
                                                class="label--not-pressed plyr__sr-only">Mute</span></button>
                                        <input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1"
                                               autocomplete="off" role="slider" aria-label="Volume" aria-valuemin="0"
                                               aria-valuemax="100" aria-valuenow="100" id="plyr-volume-5533"
                                               aria-valuetext="100.0%" style="--value: 100%;"></div>
                                    <button class="plyr__controls__item plyr__control" type="button"
                                            data-plyr="captions">
                                        <svg class="icon--pressed" aria-hidden="true" focusable="false">
                                            <use xlink:href="#plyr-captions-on"></use>
                                        </svg>
                                        <svg class="icon--not-pressed" aria-hidden="true" focusable="false">
                                            <use xlink:href="#plyr-captions-off"></use>
                                        </svg>
                                        <span class="label--pressed plyr__sr-only">Disable captions</span><span
                                            class="label--not-pressed plyr__sr-only">Enable captions</span></button>

                                </div>
                                <div class="plyr__video-wrapper">
                                    <video crossorigin="anonymous" playsinline=""
                                           poster="assets/images/videos/poster.jpg" src="assets/images/videos/720p.mp4"
                                           data-poster="assets/images/videos/poster.jpg">
                                        <source src="assets/images/videos/360p.mp4" type="video/mp4" size="360">
                                        <source src="assets/images/videos/720p.mp4" type="video/mp4" size="720">
                                        <source src="assets/images/videos/1080p.mp4" type="video/mp4" size="1080">
                                    </video>
                                    <div class="plyr__poster" style="background-image: url(&quot;{{$course->getFile('image')}}&quot;);"></div></div><div class="plyr__captions"></div><button type="button" class="plyr__control plyr__control--overlaid" data-plyr="play" aria-label="Play"><svg aria-hidden="true" focusable="false"><use xlink:href="#plyr-play"></use></svg><span class="plyr__sr-only">Play</span></button></div>
                        </div>
                        <!-- Full screen video END -->

                        <!-- Plyr resources and browser polyfills are specified in the pen settings -->
                    </div>

                    <!-- Page content START -->
                    <div class="justify-content-end position-relative">
                        <!-- Collapse button START -->
                        <button class="navbar-toggler btn btn-white mt-4 plyr-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="true" aria-controls="collapseWidthExample">
					<span class="navbar-toggler-animation">
						<span></span>
						<span></span>
						<span></span>
					</span>
                        </button>
                        <!-- Collapse button END -->

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
                                    <h5>Course content</h5>
                                    <hr> <!-- Divider -->
                                    <!-- Course START -->
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Accordion START -->
                                            <div class="accordion accordion-flush-light accordion-flush" id="accordionExample">
                                                <!-- Item -->
                                                @foreach($course->videos as $video)
                                                    <div class="accordion-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="position-relative d-flex align-items-center">
                                                                <a href="course-video-player.html#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
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
                                    <div class="d-grid">
                                        <a href="course-detail.html" class="btn btn-primary-soft mb-0">Back to course</a>
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
@endpush
