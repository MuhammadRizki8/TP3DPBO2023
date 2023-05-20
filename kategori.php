<?php
include('config/db.php');
include('classes/DB.php');
include('classes/Kategori.php');
include('classes/Template.php');

$kategori = new Kategori($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$kategori->open();

$view = new Template('templates/skintabel.html');

$mainTitle = 'Kategori';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Kategori</th>
<th scope="row">Aksi</th>
</tr>';
$no = 1;
$formLabel = 'kategori';

// Cari Kategori
if (isset($_POST['btn-cari'])) {
    // Metode mencari data Kategori
    $kategori->searchKategori($_POST['cari']);
} else {
    // Metode menampilkan data Kategori
    $kategori->getKategori();
}

$data = null;
while ($row = $kategori->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $row['nama_kategori'] . '</td>
    <td style="font-size: 22px;">
        <a href="kategori.php?id=' . $row['id_kategori'] . '" title="Edit Data" ><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="kategori.php?hapus=' . $row['id_kategori'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
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
            if ($kategori->updateKategori($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'kategori.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'kategori.php';
            </script>";
            }
        }

        $kategori->getKategoriById($id);
        $row = $kategori->getResult();

        $dataUpdate = $row['nama_kategori'];
        $btn = 'Simpan Perubahan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
    else{
        if (isset($_POST['submit'])) {
            if ($kategori->addKategori($_POST) > 0) {
                echo "<script>
                    alert('Data berhasil ditambah!');
                    document.location.href = 'kategori.php';
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal ditambah!');
                    document.location.href = 'kategori.php';
                </script>";
            }
        }
    
        $btn = 'Tambah';
        $title = 'Tambah';
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($kategori->deleteKategori($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'kategori.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'kategori.php';
            </script>";
        }
    }
}

$kategori->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
