<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Merek.php');
include('classes/Kategori.php');
include('classes/Barang.php');
include('classes/Template.php');

$barang = new Barang($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$merek = new Merek($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$kategori = new Kategori($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

$barang->open();
$merek->open();
$kategori->open();

$merek->getMerek();
$kategori->getKategori();

$mrks = [];
while ($m = $merek->getResult()) {
    $mrks[] = $m;
}

$ktgs = [];
while ($k = $kategori->getResult()) {
    $ktgs[] = $k;
}

$dataMerek = null;
$dataKategori = null;

if (isset($_POST['btn-save'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id > 0) {
            if ($barang->updateData($id, $_POST, $_FILES) > 0) {
                echo "<script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal diubah!');
                    document.location.href = 'index.php';
                </script>";
            }
        }
    } else {
        if ($barang->addData($_POST, $_FILES) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'index.php';
            </script>";
        }
    }
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($barang->deleteData($id) > 0) {
            echo "
					<script>
						alert('Data berhasil dihapus!');
						document.location.href = 'index.php';
					</script>
				";
        } else {
            echo "
					<script>
						alert('Data gagal dihapus!');
						document.location.href = 'index.php';
					</script>
				";
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $barang->getBarangById($id);
        $row = $barang->getResult();

        $title = 'Ubah';
        $foto = $row['foto_barang'];
        $nama = $row['nama_barang'];
        $harga = $row['harga'];
        $stok = $row['stok'];
        $id_merek = $row['id_merek'];
        $id_kategori = $row['id_kategori'];
        $deskripsi = $row['deskripsi'];
    }
} else {
    $title = 'Tambah';
    $foto = 'default.jpg';
    $nama = '';
    $harga = '';
    $stok = '';
    $id_merek = '';
    $id_kategori = '';
    $deskripsi = '';
}

foreach ($mrks as $m) {
    $selected = ($m['id_merek'] == $id_merek) ? 'selected' : '';
    $dataMerek .= '<option value="' . $m['id_merek'] . '" ' . $selected . '>' . $m['nama_merek'] . '</option>';
}

foreach ($ktgs as $k) {
    $selected = ($k['id_kategori'] == $id_kategori) ? 'selected' : '';
    $dataKategori .= '<option value="' . $k['id_kategori'] . '" ' . $selected . '>' . $k['nama_kategori'] . '</option>';
}

$barang->close();
$merek->close();
$kategori->close();

$tambah = new Template('templates/skinform.html');
$tambah->replace('DATA_TITLE', $title);
$tambah->replace('DATA_NAMA', $nama);
$tambah->replace('DATA_HARGA', $harga);
$tambah->replace('DATA_STOK', $stok);
$tambah->replace('DATA_MEREK', $dataMerek);
$tambah->replace('DATA_KATEGORI', $dataKategori);
$tambah->replace('DATA_FOTO', $foto);
$tambah->replace('DATA_DESKRIPSI', $deskripsi);
$tambah->write();
