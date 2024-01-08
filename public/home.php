<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    include '../public/layouts/header.php';
    include '../public/layouts/sidebar.php';
    include '../db/koneksi.php';


    $id = $_SESSION['idUser'];

?>
<?php
    error_reporting(0);
    switch ($_GET['page']) {
        default:

            if ($level === '0') {
                include "../public/dashboard.php";
            } elseif ($level === '1') {
                include "../public/dashboard-1.php";
            } elseif ($level === '2') {
                include "../public/dashboard-2.php";
            } elseif ($level === '3') {
                include "../public/dashboard-3.php";
            }
            break;

            /////////////////////////////////////////////// START ADMIN PAGE
            // USERS
        case "data_user";
            include "../pages/admin/user/data.php";
            break;
        case "tambah_user";
            include "../pages/admin/user/add.php";
            break;
        case "edit_user";
            include "../pages/admin/user/edit.php";
            break;
        case "hapus_user";
            include "../pages/admin/user/delete.php";
            break;
            /// JENIS KAPAL
        case "data_jenisKapal";
            include "../pages/admin/jenis-kapal/data.php";
            break;
        case "tambah_jenisKapal";
            include "../pages/admin/jenis-kapal/add.php";
            break;
        case "edit_jenisKapal";
            include "../pages/admin/jenis-kapal/edit.php";
            break;
        case "hapus_jenisKapal";
            include "../pages/admin/jenis-kapal/delete.php";
            break;
            /// Flag
        case "data_flag";
            include "../pages/admin/flag/data.php";
            break;
        case "tambah_flag";
            include "../pages/admin/flag/add.php";
            break;
        case "edit_flag";
            include "../pages/admin/flag/edit.php";
            break;
        case "hapus_flag";
            include "../pages/admin/flag/delete.php";
            break;
            /// Jenis Mesin
        case "data_jenisMesin";
            include "../pages/admin/jenis-mesin/data.php";
            break;
        case "tambah_jenisMesin";
            include "../pages/admin/jenis-mesin/add.php";
            break;
        case "edit_jenisMesin";
            include "../pages/admin/jenis-mesin/edit.php";
            break;
        case "hapus_jenisMesin";
            include "../pages/admin/jenis-mesin/delete.php";
            break;
            /// TUGBOAT
        case "data_tugboat";
            include "../pages/admin/tugboat/data.php";
            break;
        case "tambah_tugboat";
            include "../pages/admin/tugboat/add.php";
            break;
        case "edit_tugboat";
            include "../pages/admin/tugboat/edit.php";
            break;
        case "hapus_tugboat";
            include "../pages/admin/tugboat/delete.php";
            break;
        case "detail_tugboat";
            include "../pages/admin/tugboat/detail.php";
            break;
        case "laporan_tugboat";
            include "../pages/admin/tugboat/laporan.php";
            break;
            /// Jenis Sertifikat
        case "data_sertifikat";
            include "../pages/admin/jenis-sertifikat/data.php";
            break;
        case "tambah_sertifikat";
            include "../pages/admin/jenis-sertifikat/add.php";
            break;
        case "edit_sertifikat";
            include "../pages/admin/jenis-sertifikat/edit.php";
            break;
        case "hapus_sertifikat";
            include "../pages/admin/jenis-sertifikat/delete.php";
            break;
            /// Sertifikat TUGBOAT
        case "data_sertTugboat";
            include "../pages/admin/sertifikat-tugboat/data.php";
            break;
        case "tambah_sertTugboat";
            include "../pages/admin/sertifikat-tugboat/add.php";
            break;
        case "edit_sertTugboat";
            include "../pages/admin/sertifikat-tugboat/edit.php";
            break;
        case "hapus_sertTugboat";
            include "../pages/admin/sertifikat-tugboat/delete.php";
            break;
        case "file_tugboat";
            include "../pages/admin/sertifikat-tugboat/hapus_berkas.php";
            break;

            /// BARGE
        case "data_barge";
            include "../pages/admin/barge/data.php";
            break;
        case "tambah_barge";
            include "../pages/admin/barge/add.php";
            break;
        case "edit_barge";
            include "../pages/admin/barge/edit.php";
            break;
        case "hapus_barge";
            include "../pages/admin/barge/delete.php";
            break;
        case "detail_barge";
            include "../pages/admin/barge/detail.php";
            break;
        case "laporan_barge";
            include "../pages/admin/barge/laporan.php";
            break;

            /// Sertifikat BARGE
        case "data_sertBarge";
            include "../pages/admin/sertifikat-barge/data.php";
            break;
        case "tambah_sertBarge";
            include "../pages/admin/sertifikat-barge/add.php";
            break;
        case "edit_sertBarge";
            include "../pages/admin/sertifikat-barge/edit.php";
            break;
        case "hapus_sertBarge";
            include "../pages/admin/sertifikat-barge/delete.php";
            break;
        case "file_barge";
            include "../pages/admin/sertifikat-barge/hapus_berkas.php";
            break;

            /// SUPPORT
        case "data_support";
            include "../pages/admin/support/data.php";
            break;
        case "tambah_support";
            include "../pages/admin/support/add.php";
            break;
        case "edit_support";
            include "../pages/admin/support/edit.php";
            break;
        case "hapus_support";
            include "../pages/admin/support/delete.php";
            break;
        case "detail_support";
            include "../pages/admin/support/detail.php";
            break;
        case "laporan_support";
            include "../pages/admin/support/laporan.php";
            break;

            /// Sertifikat SUPPORT
        case "data_sertSupp";
            include "../pages/admin/sertifikat-support/data.php";
            break;
        case "tambah_sertSupp";
            include "../pages/admin/sertifikat-support/add.php";
            break;
        case "edit_sertSupp";
            include "../pages/admin/sertifikat-support/edit.php";
            break;
        case "hapus_sertSupp";
            include "../pages/admin/sertifikat-support/delete.php";
            break;
        case "file_supp";
            include "../pages/admin/sertifikat-support/hapus_berkas.php";
            break;
    }
?>

<?php
    include '../public/layouts/footer.php';
}
?>