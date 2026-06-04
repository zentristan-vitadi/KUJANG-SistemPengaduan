<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Kujang</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite('resources/css/app.css', 'resources/js/app.js')
    @endif

    <!-- Favicons -->
    <link href="images/logo/logo-icon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/ef1f748698.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                    class="dark:hidden" src="/images/logo/logo.png" alt="Logo" width="100" height="70" />
            </a>

            <nav id="navmenu" class="navmenu">

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div>
                <a class="text-blue-500 font-medium rounded-lg px-3 py-2 mx-2 inline-flex items-center" href="{{ route('login') }}">Login</a>
                <a class="text-white font-medium bg-blue-500 rounded-lg px-3 py-2 mx-2 border-1 border-blue-500 inline-flex items-center" href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section" style="background-image:linear-gradient(90deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.2) 60%), url('{{ asset('images/login-image/Kujang-BG.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center gy-5">

                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="hero-content">

                            <h1 class="hero-headline" data-aos="fade-up" data-aos-delay="300">Suara Warga, <br>Didengar Nyata</h1>

                            <p class="hero-text" data-aos="fade-up" data-aos-delay="350">KUJANG hadir sebagai jembatan antara warga dan pemerintah Kota Bogor.
                                Laporkan keluhan, pantau prosesnya, dan dapatkan respons nyata —
                                cepat, transparan, dan terpercaya.</p>

                            <div class="hero-cta " data-aos="fade-up" data-aos-delay="400">
                                <a href="{{ route('register') }}" class="bg-blue-500 text-xl text-white font-medium rounded-4xl px-4 py-3 inline-flex items-center">
                                    <span>Buat Pengaduan Sekarang →</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">

                    </div>

                </div>

            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5 align-items-center">

                    <div class="col-xl-6 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
                        <div class="about-images-wrapper">
                            <div class="image-main">
                                <img src="assets/img/about/about-5.jpg" alt="Business meeting" class="img-fluid">
                            </div>
                            <div class="image-offset">
                                <img src="assets/img/about/about-square-3.jpg" alt="Detail shot" class="img-fluid">
                            </div>
                            <div class="experience-badge">
                                <span class="years purecounter" data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1">5</span>
                                <span class="text">Years of<br>Excellence</span>
                            </div>
                            <div class="shape-pattern"></div>
                        </div>
                    </div>

                    <div class="col-xl-6 aos-init aos-animate" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-content">
                            <div class="section-subtitle">Cara Kerja</div>
                            <h2>Bagaimana Website KUJANG Bekerja</h2>
                            <div class="feature-card my-2">
                                <i class="fa-solid fa-file-pen" style="color: rgb(43, 127, 255);"></i>
                                <span>Buat Pengaduan — Isi formulir pengaduan secara online</span>
                            </div>
                            <div class="feature-card my-2">
                                <i class="fa-solid fa-hourglass" style="color: rgb(43, 127, 255);"></i>
                                <span>Diproses oleh Admin — Tim kami meninjau dan menindaklanjuti</span>
                            </div>
                            <div class="feature-card my-2">
                                <i class="fa-solid fa-circle-check" style="color: rgb(43, 127, 255);"></i>
                                <span>Terima Respons — Pantau status dan baca balasan resmi</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kenapa KUJANG?</h2>
                <p>Kenapa KUJANG adalah pilihan terbaik untuk Anda</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4">

                    <!-- Service Card 1 -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card">
                            <div class="icon-wrapper">
                                <i class="fa-solid fa-lock" style="color: rgb(43, 127, 255);"></i>
                            </div>
                            <h3>Aman Dan Terpercaya</h3>
                            <p>Setiap pengaduan yang Anda kirimkan terjaga kerahasiaannya. Data Anda dikelola secara aman oleh sistem resmi Pemerintah Kota Bogor.</p>
                        </div>
                    </div><!-- End Service Card -->

                    <!-- Service Card 2 -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card">
                            <div class="icon-wrapper">
                                <i class="fa-solid fa-bolt" style="color: rgb(43, 127, 255);"></i>
                            </div>
                            <h3>Respons Cepat</h3>
                            <p>Pengaduan Anda tidak akan tenggelam begitu saja. Setiap laporan ditangani dan direspons oleh admin dalam waktu yang terukur dan dapat dipantau langsung.</p>
                        </div>
                    </div><!-- End Service Card -->


                    <!-- Service Card 4 -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card">
                            <div class="icon-wrapper">
                                <i class="fa-solid fa-chart-line" style="color: rgb(43, 127, 255);"></i>
                            </div>
                            <h3>Transparan & Tertelusur</h3>
                            <p>Pantau status pengaduan Anda secara real-time — mulai dari diterima, sedang diproses, hingga selesai.  Tidak ada proses yang tersembunyi.</p>
                        </div>
                    </div><!-- End Service Card -->
                </div>
            </div>

        </section><!-- /Services Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center mb-4">
                        <img x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                            class="dark:hidden" src="/images/logo/logo.png" alt="Logo" width="100" height="40" />
                    </a>
                    <p>KUJANG hadir sebagai jembatan antara warga dan pemerintah Kota Bogor.
                        Laporkan keluhan, pantau prosesnya, dan dapatkan respons nyata —
                        cepat, transparan, dan terpercaya.</p>

                    <div class="social-links d-flex mt-4">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Shop</h4>
                    <ul>
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#about">Cara Kerja</a></li>
                        <li><a href="#services">Kenapa KUJANG</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>