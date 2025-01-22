{{--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>--}}


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampung Cengek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #FFD700;
            --secondary-color: #FFF5C2;
        }

        .bg-custom-yellow {
            background-color: var(--primary-color);
        }

        .bg-custom-light {
            background-color: var(--secondary-color);
        }

        .hero-section {
            height: 500px;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/api/placeholder/1200/500');
            background-size: cover;
            background-position: center;
        }

        .product-img {
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#" style="font-size: 1.5rem; font-weight: bold;"><span
                    class="text-warning">Kampung Cengek</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#" style="font-size: 1.2rem; position: relative; font-weight: bold;"
                            onmouseover="this.style.textDecoration='none'; this.style.borderBottom='2px solid black';"
                            onmouseout="this.style.textDecoration='none'; this.style.borderBottom='none';">
                            Home
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#tentang"
                            style="font-size: 1.2rem; position: relative;  font-weight: bold;"
                            onmouseover="this.style.textDecoration='none'; this.style.borderBottom='2px solid black';"
                            onmouseout="this.style.textDecoration='none'; this.style.borderBottom='none';">
                            About
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('products.index') }}"
                            style="font-size: 1.2rem; position: relative;  font-weight: bold;"
                            onmouseover="this.style.textDecoration='none'; this.style.borderBottom='2px solid black';"
                            onmouseout="this.style.textDecoration='none'; this.style.borderBottom='none';">
                            Produk
                        </a>
                    </li>
                </ul>

                <!-- Move Profile to the Left -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2 text-gray-600 small">{{ Auth::user()->name }}</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <!-- Profile-->
                            <a class="bi bi-person-circle dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                {{ __('Profile') }}
                            </a>
                            <!-- Log out -->
                            <hr class="dropdown-divider">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <a class="bi bi-box-arrow-in-right dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- Hero Section -->
    <section id="beranda" class="hero-section d-flex align-items-center text-white"
        style="position: relative; overflow: hidden; height: 100vh;">
        <!-- Gambar sebagai latar belakang -->
        <img src="https://github.com/saripudin14/img/blob/main/3.jpg?raw=true" alt="Background"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; filter: blur(1px); z-index: -1;">
        <!-- Konten teks -->
        <div class="container text-center" style="position: relative; z-index: 1;">
            <h1 class="display-4 fw-bold">Selamat Datang di Kampung Cengek</h1>
            <p class="lead">Penghasil Cabai Berkualitas Tinggi</p>
            <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg d-inline-flex align-items-center">
                Lihat Produk Kami
                <i class="bi bi-cart-fill ms-2"></i>
            </a>

        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-5 bg-custom-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://raw.githubusercontent.com/saripudin14/img/128c140ab9728e7063eff4ff8141ab8375fc4e7d/3.webp"
                        alt="Tentang Desa" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4 pr-2">Tentang Desa Kami</h2>
                    <p>Desa Cabai Makmur merupakan sentra penghasil cabai terbesar di kawasan ini. Dengan lahan
                        pertanian seluas 100 hektar, kami menghasilkan berbagai jenis cabai berkualitas tinggi yang
                        dipasarkan ke seluruh wilayah Indonesia.</p>
                    <p>Keunggulan kami:</p>
                    <ul>
                        <li>Penggunaan bibit unggul berkualitas</li>
                        <li>Pertanian ramah lingkungan</li>
                        <li>Penerapan teknologi modern</li>
                        <li>Pemberdayaan petani lokal</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section id="galeri" class="py-5 bg-custom-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Galeri Desa</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <img src="https://github.com/saripudin14/img/blob/main/10%20-%20Copy.jpeg?raw=true" alt="Galeri 1"
                        class="img-fluid rounded">
                </div>
                <div class="col-md-4">
                    <img src="https://github.com/saripudin14/img/blob/main/9%20-%20Copy.jpg?raw=true" alt="Galeri 2"
                        class="img-fluid rounded">
                </div>
                <div class="col-md-4">
                    <img src="https://github.com/saripudin14/img/blob/main/1%20-%20Copy.jpeg?raw=true" alt="Galeri 3"
                        class="img-fluid rounded">
                </div>
                <div class="col-md-4">
                    <img src="https://github.com/saripudin14/img/blob/main/10%20-%20Copy.jpeg?raw=true" alt="Galeri 4"
                        class="img-fluid rounded">
                </div>
                <div class="col-md-4">
                    <img src="https://github.com/saripudin14/img/blob/main/9%20-%20Copy.jpg?raw=true" alt="Galeri 5"
                        class="img-fluid rounded">
                </div>
                <div class="col-md-4">
                    <img src="https://github.com/saripudin14/img/blob/main/1%20-%20Copy.jpeg?raw=true" alt="Galeri 6"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>