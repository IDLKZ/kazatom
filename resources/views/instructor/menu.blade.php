<nav class="navbar navbar-light navbar-expand-xl mx-0">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <!-- Offcanvas header -->
        <div class="offcanvas-header bg-light">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Мой профиль</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- Offcanvas body -->
        <div class="offcanvas-body p-3 p-xl-0">
            <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                <!-- Dashboard menu -->
                <div class="list-group list-group-dark list-group-borderless">
                    <a class="list-group-item {{Request::is('instructor') ? 'active' : ''}}" href="{{route('instructorHome')}}"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Мои курсы</a>
                    {{--                                            <a class="list-group-item" href="instructor-manage-course.html"><i class="bi bi-basket fa-fw me-2"></i>My Courses</a>--}}
                    {{--                                            <a class="list-group-item" href="instructor-earning.html"><i class="bi bi-graph-up fa-fw me-2"></i>Earnings</a>--}}
                    <a class="list-group-item {{Request::is('instructor/students') ? 'active' : ''}}" href="{{route('instructorStudents')}}"><i class="bi bi-people fa-fw me-2"></i>Студенты</a>
                    {{--                                            <a class="list-group-item" href="instructor-order.html"><i class="bi bi-folder-check fa-fw me-2"></i>Orders</a>--}}
                    {{--                                            <a class="list-group-item" href="instructor-review.html"><i class="bi bi-star fa-fw me-2"></i>Reviews</a>--}}
                    {{--                                            <a class="list-group-item" href="instructor-edit-profile.html"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</a>--}}
                    {{--                                            <a class="list-group-item" href="instructor-payout.html"><i class="bi bi-wallet2 fa-fw me-2"></i>Payouts</a>--}}
                    <a class="list-group-item {{Request::is('instructor/edit-profile') ? 'active' : ''}}" href="{{route('instructorEditProfile')}}"><i class="bi bi-gear fa-fw me-2"></i>Настройки</a>
                    {{--                                            <a class="list-group-item" href="instructor-delete-account.html"><i class="bi bi-trash fa-fw me-2"></i>Delete Profile</a>--}}
                    <a class="list-group-item text-danger bg-danger-soft-hover" href="{{route('logout')}}"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Выход</a>
                </div>
            </div>
        </div>
    </div>
</nav>
