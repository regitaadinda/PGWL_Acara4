# 🏥 **RSFinder SBY**

### **Sistem Informasi Geospasial Interaktif Lokasi Rumah Sakit Kota Surabaya**  
### **Dikembangkan oleh: Regita Adinda Sefty**

## 🧭 Ringkasan Proyek  
**RSFinder SBY** merupakan platform berbasis web yang menyediakan visualisasi spasial lokasi rumah sakit di Kota Surabaya. Aplikasi ini dikembangkan menggunakan Laravel dan peta interaktif Leaflet. Melalui sistem ini, pengguna dapat menelusuri, menilai, dan mengelola data rumah sakit langsung di atas peta.  

Selain itu, sistem juga mendukung fitur autentikasi pengguna, form saran publik, dan manajemen data (CRUD), menjadikannya sarana interaktif dan partisipatif dalam penyediaan informasi fasilitas kesehatan.

## 🔍 Tujuan Utama  
- Menyediakan informasi spasial RSUD di Kota Surabaya  
- Mempermudah akses data kesehatan melalui antarmuka peta modern  
- Memungkinkan pengguna untuk menambah, mengubah, dan menghapus data RS  
- Menyediakan form saran publik untuk umpan balik dan pengembangan sistem  
- Menyediakan sistem login/register agar fitur lebih aman dan terkendali  

## 🗺️ Fitur Pemetaan Interaktif  
- Peta interaktif berbasis Leaflet dengan layer OSM, Esri Imagery, dan Topografi  
- Layer batas administrasi desa dari Geoserver (WMS) dengan transparansi  
- Toolbar digitasi (marker, polyline, polygon) langsung dari tampilan peta  
- Data spasial ditampilkan dalam format GeoJSON untuk interaksi dinamis  
- Popup interaktif berisi nama RS, alamat, deskripsi, gambar, rating, dan tombol edit/delete  
- Fitur pencarian lokasi RS secara real-time menggunakan Leaflet Search  

## ⭐ Fitur Tambahan  
- Rating rumah sakit (1–5 bintang) langsung dari tampilan popup  
- Form Tambah Data RS dengan input teks, geometri (WKT), dan upload gambar  
- CRUD data spasial berbasis GeoJSON (point, polyline, polygon)  
- Fitur form saran untuk menampung aspirasi pengguna  

## 🔐 Autentikasi & Akses  
- Sistem login & register menggunakan Laravel Breeze dan Sanctum  
- Akses CRUD dan form saran hanya dapat digunakan oleh user yang login  
- Dropdown profil untuk edit profil dan logout  
- Middleware `auth` untuk mengatur akses rute web dan API  

## ⚙️ Alat & Bahan yang Digunakan  
- **Frontend**: HTML, CSS, JavaScript, Bootstrap 5, Laravel Blade  
- **Pemetaan**: Leaflet.js, Leaflet Draw, Routing Machine, Search, WMS (Geoserver)  
- **Geospasial**: GeoJSON, WKT (Terraformer.js), PostGIS  
- **Backend**: Laravel 10.x (MVC, REST API, CRUD)  
- **Database**: PostgreSQL + PostGIS  
- **Autentikasi**: Laravel Sanctum, middleware, route guard  
- **Lainnya**: jQuery, AJAX, FontAwesome  
