<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT ss.*, js.namaSertifikat, s.namaKapal   
    FROM sertifikat_support ss
    JOIN jenis_sertifikat js ON ss.idJenisSertifikat = js.idJenisSertifikat
    JOIN support s ON ss.idSupport = s.idSupport WHERE idSertifikatSupport = '$id'");
    $data = $query->fetch_array();

?>

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y ">
            <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Edit</span> Sertifikat Kapal</h4>
            <div class="col-12 text-end mb-3">
                <a href="?page=data_sertSupp" class="btn btn-primary">Kembali</a>
            </div>
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Support</h5>
                            <small class="text-muted float-end"></small>
                        </div>
                        <div class="card-body">
                            <form id="myForm" data-toggle="validator" action="" method="POST" enctype="multipart/form-data">
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
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="multicol-ships">Fleet</label>
                                        <div class="input-groupp input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-engine"></i></span>
                                            <select id="multicol-ships" class="select2 form-select" data-allow-clear="true" name="idSupport" required>
                                                <option value="">Select</option>
                                                <?php $q = $link->query("SELECT * FROM support ");
                                                while ($d =
                                                    $q->fetch_array()
                                                ) {
                                                    if ($d['idSupport'] == $data['idSupport']) { ?>
                                                        <option value="<?= $d['idSupport']; ?>" selected="<?= $d['idSupport']; ?>">
                                                            <?= $d['namaKapal'] ?>
                                                        </option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $d['idSupport'] ?>">
                                                            <?= $d['namaKapal'] ?>
                                                        </option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="multicol-engine">Jenis Sertifikat</label>
                                        <div class="input-groupp input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-engine"></i></span>
                                            <select id="multicol-engine" class="select2 form-select" data-allow-clear="true" name="idJenisSertifikat" required>
                                                <option value="">Select</option>
                                                <?php $q = $link->query("SELECT * FROM jenis_sertifikat ");
                                                while ($d =
                                                    $q->fetch_array()
                                                ) {
                                                    if ($d['idJenisSertifikat'] == $data['idJenisSertifikat']) { ?>
                                                        <option value="<?= $d['idJenisSertifikat']; ?>" selected="<?= $d['idJenisSertifikat']; ?>">
                                                            <?= $d['namaSertifikat'] ?>
                                                        </option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $d['idJenisSertifikat'] ?>">
                                                            <?= $d['namaSertifikat'] ?>
                                                        </option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5 col-md-12">
                                        <label class="form-label" for="file">File</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-file-filled"></i></span>
                                            <input type="file" class="form-control" id="file" placeholder="File" name="berkas" aria-label="File" aria-describedby="basic-icon-default-fullname2" />
                                        </div>
                                        <?php
                                        $berkas_lama = $data['berkas'];
                                        $fileName = !empty($berkas_lama) ? basename($berkas_lama) : '';
                                        ?>
                                        <div class="mt-2">
                                            <?php if (!empty($fileName)) : ?>
                                                <strong>File Saat Ini:</strong> <?= $fileName ?>
                                                <!-- <a href="javascript:void(0)" class="text-danger" onclick="deleteFile()"><i class="ti ti-x"></i></a> -->
                                                <input name="berkas_lama" type="hidden" class="form-control input-sm" value="<?= $berkas_lama ?>">
                                                <input name="deleteFile" type="hidden" value="1">
                                            <?php else : ?>
                                                <span>Tidak ada file yang diunggah</span>
                                                <input name="berkas_lama" type="hidden" class="form-control input-sm" value="">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="mb-4 col-md-12">
                                        <label class="switch switch-success">
                                            <input type="checkbox" class="switch-input" name="permanent" id="switchPermanent" />
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="ti ti-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="ti ti-x"></i>
                                                </span>
                                            </span>
                                            <span class="switch-label">Permanent</span>
                                        </label>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="tglTerbit">Tanggal Terbit</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-number"></i></span>
                                            <input type="date" class="form-control" id="tglTerbit" placeholder="Tanggal Terbit" name="tglTerbit" aria-label="Tanggal Terbit" aria-describedby="basic-icon-default-fullname2" value="<?= $data['tglTerbit'] ?>" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="tglExp">Tanggal Expired</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-number"></i></span>
                                            <input type="date" class="form-control" id="tglExp" placeholder="Tanggal Expired" name="tglExp" aria-label="Tanggal Expired" aria-describedby="basic-icon-default-fullname2" value="<?= $data['tglExp'] ?>" required />
                                        </div>
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inisialisasi nilai awal switch
                var isPermanent = <?php echo $data['permanent'] ? 'true' : 'false'; ?>;

                // Set status switch berdasarkan nilai dari database
                $('#switchPermanent').prop('checked', isPermanent);

                // Inisialisasi status awal tanggal dan nilai tanggal sebelumnya
                var isSwitchChecked = $('#switchPermanent').is(':checked');
                var prevTglTerbit = $('#tglTerbit').val();
                var prevTglExp = $('#tglExp').val();
                $('#tglTerbit, #tglExp').prop('disabled', isSwitchChecked);

                // ...

                // Lanjutkan dengan skrip switch seperti yang telah kamu definisikan sebelumnya
                $('#tglTerbit, #tglExp').change(function() {
                    if (!isSwitchChecked) {
                        // ...
                    }
                });

                $('#switchPermanent').change(function() {
                    isSwitchChecked = $(this).is(':checked');
                    $('#tglTerbit, #tglExp').prop('disabled', isSwitchChecked);

                    if (isSwitchChecked) {
                        // Simpan nilai tanggal sebelumnya
                        prevTglTerbit = $('#tglTerbit').val();
                        prevTglExp = $('#tglExp').val();

                        // Hapus nilai tanggal pada mode "permanent"
                        $('#tglTerbit, #tglExp').val('');
                    } else {
                        // Kembalikan nilai tanggal jika switch kembali ke mode "non-permanent"
                        $('#tglTerbit').val(prevTglTerbit);
                        $('#tglExp').val(prevTglExp);
                    }
                });
            });
        </script>
        <script>
            function deleteFile() {
                console.log("Fungsi deleteFile dipanggil");
                var confirmDelete = confirm("Apakah Anda yakin ingin menghapus file?");
                if (confirmDelete) {
                    // Use AJAX to submit the form and handle the file deletion
                    $.ajax({
                        type: "POST",
                        url: "edit.php?id=<?php echo $id; ?>",
                        // Replace with your actual script name
                        data: {
                            deleteFile: 1
                        },
                        success: function(response) {
                            // Handle the response, e.g., display a success message
                            var result = JSON.parse(response);
                            if (result.status === 'success') {
                                alert(result.message);
                                // Optionally, refresh the page or perform other actions
                                location.reload();
                            } else {
                                alert(result.message);
                            }
                        },
                        error: function() {
                            // Handle the error, e.g., display an error message
                            alert("Error deleting file.");
                        }
                    });
                }
            }
        </script>


    <?php
    if (isset($_POST['edit'])) {
        $idSertifikatSupport = $_GET['id'];
        $idJenisSertifikat = $_POST['idJenisSertifikat'];
        $tglTerbit = $_POST['tglTerbit'];
        $tglExp = $_POST['tglExp'];
        $permanent = isset($_POST['permanent']) ? 1 : 0;

        $uploadedFile = $_FILES['berkas'];
        $berkas_lama = $_POST['berkas_lama'];

        if ($uploadedFile['error'] === 4) {
            $berkas = $berkas_lama;
        } else {
            $uploadedFilePath = upload($uploadedFile, '../files/file-sertifikat-support/');
            if ($uploadedFilePath) {
                $berkas = $uploadedFilePath;
                $berkas_lama = NULL;
            } else {
                echo "Gagal mengunggah file.";
                exit;
            }
        }
        // Pastikan $link adalah objek koneksi database yang valid
        if ($link) {
            $stmt = $link->prepare("UPDATE sertifikat_support SET idJenisSertifikat = ?, tglTerbit = ?, tglExp = ?, permanent = ?, berkas = ? WHERE idSertifikatSupport = ?");

            if ($stmt) {
                $stmt->bind_param("issssi", $idJenisSertifikat, $tglTerbit, $tglExp, $permanent, $berkas, $idSertifikatSupport);

                $simpan = $stmt->execute();

                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error: ' . $stmt->error;
                }

                $stmt->close();
            } else {
                echo 'error: ' . $link->error;
            }
        } else {
            echo 'error: Database connection not available.';
        }


        if ($simpan) {
            echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Data berhasil di edit',
        customClass: {
            confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        }).then(function() {
        window.location.href = '?page=data_sertSupp'; 
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
        window.location.href = '?page=edit_sertSupp'; 
    });
</script>";
        }
    }
}


function upload($file, $targetDir)
{
    // Mendapatkan nama file asli
    $fileName = basename($file['name']);

    // Mendapatkan path file tujuan
    $targetPath = $targetDir . $fileName;

    // Mendapatkan ekstensi file
    $fileExtension = pathinfo($targetPath, PATHINFO_EXTENSION);

    // Daftar ekstensi file yang diperbolehkan
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf');

    // Cek apakah ekstensi file valid
    if (in_array($fileExtension, $allowedExtensions)) {
        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Jika berhasil diunggah, kembalikan path file
            return $targetPath;
        } else {
            // Jika gagal mengunggah
            return false;
        }
    } else {
        // Jika ekstensi file tidak valid
        return false;
    }
}

    ?>