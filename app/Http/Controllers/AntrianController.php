<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        return view('nomor-antrian.index');
    }

    // pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
    public function getAntrian()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
            // panggil file "database.php" untuk koneksi ke database
            // require_once "../config/database.php";
          
            // ambil tanggal sekarang
            $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);
          
            // sql statement untuk menampilkan jumlah data dari tabel "tbl_antrian" berdasarkan "tanggal"
            $query = mysqli_query($mysqli, "SELECT count(id) as jumlah FROM tbl_antrian 
                                            WHERE tanggal='$tanggal'")
                                            or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
            // ambil data hasil query
            $data = mysqli_fetch_assoc($query);
            // buat variabel untuk menampilkan data
            $jumlah_antrian = $data['jumlah'];
          
            // tampilkan data
            echo number_format($jumlah_antrian, 0, '', '.');
          }
          return view('nomor-antrian.get_antrian');
    }
}
