<?php 
foreach ($getProduk2 as $p) {
    ?>

    <div class="form-group">
        <input type="text" name="nama_produk" class="form-control d-none" placeholder="Nama Produk" value="<?= $p->nama_produk ?>" readonly >
    </div>
    <div class="form-group">
        <label>Harga Jual</label>
        <input type="number" name="harga_jual" class="form-control" placeholder="Harga" value="<?= $p->harga_jual ?>" readonly >
    </div>
    
<?php } ?>