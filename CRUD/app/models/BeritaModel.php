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
}
