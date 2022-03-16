@extends('layouts.default')
@section('content')


    <main>

        <!-- =======================
        Steps START -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <!-- Content -->
                        <h4 class="text-center">
                            Добавить материал к {{$video->title}}
                        </h4>
                    </div>
                </div>

                <div class="card bg-transparent border rounded-3 mb-5">

                    <div id="stepper" class="bs-stepper stepper-outline">
                        <!-- Card header -->

                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Step content START -->
                            <div class="bs-stepper-content">

                                <!-- Step 2 content START -->
                                <div id="step-2" role="tabpanel" class="content active dstepper-block" aria-labelledby="steppertrigger2">
                                    <!-- Title -->
                                    <h4>Файл</h4>
                                    @if ($errors->has('file'))
                                        @foreach ($errors->get('file') as $message)
                                            <div>
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if ($errors->has('title'))
                                        @foreach ($errors->get('title') as $message)
                                            <div>
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                    <hr> <!-- Divider -->

                                    <div class="row">
                                        <!-- Add lecture Modal button -->
                                        <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                                            <h5 class="mb-2 mb-sm-0">Создать</h5>
                                            <a href="" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle me-2"></i>Добавить</a>
                                        </div>

                                        <!-- Edit lecture START -->
                                        <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">


                                            <div class="table-responsive border-0 rounded-3">
                                                <!-- Table START -->
                                                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                                    <!-- Table head -->
                                                    <thead>
                                                    <tr>
                                                        {{--                                                                    <th scope="col" class="border-0 rounded-start">Файл</th>--}}
                                                        <th scope="col" class="border-0">Наименование</th>
                                                        <th scope="col" class="border-0 rounded-end">Действие</th>
                                                    </tr>
                                                    </thead>

                                                    <!-- Table body START -->
                                                    <tbody>

                                                    @if($materials->count() > 0)
                                                        @foreach($materials as $material)
                                                            <tr>

                                                                <td>
                                                                    <div class="d-flex align-items-center mb-3">
                                                                        <!-- Info -->
                                                                        <div class="ms-2">
                                                                            <h6 class="mb-0 fw-light">{{$material->title}}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a class="btn btn-sm btn-warning mb-2"
                                                                       target="_blank"
                                                                       href="{{$material->getFile('file')}}" download>Скачать</a><br>
                                                                    <form
                                                                        action="{{route('materials.destroy', $material->id)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button
                                                                            onclick="return confirm('Вы уверены ?')"
                                                                            class="btn btn-sm btn-danger mb-0">
                                                                            Удалить
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    @else
                                                        <div class="d-flex justify-content-between align-items-center my-3">
                                                            <div class="position-relative">
                                                                <span class="ms-2 mb-0 h6 fw-light">Отсутствует содержимое</span>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    </tbody>
                                                    <!-- Table body END -->
                                                </table>
                                                <!-- Table END -->
                                            </div>

                                        </div>
                                        <!-- Edit lecture END -->

                                    </div>

                                </div>
                                <!-- Step 2 content END -->

                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>

                </div>
            </div>
        </section>
        <!-- =======================
        Steps END -->

    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{route('materials.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить материал</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="video_id" value="{{$video->id}}">
                        <label for="titleVideo">Наименование файла</label>
                        <input type="text" name="title" class="form-control my-2" id="titleVideo">
                        <input type="file" name="file" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
