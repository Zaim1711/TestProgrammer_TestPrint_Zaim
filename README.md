<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Tes Junior Programmer – Fastprint

## 1. Deskripsi
Proyek ini bertujuan untuk mengambil data dari API Fastprint, menyimpannya ke database, dan menampilkan data produk dengan status tertentu.  
Framework yang digunakan: **Laravel 12**  
Database: **MySQL**  

Fitur utama:
- Ambil data dari API Fastprint
- Simpan ke database (Produk, Kategori, Status)
- Tampilkan data produk dengan status "bisa dijual"
- Tambah, edit, hapus produk dengan validasi
- Hapus menggunakan confirm alert
- Notifikasi modal untuk sukses tambah/hapus

---

## 2. Persiapan Project

1. Clone repository:
```bash
git clone https://github.com/Zaim1711/TestProgrammer_TestPrint_Zaim.git
cd TestProgrammer_TestPrint_Zaim
```
2.Install dependencies: 
composer Intall

3.Pada file .env berdasarkan .env.example atur koneksi database:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fastprint
DB_USERNAME=root
DB_PASSWORD=

4.Migrasi database:
php artisan migrate

5.Kemudian jalankan Console/Comamand/FetchProduct untuk mengambil data dari API FastPrint
php artisan app:fetch-products

6.Jalankan server lokal
php artisan serve
Buka browser di: http://127.0.0.1:8000/


"# TestProgrammer_TestPrint_Zaim" 
