@extends('layout.template')

@section('content')
    {{-- Carousel Ukuran Sedang + Animasi --}}
    <div id="mainCarousel" class="carousel slide carousel-fade w-100 mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            {{-- Slide 1 --}}
            <div class="carousel-item active text-white" style="background-color: #004d5f; height: 580px;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center px-4">
                        <div class="col-md-6 d-flex flex-column justify-content-center">
                            <h1 class="display-5 fw-bold text-white animate__animated animate__fadeInUp">Selamat Datang di RSFinder SBY</h1>
                            <p class="lead text-white fs-5 animate__animated animate__fadeInUp animate__delay-1s">Temukan rumah sakit terbaik di Surabaya dengan mudah.</p>
                            <a href="{{ route('register') }}" class="btn btn-light btn-sm mt-3 w-auto align-self-start animate__animated animate__fadeInUp animate__delay-2s" style="font-size: 0.875rem; padding: 6px 16px; border-radius: 0.4rem;">Daftar Sekarang</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="https://img.freepik.com/free-vector/hospital-building-concept-illustration_114360-8102.jpg?w=740" alt="Ilustrasi Rumah Sakit" class="img-fluid rounded shadow animate__animated animate__fadeInRight" style="max-height: 360px; object-fit: contain;">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Slide 2 --}}
            <div class="carousel-item text-white" style="background-color: #006989; height: 580px;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center px-4">
                        <div class="col-md-6 d-flex flex-column justify-content-center">
                            <h1 class="display-5 fw-bold text-white animate__animated animate__fadeInUp">Layanan Informasi Geospasial</h1>
                            <p class="lead text-white fs-5 animate__animated animate__fadeInUp animate__delay-1s">Pantau lokasi, fasilitas, dan tipe rumah sakit secara interaktif.</p>
                            <a href="{{ route('register') }}" class="btn btn-light btn-sm mt-3 w-auto align-self-start animate__animated animate__fadeInUp animate__delay-2s" style="font-size: 0.875rem; padding: 6px 16px; border-radius: 0.4rem;">Daftar Sekarang</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="https://img.freepik.com/free-vector/hospital-building-concept-illustration_114360-8102.jpg?w=740" alt="Ilustrasi Rumah Sakit" class="img-fluid rounded shadow animate__animated animate__fadeInLeft" style="max-height: 360px; object-fit: contain;">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Slide 3 --}}
            <div class="carousel-item text-white" style="background-color: #00a6c1; height: 580px;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center px-4">
                        <div class="col-md-6 d-flex flex-column justify-content-center">
                            <h1 class="display-5 fw-bold text-white animate__animated animate__fadeInUp">RSFinder SBY Mudahkan Hidup Anda</h1>
                            <p class="lead text-white fs-5 animate__animated animate__fadeInUp animate__delay-1s">Cepat, Akurat, dan Informatif.</p>
                            <a href="{{ route('register') }}" class="btn btn-light btn-sm mt-3 w-auto align-self-start animate__animated animate__fadeInUp animate__delay-2s" style="font-size: 0.875rem; padding: 6px 16px; border-radius: 0.4rem;">Daftar Sekarang</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="https://img.freepik.com/free-vector/hospital-building-concept-illustration_114360-8102.jpg?w=740" alt="Ilustrasi Rumah Sakit" class="img-fluid rounded shadow animate__animated animate__fadeInRight" style="max-height: 360px; object-fit: contain;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Navigasi --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>

    {{-- Fitur Utama --}}
    <div class="row text-center mb-5">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100 p-3">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-geo-alt-fill display-4 text-primary"></i>
                    <h5 class="card-title mt-3">Lokasi RS</h5>
                    <p class="card-text">Menampilkan lokasi rumah sakit secara akurat di peta interaktif.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100 p-3">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-hospital-fill display-4 text-success"></i>
                    <h5 class="card-title mt-3">Informasi RS</h5>
                    <p class="card-text">Menyediakan informasi lengkap seperti alamat, tipe rumah sakit, dan fasilitas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100 p-3">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-search display-4 text-warning"></i>
                    <h5 class="card-title mt-3">Pencarian RS</h5>
                    <p class="card-text">Memudahkan pencarian rumah sakit berdasarkan nama atau lokasi tertentu.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tentang Sistem --}}
    <div class="bg-white p-5 rounded shadow-sm mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0 text-center">
                    <img src="https://img.freepik.com/free-vector/doctor-character-background_1270-84.jpg?w=740" alt="Ilustrasi Sistem RS" class="img-fluid rounded shadow-sm animate__animated animate__fadeIn" style="max-height: 300px; object-fit: contain;">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3 fw-bold text-primary">
                        <i class="bi bi-hospital-fill me-2"></i>Kenali RSFinder SBY
                    </h2>
                    <p class="fs-5 text-secondary">
                        <strong>RSFinder SBY</strong> adalah solusi cerdas untuk masyarakat <span class="text-dark fw-semibold">Kota Surabaya</span> dalam menemukan informasi rumah sakit secara <em>mudah, cepat, dan akurat</em>. Sistem ini dikembangkan dengan teknologi geospasial terkini untuk memberikan pencarian berbasis lokasi secara interaktif.
                    </p>
                    <div class="mt-4">
                        <h5 class="fw-semibold text-dark mb-3">Fitur Unggulan:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-geo-alt-fill text-danger me-2"></i><strong>Lokasi Akurat:</strong> Menampilkan rumah sakit berbasis koordinat real-time.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-layers-fill text-success me-2"></i><strong>Peta Interaktif:</strong> Navigasi mudah untuk menelusuri fasilitas kesehatan.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-clock-history text-warning me-2"></i><strong>Akses 24/7:</strong> Dapat diakses kapan saja melalui perangkat Anda.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-search text-info me-2"></i><strong>Pencarian Pintar:</strong> Temukan RS berdasarkan tipe, nama, dan lokasi.
                            </li>
                        </ul>

                        {{-- Tombol Info Lebih Lanjut --}}
                        <div class="mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-md animate__animated animate__fadeInUp">
                                <i class="bi bi-info-circle-fill me-1"></i> Info Lebih Lanjut
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Formulir Saran dan Masukan --}}
            <div class="row mt-5">
                <div class="col-12">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <h4 class="mb-4 text-primary"><i class="bi bi-chat-dots-fill me-2"></i>Saran & Masukan</h4>
                        <form id="saranForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="namaPengguna" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="namaPengguna" name="Nama" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="emailPengguna" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailPengguna" name="Email" placeholder="example@mail.com" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="pesanSaran" class="form-label">Saran atau Masukan</label>
                                <textarea class="form-control" id="pesanSaran" name="Pesan" rows="4" placeholder="Tulis saran atau masukan Anda di sini..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-send me-1"></i>Kirim</button>
                        </form>
                        {{-- Notifikasi sukses --}}
                        <div id="notifSukses" class="alert alert-success mt-4 d-none">
                            <i class="bi bi-check-circle-fill me-2"></i>Terima kasih atas saran dan masukan Anda!
                        </div>
                    </div>
                </div>
            </div>

            {{-- Script untuk reset form dan tampilkan notifikasi --}}
            <script>
                document.getElementById('saranForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    this.reset();
                    document.getElementById('notifSukses').classList.remove('d-none');
                    setTimeout(function() {
                        document.getElementById('notifSukses').classList.add('d-none');
                    }, 4000);
                });
            </script>

        </div>
    </div>

    {{-- Info Login Pengguna --}}
    @auth
        <div class="d-flex justify-content-center mb-5">
            <div class="bg-info bg-opacity-10 border border-info p-4 rounded shadow-sm text-center" style="max-width: 600px;">
                <p class="mb-0">Anda login sebagai <strong>{{ Auth::user()->name }}</strong></p>
            </div>
        </div>
    @endauth

    {{-- Profil Pengembang --}}
    <div class="d-flex justify-content-center my-5">
        <div class="d-flex align-items-center bg-light p-4 rounded shadow" style="max-width: 700px; width: 100%;">
            <!-- Foto/ikon -->
            <div class="col-md-3">
                <img src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740" alt="Foto Pengembang" class="img-fluid rounded-circle shadow-sm" style="max-width: 150px;">
            </div>
            <!-- Detail profil -->
            <div>
                <h5 class="text-primary fw-bold mb-3">Profil Pengembang</h5>
                <p class="mb-1"><strong>Nama:</strong> Regita Adinda Sefty</p>
                <p class="mb-1"><strong>Asal:</strong> Madiun</p>
                <p class="mb-1"><strong>Prodi:</strong> Sistem Informasi Geografis</p>
                <p class="mb-0"><strong>Kampus:</strong> Universitas Gadjah Mada</p>
            </div>
        </div>
    </div>


    {{-- Footer --}}
    <footer class="text-center text-muted py-3 border-top">
        &copy; 2025 RSFinder SBY - Regita Adinda
    </footer>
@endsection
