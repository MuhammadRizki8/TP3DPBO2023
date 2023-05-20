### Saya Muhammad Rizki NIM 2107922 mengerjakan TP3 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
-----------------------------------------------------------------------------------
# Alur & Fitur
1. Halaman Utama (Home):
    * Menampilkan katalog produk fashion dalam bentuk etalase.
    * Setiap produk ditampilkan dengan foto, nama produk, merek, dan kategori produk.
    * Terdapat pilihan untuk mengurutkan produk berdasarkan nama atau ID, serta opsi untuk mengatur urutan secara ascending (naik) atau descending (turun).
2. Halaman Detail Produk:
    * Ketika salah satu produk di etalase diklik, pengguna akan diarahkan ke halaman detail produk.
    * Halaman ini menampilkan semua informasi terkait produk, termasuk gambar, nama, merek, kategori, dan deskripsi produk.
    * Terdapat tombol untuk menghapus dan mengedit data produk.
3. Navbar:
    * Navbar memiliki beberapa bagian, salah satunya adalah "Tambah Barang".
    * Ketika pengguna mengklik "Tambah Barang", halaman akan menampilkan form untuk menambahkan data barang.
    * Form ini juga dapat berubah menjadi form untuk mengedit data barang jika tombol edit di halaman detail produk diklik.
4. Halaman Merek dan Kategori:
    * Halaman merek dan kategori menggunakan template yang sama.
    * Terdapat juga bagian tabel data yang menampilkan daftar merek atau kategori beserta tombol aksi untuk mengedit atau menghapus data.
    * Terdapat fitur pencarian merek dan kategori.

-----------------------------------------------------------------------------------
# Desain
![image](https://github.com/MuhammadRizki8/TP3DPBO2023/assets/100481579/ba2b8228-f689-4c6e-a960-6d711b09c438)
- DB (Database Connection):<br />
Kelas DB digunakan untuk mengatur koneksi ke database. Ini termasuk metode untuk membuka dan menutup koneksi, serta metode untuk menjalankan query SQL.

- Template:<br />
Kelas Template digunakan untuk mengelola template HTML. Ini memungkinkan penggantian placeholder dengan nilai yang dinamis. Dengan menggunakan kelas Template, Anda dapat membuat tampilan yang terpisah dari logika bisnis, yang memudahkan perawatan dan pengembangan.

- Barang:<br />
Kelas Barang berfungsi untuk melakukan operasi terkait data barang, seperti menambah, mengubah, dan menghapus data barang dari database. Kelas ini juga dapat mengambil data barang dari database berdasarkan ID atau mengambil semua data barang.

- Merek:<br />
Kelas Merek digunakan untuk mengelola merek-merek barang. Ini termasuk operasi seperti menambah merek baru, mengubah merek, menghapus merek, dan mengambil daftar merek dari database.

- Kategori:<br />
Kelas Kategori digunakan untuk mengelola kategori-kategori barang. Ini termasuk operasi seperti menambah kategori baru, mengubah kategori, menghapus kategori, dan mengambil daftar kategori dari database.<br />

Kelas-kelas ini memisahkan logika bisnis dari tampilan dan menyediakan metode yang diperlukan untuk berinteraksi dengan database. Dengan memisahkan fungsionalitas ke dalam kelas-kelas ini, kode menjadi lebih terstruktur, mudah dipelihara, dan lebih modular.

-----------------------------------------------------------------------------------
# Dokumentasi
### Video 
https://youtu.be/guefUpfjKxM

### Foto
![image](https://github.com/MuhammadRizki8/TP3DPBO2023/assets/100481579/9073c6ea-f960-43d4-b35d-ebea0a8f6afa)
![image](https://github.com/MuhammadRizki8/TP3DPBO2023/assets/100481579/c780e50d-9bc8-44f4-85cd-f6ebe49eb398)
![image](https://github.com/MuhammadRizki8/TP3DPBO2023/assets/100481579/d0e8bc05-9861-49de-8f9f-448193b75e6c)
