<?php

class Barang extends DB
{
    function getBarangJoin($sort_by, $order)
    {
        $query = "SELECT * FROM barang 
                  JOIN merek ON barang.id_merek=merek.id_merek 
                  JOIN kategori ON barang.id_kategori=kategori.id_kategori 
                  ORDER BY $sort_by $order";
    
        return $this->execute($query);
    }
    
    function getBarang()
    {
        $query = "SELECT * FROM barang";
        return $this->execute($query);
    }

    function getBarangById($id)
    {
        $query = "SELECT * FROM barang 
                  JOIN merek ON barang.id_merek=merek.id_merek 
                  JOIN kategori ON barang.id_kategori=kategori.id_kategori 
                  WHERE id_barang=$id";
        return $this->execute($query);
    }

    function searchBarang($keyword)
    {
        $query = "SELECT * FROM barang 
                  JOIN merek ON barang.id_merek=merek.id_merek 
                  JOIN kategori ON barang.id_kategori=kategori.id_kategori 
                  WHERE nama_barang LIKE '%$keyword%'"; // Filter based on barang_nama containing the keyword

        return $this->execute($query);
    }

    function addData($data, $file){
        $foto = $file['foto']['name'];
        $temp_foto = $file['foto']['tmp_name'];
        $folder = 'assets/images/' . $foto;
        $isMoved = move_uploaded_file($temp_foto, $folder);
        if (!$isMoved) {
            $foto = 'default.jpg';
        }
        $nama = $data['nama'];
        $harga = $data['harga'];
        $stok = $data['stok'];
        $id_merek = $data['merek'];
        $id_kategori = $data['kategori'];
        $deskripsi=$data['deskripsi'];

        $query = "INSERT INTO barang (nama_barang, harga, stok, id_merek, id_kategori, foto_barang, deskripsi) 
                VALUES ('$nama', $harga, $stok, $id_merek, $id_kategori, '$foto', '$deskripsi')";

        return $this->executeAffected($query);
    }

    function updateData($id, $data, $file)
    {
        $foto = $file['foto']['name'];
        $temp_foto = $file['foto']['tmp_name'];
        if (!empty($foto) && !empty($temp_foto)) {
            $folder = 'assets/images/' . $foto;
            $isMoved = move_uploaded_file($temp_foto, $folder);
            if (!$isMoved) {
                $foto = 'default.jpg';
            }
        } else {
            $foto = 'default.jpg';
        }
        $nama = $data['nama'];
        $harga = $data['harga'];
        $stok = $data['stok'];
        $id_merek = $data['merek'];
        $id_kategori = $data['kategori'];
        $deskripsi=$data['deskripsi'];

        $query = "UPDATE barang SET
                nama_barang='$nama',
                harga=$harga,
                stok=$stok,
                id_merek=$id_merek,
                id_kategori=$id_kategori,
                foto_barang='$foto',
                deskripsi='$deskripsi'
                WHERE id_barang=$id";

        return $this->executeAffected($query);
    }


    function deleteData($id)
    {
        $query = "DELETE FROM barang WHERE id_barang=$id";
        return $this->executeAffected($query);
    }
}
