<div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
    <div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

        <!-- Sidebar menu START -->
        <ul class="navbar-nav flex-column" id="navbar-sidebar">

            <!-- Menu item 1 -->
            <li class="nav-item"><a href="{{route('adminHome')}}" class="nav-link active"><i class="bi bi-house fa-fw me-2"></i>Главная</a></li>

            <!-- Title -->
            <li class="nav-item ms-2 my-2">Pages</li>

            <!-- Menu item 3 -->
            <li class="nav-item"> <a class="nav-link" href="{{route('categories.index')}}"><i class="fas fa-layer-group fa-fw me-2"></i>Категории</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('levels.index')}}"><i class="fas fa-code fa-fw me-2"></i>Уровни</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('courses.index')}}"><i class="bi bi-basket fa-fw me-2"></i>Курсы</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('instructors.index')}}"><i class="fas fa-user-tie fa-fw me-2"></i>Инструкторы</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('students.index')}}"><i class="fas fa-user-graduate fa-fw me-2"></i>Сотрудники</a></li>


        </ul>
        <!-- Sidebar menu end -->

        <!-- Sidebar footer START -->
        <div class="px-3 mt-auto pt-3">
            <div class="d-flex align-items-center justify-content-center text-primary-hover">
{{--                <a class="h5 mb-0 text-body" href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">--}}
{{--                    <i class="bi bi-gear-fill"></i>--}}
{{--                </a>--}}
{{--                <a class="h5 mb-0 text-body" href="index.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Home">--}}
{{--                    <i class="bi bi-globe"></i>--}}
{{--                </a>--}}
                <a class="h5 mb-0 text-body" href="{{route('logout')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign out">
                    <i class="bi bi-power"></i>
                </a>
            </div>
        </div>
        <!-- Sidebar footer END -->

    </div>
</div>
