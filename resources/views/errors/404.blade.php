{{--@extends('errors::minimal')--}}

{{--@section('title', __('Not Found'))--}}
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}

@extends('layouts.default')
@section('content')
    <main>
        <section class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <!-- Image -->
                        <img src="assets/images/element/error404-01.svg" class="h-200px h-md-400px mb-4" alt="">
                        <!-- Title -->
                        <h1 class="display-1 text-danger mb-0">404</h1>
                        <!-- Subtitle -->
                        <h2>Упс, кажись вы ошиблись адресом</h2>
                        <!-- info -->
                        <p class="mb-4">Или здесь скоро будет страница, осталось подождать чуть-чуть</p>
                        <!-- Button -->
                        <a href="{{route('index')}}" class="btn btn-primary mb-0">На главную</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
