@extends('Layouts.mainPage')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container text-center">
                        <h2 class="animate__animated animate__fadeInDown display-4">Welcome to <span
                                class="text">Venture</span>
                        </h2>
                        <p class="animate__animated animate__fadeInUp fs-5 mt-4">Yangiliklar Olamiga Xush Kelibsiz.
                            Eng so'nggi voqealar va tahlillar bilan tanishing. Har kuni yangilangan maqolalar, qiziqarli
                            intervyular va o'ziga xos tahlillar sizni kutmoqda. Barcha muhim yangiliklar bilan birinchi
                            bo'lib tanishing!</p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Batafsil</a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Eng Qiziqarli Yangiliklar</h2>
                        <p class="animate__animated animate__fadeInUp">
                            So'nggi voqealar, tahlillar va maqolalar bilan tanishing. Har kuni yangilanadigan
                            kontentimizda sizni qiziqtiradigan hamma narsa mavjud. O'zingizni yangiliklar olamida
                            yo'qotmang!</p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Batafsil</a>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Eng So'nggi Yangiliklar</h2>
                        <p class="animate__animated animate__fadeInUp">Bizning saytda eng dolzarb voqealar va ularning
                            tahlillari bilan tanishing. Siz uchun tayyorlangan yangiliklar har doim birinchi bo'lib
                            sizga yetkaziladi.</p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Batafsil</a>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>

        </section>

        <section id="blog-posts" class="blog-posts section">

            <div class="container">
                <div class="row gy-4">
                    @foreach ($models as $model)
                        <div class="col-lg-4">
                            <article>
                                <div class="post-img">
                                    <img src="{{ $model->img }}" alt="" width="420px" class="img-fluid">
                                </div>

                                <p class="post-category">{{ $model->category->name }}</p>

                                <h4 class="title">{{ $model->title }}</h4>

                                <h6 class="description">{{ $model->description }}</h6>

                                <form action="{{ route('posts', $model->id) }}" method="get">
                                    <button type="submit" class="btn btn-outline-info">Ba'tafsil</button>
                                </form>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>

        </section><!-- /Blog Posts Section -->

        <!-- Blog Pagination Section -->
        <section id="blog-pagination" class="blog-pagination section">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col">
                        <div class="me-3">
                            {{ $models->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about section">


            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <p>Biz haqimizda</p>
            </div>

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p>
                            Bizning platformamiz – so'nggi yangiliklar, tahlillar va muhim voqealar bilan tanishtirishga
                            qaratilgan onlayn maydon. Bizning maqsadimiz – sizni dolzarb ma'lumotlar bilan ta'minlash va
                            yangiliklardan xabardor qilish.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> <span>Dolzarb yangiliklarni tezkor va aniq
                                    yetkazamiz.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Qiziqarli tahlillar va fikrlar bilan
                                    bo'lishamiz.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Har bir maqola sizning qiziqishingizga mos
                                    keladi.</span></li>
                        </ul>

                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <p>Biz har doim yangiliklarni tezkor va aniq yetkazishga intilamiz, shuningdek, sizga qiziqarli
                            va muhim mavzular bo'yicha chuqur tahlillar taqdim etamiz. Har bir maqola va xabarda sizning
                            qiziqishingizni inobatga olamiz.</p>
                    </div>

                </div>

            </div>

        </section>
        <section id="sorov" class="about section">


            <div class="container section-title" data-aos="fade-up">
                <p>So'rovnoma</p>
            </div>

            <div class="container">
                <form action="{{ route('javob-store') }}" method="POST">
                    @csrf
                    @foreach ($savollar as $savol)
                        <div class="row">
                            <div class="col-12">
                                @if (isset($javoblar[0]))
                                    @foreach ($javoblar as $javob)
                                        @if ($javob->savol_id == $savol->id)
                                            <h4>Siz bu savolga ushbu variantni tanlagansiz: {{ $javob->variant->variant }}
                                            </h4>
                                        @endif
                                        @if ($javob->savol_id != $savol->id)
                                            <h3>{{ $savol->name }}</h3>
                                            <input type="hidden" name="savol_id" value="{{ $savol->id }}">
                                            <select name="variant_id" class="form-select">
                                                @foreach ($variantlar as $variant)
                                                    <option value="{{ $variant->id }}">{{ $variant->variant }}</option>
                                                @endforeach
                                            </select><br>
                                            <input type="submit" class="btn btn-outline-info" value="Submit">
                                        @endif
                                    @endforeach
                                @endif
                                @if (!isset($javoblar[0]))
                                    <h3>{{ $savol->name }}</h3>
                                    <input type="hidden" name="savol_id" value="{{ $savol->id }}">
                                    <select name="variant_id" class="form-select">
                                        @foreach ($variantlar as $variant)
                                            <option value="{{ $variant->id }}">{{ $variant->variant }}</option>
                                        @endforeach
                                    </select><br>
                                    <input type="submit" class="btn btn-outline-info" value="Submit">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>

        </section>
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>Najot ta'lim Chilonzor</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+998 78 888-98-88</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>najottalim@gmail.com</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>
@endsection
