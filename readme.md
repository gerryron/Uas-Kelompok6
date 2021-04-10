# UAS KELOMPOK 6
### Data pendaftaran vaksinasi Covid-19

<br>
Anggota Kelompok : 
1.  Apsoh Nurjanah
2. Ayu Sri Wahyuni
3. Cristian Calvin
4. Dani Saputra
5. Gerryron
6. Zeti Afifa


------------------------------
Link  Website : https://gerryron-panel.000webhostapp.com/login.php

------------------------------

` Registration.php`

> Digunakan untuk kepentingan registrasi user agar dapat login kedalam website. Pengguna mendaftarkan nomer telepon dan password untuk dapat melakukan registrasi.

#### Fitur pada halaman ini :
- Menegecek keberadaan session dan cookie, apabila terdapat session / cookie yang sesuai halaman akan langsung dialihkan ke halaman index atau halaman utama.
- Memiliki fitur validasi registrasi, dimana akan dilakukan pengecekan apabila nomer hp sudah terdaftar di database.
- Memiliki fitur Konfirmasi Password untuk menghindari pengguna memasukkan password yang tidak sesuai atau typo.
- Memiliki fitur enkripsi yang kuat terhadap password yang dimasukkan kedalam database.

----------------------------------------------------
` login.php`

>Digunakan untuk kepentingan login user ke dalam website. User harus mencantumkan nomer hp dan password yang sebelumnya telah dilakukan registrasi.

#### Fungsi pada halaman ini :
- Menegecek keberadaan session dan cookie, apabila terdapat session / cookie yang sesuai halaman akan langsung dialihkan ke halaman index atau halaman utama.
- Memiliki fitur validasi login, apabila pengguna memasukkan nomer hp atau password yang tidak sesuai
- Memiliki fitur login dimana session dan cookie akan diinisialisasi saat login berhasil
- Cookie yang disimpan sudah di hash sehingga dapat mengurangi resiko kerusakan website oleh pihak yang tidak bertanggung jawab

--------------------------------------------
` input.php`

>Digunakan untuk registrasi pasien penerima Vaksin Covin-19.  Merupakan halaman yang pertama kali muncul saat akun pengguna belum terdaftar sebagai pasien penerima Vaksin Covid-19.

#### Fungsi pada halaman ini :
- Menegecek keberadaan session dan cookie, apabila tidak terdapat session / cookie yang sesuai halaman akan langsung dialihkan ke halaman login.
- Memiliki validasi apabila pengguna belum terdaftar pasien penerima vaksin, maka halaman ini akan muncul sebagai halaman utama.
- Memiliki fitur *Auto Sync* input dropdown pemilihan wilayah (Saat ini fitur belum berfungsi secara optimal pada website hosting).

--------------------------------------------
` index.php`

>Digunakan untuk halaman penampil data pasien vaksinasi covid berdasarkan wilayah provinsi pengguna mendaftar.  Merupakan halaman yang pertama kali muncul saat akun pengguna sudah terdaftar sebagai pasien penerima Vaksin Covid-19.

#### Fungsi pada halaman ini :
- Menegecek keberadaan session dan cookie, apabila tidak terdapat session / cookie yang sesuai halaman akan langsung dialihkan ke halaman login.
- Memiliki validasi apabila pengguna sudah terdaftar pasien penerima vaksin, maka halaman ini akan muncul sebagai halaman utama.
- Memiliki fitur Cetak Halaman pada bagian header sebelah kanan halaman.
- Akan menampilkan list dari pasien vaksinasi covid berdasarkan wilayah provinsi dimana pengguna berasal.
- Memiliki opsi untuk mengubah atau menghapus data pasien (hanya berlaku pada data pengguna itu sendiri)
- Opsi Cetak Halaman akan berubah menjadi Registrasi apabila data pasien dihapus

--------------------------------------------
` edit.php`

>Digunakan untuk mengubah data pasien vaksinasi covid. Tersedia pada halaman index pada bagian data pengguna itu sendiri.

#### Fungsi pada halaman ini :
- Menegecek keberadaan session dan cookie, apabila tidak terdapat session / cookie yang sesuai halaman akan langsung dialihkan ke halaman login.
- Dapat mengubah data pasien pengguna itu sendiri tapi tidak dengan nomer hp.
- Memiliki fitur *Auto Sync* input dropdown pemilihan wilayah (Saat ini fitur belum berfungsi secara optimal pada website hosting).

--------------------------------------------
` delete.php`

>Digunakan untuk menghapus data pasien vaksinasi covid. Tersedia pada halaman index pada bagian data pengguna itu sendiri.

#### Fungsi pada halaman ini :
- Menegecek keberadaan session dan cookie, apabila tidak terdapat session / cookie yang sesuai halaman akan langsung dialihkan ke halaman login.
- Dapat menghapus data pasien pengguna itu sendiri. Sehingga harus melakukan registrasi pasien penerima vaksin covid ulang.

--------------------------------------------
` cetak.php`

>Digunakan mencetak data pada halaman index.

#### Fungsi pada halaman ini :
- Menegecek keberadaan session dan cookie, apabila tidak terdapat session / cookie yang sesuai halaman akan langsung dialihkan ke halaman login.
- Dapat mencetak data pada halaman index.

--------------------------------------------
` logut.php`

>Digunakan sebagai fitur logout apabila pengguna sudah selesai beraktifitas pada website

#### Fungsi pada halaman ini :
- Menghapus session dan cookie serta langsung mengalihkan ke halaman login lagi.


--------------------------------------------

Function dasar yang sering digunakan pada setiap file : 
1. **session Start()**
Digunakan untuk melakukan inisialisasi tanda halaman ini akan menggunakan session
2. **require**
Menyertakan file php lain kedalam halaman program ditempati.
3. **isset()**
Mengecek keberadaan suatu variabel, apakah sudah dibuat atau tidak (akan menghasilkan nilai boolean)
4. **$_POST**
Merupakan Global Variabel PHP untuk keperluan pertukaran data dari tag form.
5. **$_GET**
Merupakan Global Variabel PHP untuk keperluan pertukaran data dari url halaman.
6. **$_SESSION**
Merupakan Global Variabel PHP untuk keperluan pertukaran data dari session web.
7. **$_COOKIE**
Merupakan Global Variabel PHP untuk keperluan pertukaran data dari cookie web.
8. **mysqli_connect()**
Merupakan fungsi php untuk membukakan koneksi ke database mysql.
9. **mysqli_query()**
Merupakan fungsi php untuk mengambil data hasil dari query yang dilempar pada parameter.
10. **mysqli_fetch_assoc()**
Merupakan fungsi php untuk mengubah data hasil query menjadi array assosiatif.
11. **mysqli_affected_rows()**
Merupakan fungsi php untuk mendapatkan nilai hasil perubahan yang terjadi di database berdasarkan query yang kita lakukan sebelumnya.
12. **header**
Merupakan fungsi php untuk memproses HTTP header. Pada aplikasi ini lebih banyak digunakan untuk keperluan perpindahan halaman.
13. **if()**
Merupaka fungsi php untuk melakukan percabangan.
14. **foreach()**
Merupakan fungsi php untuk melakukan perulangan terhadap variabel array.
15. **password_hash()**
Merupakan fungsi php untuk  mengenkripsi password sebelum password di insert ke database
16. **mysqli_real_escape_string()**
Merupakan fungsi php untuk memberi perlindungan / (mencegah Sql Injection) terhadap karakter-karakter unik atau karakter khusus.
17. **setcookie()**
Merupakan fungsi php untuk menginisialisasi cookie, parameter pertama berupa nama cookide dan parameter kedua merupakan waktu cookie aktif pada browser.
18.  **session_unset()**
Merupakan fungsi php untuk menghapus session spesifik.
19.  **session_destroy()**
Merupakan fungsi php untuk menghapus semua session.