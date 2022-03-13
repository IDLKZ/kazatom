@extends('layouts.default')
@section('content')
    <main>

        <!-- =======================
        Page Banner START -->
        <section class="pt-5 pb-0" style="background-image:url(assets/images/element/map.svg); background-position: center left; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-6 text-center mx-auto">
                        <!-- Title -->
                        <h6 class="text-primary">Тест</h6>
                        <h1 class="mb-4">Прохождение теста</h1>
                    </div>
                </div>

                <div class="container my-3">
                    @if($res == -1)
                        <div class="alert alert-danger">К сожалению, вы набрали меньше 80%!</div>

                        <a href="{{route('passExam', ['course_id' => Crypt::encrypt($id), 'video_id' => Crypt::encrypt($video_id)])}}" class="btn btn-outline-primary">Пройти снова</a>
                    @elseif($res == 0)
                        <form action="{{route('checkExam')}}" method="post" multiple>
                        @csrf
                        <input type="hidden" name="course_id" value="{{$id}}">
                        <input type="hidden" name="video_id" value="{{Crypt::encrypt($video_id)}}">
                        @if(count($quizzes) > 0)
                            @foreach($quizzes as $quiz)
                                <div class="container">
                                    <h3>{{$quiz->question}}</h3>
                                    <div class="form-check">
                                        <input value="{{$quiz->a}}" class="form-check-input" type="checkbox" name="question-{{$quiz->id}}[]" id="flexRadioDefault1{{$quiz->id}}" checked>
                                        <label class="form-check-label" for="flexRadioDefault1{{$quiz->id}}">
                                            {{$quiz->a}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="{{$quiz->b}}" class="form-check-input" type="checkbox" name="question-{{$quiz->id}}[]" id="flexRadioDefault2{{$quiz->id}}">
                                        <label class="form-check-label" for="flexRadioDefault2{{$quiz->id}}">
                                            {{$quiz->b}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="{{$quiz->c}}" class="form-check-input" type="checkbox" name="question-{{$quiz->id}}[]" id="flexRadioDefault3{{$quiz->id}}">
                                        <label class="form-check-label" for="flexRadioDefault3{{$quiz->id}}">
                                            {{$quiz->c}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="{{$quiz->d}}" class="form-check-input" type="checkbox" name="question-{{$quiz->id}}[]" id="flexRadioDefault4{{$quiz->id}}">
                                        <label class="form-check-label" for="flexRadioDefault4{{$quiz->id}}">
                                            {{$quiz->d}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                        <button type="submit" class="btn btn-success mt-3">Отправить</button>
                    </form>
                    @else
                        <div class="alert alert-success">Поздравляем, вы успешно прошли тест!</div>

                        <a href="{{route('studentListVideoCourse', $id)}}" class="btn btn-outline-primary">Далее</a>
                    @endif
                </div>
            </div>
        </section>
        <!-- =======================
        Page Banner END -->

    </main>
@endsection
