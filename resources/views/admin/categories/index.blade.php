@extends('layouts.admin.default')
@section('content')
    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row mb-3">
            <div class="col-12 d-sm-flex justify-content-between align-items-center">
                <h1 class="h3 mb-2 mb-sm-0">Категории <span class="badge bg-orange bg-opacity-10 text-orange">{{$categories->count()}}</span></h1>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-primary mb-0">Создать категорию</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Создать категорию</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="titleID">Наименование</label>
                            <input type="text" name="title" id="titleID" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>

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
                            <input type="hidden" name="type" value="categories">
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
                            <th scope="col" class="border-0 rounded-start">Наименование категории</th>
                            <th scope="col" class="border-0 rounded-end">Действие</th>
                        </tr>
                        </thead>

                        <!-- Table body START -->
                        <tbody>

                        @if($categories->count() > 0)
                            @foreach($categories as $category)
                                <tr>
                                    <!-- Table data -->
                                    <td>{{$category->title}}</td>

                                    <!-- Table data -->
                                    <td class="d-flex">
                                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">
                                            Редактировать
                                        </a>
                                        <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Вы уверены ?')" class="btn btn-sm btn-danger mb-0">Удалить</button>
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
