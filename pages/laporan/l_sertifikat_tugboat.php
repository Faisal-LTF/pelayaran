<?php

include "../../db/koneksi.php";

$no = 1;
if (isset($_POST['cetak2'])) {
    /* $kec = $_POST['jenis']; */
    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $sql = mysqli_query($link, "SELECT * FROM skp k join pegawai p on k.id_pegawai = p.id_pegawai join jabatan j on k.id_jabatan = j.id_jabatan WHERE k.tgl_kinerja BETWEEN '$tgl1' AND '$tgl2' ORDER BY k.tgl_kinerja ");
    $label = 'LAPORAN DATA PENILAIAN KINERJA PEGAWAI  <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
    /* $label = 'LAPORAN DATA BARANG MASUK <br> JENIS : ' . $kec; */
} else {
    $sql = mysqli_query($link, "SELECT st.*, js.namaSertifikat, t.namaKapal   
    FROM sertifikat_tugboat st
    JOIN jenis_sertifikat js ON st.idJenisSertifikat = js.idJenisSertifikat
    JOIN tugboat t ON st.idTugboat = t.idTugboat
    WHERE t.idJenisKapal = 9  ");
    $label = 'LAPORAN SERTIFIKAT Tugboat';
}

$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);
function tgl($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>



<!DOCTYPE html>

<html lang="en" class="light-style layout-wide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Laporan Sertifkat Tugboat</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
 -->
    <link rel="icon" type="image/x-icon" href="../../assets/images/jmt.png" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/app-invoice-print.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="invoice-print p-5">
        <div class="d-flex justify-content-between flex-row">
            <div class="mb-4">
                <div class="d-flex svg-illustration mb-3 gap-2">
                    <span class="app-brand-logo demo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sailboat" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" />
                            <path d="M4 18l-1 -3h18l-1 3" />
                            <path d="M11 12h7l-7 -9v9" />
                            <path d="M8 7l-2 5" />
                        </svg>
                    </span>
                    <span class="app-brand-text fw-bold"> Pelayaran | Jhonlin Marine Trans </span>
                </div>
                <p class="mb-1">Tungkaran Pangeran, Kec. Simpang Empat, Kabupaten Tanah Bumbu, Kalimantan Selatan 72211</p>
                <!-- <p class="mb-1">San Diego County, CA 91905, USA</p>
                <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p> -->
            </div>
            <div>
                <h4 class="fw-medium text-center">Laporan <br> Sertifikat Tugboat</h4>
                <!-- <div class="mb-2">
                    <span class="text-muted">Date Issues:</span>
                    <span class="fw-medium">April 25, 2021</span>
                </div>
                <div>
                    <span class="text-muted">Date Due:</span>
                    <span class="fw-medium">May 25, 2021</span>
                </div> -->
            </div>
        </div>

        <hr />

        <!-- <div class="row d-flex justify-content-between mb-4">
            <div class="col-sm-6 w-50">
                <h6>Invoice To:</h6>
                <p class="mb-1">Thomas shelby</p>
                <p class="mb-1">Shelby Company Limited</p>
                <p class="mb-1">Small Heath, B10 0HF, UK</p>
                <p class="mb-1">718-986-6062</p>
                <p class="mb-0">peakyFBlinders@gmail.com</p>
            </div>
            <div class="col-sm-6 w-50">
                <h6>Bill To:</h6>
                <table>
                    <tbody>
                        <tr>
                            <td class="pe-3">Total Due:</td>
                            <td class="fw-medium">$12,110.55</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Bank name:</td>
                            <td>American Bank</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Country:</td>
                            <td>United States</td>
                        </tr>
                        <tr>
                            <td class="pe-3">IBAN:</td>
                            <td>ETD95476213874685</td>
                        </tr>
                        <tr>
                            <td class="pe-3">SWIFT code:</td>
                            <td>BR91905</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->

        <div class="table-responsive">
            <div class="col-sm-12">
                <table width="100%" class="table m-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>NO</th>
                            <th>Sertifikat</th>
                            <th>Fleet</th>
                            <th>Tanggal Terbit</th>
                            <th>Tanggal Exp</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td align="left"><?= $row['namaSertifikat']; ?></td>
                                <td><?= $row['namaKapal']; ?></td>
                                <td><?= $row['tglTerbit'] ? $row['tglTerbit'] : '-'; ?></td>
                                <td><?= $row['tglExp'] ? $row['tglExp'] : '-'; ?></td>
                                <td>
                                    <?php
                                    if ($row['permanent']) {
                                        echo '<span >PERMANENT</span>';
                                    } else {
                                        // Hitung sisa hari
                                        $expiredDate = new DateTime($row['tglExp']);
                                        $currentDate = new DateTime();
                                        $remainingDays = $currentDate->diff($expiredDate)->days;

                                        echo '<div class="pt-1">';

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
                                        echo '<span class="badge ">' . $formattedSelisih . '</span>';
                                        echo '</div>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- <div class="row">
                <div class="col-12">
                    <span class="fw-medium">Note:</span>
                    <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance
                        projects. Thank You!</span>
                </div>
            </div> -->

            </div>
        </div>



        <!-- / Content -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->

        <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../../assets/vendor/libs/popper/popper.js"></script>
        <script src="../../assets/vendor/js/bootstrap.js"></script>
        <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
        <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
        <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
        <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="../../assets/vendor/js/menu.js"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->

        <!-- Main JS -->
        <script src="../../assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="../../assets/js/app-invoice-print.js"></script>
</body>