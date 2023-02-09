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
            <h3><b>Laporan Penjualan</b></h3>
            Dari : <?= format_indo($dari) ?><br>
            Sampai : <?= format_indo($sampai) ?><br>
        </div>
        <div style="width:60%; margin-left: 230px; margin-top:20px;">
            <table id="tabelku" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center">Harga Produk</th>
                        <th class="text-center">Kuantitas</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no=1; 
                        $total = 0;
                        foreach($read_penjualan as $d){
                            $total += $d->harga_jual*$d->kuantitas;
                     ?>
                    <tr>
                        <!-- <td class="text-center"><?= $no++ ?></td> -->
                        <td align="center"><?= $no++; ?>.</td>
                        <td><?= $d->nama_produk ?></td>
                        <td>Rp <span class="float-right">
                                <?= number_format($d->harga_jual, 0, ".", "."); ?></td>
                        <td align="center"><?= $d->kuantitas ?></td>
                        <td>Rp <span class="float-right">
                                <?= number_format($d->harga_jual*$d->kuantitas, 0, ".", "."); ?>
                        </td>
                    </tr>
                    <?php }  
                    ?>
                    <tr>
                        <td colspan="4" align="center"><b>Total Penjualan</b></td>
                        <td align="left"><span class="float-right"><b>Rp <?= number_format($total, 0, '.', '.') ?></b></td></span>
                    </tr>
                </tbody>
            </table>
            <script>
                window.print();
            </script>
        </div>
        <table align="right" width="40%"><br><br>
            <tr align="center">
                <td>Tangerang, <?= format_indo(date('Y-m-d')) ?></td>
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