<?php
echo view('header');
if(isset($_SESSION['msg'])){
    echo "<p class='text-info'>".$_SESSION['msg']."</p>";
    
}
?>
<h1>Menambahkan produk</h1>
<form method="POST" action="<?php echo site_url('produk/insert') ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type='text' name='name[]' class="form-control mb-3" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name='description[]' class="form-control mb-3"></textarea>
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select name='category[]' class="form-control mb-3" required>
            <?php
                foreach($categories as $category){
                    echo "<option value='".$category->id."'>".$category->name."</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type='number' name='price[]' class="form-control mb-3" required>
    </div>
    <div class="form-group">
        <label>Gambar</label>
        <input type='file' name='picture' class="form-control mb-3" required>
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="form-control mb-3">
            <input type="radio" value='1' name='active[]' checked><label>Aktif</label>
            <input type="radio" value="0" name="active[]"><label>Non-aktif</label>
        </div>
    </div>


    <input type="submit" class='btn btn-primary' value="Tambah"> <a href="<?php echo site_url('produk/index'); ?>" class='btn btn-basic btn-outline-dark'>Back</a>
</form>
<?
$_SESSION['msg']='';
echo view('footer');
?>
