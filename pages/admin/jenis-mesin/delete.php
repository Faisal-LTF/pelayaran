<script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>


<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM jenis_mesin WHERE idJenisMesin = '$id' ");
if ($query) {
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil dihapus',
                customClass: {
                    confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                window.location.href = '?page=data_jenisMesin'; 
            });
        </script>";
} else {

    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Data anda gagal dihapus. Ulangi sekali lagi',
                customClass: {
                    confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                window.location.href = '?page=data_jenisMesin'; 
            });
        </script>";
}
