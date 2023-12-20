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
            <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Tambah</span> Tugboat</h4>
            <div class="col-12 text-end mb-3">
                <a href="?page=data_tugboat" class="btn btn-primary">Kembali</a>
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
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-icon-default-fullname">Fleet</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-ship"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Fleet" name="namaKapal" aria-label="Fleet" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="multicol-ships">Jenis Kapal</label>
                                        <div class="input-groupp input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-report-search"></i></span>
                                            <select id="multicol-ships" class="select2 form-select" data-allow-clear="true" name="idJenisKapal" required>
                                                <option value="">Select</option>
                                                <?php
                                                $sql = ("SELECT * FROM  jenis_kapal");
                                                $hasil = mysqli_query($link, $sql);
                                                $no = 0;
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    $no++;
                                                ?>
                                                    <option value="<?php echo
                                                                    $data['idJenisKapal']; ?>">
                                                        <?php echo
                                                        $data['namaJenisKapal']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="basic-icon-default-fullname">Tahun Pembangunan</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-number"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Tahun Pembangunan" name="tahunPembangunan" aria-label="Tahun Pembangunan" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="basic-icon-default-fullname">Panjang</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-ruler-measure"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Panjang" name="panjang" aria-label="Panjang" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="basic-icon-default-fullname">Lebar</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-ruler-measure"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Lebar" name="lebar" aria-label="Lebar" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="basic-icon-default-fullname">Dalam</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-ruler-measure"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Dalam" name="dalam" aria-label="Dalam" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-icon-default-fullname">NT ( ISI BERSIH )</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-box-padding"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="NT ( ISI BERSIH )" name="nt" aria-label="NT (ISI BERSIH" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-icon-default-fullname">GT</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-box-padding"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="GT" name="gt" aria-label="GT" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="basic-icon-default-fullname">Tanda Pendaftaran</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-report-analytics"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Tanda Pendaftaran" name="tandaPendaftaran" aria-label="Tanda Pendaftaran" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="basic-icon-default-fullname">Tempat Pendaftaran</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-report-analytics"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Tempat Pendaftaran" name="tempatPendaftaran" aria-label="Tempat Pendaftaran" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="basic-icon-default-fullname">Call Sign</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-brand-hipchat"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Call Sign" name="callSign" aria-label="Call Sign" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="multicol-engine">Jenis Mesin</label>
                                        <div class="input-groupp input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-engine"></i></span>
                                            <select id="multicol-engine" class="select2 form-select" data-allow-clear="true" name="idJenisMesin" required>
                                                <option value="">Select</option>
                                                <?php
                                                $sql = ("SELECT * FROM  jenis_mesin");
                                                $hasil = mysqli_query($link, $sql);
                                                $no = 0;
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    $no++;
                                                ?>
                                                    <option value="<?php echo
                                                                    $data['idJenisMesin']; ?>">
                                                        <?php echo
                                                        $data['jenisMesin']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-icon-default-fullname">House Power</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-circuit-battery"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="House Power" name="housePower" aria-label="House Power" aria-describedby="basic-icon-default-fullname2" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="multicol-flag">Flag</label>
                                        <div class="input-groupp input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-flag"></i></span>
                                            <select id="multicol-flag" class="select2 form-select" data-allow-clear="true" name="idFlag" required>
                                                <option value="">Select</option>
                                                <?php
                                                $sql = ("SELECT * FROM flag");
                                                $hasil = mysqli_query($link, $sql);
                                                $no = 0;
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    $no++;
                                                ?>
                                                    <option value="<?php echo
                                                                    $data['idFlag']; ?>">
                                                        <?php echo
                                                        $data['namaFlag']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="basic-icon-default-fullname">NO IMO</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-number"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="NO IMO" name="noImo" aria-label="NO IMO" aria-describedby="basic-icon-default-fullname2" required />
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





    <?php
    if (isset($_POST['simpan'])) {

        $idJenisKapal = $_POST['idJenisKapal'];
        $idJenisMesin = $_POST['idJenisMesin'];
        $idFlag = $_POST['idFlag'];
        $namaKapal = $_POST['namaKapal'];
        $tahunPembangunan = $_POST['tahunPembangunan'];
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $dalam = $_POST['dalam'];
        $nt = $_POST['nt'];
        $gt = $_POST['gt'];
        $tandaPendaftaran = $_POST['tandaPendaftaran'];
        $tempatPendaftaran = $_POST['tempatPendaftaran'];
        $callSign = $_POST['callSign'];
        $housePower = $_POST['housePower'];
        $noImo = $_POST['noImo'];

        $simpan = $link->query("INSERT INTO tugboat VALUES (
            '', 
            '$idJenisKapal',
            '$idJenisMesin',
            '$idFlag',
            '$namaKapal',
            '$tahunPembangunan',
            '$panjang',
            '$lebar',
            '$dalam',
            '$nt',
            '$gt',
            '$tandaPendaftaran',
            '$tempatPendaftaran',
            '$callSign',
            '$housePower',
            '$noImo'
            
            )");

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
                window.location.href = '?page=data_tugboat'; 
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
                window.location.href = '?page=tambah_tugboat'; 
            });
        </script>";
        }
    }
}
    ?>