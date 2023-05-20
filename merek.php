<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Merek.php');
include('classes/Template.php');

$merek = new Merek($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$merek->open();

$view = new Template('templates/skintabel.html');

$mainTitle = 'Merek';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Merek</th>
<th scope="row">Aksi</th>
</tr>';
$no = 1;
$formLabel = 'merek';

// Cari Merek
if (isset($_POST['btn-cari'])) {
    // Metode mencari data Merek
    $merek->searchMerek($_POST['cari']);
} else {
    // Metode menampilkan data Merek
    $merek->getMerek();
}

$data = null;
while ($row = $merek->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $row['nama_merek'] . '</td>
    <td style="font-size: 22px;">
        <a href="merek.php?id=' . $row['id_merek'] . '" title="Edit Data" ><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="merek.php?hapus=' . $row['id_merek'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

$btn = 'Submit';
$title = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($merek->updateMerek($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'merek.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'merek.php';
            </script>";
            }
        }

        $merek->getMerekById($id);
        $row = $merek->getResult();

        $dataUpdate = $row['nama_merek'];
        $btn = 'Simpan Perubahan';
        $title = 'Ubah';

        // Tambahkan kode berikut untuk mengganti nilai DATA_VAL_UPDATE pada modal form
        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
    else{
        if (isset($_POST['submit'])) {
            if ($merek->addMerek($_POST) > 0) {
                echo "<script>
                    alert('Data berhasil ditambah!');
                    document.location.href = 'merek.php';
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal ditambah!');
                    document.location.href = 'merek.php';
                </script>";
            }
        }
    
        $btn = 'Tambah';
        $title = 'Tambah';
    
        // Tambahkan kode berikut untuk mengganti nilai DATA_VAL_UPDATE pada modal form
        $view->replace('DATA_VAL_UPDATE', '');
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($merek->deleteMerek($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'merek.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'merek.php';
            </script>";
        }
    }
}

$merek->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
