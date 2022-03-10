@extends('layouts.admin.default')
@section('content')
    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row mb-3">
            <div class="col-12 d-sm-flex justify-content-between align-items-center">
                <h1 class="h3 mb-2 mb-sm-0">Отделы <span class="badge bg-orange bg-opacity-10 text-orange">{{$departments->count()}}</span></h1>
                <a href="{{route('department.create')}}" class="btn btn-sm btn-primary mb-0">Создать отдел</a>
            </div>
        </div>

        <!-- Card START -->
        <div class="card bg-transparent border">

            <!-- Card header START -->
            <div class="card-header bg-light border-bottom">

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
                            <th scope="col" class="border-0 rounded-start">Наименование отдела</th>
                            <th scope="col" class="border-0 rounded-end">Действие</th>
                        </tr>
                        </thead>

                        <!-- Table body START -->
                        <tbody>

                        @if($departments->count() > 0)
                            @foreach($departments as $department)
                                <tr>
                                    <!-- Table data -->
                                    <td>{{$department->title}}</td>

                                    <!-- Table data -->
                                    <td class="d-flex">
                                        <a href="{{route('department.edit', $department->id)}}" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">Редактировать</a>
                                        <form action="{{route('department.destroy', $department->id)}}" method="post">
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
