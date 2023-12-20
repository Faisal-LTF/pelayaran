<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT t.*, jk.namaJenisKapal, jm.jenisMesin, f.namaFlag 
    FROM tugboat t
    JOIN jenis_kapal jk ON t.idJenisKapal = jk.idJenisKapal
    JOIN jenis_mesin jm ON t.idJenisMesin = jm.idJenisMesin
    JOIN flag f ON t.idFlag = f.idFlag WHERE idTugboat = '$id'");
    $data = $query->fetch_array();

?>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y ">
            <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Detail Kapal </span><?= $data['namaKapal'] ?></h4>
            <div class="col-12 text-end mb-3">
                <a href="?page=data_tugboat" class="btn btn-primary">Kembali</a>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header pt-2">
                            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-personal" role="tab" aria-selected="true">
                                        Detail
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-account" role="tab" aria-selected="false">
                                        Sertifikat
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-social" role="tab" aria-selected="false">
                                        Clearance
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl">
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
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Fleet" name="namaKapal" aria-label="Fleet" aria-describedby="basic-icon-default-fullname2" value="<?= $data['namaKapal'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="basic-icon-default-fullname">Jenis Kapal</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-report-search"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Fleet" name="namaKapal" aria-label="Fleet" aria-describedby="basic-icon-default-fullname2" value="<?= $data['namaJenisKapal'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="basic-icon-default-fullname">Tahun Pembangunan</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-number"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Tahun Pembangunan" name="tahunPembangunan" aria-label="Tahun Pembangunan" aria-describedby="basic-icon-default-fullname2" value="<?= $data['tahunPembangunan'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label" for="basic-icon-default-fullname">Panjang</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-ruler-measure"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Panjang" name="panjang" aria-label="Panjang" aria-describedby="basic-icon-default-fullname2" value="<?= $data['panjang'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label" for="basic-icon-default-fullname">Lebar</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-ruler-measure"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Lebar" name="lebar" aria-label="Lebar" aria-describedby="basic-icon-default-fullname2" value="<?= $data['lebar'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label" for="basic-icon-default-fullname">Dalam</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-ruler-measure"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Dalam" name="dalam" aria-label="Dalam" aria-describedby="basic-icon-default-fullname2" value="<?= $data['dalam'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="basic-icon-default-fullname">NT ( ISI BERSIH )</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-box-padding"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="NT ( ISI BERSIH )" name="nt" aria-label="NT (ISI BERSIH" aria-describedby="basic-icon-default-fullname2" value="<?= $data['nt'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="basic-icon-default-fullname">GT</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-box-padding"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="GT" name="gt" aria-label="GT" aria-describedby="basic-icon-default-fullname2" value="<?= $data['gt'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="basic-icon-default-fullname">Tanda Pendaftaran</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-report-analytics"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Tanda Pendaftaran" name="tandaPendaftaran" aria-label="Tanda Pendaftaran" aria-describedby="basic-icon-default-fullname2" value="<?= $data['tandaPendaftaran'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="basic-icon-default-fullname">Tempat Pendaftaran</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-report-analytics"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Tempat Pendaftaran" name="tempatPendaftaran" aria-label="Tempat Pendaftaran" aria-describedby="basic-icon-default-fullname2" value="<?= $data['tempatPendaftaran'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="basic-icon-default-fullname">Call Sign</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-brand-hipchat"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Call Sign" name="callSign" aria-label="Call Sign" aria-describedby="basic-icon-default-fullname2" value="<?= $data['callSign'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="basic-icon-default-fullname">Jenis Mesin</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-engine"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Jenis Mesin" name="namaKapal" aria-label="Fleet" aria-describedby="basic-icon-default-fullname2" value="<?= $data['jenisMesin'] ?>" readonly />
                                                    </div>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="basic-icon-default-fullname">House Power</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-circuit-battery"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="House Power" name="housePower" aria-label="House Power" aria-describedby="basic-icon-default-fullname2" value="<?= $data['housePower'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="basic-icon-default-fullname">Flag</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-flag"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Fleet" name="namaKapal" aria-label="Fleet" aria-describedby="basic-icon-default-fullname2" value="<?= $data['namaFlag'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="basic-icon-default-fullname">NO IMO</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-number"></i></span>
                                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="NO IMO" name="noImo" aria-label="NO IMO" aria-describedby="basic-icon-default-fullname2" value="<?= $data['noImo'] ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="form-tabs-account" role="tabpanel">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="formtabs-username">Username</label>
                                            <input type="text" id="formtabs-username" class="form-control" placeholder="john.doe" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="formtabs-email">Email</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="formtabs-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="formtabs-email2" />
                                                <span class="input-group-text" id="formtabs-email2">@example.com</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-password-toggle">
                                                <label class="form-label" for="formtabs-password">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="formtabs-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="formtabs-password2" />
                                                    <span class="input-group-text cursor-pointer" id="formtabs-password2"><i class="ti ti-eye-off"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-password-toggle">
                                                <label class="form-label" for="formtabs-confirm-password">Confirm Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="formtabs-confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="formtabs-confirm-password2" />
                                                    <span class="input-group-text cursor-pointer" id="formtabs-confirm-password2"><i class="ti ti-eye-off"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="form-tabs-social" role="tabpanel">
                                <form>
                                    SOON!
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
}
    ?>