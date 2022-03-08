@extends('layouts.default')
@section('content')
    <main>

        <!-- =======================
        Page Banner START -->
        <section class="pt-5 pb-0" style="background-image:url(assets/images/element/map.svg); background-position: center left; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-6 text-center mx-auto">
                        <!-- Title -->
                        <h6 class="text-primary">Контактные данные</h6>
                        <h1 class="mb-4">Наши адреса</h1>
                    </div>
                </div>

                <!-- Contact info box -->
                <div class="row g-4 g-md-5 mt-0 mt-lg-3">
                    <!-- Box item -->
                    <div class="col-lg-4 mt-lg-0">
                        <div class="card card-body bg-primary shadow py-5 text-center h-100">
                            <!-- Title -->
                            <h5 class="text-white mb-3">Телефон</h5>
                            <ul class="list-inline mb-0">
                                <!-- Phone number -->
                                <li class="list-item mb-3">
                                    <a href="tel:77172458101" class="text-white"> <i class="fas fa-fw fa-phone-alt me-2"></i>+ 7 (7172) 45-81-01 </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Box item -->
                    <div class="col-lg-4 mt-lg-0">
                        <div class="card card-body shadow py-5 text-center h-100">
                            <!-- Title -->
                            <h5 class="mb-3">Email</h5>
                            <ul class="list-inline mb-0">
                                <!-- Email id -->
                                <li class="list-item mb-0 h6 fw-light">
                                    <a> <i class="far fa-fw fa-envelope me-2"></i>nac@kazatomprom.kz </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Box item -->
                    <div class="col-lg-4 mt-lg-0">
                        <div class="card card-body shadow py-5 text-center h-100">
                            <!-- Title -->
                            <h5 class="mb-3">Адрес</h5>
                            <ul class="list-inline mb-0">
                                <!-- Address -->
                                <li class="list-item mb-3 h6 fw-light">
                                    <a href="https://go.2gis.com/in0qe"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>Z05T1X3, Республика Казахстан г, ул.Е10 д.17/12, Нур-Султан </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Image and contact form START -->
        <section>
            <div class="container">
                <div class="row g-4 g-lg-0 align-items-center">

                    <div class="col-md-6 align-items-center text-center">
                        <!-- Image -->
                        <img src="assets/images/element/contact.svg" class="h-400px" alt="">

                        <!-- Social media button -->
                        <div class="d-sm-flex align-items-center justify-content-center mt-2 mt-sm-4">
                            <h5 class="mb-0">Мы в соц. сетях:</h5>
                            <ul class="list-inline mb-0 ms-sm-2">
                                <li class="list-inline-item"> <a class="fs-5 me-1 text-facebook" href="https://www.facebook.com/kazatomprom.kz"><i class="fab fa-fw fa-facebook-square"></i></a> </li>
                                <li class="list-inline-item"> <a class="fs-5 me-1 text-youtube" href="https://www.youtube.com/channel/UC5NoCBIU4rm7JLolDEzKDYw/videos"><i class="fab fa-fw fa-youtube"></i></a> </li>
                                <li class="list-inline-item"> <a class="fs-5 me-1 text-twitter" href="https://twitter.com/nac_kazatomprom"><i class="fab fa-fw fa-twitter"></i></a> </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact form START -->
                    <div class="col-md-6">
                        <!-- Title -->
                        <h2 class="mt-4 mt-md-0">Напишите нам</h2>
                        <p>
                            Остались вопросы? Напишите нам - и мы ответим в ближайшее время
                        </p>

                        <form>
                            <!-- Name -->
                            <div class="mb-4 bg-light-input">
                                <label for="yourName" class="form-label">Ваше имя *</label>
                                <input type="text" class="form-control form-control-lg" id="yourName">
                            </div>
                            <!-- Email -->
                            <div class="mb-4 bg-light-input">
                                <label for="emailInput" class="form-label">Ваша почта *</label>
                                <input type="email" class="form-control form-control-lg" id="emailInput">
                            </div>
                            <!-- Message -->
                            <div class="mb-4 bg-light-input">
                                <label for="textareaBox" class="form-label">Сообщение *</label>
                                <textarea class="form-control" id="textareaBox" rows="4"></textarea>
                            </div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary mb-0" type="button">Отправить сообщение</button>
                            </div>
                        </form>
                    </div>
                    <!-- Contact form END -->
                </div>
            </div>
        </section>
        <!-- =======================
        Image and contact form END -->

        <!-- =======================
        Map START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <iframe class="w-100 h-400px grayscale rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2272.2954757676475!2d71.39108581541419!3d51.131276445955116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x424586a1b2f7efa3%3A0xc23eca42285d52f6!2z0JDQniAi0J3QsNGG0LjQvtC90LDQu9GM0L3QsNGPINCw0YLQvtC80L3QsNGPINC60L7QvNC_0LDQvdC40Y8gItCa0LDQt9Cw0YLQvtC80L_RgNC-0LwiIg!5e1!3m2!1sru!2skz!4v1646721151402!5m2!1sru!2skz" style="border:0;" aria-hidden="false" tabindex="0" height="500"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Map END -->

    </main>
@endsection
