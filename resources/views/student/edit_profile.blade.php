@extends('layouts.default')
@section('content')
    <main>

        <!-- =======================
        Page Banner START -->
        @include('student.navbar')
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Page content START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <!-- Right sidebar START -->
                @include('student.menu')
                    <!-- Right sidebar END -->

                    <!-- Main content START -->
                    <div class="col-xl-9">
                        <div class="card bg-transparent border rounded-3">
                            <!-- Card header -->
                            <div class="card-header bg-transparent border-bottom">
                                <h3 class="card-header-title mb-0">Редактировать профиль</h3>
                            </div>
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Form -->
                                <form action="{{route('studentUpdateProfile', $profile->id)}}" class="row g-4" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('put')
                                    <!-- Profile picture -->
                                    <div class="col-12 justify-content-center align-items-center">
                                        <label class="form-label">Фото</label>
                                        <div class="d-flex align-items-center">
                                            <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                                <!-- Avatar place holder -->
                                                <span class="avatar avatar-xl">
											<img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="{{$profile->getFile('image')}}" alt="">
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
                                            <input name="name" type="text" class="form-control" value="{{$profile->name}}">
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
                                        <input name="email" class="form-control" type="email" value="{{$profile->email}}" placeholder="Email">
                                        @if ($errors->has('email'))
                                            @foreach ($errors->get('email') as $message)
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
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>
@endsection
