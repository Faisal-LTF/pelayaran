<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    $id = $_GET['id'];
    $queryCombined = $link->query("SELECT t.*, jk.namaJenisKapal, jm.jenisMesin, f.namaFlag
FROM tugboat t
JOIN jenis_kapal jk ON t.idJenisKapal = jk.idJenisKapal
JOIN jenis_mesin jm ON t.idJenisMesin = jm.idJenisMesin
JOIN flag f ON t.idFlag = f.idFlag
WHERE t.idTugboat = '$id'");
    $data = $queryCombined->fetch_array();

    // // Fetch all certificates for the tugboat
    // $certificatesQuery = $link->query("SELECT st.*, js.namaSertifikat, t.namaKapal   
    // FROM sertifikat_tugboat st
    // JOIN jenis_sertifikat js ON st.idJenisSertifikat = js.idJenisSertifikat
    // JOIN tugboat t ON st.idTugboat = t.idTugboat WHERE idTugboat = '$id'");

    // $certificates = $certificatesQuery->fetch_all(MYSQLI_ASSOC)

    // Fetch all certificates for the tugboat
    $certificatesQuery = $link->query("SELECT st.*, js.namaSertifikat, t.namaKapal
    FROM sertifikat_tugboat st
    JOIN jenis_sertifikat js ON st.idJenisSertifikat = js.idJenisSertifikat
    JOIN tugboat t ON st.idTugboat = t.idTugboat
    WHERE st.idTugboat = '$id'
");

    $certificates = $certificatesQuery->fetch_all(MYSQLI_ASSOC);

?>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y ">
            <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Detail Data </span><?= $data['namaKapal'] ?></h4>
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
                                    <div class="row">
                                        <?php
                                        $certificateNumber = 1; // Counter for certificate numbering

                                        foreach ($certificates as $certificate) {
                                            echo '<div class="col-lg-6 col-mb-6 mb-4 mb-lg-0">';
                                            echo ' <div class="card  h-100">';
                                            echo ' <div class="card-body">';

                                            // Display certificate number
                                            echo '<h5 class="card-title mb-1 pt-1">' . $certificateNumber . ' - ' . $certificate['namaSertifikat'] . '</h5>';

                                            echo ' <small class="text-muted">Tanggal Terbit: </small>';

                                            // Check if the certificate is permanent
                                            if ($certificate['permanent']) {
                                                // If permanent, display tglTerbit as a line
                                                echo '<p class="mb-2 mt-1">' . $certificate['tglTerbit'] . ' - </p>';
                                            } else {
                                                // If not permanent, display tglTerbit normally
                                                echo '<p class="mb-2 mt-1">' . $certificate['tglTerbit'] . '</p>';
                                            }

                                            echo ' <small class="text-muted">Tanggal Expired: </small>';

                                            // Check if the certificate is permanent
                                            if ($certificate['permanent']) {
                                                // If permanent, display tglExp as a line
                                                echo '<p class="mb-2 mt-1"> - </p>';
                                            } else {
                                                // If not permanent, display tglExp normally
                                                echo '<p class="mb-2 mt-1">' . $certificate['tglExp'] . '</p>';
                                            }

                                            // Hitung sisa hari
                                            $expiredDate = new DateTime($certificate['tglExp']);
                                            $currentDate = new DateTime();
                                            $remainingDays = $currentDate->diff($expiredDate)->days;

                                            echo ' <div class="pt-1">';

                                            // Display badge for permanent status
                                            if ($certificate['permanent']) {
                                                echo '<span class="badge bg-success">PERMANENT</span>';
                                            } else {
                                                // Tampilkan badge sesuai perhitungan sisa waktu
                                                $badgeColor = '';
                                                if ($remainingDays <= 0) {
                                                    $badgeColor = 'bg-danger';
                                                    $formattedSelisih = 'Expired';
                                                } elseif ($remainingDays == 1) {
                                                    $badgeColor = 'bg-danger';
                                                    $formattedSelisih = '1 day';
                                                } elseif ($remainingDays <= 10) {
                                                    $badgeColor = 'bg-danger';
                                                    $formattedSelisih = $remainingDays . ' days';
                                                } elseif ($remainingDays <= 30) {
                                                    $badgeColor = 'bg-warning';
                                                    $formattedSelisih = $remainingDays . ' days';
                                                } else {
                                                    $badgeColor = 'bg-info'; // Warna biru untuk lebih dari 30 hari
                                                    $formattedSelisih = $remainingDays . ' days';
                                                }

                                                // Jika kurang dari 2 hari, tambahkan informasi waktu (jam dan menit)
                                                if ($remainingDays < 2) {
                                                    $formattedSelisih .= ' ' . $currentDate->diff($expiredDate)->format('%H:%I Menit');
                                                }

                                                // Tampilkan badge dengan warna yang sesuai
                                                echo '<span class="badge ' . $badgeColor . '">' . $formattedSelisih . '</span>';
                                            }

                                            echo ' </div>';
                                            echo '
        </div>';
                                            echo '
        </div>';
                                            echo '
        </div>';

                                            $certificateNumber++; // Increment the certificate number
                                        }
                                        ?>
                                </form>
                            </div>
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