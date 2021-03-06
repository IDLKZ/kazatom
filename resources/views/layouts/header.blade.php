<!-- Header START -->
<header class="navbar-light navbar-sticky header-static">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid px-3 px-xl-5">
            <!-- Logo START -->
            <a class="navbar-brand" href="{{route('index')}}">
                <img class="light-mode-item navbar-brand-item" src="/images/logo.svg" alt="logo">
{{--                <img class="dark-mode-item navbar-brand-item" src="/images/logo-light.svg" alt="logo">--}}
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
            </button>

            <!-- Main navbar START -->
            <div class="navbar-collapse w-100 collapse" id="navbarCollapse">

                <!-- Nav category menu START -->
                <ul class="navbar-nav navbar-nav-scroll me-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown dropdown-menu-shadow-stacked">
                        <a class="nav-link bg-primary bg-opacity-10 rounded-3 text-primary px-3 py-3 py-xl-0" href="index.html#" id="categoryMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-ui-radios-grid me-2"></i><span>Категории</span></a>
                        <ul class="dropdown-menu" aria-labelledby="categoryMenu">
                            @foreach($categories as $category)
                                <li> <a class="dropdown-item" href="{{route('coursesByCategory', $category->id)}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <!-- Nav category menu END -->

                <!-- Nav Main menu START -->
                <ul class="navbar-nav navbar-nav-scroll me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('index')}}">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('about')}}">О нас</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('contact')}}">Контакты</a>
                    </li>
                </ul>
                <!-- Nav Main menu END -->

                <!-- Nav Search START -->
{{--                <div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">--}}
{{--                    <div class="nav-item w-100">--}}
{{--                        <form class="position-relative">--}}
{{--                            <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">--}}
{{--                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Nav Search END -->
            </div>
            <!-- Main navbar END -->

            @if(auth()->check())
            <!-- Profile START -->
            <div class="dropdown ms-1 ms-lg-0">
                <a class="avatar avatar-sm p-0" href="" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-img rounded-circle" src="{{auth()->user()->getFile('image')}}" alt="avatar">
                </a>
                <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                    <!-- Profile info -->
                    <li class="px-3">
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <img class="avatar-img rounded-circle shadow" src="{{auth()->user()->getFile('image')}}" alt="avatar">
                            </div>
                            <div>
                                @if(auth()->user()->role_id == 1)
                                    <a class="h6" href="{{route('adminHome')}}">{{auth()->user()->name}}</a>
                                @elseif(auth()->user()->role_id == 2)
                                    <a class="h6" href="{{route('instructorHome')}}">{{auth()->user()->name}}</a>
                                @else
                                    <a class="h6" href="{{route('studentHome')}}">{{auth()->user()->name}}</a>
                                @endif
                                <p class="small m-0">{{auth()->user()->email}}</p>
                            </div>
                        </div>
                        <hr>
                    </li>
                    <!-- Links -->
{{--                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>--}}
                    <li>
                        @if(auth()->user()->role_id == 1)
                            <a class="dropdown-item" href="{{route('adminHome')}}"><i class="bi bi-gear fa-fw me-2"></i>Личный кабинет</a>
                        @elseif(auth()->user()->role_id == 2)
                            <a class="dropdown-item" href="{{route('instructorEditProfile')}}"><i class="bi bi-gear fa-fw me-2"></i>Личный кабинет</a>
                        @else
                            <a class="dropdown-item" href="{{route('studentEditProfile')}}"><i class="bi bi-gear fa-fw me-2"></i>Личный кабинет</a>
                        @endif

                    </li>
                    <li><a class="dropdown-item bg-danger-soft-hover" href="{{route('logout')}}"><i class="bi bi-power fa-fw me-2"></i>Выход</a></li>
                    <li> <hr class="dropdown-divider"></li>

                </ul>
            </div>
            <!-- Profile START -->
                @else
                    <a class="active" href="{{route('login')}}">Вход</a>
                @endif
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
<!-- Header END -->
