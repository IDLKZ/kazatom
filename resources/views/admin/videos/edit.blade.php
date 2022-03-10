@extends('layouts.admin.default')
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
                            Изменить видео к {{$video->title}}
                        </h4>
                    </div>
                </div>

                <div class="card bg-transparent border rounded-3 mb-5">

                    <div id="stepper" class="bs-stepper stepper-outline">
                        <!-- Card header -->

                        <!-- Card body START -->
                        <form action="{{route("videos.update",$video->id)}}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="card-body">
                                <!-- Step content START -->
                                <!-- Course title -->
                                <div class="col-12">
                                    <label class="form-label">Наименование видеоурока</label>
                                    <input name="title" class="form-control" type="text" placeholder="Введите наименование курса" value="{{$video->title}}">
                                    @if ($errors->has('title'))
                                        @foreach ($errors->get('title') as $message)
                                            <div>
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Наименование видеоурока *</label>
                                    <input name="title" class="form-control" type="text" placeholder="Введите наименование курса" value="{{$video->title}}">
                                    @if ($errors->has('title'))
                                        @foreach ($errors->get('title') as $message)
                                            <div>
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!-- Course description -->
                                <div class="col-md-12 mt-4">
                                    <label class="form-label">Описание видеоурока *</label>
                                    <textarea name="description" id="editor">
                                    {!! $video->description !!}
                                </textarea>
                                    @if ($errors->has('description'))
                                        @foreach ($errors->get('description') as $message)
                                            <div>
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-md-12 my-5">
                                    <label class="form-label">Видео</label>
                                    <input type="file" name="url">
                                </div>
                                <button type="submit" class="btn btn-primary">Изменить</button>
                            </div>
                        </form>

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
