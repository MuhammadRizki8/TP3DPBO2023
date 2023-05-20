# TP2DPBO2023
#### Saya Muhammad Rizki NIM 2107922 mengerjakan soal TP 2 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

1. Penjelasan Program
- User ->

  Kelas "user" memiliki tiga atribut yaitu "nik", "nama", dan "foto" dengan tipe data String. Kelas ini memiliki tiga method yaitu getter dan setter untuk masing-masing atribut, dan constructor default. Getter dan setter digunakan untuk mengambil dan mengubah nilai dari atribut, sedangkan constructor default digunakan untuk menginisialisasi objek dari kelas "user".
- Catatan ->

  Atribut pada class catatan terdiri dari id_catatan (int), tanggal (String), lokasi (String), deskripsi (String), foto_lokasi (String), nik (String), dan nama (String). Sedangkan method pada class catatan hanya terdapat method getter dan setter untuk setiap atribut.
- Login ->

  - Atribut:
    1) stat: variabel bertipe PreparedStatement untuk mengeksekusi query SQL pada database
    2) rs: variabel bertipe ResultSet untuk menyimpan hasil eksekusi query SQL
    3) db: variabel bertipe dbConnection untuk melakukan koneksi dengan database
    4) user : represenrtasi user
  - Method:
    1) initComponents(): method untuk menginisialisasi komponen-komponen pada user interface (UI)
    2) login(): constructor untuk membuat objek dari class login dan memanggil method initComponents()
  - button/event    
    1) btn_regisActionPerformed digunakan untuk mengalihkan ke halaman registrasi dengan membuat objek Registrasi dan mengatur visibilitasnya.
    2) btn_masukActionPerformed digunakan untuk melakukan proses login dengan mengambil input NIK dan Nama dari user, kemudian mencocokkannya dengan data di database. Jika akun ditemukan, method akan mengambil data foto dari database dan memasukkannya ke objek menu_utama, yang kemudian akan ditampilkan ke user. Jika akun tidak ditemukan, akan muncul pesan peringatan.

    
  pada halaman login terdapat tombol registrasi untuk membuat akun.proses tidak akan bisa berlanjut jika user memasukan nama dan nik yang tidak benar
  
- Registrasi ->

  - Atribut:
    1) stat: variabel bertipe PreparedStatement untuk mengeksekusi query SQL pada database
    2) rs: variabel bertipe ResultSet untuk menyimpan hasil eksekusi query SQL
    3) db: variabel bertipe dbConnection untuk melakukan koneksi dengan database
    4) user : represenrtasi user
  - Method:
    1) initComponents(): method untuk menginisialisasi komponen-komponen pada user interface (UI)
    2) login(): constructor untuk membuat objek dari class login dan memanggil method initComponents()
  - button/event
    1) btn_upload_fotoActionPerformed akan memunculkan dialog untuk memilih file foto, menampilkan foto yang dipilih pada label di GUI, dan menyimpan path file foto di dalam atribut filename dari objek this.
    2) btn_daftarActionPerformed akan membuat folder baru dengan nama "upload" di dalam folder project jika belum ada, meng-copy file foto yang dipilih ke dalam folder tersebut, memasukkan data akun (NIK, Nama, path file foto) ke dalam database, menampilkan pesan sukses, dan memindahkan tampilan GUI ke halaman login.
    3) btn_cancelActionPerformed akan mengarahkan tampilan GUI kembali ke halaman login.
    
- menu_utama ->

  - Atribut:
    1) PreparedStatement stat: untuk menyimpan prepared statement yang akan dijalankan di database.
    2) ResultSet rs: untuk menyimpan hasil dari eksekusi query yang dijalankan di database.
    3) dbConnection db: objek dbConnection yang digunakan untuk menghubungkan aplikasi ke database.
    4) String nik, nama, foto: untuk menyimpan informasi user seperti nik, nama, dan foto profil.
    5) user u: objek user yang digunakan untuk menyimpan informasi user.
    6) String filename: untuk menyimpan nama file foto profil.
    7) int id_catatan: untuk menyimpan id dari catatan yang sedang dipilih.
  - Method:
    1) setNik(String nik), setNama(String nama), setFoto(String foto): digunakan untuk mengeset atribut nik, nama, dan foto profil pada objek menu_utama.
    2) setIdCatatan(int id_catatan): digunakan untuk mengeset atribut id_catatan pada objek menu_utama.
    3) refreshFoto(): digunakan untuk menampilkan foto profil pada label yang sudah ditentukan dan mengupdate panel_data pada halaman utama.
    4) setPanel(String urutan): digunakan untuk menampilkan catatan pada panel_data sesuai dengan urutan yang diinputkan.
    5) clear_form_input(): digunakan untuk mengosongkan form input yang digunakan untuk membuat atau mengedit catatan.
    6) setUpdate(String tanggal, String lokasi, String deskripsi, String foto_lokasi, String idstr): digunakan untuk mengeset form input dengan informasi catatan yang dipilih untuk diedit.
    7) setSelectedTab(int index): digunakan untuk mengeset tab yang sedang dipilih pada jTabbedPane1.
  - button/event
    1) btn_submit1ActionPerformed(): method untuk menangani event saat tombol submit ditekan. Mengambil data dari form dan menyimpannya ke database.
    2) btn_pilih_fotoActionPerformed(): method untuk menangani event saat tombol pilih foto ditekan. Memilih file foto yang akan diupload dan menampilkannya di label.
    3) btn_addActionPerformed(): method untuk menangani event saat tombol add ditekan. Menampilkan form untuk menambahkan catatan baru.
    4) btn_urutkanActionPerformed(): method untuk menangani event saat tombol urutkan ditekan. Menampilkan catatan berdasarkan urutan tanggal yang dipilih.
    5) btn_log_outActionPerformed(): method untuk menangani event saat tombol logout ditekan. Menampilkan konfirmasi dialog dan melakukan proses logout jika user memilih Yes.
    
 - Card ->

  - Atribut:
    1) dbConnection db: objek dbConnection yang digunakan untuk menghubungkan aplikasi ke database.
    2) path: variabel untuk menyimpan path foto lokasi.
    3) tgl: variabel untuk menyimpan tanggal.
    4) lks: variabel untuk menyimpan lokasi.
    5) dsk: variabel untuk menyimpan deskripsi.
    6) idStr: variabel untuk menyimpan id dalam bentuk string.
    7) mu: variabel untuk menyimpan objek menu_utama.
  - Method:
    1) initComponents(): method yang secara otomatis dibuat oleh NetBeans IDE ketika kita membuat form. Method ini digunakan untuk menginisialisasi komponen-komponen pada form.
  - button/event
    1) btn_ubahActionPerformed(): method yang dipanggil ketika tombol "Ubah" ditekan pada Card. Method ini mengambil objek menu_utama, memanggil method setUpdate untuk menampilkan data pada form update, dan memilih tab form update pada menu_utama.
    2) btn_hapusActionPerformed(): method yang dipanggil ketika tombol "Hapus" ditekan pada Card. Method ini melakukan operasi hapus data pada database, menghapus file gambar jika ada, menampilkan pesan berhasil atau gagal, dan memanggil method setPanel pada menu_utama untuk menampilkan ulang panel.
    
 - dbConnection ->

  - Atribut:
    1) stmt: sebuah objek Statement yang digunakan untuk melakukan query ke database.
    2) conn: sebuah objek Connection yang merepresentasikan koneksi ke database.
  - Method:
    1)connect(): sebuah method private yang digunakan untuk melakukan koneksi ke database dengan menggunakan alamat, username, dan password yang diberikan sebagai parameter.
    2) selectQuery(): sebuah method public yang digunakan untuk menjalankan query SELECT dan mengembalikan objek ResultSet yang berisi hasil query.
    3) updateQuery(): sebuah method public yang digunakan untuk menjalankan query UPDATE dan mengembalikan jumlah baris yang terpengaruh oleh query.
    4) getStatement(): sebuah method public yang mengembalikan objek Statement untuk digunakan oleh kelas lain dalam menjalankan query.
    5) getCon(): sebuah method public yang mengembalikan objek Connection yang merepresentasikan koneksi ke database, untuk digunakan oleh kelas lain dalam menjalankan query.

--------------------------------------------------------------------------
2 .UML & ERD database

![TP2 drawio](https://user-images.githubusercontent.com/100481579/231523210-75b061cd-5772-4eac-a762-eaefcec92084.png)
![image](https://user-images.githubusercontent.com/100481579/231527548-064897ed-a116-4251-b299-df19af96ca98.png)

--------------------------------------------------------------------------
3 . Dokumentasi(untuk lengkapnya ada di folder "Hasil"!)

![2](https://user-images.githubusercontent.com/100481579/231527717-e8041b95-8b48-41dc-9975-58f3ed02d3ab.png)


![4](https://user-images.githubusercontent.com/100481579/231527750-521becf4-30a7-4ca0-aea7-d4a0681c3d09.png)

![5](https://user-images.githubusercontent.com/100481579/231527804-0b4e72fb-b725-4a6a-ad38-59ed9540d9f8.png)

![14](https://user-images.githubusercontent.com/100481579/231527858-edb38f87-6d6d-41b7-ba2d-a229dd5637f1.png)

![13](https://user-images.githubusercontent.com/100481579/231527898-4555a678-4a35-4094-9c7d-4ebca9aad889.png)


--------------------------------------------------------------------------
4 . Akun Testing
nama : Ajat sang Petualang
NIK : 12345
