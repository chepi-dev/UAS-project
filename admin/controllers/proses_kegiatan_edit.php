<?php
require_once '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama_kegiatan']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $jadwal = htmlspecialchars($_POST['jadwal']);

    // Ambil data lama untuk gambar
    $query_old = "SELECT gambar FROM kegiatan WHERE id = ?";
    $stmt_old = $conn->prepare($query_old);
    $stmt_old->bind_param("i", $id);
    $stmt_old->execute();
    $result_old = $stmt_old->get_result();
    $data_old = $result_old->fetch_assoc();
    $old_gambar = $data_old['gambar'];

    $gambar_baru = $old_gambar; // default tetap gambar lama

    // Cek apakah ada upload gambar baru
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $file_name = basename($_FILES['gambar']['name']);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($file_ext, $allowed)) {
            $new_file_name = uniqid() . "." . $file_ext;
            $upload_dir = "../../uploads/";
            $upload_file = $upload_dir . $new_file_name;

            if (move_uploaded_file($file_tmp, $upload_file)) {
                // Hapus file gambar lama jika ada
                if (!empty($old_gambar) && file_exists($upload_dir . $old_gambar)) {
                    unlink($upload_dir . $old_gambar);
                }
                $gambar_baru = $new_file_name;
            } else {
                echo "Gagal mengunggah gambar baru.";
                exit;
            }
        } else {
            echo "Format file gambar tidak diperbolehkan.";
            exit;
        }
    }

    // Update data kegiatan
    $query = "UPDATE kegiatan SET nama_kegiatan = ?, deskripsi = ?, jadwal = ?, gambar = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $nama, $deskripsi, $jadwal, $gambar_baru, $id);

    if ($stmt->execute()) {
        header("Location: ../dashboard.php?status=update_sukses");
        exit;
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
} else {
    echo "Akses tidak diizinkan.";
}