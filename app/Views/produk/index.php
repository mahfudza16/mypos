<?php
echo view('header');
if(isset($_SESSION['msg'])){
    echo "<p class='text-info'>".$_SESSION['msg']."</p>";
    
}
?>
<a href='<?php echo site_url("produk/insert"); ?>' class='btn btn-primary'>Tambah produk</a>
<?php
if(count($data)==0){
    echo "<p class='text-center'>Belum terdapat data produk tersedia.</p>";
}else{
?>
<table class='table'>
    <tr>
        <td>Nomor</td>
        <td>Produk</td>
        <td>Harga</td>
        <td>Deskripsi</td>
        <td>Gambar</td>
        <td>Action</td>
    </tr>
<?php
$i=1;
//die(print_r($data));
foreach($data as $d){
    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>$d->name</td>";
    echo "<td>$d->price</td>";
    echo "<td>$d->description</td>";
    echo "<td><img src='".base_url()."/uploads/".$d->picture."' class='img-fluid rounded' style='max-width:200px;'></td>";
    echo "<td><a href='".site_url('produk/update/'.$d->id)."' class='btn btn-success btn-sm'>Ubah</a>  <a href='".site_url('produk/delete/'.$d->id)."' class='btn btn-danger btn-sm'>Hapus</a></td>";
    echo "</tr>";
    $i++;
}
?>
</table>
<?php
}
echo view('footer');
?>