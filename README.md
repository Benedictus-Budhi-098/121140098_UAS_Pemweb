# 121140098_UAS_Pemweb
<br>Web kali ini dibuat untuk melakukan registrasi perlombaan melalui web
<br>Inputan yang dilakukan kemudian akan disimpan ke dalam database

<br>Berikut web yang telah dihosting : https://projectuasbudhi.000webhostapp.com/
<br>note : akan muncul peringatan ketika mengakses link diatas. Cukup pilih tombol detail, lalu ketik "visit this site" maka situs akan dapat diakses.

## Bagian 1: Client-side Programming (Bobot: 30%)

Pada bagian ini, dibuat 3 file html php berupa halaman login, halaman register, dan halaman utama (index)

### Tampilan login :
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/31086703-42d0-4309-a527-9c2275f623a8)
<br>Pada bagian ini, diberikan 2 event inputan, yakni inputan username dan password. Dua inputan tersebut nantinya akan dicek ke dalam suatu tabel pada database apakah akun tersebut sudah terdaftar atau belum. berikut inputan pada halaman login :
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/98e6c07f-6025-4377-a7ad-7f8645b40693)

### Tampilan Register :
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/8d977717-fcfc-4431-9d10-7d7c422180e2)

<br>Bagian ini merupakan redirect dari halaman login, dimana user akan diminta untuk melakukan pendaftaran akun dengan mendaftarkan username beserta password. Inputan yang dilakukan nantinya akan disave ke dalam tabel database khusus yang digunakan untuk menampung daftar akun yang dapat mengakses halaman web.

![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/dd432564-a783-4b69-8321-ce09b00afef9)

### Tampilan Index :
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/8ff3d420-56c0-4fed-b39a-6e3ee78047e2)
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/f75f984e-3fb5-4db7-8f36-9fdf860208ef)
<br>Bagian ini merupakan halaman inti dari web, dimana user akan melakukan inputan beberapa komponen untuk melakukan pendaftaran lomba. Data yang diinputkan nantinya akan disimpan ke dalam tabel database dan kemudian akan ditampilkan dalam bentuk tabel.
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/6ce53eb7-dfab-482f-892f-5af3e17738b1)

<br>Pada bagian ini juga diterapkan script javascript. Script javascript ini berisi fungsi untuk memvalidasi inputan yang dilakukan oleh user pada halaman index. Inputan yang tidak sesuai dengan aturan pada javascript akan ditolak dan user akan diminta untuk melakukan input ulang. Data yang sudah sesuai akan diteruskan nantinya ke dalam php.
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/ccab8bb5-3732-402b-9f58-df4940278292)


## Bagian 2: Server-side Programming (Bobot: 30%)

Pada bagian ini, dibuat 2 file berjenis php, yakni file koneksi dan file DataHandler

### koneksi.php
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/db1e4249-e1d9-427c-ab3a-074691578545)
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/15e13157-ad07-43e0-9ac8-53a82c9ecb5d)
<br>Kode diatas digunakan agar website dapat terhubung dengan database. Penjelasan terkait kode dapat dilihat pada komen kode diatas.

### DataHandler.php
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/2082fede-1f88-4451-abdb-3ad92806fd59)
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/19929128-f5b1-405b-8df1-2016d7f7d2bc)
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/7d8f24c1-e99a-4a41-9509-60a8d9c6468b)
<br>Kode diatas digunakan untuk menampung fungsi-fungsi terkait manipulasi data pada server mysql. Manipulasi dilakukan menggunakan query sql dengan metode string.

## Bagian 3: Database Management (Bobot: 20%)

Database yang digunakan pada web kali ini dibuat menggunakan hosting lokal phpmyadmin. Database dibuat dengan media xampp, kemudian dibuat melalui phpmyadmin. Tabel yang dibuat pada database berjumlah dua, yakni tab_form dan tab_acc.
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/91baea23-f8ad-4e3b-a375-0070a446c9ea)

### tab_form
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/d371edfe-63b3-45a6-a4d5-44e9417bd1aa)
<br>Tabel ini dibuat untuk menampung inputan yang dilakukan user pada halaman index. Tabel ini juga digunakan pada fungsi di dalam DataHandler untuk dapat menampilkan isi dari tabel database dalam tabel pada halaman web.

### tab_acc
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/b910703c-a49c-4976-8daf-366c984a0372)
<br>Tabel ini dibuat untuk menampung akun yang dapat melakukan login pada halaman web. Akun baru yang melakukan registrasi akan ditampung di dalam tabel ini. Selain itu, inputan login user akan diotentikasi pada tabel ini untuk mengecek apakah akun yang digunakan terdaftar atau tidak.

## Bagian 4: State Management (Bobot: 20%)

Bagian ini merupakan bagian yang merubah file utama web (login, register, index) agar sesuai dengan file php (koneksi, datahandler) yang telah dibuat. Adanya dua file php tersebut menuntut perubahan pada ketiga file utama web. Hal tersebut dilakukan agar web dapat menjalankan fungsinya dengan baik.

### Penambahan kode php pada file login
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/985f3645-f441-4948-ac1e-3abef801173d)
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/77f768d7-bebc-4c00-8262-bcab8e6ce417)
<br>
### Penambahan kode php pada file register
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/ab3fb73d-a084-4380-a2dd-c21a06483bc9)
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/91988d40-d3d9-46a0-98ec-cd67c2d2434e)
<br>
### Penambahan kode php pada file index
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/6e684327-f7f9-4b89-9c3d-b525a853de83)
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/598adc73-ad47-4156-9ee6-cb78373c8557)

## Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)

Bagian ini menjelaskan tentang tool yang digunakan untuk melakukan hosting pada website yang telah dibuat. Hosting dilakukan melalui https://id.000webhost.com/ dan dilakukan secara gratis. Hosting dilakukan dengan login akun terlebih dahulu, kemudian mengupload file-file komponen web ke dalam file manager 000webhost. Database yang digunakan juga perlu dibuat ulang pada 000webhost dan disesuaikan dengan kode yang telah dibuat agar saling terhubung. Jika sudah, maka website tersebut akan memberikan link hasil hosting web.

### Upload komponen web pada file manager
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/43197bd0-b4df-47f0-9483-da10993281d9)

### Pembuatan ulang database
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/ff7a294a-8a5f-44f1-89a2-e6a9fd2ca988)
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/c8986e1c-b10c-425b-85df-06bb528adbb0)

### Mendapatkan link hasil hosting
![image](https://github.com/Benedictus-Budhi-098/121140098_UAS_Pemweb/assets/146206806/9c193b2b-1fbf-4a0a-a633-19e340926715)

