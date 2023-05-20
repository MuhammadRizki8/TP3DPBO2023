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

// Sort options
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'nama_barang'; // Default sort by nama_barang
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC'; // Default sorting order ASC

// Sort options
$sortLinks = array(
    'nama_barang' => 'Nama',
    'id_barang' => 'ID',
);

// Generate sort links HTML
$sortHtml = '';
foreach ($sortLinks as $column => $label) {
    // Determine the sorting order for the link
    $nextOrder = ($sort_by === $column && $order === 'ASC') ? 'DESC' : 'ASC';

    // Generate the link with the current sorting order and display the current order dynamically
    $sortHtml .= '<a href="?sort_by=' . $column . '&order=' . $nextOrder . '">' . $label . '</a>';

    // Display the current sorting order dynamically
    if ($sort_by === $column) {
        $sortHtml .= ' (' . ($order === 'ASC' ? 'ASC' : 'DESC') . ')';
    }

    // Add a separator between the links
    $sortHtml .= ' | ';
}

// Remove the last separator
$sortHtml = rtrim($sortHtml, ' | ');
$sortHtml .= '</p>';

// Get the sorted barang data
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
