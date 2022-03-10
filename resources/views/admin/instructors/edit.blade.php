@extends('layouts.admin.default')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger text-white">{{$error}}</div>
                    @endforeach
                @endif
                <form action="{{route('instructors.update', $instructor->id)}}" class="row g-4" enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                <!-- Profile picture -->
                    <div class="col-12 justify-content-center align-items-center">
                        <label class="form-label">Фото</label>
                        <div class="d-flex align-items-center">
                            <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                <!-- Avatar place holder -->
                                <span class="avatar avatar-xl">
											<img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="{{$instructor->getFile('image')}}" alt="">
										</span>
                                <!-- Remove btn -->
                                {{--                                                <button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>--}}
                            </label>
                            <!-- Upload button -->
                            <label class="btn btn-primary-soft mb-0" for="uploadfile-1">Изменить</label>
                            <input id="uploadfile-1" class="form-control d-none" type="file" name="image">
                        </div>
                        @if ($errors->has('image'))
                            @foreach ($errors->get('image') as $message)
                                <div>
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Full name -->
                    <div class="col-12">
                        <label class="form-label">Имя</label>
                        <div class="input-group">
                            <input name="name" type="text" class="form-control" value="{{$instructor->name}}">
                            @if ($errors->has('name'))
                                @foreach ($errors->get('name') as $message)
                                    <div>
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>


                    <!-- Email id -->
                    <div class="col-md-12">
                        <label class="form-label">Email</label>
                        <input name="email" class="form-control" type="email" value="{{$instructor->email}}" placeholder="Email">
                        @if ($errors->has('description'))
                            @foreach ($errors->get('de') as $message)
                                <div>
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-12 mt-4">
                        <label class="form-label">О себе</label>
                        <textarea name="description" id="editor">
                            {{$instructor->description}}
                        </textarea>
                        @if ($errors->has('description'))
                            @foreach ($errors->get('description') as $message)
                                <div>
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Password id -->
                    <div class="col-md-12">
                        <label class="form-label">Пароль</label>
                        <input name="password" class="form-control" type="password" placeholder="*******">
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $message)
                                <div>
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Save button -->
                    <div class="d-sm-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mb-0">Сохранить изменения</button>
                    </div>
                </form>


            </div>

        </div>
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

        date.datepicker({
            format: 'dd/mm/yyyy',
        });
    </script>
@endpush
