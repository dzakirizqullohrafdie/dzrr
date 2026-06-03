<?php
require_once 'app/models/BeritaModel.php';
class BeritaController
{
    private $model;
    public function __construct()
    {
        $this->model = new BeritaModel();
    }
    public function index()
    {
        $berita = $this->model->getAll();
        include 'app/views/berita/index.php';
    }

    public function tambah()
    {
        include 'app/views/berita/tambah.php';
    }

    public function simpan()
    {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file(
            $tmp,
            'public/uploads/' . $foto
        );

        $this->model->insert(
            $judul,
            $deskripsi,
            $foto,
            $tanggal
        );
        header('Location:index.php');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $berita = $this->model->getById($id);

        include 'app/views/berita/edit.php';
    }
    
    public function update()
{
    $id        = $_POST['id'];
    $judul     = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal   = $_POST['tanggal'];
    $foto      = $_FILES['foto']['name'];
    $tmp       = $_FILES['foto']['tmp_name'];

    if ($foto != '') {
        move_uploaded_file(
            $tmp,
            'public/uploads/' . $foto
        );
    } else {
        $data = $this->model->getById($id);
        $foto = $data['foto'];
    }
    
    $this->model->update(
        $id,
        $judul,
        $deskripsi,
        $tanggal,
        $foto
    );
    header('Location:index.php');
}

}
