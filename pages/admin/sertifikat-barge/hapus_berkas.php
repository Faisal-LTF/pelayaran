<?php
// Bagian upload file dan penanganan berkas_lama
// $uploadedFile = $_FILES['berkas'];
$berkas_lama = $data['berkas'];

if ($uploadedFile['error'] === 4) {
    // Tidak ada berkas yang diupload, biarkan berkas_lama tetap
    $berkas = $berkas_lama;
} else {
    // Ada berkas yang diupload, proses dan simpan berkas baru
    $uploadedFilePath = upload($uploadedFile, '../files/file-sertifikat-tugboat/');

    if ($uploadedFilePath) {
        $berkas = $uploadedFilePath;

        // Hapus berkas lama dari database
        if (!empty($berkas_lama)) {
            hapusBerkasLama($berkas_lama);
        }
    } else {
        echo "Gagal mengunggah file.";
        exit;
    }
}

// ... Lanjutan dari kode Anda ...

function hapusBerkasLama($berkasPath)
{
    // Tambahkan logika di sini untuk menghapus berkas lama dari database
    // Misalnya, Anda dapat menjalankan query DELETE pada tabel untuk menghapus referensi berkas lama
    global $link; // Pastikan $link sudah ada di dalam scope

    // Gantilah 'nama_tabel' dan 'kolom_berkas' dengan nama tabel dan kolom berkas pada database Anda
    $queryDelete = "UPDATE sertifikat_tugboat SET berkas = NULL WHERE berkas = '$berkasPath'";

    mysqli_query($link, $queryDelete);
}
