<x-app-layout>

    <head>
        <title>Dashboard RSFINDER</title>

        <!-- Bootstrap & Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Segoe UI', sans-serif;
            }

            .feature-icon {
                font-size: 3rem;
            }

            .bg-primary-custom {
                background-color: #006989;
            }

            .bg-soft {
                background-color: #f7f9fb;
            }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">

                <!-- Toggler untuk mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu kanan -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <!-- Menu Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold text-primary' : '' }}"
                                href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <!-- Dropdown User -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <div class="position-relative bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
            <div class="text-center px-3">
                <h1 class="display-4 fw-semibold" style="font-family: 'Poppins', sans-serif; color: #006989;">
                    Jelajahi Rumah Sakit Bersama
                    <span
                        style="font-weight: 900; font-size: 58px; color: #004d5f; background: linear-gradient(to right, #00a6c1, #0097b2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 1px 1px 2px rgba(0,0,0,0.15);">
                        RSFinder
                    </span>
                    Surabaya!
                </h1>
                <p class="fs-4 text-secondary mt-2">
                    Satu website interaktif untuk informasi fasilitas kesehatan
                </p>
            </div>
        </div>

        <!-- Feature Section -->
        <section class="py-5 bg-soft">
            <div class="container">
                <div class="row text-center">
                    <!-- Tabel Informasi -->
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-white shadow-sm rounded h-100">
                            <i class="bi bi-table text-primary feature-icon mb-3"></i>
                            <h5 class="text-uppercase fw-bold">Tabel Informasi</h5>
                            <p class="text-muted">Lihat daftar Rumah Sakit Umum Daerahnya dan detail informasinya.</p>
                            <a href="{{ route('table') }}" class="btn btn-outline-primary btn-sm mt-2">Lihat Tabel</a>
                        </div>
                    </div>

                    <!-- Peta Interaktif -->
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-primary-custom text-white shadow-sm rounded h-100">
                            <i class="bi bi-geo-alt-fill feature-icon mb-3"></i>
                            <h5 class="text-uppercase fw-bold">Peta Interaktif</h5>
                            <p>Jelajahi lokasi Rumah Sakit Umum Daerah melalui peta interaktif.</p>
                            <a href="{{ route('map') }}" class="btn btn-light btn-sm mt-2">Lihat Peta</a>
                        </div>
                    </div>

                    <!-- Total RSUD -->
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-white shadow-sm rounded h-100">
                            <i class="bi bi-bank2 text-success feature-icon mb-3"></i>
                            <h5 class="text-uppercase fw-bold">Total RSUD</h5>
                            <p class="text-muted">Tersedia saat ini:</p>
                            <h2 class="fw-bold text-dark">{{ $total_points ?? '6' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .section-tentang {
              padding: 80px 20px;
              font-family: 'Segoe UI', sans-serif;
              max-width: 900px;
              margin: 0 auto;
              color: #003f4d;
              text-align: center;
            }

            .section-tentang h2 {
              font-size: 36px;
              font-weight: bold;
              margin-bottom: 30px;
              color: #006989;
              text-shadow: 1px 1px 2px rgba(0, 105, 137, 0.4);
            }

            .section-tentang h2 span {
              color: #00a6c1;
            }

            .section-tentang p {
              font-size: 18px;
              line-height: 1.8;
              margin-bottom: 40px;
            }

            .features-container {
              display: flex;
              flex-wrap: nowrap;
              justify-content: center;
              gap: 25px;
              max-width: 960px;
              width: 100%;
              margin-bottom: 40px;
              align-items: stretch;
            }

            .feature-box {
              background: linear-gradient(to bottom right, #e1f5f8, #ffffff);
              color: #003f4d;
              padding: 25px;
              border-radius: 15px;
              width: 300px;
              box-shadow: 0 6px 10px rgba(0, 0, 0, 0.12);
              text-align: center;
              transition: all 0.3s ease;
              display: flex;
              flex-direction: column;
              justify-content: flex-start;
              height: 100%;
              min-height: 220px;
            }

            .feature-box:hover {
              transform: translateY(-5px);
              box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }

            .feature-box h3 {
              font-size: 20px;
              margin-bottom: 10px;
              font-weight: 600;
            }

            .feature-box p {
              font-size: 15px;
              line-height: 1.5;
              margin: 0 auto;
              max-width: 90%;
            }

            .closing {
              font-size: 16px;
              line-height: 1.7;
              color: #003f4d;
              text-align: center;
              border-top: 1px solid #00a6c1;
              padding-top: 30px;
              margin-top: 40px;
            }

            @media (max-width: 980px) {
              .features-container {
                flex-wrap: wrap;
              }
              .feature-box {
                width: 45%;
                min-height: unset;
              }
            }

            @media (max-width: 600px) {
              .feature-box {
                width: 100%;
                max-width: 100%;
              }
            }

            @media (max-width: 768px) {
              .section-tentang h2 {
                font-size: 28px;
              }

              .section-tentang p {
                font-size: 16px;
              }
            }
        </style>

        <section class="section-tentang">
            <h2>⋆*･ﾟ Tentang <span>RSFinder</span> ⋆*･ﾟ</h2>
            <p>
              <strong>RSFinder</strong> adalah platform informasi sebaran <strong>Rumah Sakit Umum Daerah (RSUD)</strong> di Kota Surabaya.<br><br>
              Aplikasi ini dirancang untuk memberikan kemudahan bagi masyarakat dalam mengakses informasi lokasi dan data fasilitas kesehatan milik pemerintah secara <strong>cepat, akurat, dan interaktif</strong>.
            </p>

            <div class="features-container">
              <div class="feature-box">
                <h3>🗺️ Pemetaan Digital</h3>
                <p>Menyajikan sebaran lokasi RSUD secara visual melalui peta interaktif yang mudah dipahami dan digunakan.</p>
              </div>
              <div class="feature-box">
                <h3>🔍 Akses Cepat</h3>
                <p>Fitur pencarian lokasi RSUD terdekat berdasarkan posisi pengguna untuk membantu dalam kondisi darurat.</p>
              </div>
              <div class="feature-box">
                <h3>📊 Transparansi Data</h3>
                <p>Memberikan informasi terstruktur dan terbuka mengenai nama, alamat, dan fasilitas setiap RSUD.</p>
              </div>
            </div>

            <div class="closing">
              <p>
                RSFinder diharapkan menjadi media edukatif dan referensi dalam <strong>perencanaan pemerataan layanan kesehatan</strong> bagi masyarakat, tenaga medis, dan pemerintah Kota Surabaya.
              </p>
            </div>
        </section>

        <!-- ⬇️ Tambahan Button Kembali ke Home -->
        <div class="text-center my-4">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                <i class="bi bi-house-door-fill me-1"></i> Kembali ke Home
            </a>
        </div>

        <!-- Footer -->
        <footer class="text-center text-muted py-3 border-top">
            &copy; 2025 RSFinder SBY - Regita Adinda
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</x-app-layout>
