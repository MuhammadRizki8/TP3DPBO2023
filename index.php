<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Merek.php');
include('classes/Kategori.php');
include('classes/Barang.php');
include('classes/Template.php');

// buat instance barang -> ini pakai constructor dari DB (induknya class barang)
$listBarang = new Barang($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME); //ini variabel2 parameternya ambil dari config/db.php
// buka koneksi
$listBarang->open();

// inisialisasi Sort option
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'nama_barang'; // nilai Default sort by nama_barang
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC'; // nilai Default sorting order ASC

// Sort options
$sortLinks = array(
    'nama_barang' => 'Nama',
    'id_barang' => 'ID',
);

// buat sort link HTML
$sortHtml = '';
foreach ($sortLinks as $column => $label) {
    // tentukan order sortn=nya
    $nextOrder = ($sort_by === $column && $order === 'ASC') ? 'DESC' : 'ASC';

    // buat link ddengan order sorting sekarang dan display secara dinamik
    $sortHtml .= '<a href="?sort_by=' . $column . '&order=' . $nextOrder . '">' . $label . '</a>';
    if ($sort_by === $column) {
        $sortHtml .= ' (' . ($order === 'ASC' ? 'ASC' : 'DESC') . ')';
    }
    // tambahkan separator
    $sortHtml .= ' | ';
}
// hapus separator terakhir
$sortHtml = rtrim($sortHtml, ' | ');
$sortHtml .= '</p>';
// ambil data barang
$listBarang->getBarangJoin($sort_by, $order);

// Cari Barang
if (isset($_POST['btn-cari'])) {
    // Metode mencari data Barang
    $listBarang->searchBarang($_POST['cari']);
} else {
    // Method menampilkan data Barang
    $listBarang->getBarangJoin($sort_by, $order);
}

$data = null;

// Ambil data Barang
// Gabungkan dengan tag HTML
// Untuk di-passing ke skin/template
while ($row = $listBarang->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center container_card">' .
        '<div class="card pt-4 px-2 barang-thumbnail">
        <a href="detail.php?id=' . $row['id_barang'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['foto_barang'] . '" class="card-img-top " alt="' . $row['foto_barang'] . '">
            </div>
            <div class="card-body">
                <p class="card-text barang-nama my-0">' . $row['nama_barang'] . '</p>
                <p class="card-text merek-nama">' . $row['nama_merek'] . '</p>
                <p class="card-text kategori-nama my-0">' . $row['nama_kategori'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// Tutup koneksi
$listBarang->close();

// Buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_BARANG', $data);
// Add the following line after the above line
$home->replace('SORT_LINKS', $sortHtml);
$home->write();
