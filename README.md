# PERSIAPAN
## 1. Rancangan Aplikasi
Berikut merupakan rancangan Aplikasi yang akan dibuat (Dari soal UKK tahun 2023 paket 1)
<img src="https://github.com/irawankilmer/ukkspp_2023/blob/main/1%20Rancangan%20Aplikasi.png"><br>
## 2. Rancangan Database
Berikut adalah gambar rancangan Database nya (Dari soal UKK tahun 2023 paket 1)
<img src="https://github.com/irawankilmer/ukkspp_2023/blob/main/2%20desain%20database.png"><br>
Agar sistem berjalan sesuai dengan rancangan, akan ada sedikit modifikasi pada desain database yang akan dibuat

## 3. Membuat Database dan Beberapa Tabel Yang Diperlukan
Pada tahap ini, saya anggap di komputer kalian sudah terpasang XAMPP. Silahkan buka XAMPP Control panel.
<img src="https://github.com/irawankilmer/ukkspp_2023/blob/main/3%20aktifkn%20apache%20dan%20mysql.png"><br>
#### a. Klik Start Pada Menu Apache
#### b. Klik Start Pada Menu MySql
#### c. Masih di XAMPP Control Panel, klik tombol Admin pada bagian MySql (Kamu akan di arahkan ke web browser dengan alamat localhost/phpmyadmin) lihat gambar di bawah!
<img src="https://github.com/irawankilmer/ukkspp_2023/blob/main/4%20Buat%20Database%20dan%20Struktur%20Table.png"><br>
#### d. Silahkan buat Database baru dengan nama ukk_spp(opsional)
#### e. Klik nama Database yang baru saja dibuat(lihat point 1 pada gambar di atas)
#### f. Kemudian klik menu SQL(lihat point 2 pada gambar di atas)
#### g. Silahkan buat table dengan memasukan syntaks SQL berikut ke kolom yang di sediakan(lihat point 3 pada gambar di atas)

```bash
CREATE TABLE users(
    id_user INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(35),
    password VARCHAR(125),
    level ENUM('Admin', 'Petugas', 'Siswa'),
    gambar VARCHAR(125),
    remember_token VARCHAR(125),
    PRIMARY KEY(id_user)
);

CREATE TABLE petugas(
    id_petugas INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    nama_petugas VARCHAR(55),
    no_hp_petugas VARCHAR(25),
    alamat_petugas TEXT,
    PRIMARY KEY(id_petugas),
    FOREIGN KEY(id_user) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE spp(
    id_spp INT NOT NULL AUTO_INCREMENT,
    tahun VARCHAR(10),
    nominal INT,
    PRIMARY KEY(id_spp)
);

CREATE TABLE kelas(
    id_kelas INT NOT NULL AUTO_INCREMENT,
    nama_kelas VARCHAR(10),
    kompetensi_keahlian VARCHAR(50),
    PRIMARY KEY(id_kelas)
);

CREATE TABLE siswa(
    id_siswa INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_spp INT NOT NULL,
    id_kelas INT NOT NULL,
    nisn VARCHAR(10) UNIQUE,
    nis VARCHAR(8) UNIQUE,
    nama_siswa VARCHAR(35),
    alamat_siswa TEXT,
    no_telepon_siswa VARCHAR(15),
    PRIMARY KEY(id_siswa),
    FOREIGN KEY(id_user) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(id_spp) REFERENCES spp(id_spp) ON DELETE CASCADE,
    FOREIGN KEY(id_kelas) REFERENCES kelas(id_kelas) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE pembayaran(
    id_pembayaran INT NOT NULL AUTO_INCREMENT,
    id_petugas INT NOT NULL,
    id_siswa INT NOT NULL,
    id_spp INT NOT NULL,
    tgl_bayar DATE,
    bulan_dibayar VARCHAR(8),
    tahun_dibayar VARCHAR(4),
    jumlah_bayar INT,
    PRIMARY KEY(id_pembayaran),
    FOREIGN KEY(id_petugas) REFERENCES petugas(id_petugas) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(id_siswa) REFERENCES siswa(id_siswa) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(id_spp) REFERENCES siswa(id_spp) ON DELETE CASCADE ON UPDATE CASCADE
);
```
#### h. Jika sudah, silahkan klik tombol kirim dibagian kanan bawah(lihat point 4 pada gambar di atas)
#### i. Jika berhasil, maka akan terlihat seperti pada gambar berikut(lihat point 1 pada gambar di bawah)
<img src="https://github.com/irawankilmer/ukkspp_2023/blob/main/5%20berhasil%20tambah%20table.png"><br>
#### j. Untuk memastikan, silahkan klik menu Desainer(lihat point 2 pada gambar di atas)
#### k. Jika desain database nya sama dengan yang terlihat pada gambar berikut, berarti pembuatan database dan beberapa tabel sudah berhasil.
<img src="https://github.com/irawankilmer/ukkspp_2023/blob/main/6%20rancangan%20database%20baru.png"><br>
## CATATAN
* Silahkan perhatikan dan diskusikan dengan teman kalian, apa saja perbedaan dari desain database yang baru dengan desain database dari soal UKK diatas.
* Jika ada error silahkan minta bantuan pada guru pembimbing
