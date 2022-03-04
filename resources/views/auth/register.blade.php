@extends('layouts.app')

@section('content')
    <main>
        <section class="p-0 d-flex align-items-center position-relative overflow-hidden">

            <div class="container-fluid">
                <div class="row">
                    <!-- left -->
                    <div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
                        <div class="p-3 p-lg-5">
                            <!-- Title -->
                            <div class="text-center">
                                <h2 class="fw-bold">Welcome to our largest community</h2>
                                <p class="mb-0 h6 fw-light">Let's learn something new today!</p>
                            </div>
                            <!-- SVG Image -->
                            <img src="assets/images/element/02.svg" class="mt-5" alt="">
                            <!-- Info -->
                            <div class="d-sm-flex mt-5 align-items-center justify-content-center">
                                <ul class="avatar-group mb-2 mb-sm-0">
                                    <li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar"></li>
                                    <li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar"></li>
                                    <li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar"></li>
                                    <li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar"></li>
                                </ul>
                                <!-- Content -->
                                <p class="mb-0 h6 fw-light ms-0 ms-sm-3">4k+ Students joined us, now it's your turn.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right -->
                    <div class="col-12 col-lg-6 m-auto">
                        <div class="row my-5">
                            <div class="col-sm-10 col-xl-8 m-auto">
                                <!-- Title -->
                                <img src="assets/images/element/03.svg" class="h-40px mb-2" alt="">
                                <h2>Sign up for your account!</h2>
                                <p class="lead mb-4">Nice to see you! Please Sign up with your account.</p>

                                <!-- Form START -->
                                <form action="{{route('register')}}" method="post">
                                    @csrf
                                    <!-- Name -->
                                    <div class="mb-4">
                                        <label for="exampleName" class="form-label">Имя *</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-person-fill"></i></span>
                                            <input name="name" type="text" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Имя" id="exampleName">
                                        </div>
                                        @if ($errors->has('name'))
                                            @foreach ($errors->get('name') as $message)
                                                <div>
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- Email -->
                                    <div class="mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Email address *</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                                            <input name="email" type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1">
                                        </div>
                                        @if ($errors->has('email'))
                                            @foreach ($errors->get('email') as $message)
                                                <div>
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-4">
                                        <label for="inputPassword5" class="form-label">Пароль *</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
                                            <input name="password" type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword5">
                                        </div>
                                        @if ($errors->has('password'))
                                            @foreach ($errors->get('password') as $message)
                                                <div>
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
{{--                                        Select Role--}}
                                    <div class="mb-4">
                                        <label for="inputRole" class="form-label">Выберите роль *</label>
                                        <select name="role_id" class="form-control" id="inputRole">
                                            <option value="2">Преподаватель</option>
                                            <option value="3">Обучающийся</option>
                                        </select>
                                        @if ($errors->has('role_id'))
                                            @foreach ($errors->get('role_id') as $message)
                                                <div>
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Check box -->
{{--                                    <div class="mb-4">--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input type="checkbox" class="form-check-input" id="checkbox-1">--}}
{{--                                            <label class="form-check-label" for="checkbox-1">By signing up, you agree to the<a href="sign-up.html#"> terms of service</a></label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <!-- Button -->
                                    <div class="align-items-center mt-0">
                                        <div class="d-grid">
                                            <button class="btn btn-primary mb-0" type="submit">Зарегистрироваться</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Form END -->

                                <!-- Sign up link -->
                                <div class="mt-4 text-center">
                                    <span>У вас уже есть аккаунт?<a href="{{route('login')}}">Войти</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
