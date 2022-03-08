<footer class="pt-5">
    <div class="container">
        <!-- Row START -->
        <div class="row g-4">

            <!-- Widget 1 START -->
            <div class="col-lg-3">
                <!-- logo -->
                <a class="me-0" href="index.html">
                    <img class="light-mode-item h-40px" src="/images/logo.svg" alt="logo">
                    <img class="dark-mode-item h-40px" src="/images/logo-light.svg" alt="logo">
                </a>
                <p class="my-3">
                    Программа для повышения осведомленности по вопросам информационной безопасности
                </p>
                <!-- Social media icon -->
                <ul class="list-inline mb-0 mt-3">
                    <li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-facebook" href="https://www.facebook.com/kazatomprom.kz"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                    <li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-twitter" href="https://twitter.com/nac_kazatomprom"><i class="fab fa-fw fa-twitter"></i></a> </li>

                    <li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-youtube" href="https://www.youtube.com/channel/UC5NoCBIU4rm7JLolDEzKDYw/videos"><i class="fab fa-fw fa-youtube"></i></a> </li>
                </ul>
            </div>
            <!-- Widget 1 END -->

            <!-- Widget 2 START -->
            <div class="col-lg-6">
                <div class="row g-4">
                    <!-- Link block -->
                    <div class="col-6 col-md-6">
                        <h5 class="mb-2 mb-md-4">Навигация</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link" href="/">Главная</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('about')}}">О Нас</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Контакты</a></li>
                        </ul>
                    </div>

                    <!-- Link block -->
                    <div class="col-6 col-md-6">
                        <h5 class="mb-2 mb-md-4">Категория</h5>
                        <ul class="nav flex-column">
                            @foreach(\App\Category::all() as $category)
                                <li class="nav-item"><a class="nav-link" href="{{route("coursesByCategory",$category->id)}}">{{$category->title}}</a></li>

                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <!-- Widget 2 END -->

            <!-- Widget 3 START -->
            <div class="col-lg-3">
                <h5 class="mb-2 mb-md-4">Контакты</h5>
                <!-- Time -->
                <p class="mb-2">
                    Адрес:<span class="h6 fw-light ms-2">Z05T1X3, Республика Казахстан г, ул.Е10 д.17/12, Нур-Султан</span>
                </p>

                <p class="mb-0">Телефон:<span class="h6 fw-light ms-2">+ 7 (7172) 45-81-01</span></p>
                <p class="mb-0">Email:<span class="h6 fw-light ms-2">nac@kazatomprom.kz</span></p>

            </div>
            <!-- Widget 3 END -->
        </div><!-- Row END -->

        <!-- Divider -->
        <hr class="mt-4 mb-0">

        <!-- Bottom footer -->
        <div class="py-3">
            <div class="container px-0">
                <div class="d-md-flex justify-content-between align-items-center py-3 text-center text-md-left">
                    <!-- copyright text -->
                    <div class="text-primary-hover"> Copyrights <a href="/" class="text-body">©2021 Kazatomprom</a>. All rights reserved. </div>
                    <!-- copyright links-->
{{--                    <div class=" mt-3 mt-md-0">--}}
{{--                        <ul class="list-inline mb-0">--}}
{{--                            <li class="list-inline-item"><a class="nav-link" href="javascript:void (0)">Terms of use</a></li>--}}
{{--                            <li class="list-inline-item"><a class="nav-link pe-0" href="javascript:void (0)">Privacy policy</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</footer>
