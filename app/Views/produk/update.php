<?php
echo view('header');
if(isset($_SESSION['msg'])){
    echo "<p class='text-info'>$_SESSION[msg]</p>";
}
?>
<h1>Memperbaharui produk</h1>
<form method="POST" action="<?php echo site_url('produk/update') ?>">
    <div class="form-group">
    <label>Nama</label> 
    <input type='text' name='name' value="<?php echo $data[0]->name; ?>" class='form-control mb-3'>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name='description' class="form-control mb-3"><?= $data[0]->description; ?></textarea>
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select name='category' class="form-control mb-3" required>
            <?php
                foreach($categories as $category){
                    echo "<option value='".$category->id."'>".$category->name."</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Harga</label> 
        <input type='number' name='price' value="<?php echo $data[0]->price; ?>" class='form-control mb-3'>
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="form-control mb-3">
            <input type="radio" value='1' name='active' checked><label>Aktif</label>
            <input type="radio" value="0" name="active"><label>Non-aktif</label>
        </div>
    </div>
    <input type='hidden' name='id' value="<?php echo $data[0]->id; ?>">
    <input type="submit" value="Update" class='btn btn-primary'> <a href="<?php echo site_url('produk/index'); ?>" class='btn btn-basic btn-outline-dark'>Back</a>
</form>
<?php
$_SESSION['msg']='';
echo view('footer');
?>