<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampung Cengek</title>

    <!-- All CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-warning">Kampung Cengek</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">


                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="btn btn-warning nav-link ms-3" href="{{ url('/dashboard') }} " role="button">Login</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link ms-3" href="{{ route('login') }}" style=" font-size: 1.1rem; position:
                                    relative; font-weight: bold;"
                                    onmouseover="this.style.textDecoration='none'; this.style.borderBottom='2px solid black';"
                                    onmouseout="this.style.textDecoration='none'; this.style.borderBottom='none';">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link ms-3" href="{{ route('register') }}"
                                        style="font-size: 1.1rem; position: relative;  font-weight: bold;"
                                        onmouseover="this.style.textDecoration='none'; this.style.borderBottom='2px solid black';"
                                        onmouseout="this.style.textDecoration='none'; this.style.borderBottom='none';">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://github.com/saripudin14/img/blob/main/9.jpg?raw=true" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Selamat Datang di Kampung Cengek</h5>
                    <p>Kp.Sukanampa, RW.19, Kelurahan Cigugur Tengah, Kecamatan Cimahi Tengah, Kota Cimahi</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://raw.githubusercontent.com/saripudin14/img/117d2606a59f01ee76bb7e7cfafd0e1c2c7b1630/10.jpeg"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kami Penghasil Cabai Kualitas Terbaik</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://github.com/saripudin14/img/blob/main/12.jpg?raw=true" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ayo Dukung Kami Dengan Membeli Produk Kami!</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="about-img">
                        <img src="https://github.com/saripudin14/img/blob/main/Cabai%20merah%20keriting.jpeg?raw=true"
                            alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 mt-md-5">
                    <div class="about-text">
                        <h2>Kami Penghasil Cabai Terbaik</h2>
                        <p align="justify">Ayo, mari kita dukung petani lokal dengan membeli cabai dari Kampung Cengek!
                            Selain harganya lebih
                            terjangkau, cabai dari kampung ini dijamin segar dan berkualitas tinggi. Tanpa bahan
                            pengawet, cabai yang ditanam dengan penuh ketulusan ini siap menambah cita rasa pedas yang
                            pas dalam masakan sehari-hari Anda. Setiap pembelian cabai langsung dari petani juga
                            membantu meningkatkan kesejahteraan mereka dan menjaga kelestarian pertanian lokal. Yuk,
                            beli cabai di Kampung Cengek, pedasnya asli, dan manfaatnya nyata!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="border-top bg-white py-4 mt-auto">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="https://raw.githubusercontent.com/saripudin14/img/refs/heads/main/CuyLogo.webp"
                        alt="Company Logo" class="rounded-circle me-3" width="75" height="75"
                        style="object-fit: cover;">
                    <span class="text-secondary">©CuyUniverse, 2025</span>
                </div>
                <div class="d-flex gap-3">
                    <a href="mailto:m.arifrivaldi141105.com" class="text-secondary text-decoration-none">
                        <i class="bi bi-envelope-fill" style="font-size: 1.2rem;"></i>
                    </a>
                    <a href="https://github.com/saripudin14" class="text-secondary text-decoration-none">
                        <i class="bi bi-github" style="font-size: 1.2rem;"></i>
                    </a>
                    <a href="https://www.instagram.com/karlsefni____" class="text-secondary text-decoration-none">
                        <i class="bi bi-instagram" style="font-size: 1.2rem;"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>