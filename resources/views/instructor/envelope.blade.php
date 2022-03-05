@extends('layouts.default')
@section('content')
    <main>
        <div class="container">
            <form action="{{route('instructorPostSendEnvelope')}}" method="post">
                @csrf
                <label for="nameSt">Кому</label>
                <input type="text" disabled placeholder="{{$user->name}}" id="nameSt" class="form-control">
                <input type="hidden" name="email" value="{{$user->email}}">
                <hr>
                <label for="messageSt">Ваше сообщение</label>
                <textarea name="message" id="messageSt" cols="30" rows="10" class="form-control"></textarea>
                <hr>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
    </main>
@endsection
