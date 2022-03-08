@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <section class="p-0 d-flex align-items-center position-relative overflow-hidden">

            <div class="container-fluid">
                <div class="row">
                    <!-- left -->
                    <div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
                        <div class="p-3 p-lg-5">
                            <!-- Title -->
                            <div class="text-center">
                                <h2 class="fw-bold">Добро пожаловать!</h2>
                                <p class="mb-0 h6 fw-light">Начните свое обучение прямо сейчас</p>
                            </div>
                            <!-- SVG Image -->
                            <img src="assets/images/element/02.svg" class="mt-5" alt="">
                            <!-- Info -->

                        </div>
                    </div>

                    <!-- Right -->
                    <div class="col-12 col-lg-6 m-auto">
                        <div class="row my-5">
                            <div class="col-sm-10 col-xl-8 m-auto">
                                <!-- Title -->
                                <span class="mb-0 fs-1">👋</span>
                                <h1 class="fs-2">Вход в учетную запись</h1>
                                <p class="lead mb-4">Рады видеть Вас! Пожалуйста, введите почту и пароль.</p>

                                <!-- Form START -->
                                <form method="post" action="{{route('login')}}">
                                    @csrf
                                    <!-- Email -->
                                    <div class="mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Email *</label>
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
                                            <input name="password" type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Пароль" id="inputPassword5">
                                        </div>
                                        @if ($errors->has('password'))
                                            @foreach ($errors->get('password') as $message)
                                                <div>
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- Check box -->
                                    <div class="mb-4 d-flex justify-content-between mb-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                                        </div>
{{--                                        <div class="text-primary-hover">--}}
{{--                                            <a href="forgot-password.html" class="text-secondary">--}}
{{--                                                <u>Forgot password?</u>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
                                    </div>
                                    <!-- Button -->
                                    <div class="align-items-center mt-0">
                                        <div class="d-grid">
                                            <button class="btn btn-primary mb-0" type="submit">Вход</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Form END -->

                                <!-- Sign up link -->
                                <div class="mt-4 text-center">
                                    <span>Нет аккаунта? <a href="{{route('register')}}">Зарегистрироваться</a></span>
                                </div>
                            </div>
                        </div> <!-- Row END -->
                    </div>
                </div> <!-- Row END -->
            </div>
        </section>
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
