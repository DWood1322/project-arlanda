Intruksi Cara Menjalankan & Menggunakan Mini-Project

1. Sudah Menginstall xampp

2. Masukan Folder "project" kedalam folder "\htdocs" yang berada didalam folder xampp
   (path : D:\xampp\htdocs\project)

3. Jalankan Xampp Control Panel lalu pencet "Start" pada bagian "Apache" dan "MySQL" 

4. Import file Database "db_project_arlanda" yang berada di dalam folder "project" ke MySQL phpmyadmin
   dengan cara ketik di Browser "localhost/phpmyadmin/"

5. Pilih Tab Import lalu pilih File Database yang ingin di Import

6. Masuk ke Terminal lalu masuk ke dalam path "mini-project" yang berada di dalam folder "project' dengan cara menggunakan Command "cd"
   ("cd C:" enter
    "cd xampp" enter
    "cd htdocs" enter
    "cd project" enter
    "cd mini-project" enter)
   Maka pathnya akan menjadi "C:\xampp\htdocs\Mini-Projec\CRUD-Project"
   Note : Jika Path Terminal berada di "C:\..." untuk keluar dari Directory tersebut menggunakan Command "cd.." lalu enter
   (contoh kasus : "D\Users\Nama" maka jika menggunakan "cd.." lalu enter akan menjad "D:\Users" lalu lakukan kembali Command "cd.."
   sampai tersisa "D:\" lalu langsung  ketik "C:" enter maka Path akan berubah menjadi "C:\"

7. Setelah Path sudah di "mini-project" ketikan "php artisan serve" lalu enter.

8. Tunggu sampai Link LocalHost muncul dan buka link tersebut di Browser

9. Setelah itu di Browser akan muncul tampilan Welcome dari Laravel, silahkan tambahkan "/project" pada URL di Browser tersebut

10. Dan setelah itu akan tampil Hasil dari Project 