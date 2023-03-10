<!DOCTYPE html>
<html lang="en">

<head>
    <!-- paper -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/paper/paper.css">
    <?php $this->load->view("template/head") ?>
</head>

<body class="A4 landscape">
    <div class="sheet">
        <table align="center" style="margin-top: 10px; margin-bottom: 2px;">
            <td>
                <pre><img src="<?= base_url() ?>assets/img/logosipenture.png" width="110px" height="110px"></pre>
            </td>
            <td align="center">
                <h1>Eliy's Furniture</h1>
                <h4>Jl. Jenderal Sudirman No. 01, Lt. 1 Blok B No. 29-32s,<br> Tangcity Mall, Cikokol, Kota Tangerang</h4>
            </td>
        </table>
        <hr noshade size=4 width="98%">
        <div style="width:100%" align="center">
            <h3><b>Laporan Pembelian All Supplier</b></h3>
            Dari : <?= format_indo($dari) ?><br>
            Sampai : <?= format_indo($sampai) ?><br>
        </div>
        <div style="width:98%" align="center" style="margin:10px;">
            <table id="tabelku" class="table table-bordered table-striped" style="margin: 10px; margin-right: 10px; align-self: center;">
                <thead>
                    <tr>
                        <th class="text-center" valign="center">No</th>
                        <th class="text-center" valign="center">Nama Produk</th>
                        <th class="text-center" valign="center">Nama Supplier</th>
                        <th class="text-center" valign="center">Pembelian</th>
                        <th class="text-center" valign="center">Qty</th>
                        <th class="text-center" valign="center">Harga Jual</th>
                        <th class="text-center" valign="center">Harga Beli</th>
                        <th class="text-center" style="width:100px; height: 10px;">Total Harga Beli</th>
                        <th class="text-center">% margin</th>
                        <th class="text-center">Margin</th>
                        <th class="text-center">Total Margin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total_pembelian = 0;
                    $total_qty = 0;
                    $total_hargaj = 0;
                    $total_hargab = 0;
                    $total_hb = 0;
                    $total_prsnm = 0;
                    $total_margin = 0;
                    $total_tm = 0;
                    foreach ($pembelian as $d) {
                        $total_pembelian += $d->harga_beli * $d->kuantitas;
                        $total_qty += $d->kuantitas;
                        $total_hargaj += $d->harga_jual;
                        $total_hargab += $d->harga_beli;
                        $total_hb += $d->harga_beli * $d->kuantitas;
                        $total_prsnm += $d->harga_beli / ($d->harga_jual - $d->harga_beli);
                        $total_margin += $d->harga_jual - $d->harga_beli;
                        $total_tm += ($d->harga_jual - $d->harga_beli) * $d->kuantitas;
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?>.</td>
                            <td><?= $d->nama_produk ?></td>
                            <td><?= $d->nama_supplier ?></td>
                            <td>
                                Rp
                                <span class="float-right">
                                    <?= number_format($d->harga_beli * $d->kuantitas, 0, ".", "."); ?>
                                </span>
                            </td>
                            <td align="right"><?= $d->kuantitas ?></td>
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
                            <td align="center">
                                <span>
                                    <?= number_format($d->harga_beli / ($d->harga_jual - $d->harga_beli), 0, ".", "."); ?>%
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
                    <tr>
                        <td colspan="3"><b>Total</b></td>
                        <td align="left"><span class="float-right"><b>Rp <?= number_format($total_pembelian, 0, '.', '.') ?></b></td></span>
                        <td align="right"><?= $total_qty ?></td>
                        <td>
                            Rp
                            <span class="float-right">
                                <?= number_format($total_hargaj, 0, ".", "."); ?>
                            </span>
                        </td>
                        <td>
                            Rp
                            <span class="float-right">
                                <?= number_format($total_hargab, 0, ".", "."); ?>
                            </span>
                        </td>
                        <td>
                            Rp
                            <span class="float-right">
                                <?= number_format($total_hb, 0, ".", "."); ?>
                            </span>
                        </td>
                        <td align="center"><?= $total_prsnm ?>%</td>
                        <td>
                            Rp
                            <span class="float-right">
                                <?= number_format($total_margin, 0, ".", "."); ?>
                            </span>
                        </td>
                        <td>
                            Rp
                            <span class="float-right">
                                <?= number_format($total_tm, 0, ".", "."); ?>
                            </span>
                        </td>
                    </tr>
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
                <td><b>Owner Eliy's Ffurniture</b></td>
            </tr>
            <tr>
                <td><br><br><br></td>
            </tr>
            <tr align="center">
                <td><b><u>Elis Nuryanti</u></b></td>
            </tr>
        </table>

    </div>
</body>

</html>