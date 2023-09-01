# ACCESSCONTROLL
Pada tahap sebelumnya kita sudah berhasil mencegah user yang belum login untuk tidak bisa mengakses halaman index(keseluruhan sistem). Akan tetapi, semua level user(Admin, Petugas dan Siswa) bisa mengakses menu2 penting seperti CRUD kelas, CRUD spp, CRUD siswa dan CRUD petugas, dimana user yang mempunyai kontrol penuh untuk melakukan CRUD pada data2 yang disebutkan sebelumnya hanya Admin saja(lihat pada tahap persiapan point 1. Rancangan Aplikasi).
Sekarang, untuk mencoba system access control ini silahkan buat 2 user dengan masing2 level petugas dan admin.

Tambah data user dengan level petugas
```bash
$conn = mysqli_connect('localhost', 'root', '', 'ukk_spp');
$password = password_hash('petugas', PASSWORD_DEFAULT);
mysqli_query($conn, "INSERT INTO users(username, password, level) VALUES('petugas', '$password', 2)");
```

Tambah data user dengan level siswa
```bash
$conn = mysqli_connect('localhost', 'root', '', 'ukk_spp');
$password = password_hash('siswa', PASSWORD_DEFAULT);
mysqli_query($conn, "INSERT INTO users(username, password, level) VALUES('siswa', '$password', 3)");
```