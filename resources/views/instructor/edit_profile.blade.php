@extends('layouts.default')
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
                                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{$profile->getFile('image')}}" alt="">
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <h1 class="my-1 fs-4">{{$profile->name}} <i class="bi bi-patch-check-fill text-info small"></i></h1>
                                        <ul class="list-inline mb-0">
                                            {{--                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>--}}
                                            {{--                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled Students</li>--}}
                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>{{$profile->courses->count()}} курс (ов)</li>
                                        </ul>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex align-items-center mt-2 mt-md-0">
                                        <a href="{{route('instructorCreateCourse')}}" class="btn btn-success mb-0">Создать курс</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profile banner END -->

                        <!-- Advanced filter responsive toggler START -->
                        <!-- Divider -->
                        <hr class="d-xl-none">
                        <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                            <a class="h6 mb-0 fw-bold d-xl-none" href="instructor-dashboard.html#">Menu</a>
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
                        <div class="card bg-transparent border rounded-3">
                            <!-- Card header -->
                            <div class="card-header bg-transparent border-bottom">
                                <h3 class="card-header-title mb-0">Редактировать профиль</h3>
                            </div>
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Form -->
                                <form action="{{route('instructorUpdateProfile', $profile->id)}}" class="row g-4" enctype="multipart/form-data" method="post">
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
