@extends('layouts.admin.default')
@section('content')
    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row mb-3">
            <div class="col-12 d-sm-flex justify-content-between align-items-center">
                <h1 class="h3 mb-2 mb-sm-0">Уровни <span class="badge bg-orange bg-opacity-10 text-orange">{{$levels->count()}}</span></h1>
                <a href="{{route('levels.create')}}" class="btn btn-sm btn-primary mb-0">Создать скилл</a>
            </div>
        </div>

        <!-- Card START -->
        <div class="card bg-transparent border">

            <!-- Card header START -->
            <div class="card-header bg-light border-bottom">
                <!-- Search and select START -->
                <div class="row g-3 align-items-center justify-content-between">

                    <!-- Search bar -->
                    <div class="col-md-12">
                        <form class="rounded position-relative" action="{{route('adminSearch')}}" method="get">
                            <input type="hidden" name="type" value="levels">
                            <input name="query" class="form-control bg-body" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
                        </form>
                    </div>

                </div>
                <!-- Search and select END -->
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
            <div class="card-body">
                <!-- Course table START -->
                <div class="table-responsive border-0 rounded-3">
                    <!-- Table START -->
                    <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                        <!-- Table head -->
                        <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">Наименование скила</th>
                            <th scope="col" class="border-0 rounded-end">Действие</th>
                        </tr>
                        </thead>

                        <!-- Table body START -->
                        <tbody>

                        @if($levels->count() > 0)
                            @foreach($levels as $level)
                                <tr>
                                    <!-- Table data -->
                                    <td>{{$level->title}}</td>

                                    <!-- Table data -->
                                    <td class="d-flex">
                                        <a href="{{route('levels.edit', $level->id)}}" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">Редактировать</a>
                                        <form action="{{route('levels.destroy', $level->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Вы уверены ?')" class="btn btn-sm btn-danger mb-0">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                        <!-- Table body END -->
                    </table>
                    <!-- Table END -->
                </div>
                <!-- Course table END -->
            </div>
            <!-- Card body END -->

        </div>
        <!-- Card END -->
    </div>
@endsection
