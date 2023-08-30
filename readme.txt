Intruksi Cara Menjalankan & Menggunakan Mini-Project

1. Sudah Menginstall xampp

2. Masukan Folder "project" kedalam folder "\htdocs" yang berada didalam folder xampp
   (path : D:\xampp\htdocs\project)

3. Jalankan Xampp Control Panel lalu pencet "Start" pada bagian "Apache" dan "MySQL" 

4. masuk ke MySQL phpmyadmin dengan cara ketik di Browser "localhost/phpmyadmin/" atau link berikut : http://localhost/phpmyadmin/index.php


5. buat terlebih dahulu database dengan nama "db_project_arlanda" sesudah itu masuk ke bagian import

6. Pilih Tab Import lalu pilih File Database yang ingin di Import

7. Import file Database "db_project_arlanda" yang berada di dalam folder "project" 

8. Masuk ke Terminal lalu masuk ke dalam path "mini-project" yang berada di dalam folder "project' dengan cara menggunakan Command "cd"
   ("cd C:" enter
    "cd xampp" enter
    "cd htdocs" enter
    "cd project" enter
    "cd mini-project" enter)
   Maka pathnya akan menjadi "C:\xampp\htdocs\project\mini-project"
   Note : Jika Path Terminal berada di "C:\..." untuk keluar dari Directory tersebut menggunakan Command "cd.." lalu enter
   (contoh kasus : "D\Users\Nama" maka jika menggunakan "cd.." lalu enter akan menjad "D:\Users" lalu lakukan kembali Command "cd.."
   sampai tersisa "D:\" lalu langsung  ketik "C:" enter maka Path akan berubah menjadi "C:\")

9. Setelah Path sudah di "mini-project" ketikan "php artisan serve" lalu enter.

10. Tunggu sampai Link LocalHost muncul dan buka link tersebut di Browser

11. Setelah itu di Browser akan muncul tampilan Welcome dari Laravel, silahkan tambahkan "/project" pada URL di Browser tersebut

12. Dan setelah itu akan tampil Hasil dari Project 