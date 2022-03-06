@extends('layouts.admin.default')
@section('content')
    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row mb-3">
            <div class="col-12 d-sm-flex justify-content-between align-items-center">
                <h1 class="h3 mb-2 mb-sm-0"><span class="badge bg-orange bg-opacity-10 text-orange">{{$categories->count()}}</span>Курсы</h1>
                {{--                <a href="instructor-create-course.html" class="btn btn-sm btn-primary mb-0">Create a Course</a>--}}
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
                        <form class="rounded position-relative" action="{{route('adminSearch')}}" method="post">
                            @csrf
                            <input name="course_title" class="form-control bg-body" type="search" placeholder="Search" aria-label="Search">
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
                            <th scope="col" class="border-0 rounded-start">Наименование курса</th>
                            <th scope="col" class="border-0">Тьютор</th>
                            <th scope="col" class="border-0">Дата создания</th>
                            <th scope="col" class="border-0">Уровень</th>
                            <th scope="col" class="border-0 rounded-end">Действие</th>
                        </tr>
                        </thead>

                        <!-- Table body START -->
                        <tbody>

                        @if($courses->count() > 0)
                            @foreach($courses as $course)
                                <tr>
                                    <!-- Table data -->
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <!-- Image -->
                                            <div class="w-60px">
                                                <img src="{{$course->getFile('image')}}" class="rounded" alt="">
                                            </div>
                                            <!-- Title -->
                                            <h6 class="mb-0 ms-2">
                                                <a href="{{route('detail-course', $course->id)}}" class="stretched-link">{{$course->title}}</a>
                                            </h6>
                                        </div>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <div class="d-flex align-items-center mb-3">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-xs flex-shrink-0">
                                                <img class="avatar-img rounded-circle" src="{{$course->user->getFile('image')}}" alt="avatar">
                                            </div>
                                            <!-- Info -->
                                            <div class="ms-2">
                                                <h6 class="mb-0 fw-light">{{$course->user->name}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Table data -->
                                    <td>{{$course->created_at->format('d-m-Y')}}</td>

                                    <!-- Table data -->
                                    <td> <span class="badge bg-primary text-white">{{$course->level->title}}</span> </td>

                                    <!-- Table data -->
                                    <td>
                                        <form action="{{route('courses.destroy', $course->id)}}" method="post">
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

            <!-- Card footer START -->
            <div class="card-footer bg-transparent pt-0">
                <!-- Pagination START -->
                <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                    <!-- Content -->
                    {!! $courses->links() !!}
                </div>
                <!-- Pagination END -->
            </div>
            <!-- Card footer END -->
        </div>
        <!-- Card END -->
    </div>
@endsection
