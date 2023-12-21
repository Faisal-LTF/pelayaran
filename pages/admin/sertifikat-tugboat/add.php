<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

?>

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y ">
            <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Tambah</span> Sertifikat Tugboat</h4>
            <div class="col-12 text-end mb-3">
                <a href="?page=data_sertTugboat" class="btn btn-primary">Kembali</a>
            </div>
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Tugboat</h5>
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
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="multicol-ships">Fleet</label>
                                        <div class="input-groupp input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-ship"></i></span>
                                            <select id="multicol-ships" class="select2 form-select" data-allow-clear="true" name="idTugboat" required>
                                                <option value="">Select</option>
                                                <?php
                                                $sql = ("SELECT * FROM  tugboat");
                                                $hasil = mysqli_query($link, $sql);
                                                $no = 0;
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    $no++;
                                                ?>
                                                    <option value="<?php echo
                                                                    $data['idTugboat']; ?>">
                                                        <?php echo
                                                        $data['namaKapal']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label" for="multicol-flag">Jenis Sertifikat</label>
                                        <div class="input-groupp input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-certificate"></i></span>
                                            <select id="multicol-flag" class="select2 form-select" data-allow-clear="true" name="idJenisSertifikat" required>
                                                <option value="">Select</option>
                                                <?php
                                                $sql = ("SELECT * FROM jenis_sertifikat");
                                                $hasil = mysqli_query($link, $sql);
                                                $no = 0;
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    $no++;
                                                ?>
                                                    <option value="<?php echo
                                                                    $data['idJenisSertifikat']; ?>">
                                                        <?php echo
                                                        $data['namaSertifikat']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="mb-5 col-md-12">
                                        <label class="form-label" for="tglTerbit">File</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-number"></i></span>
                                            <input type="file" class="form-control" id="tglTerbit" placeholder="File" name="file" aria-label="File" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div> -->
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
                                            <input type="date" class="form-control" id="tglTerbit" placeholder="Tanggal Terbit" name="tglTerbit" aria-label="Tanggal Terbit" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="tglExp">Tanggal Expired</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-number"></i></span>
                                            <input type="date" class="form-control" id="tglExp" placeholder="Tanggal Expired" name="tglExp" aria-label="Tanggal Expired" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-primary">Save</button>
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
                var tglTerbitAwal = $('#tglTerbit').val();
                var tglExpAwal = $('#tglExp').val();

                $('#tglTerbit, #tglExp').change(function() {
                    if (!$('#switchPermanent').is(':checked')) {
                        tglTerbitAwal = $('#tglTerbit').val();
                        tglExpAwal = $('#tglExp').val();
                    }
                });

                $('#switchPermanent').change(function() {
                    if ($(this).is(':checked')) {
                        $('#tglTerbit, #tglExp').prop('disabled', true).val('');
                    } else {
                        $('#tglTerbit, #tglExp').prop('disabled', false);
                        $('#tglTerbit').val(tglTerbitAwal);
                        $('#tglExp').val(tglExpAwal);
                    }
                });
            });
        </script>





    <?php
    if (isset($_POST['simpan'])) {
        // Tetapkan nilai parameter
        $idJenisSertifikat = $_POST['idJenisSertifikat'];
        $idTugboat = $_POST['idTugboat'];
        $tglTerbit = $_POST['tglTerbit'];
        $tglExp = $_POST['tglExp'];
        $permanent = isset($_POST['permanent']) ? 1 : 0;

        // Persiapkan pernyataan
        $stmt = $link->prepare("INSERT INTO sertifikat_tugboat (idJenisSertifikat, idTugboat, tglTerbit, tglExp, permanent) VALUES (?,?, ?, ?, ?)");

        // Periksa apakah persiapan berhasil
        if ($stmt) {
            // Ikat parameter
            $stmt->bind_param("iissi", $idJenisSertifikat, $idTugboat, $tglTerbit, $tglExp, $permanent);

            // Jalankan pernyataan
            $simpan = $stmt->execute();

            // Tutup pernyataan
            $stmt->close();
        }

        if ($simpan) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil disimpan',
                customClass: {
                    confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                window.location.href = '?page=data_sertTugboat'; 
            });
        </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Data anda gagal disimpan. Ulangi sekali lagi!',
                customClass: {
                    confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                window.location.href = '?page=tambah_sertTugboat'; 
            });
        </script>";
        }
    }
}
    ?>