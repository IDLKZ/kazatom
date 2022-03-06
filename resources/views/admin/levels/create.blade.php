@extends('layouts.admin.default')
@section('content')
    <div class="page-content-wrapper border">
        <!-- Title -->
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="h3 mb-2 mb-sm-0">Создать скилл</h1>
            </div>
        </div>

        <div class="row g-4">
            <form action="{{route('levels.store')}}" method="post">
                @csrf
                <label for="titleID">Наименование</label>
                <input type="text" name="title" id="titleID" class="form-control">
                @if ($errors->has('title'))
                    @foreach ($errors->get('title') as $message)
                        <div>
                            <span class="text-danger">{{$message}}</span>
                        </div>
                    @endforeach
                @endif
                <hr>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div> <!-- Row END -->
    </div>
@endsection
