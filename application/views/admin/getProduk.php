<?php 
foreach ($getProduk as $p) {
    ?>

    <div class="form-group">
        <input type="text" name="nama_produk" class="form-control d-none" placeholder="Nama Produk" value="<?= $p->nama_produk ?>" readonly >
    </div>
    <div class="form-group">
        <label>Harga Beli</label>
        <input type="number" name="harga_beli" class="form-control" placeholder="Harga" value="<?= $p->harga_beli ?>" readonly >
    </div>
    <div class="form-group">
        <input type="number" name="harga_jual" class="form-control d-none" placeholder="Harga" value="<?= $p->harga_jual ?>" readonly >
    </div>
    
<?php } ?>