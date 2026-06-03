<?php

require_once 'config/koneksi.php';

class BeritaModel
{
    private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function getAll()
    {
        $query = mysqli_query(
            $this->conn,
            "SELECT * FROM berita ORDER BY id DESC"
        );
        return $query;
    }

    public function insert(
        $judul,
        $deskripsi,
        $foto,
        $tanggal
    ) {
        $query = "INSERT INTO berita
        (judul,deskripsi,foto,tanggal)
        VALUES
        ('$judul','$deskripsi',
        '$foto','$tanggal')";
        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function getById($berita)
    {
        $query = mysqli_query(
            $this->conn,
            "SELECT * FROM berita
            WHERE id='$berita'"
              );
        return mysqli_fetch_assoc($query);
    }

public function update(
    $id,
    $judul,
    $deskripsi,
    $tanggal,
    $foto
) {
    $query = "UPDATE berita SET 
                judul='$judul', 
                deskripsi='$deskripsi', 
                tanggal='$tanggal', 
                foto='$foto' 
              WHERE id='$id'";

    return mysqli_query(
        $this->conn,
        $query
    );
}

}
