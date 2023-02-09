<!DOCTYPE html>
<html lang="en">

<head>
    <!-- paper -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/paper/paper.css">
    <?php $this->load->view("template/head") ?>
</head>

<body class="A4 landscape">
    <div class="sheet">
        <table align="center">
            <td>
                <pre><img src="https://plb.ac.id/new/wp-content/uploads/2022/01/logo-Politeknik-LP3I.png" width="100px" height="100px"></pre>
            </td>
            <td align="center">
                <h1>RE Politeknik LP3I Kampus Tasikmalaya</h1>
                <h5>Jl. Ir. H. Djuanda Bypass No. 106 KM. 2 Rancabango Kota Tasikmalaya</h5>
            </td>
        </table>
        <hr noshade size=4 width="98%">
        <div style="width:100%" align="center">
            <h3><b>Laporan Penjualan Owner <?= $this->session->userdata('nama_owner') ?></b></h3>
            Dari : <?= format_indo($dari) ?><br>
            Sampai : <?= format_indo($sampai) ?><br>
        </div>
        <div style="width:98%; margin: 10px;" align="center">
            <table id="tabelku" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center">Penjualan</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Harga Jual</th>
                        <th class="text-center">Harga Beli</th>
                        <th class="text-center">Total Harga Beli</th>
                        <th class="text-center">% margin</th>
                        <th class="text-center">Margin</th>
                        <th class="text-center">Total Margin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($read_penjualan as $d) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?>.</td>
                            <td><?= $d->nama_produk ?></td>
                            <td>
                                Rp
                                <span class="float-right">
                                    <?= number_format($d->harga_jual * $d->kuantitas, 0, ".", "."); ?>
                                </span>
                            </td>
                            <td><?= $d->kuantitas ?></td>
                            <td>
                                Rp
                                <span class="float-right">
                                    <?= number_format($d->harga_jual, 0, ".", "."); ?>
                                </span>
                            </td>
                            <td>
                                Rp
                                <span class="float-right">
                                    <?= number_format($d->harga_beli, 0, ".", "."); ?>
                                </span>
                            </td>
                            <td>
                                Rp
                                <span class="float-right">
                                    <?= number_format($d->harga_beli * $d->kuantitas, 0, ".", "."); ?>
                                </span>
                            </td>
                            <td>
                                <span class="float-right">
                                    <?= number_format($d->harga_beli / ($d->harga_jual - $d->harga_beli), 0, ".", "."); ?>
                                </span>
                            </td>
                            <td>
                                Rp
                                <span class="float-right">
                                    <?= number_format($d->harga_jual - $d->harga_beli, 0, ".", "."); ?>
                                </span>
                            </td>
                            <td>
                                Rp
                                <span class="float-right">
                                    <?= number_format(($d->harga_jual - $d->harga_beli) * $d->kuantitas, 0, ".", "."); ?>
                                </span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <script>
                window.print();
            </script>
        </div>
        <table align="right" width="40%"><br><br>
            <tr align="center">
                <td>Tasikmalaya, <?= format_indo(date('Y-m-d')) ?></td>
            </tr>
            <tr align="center">
                <td>Mengetahui</td>
            </tr>
            <tr align="center">
                <td><b>Kepala Kampus</b></td>
            </tr>
            <tr>
                <td><br><br><br><br><br></td>
            </tr>
            <tr align="center">
                <td><b>H. Rudi Kurniawan, S.T., M.M</b></td>
            </tr>
            <tr align="center">
                <td>NIP. XXXXXXXX XXXXXX X XXX</td>
            </tr>
        </table>
    </div>
</body>

</html>