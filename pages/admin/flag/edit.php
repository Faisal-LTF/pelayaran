<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM flag WHERE idFlag = '$id'");
    $data = $query->fetch_array();



?>

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y ">
            <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Edit</span> Bendera</h4>
            <div class="col-12 text-end mb-3">
                <a href="?page=data_flag" class="btn btn-primary">Kembali</a>
            </div>
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Bendera</h5>
                            <small class="text-muted float-end"></small>
                        </div>
                        <div class="card-body">
                            <form data-toggle="validator" action="" method="POST" enctype="multipart/form-data">
                                <?php
                                if ($status) {
                                ?>

                                    <div class="alert alert-danger alert-dismissible">
                                        <button class="close" type="button" data-dismiss="alert" ariahidden="true">&times;
                                        </button>
                                        <h4><i class="icon fa fa-close">Gagal! </i></h4>
                                        <?php echo $status; ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Bendera</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-flag"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Bendera" name="namaFlag" aria-label="Bendera" aria-describedby="basic-icon-default-fullname2" value="<?= $data['namaFlag'] ?>" />
                                    </div>
                                </div>
                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>


    <?php
    if (isset($_POST['edit'])) {

        $namaFlag = $_POST['namaFlag'];



        $edit = $link->query("UPDATE flag SET 

namaFlag = '$namaFlag'

WHERE idFlag = '$id'");

        if ($edit) {
            echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Data berhasil di edit',
        customClass: {
            confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        }).then(function() {
        window.location.href = '?page=data_flag'; 
    });
</script>";
        } else {
            echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Data anda gagal di edit. Ulangi sekali lagi!',
        customClass: {
            confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        }).then(function() {
        window.location.href = '?page=edit_flag'; 
    });
</script>";
        }
    }
}




    ?>