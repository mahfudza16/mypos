<?php
echo view('header');
if(isset($_SESSION['msg'])){
    echo "<p class='text-info'>".$_SESSION['msg']."</p>";
    
}
?>
<?php
if(count($data)==0){
    echo "<p class='text-center'>Belum terdapat data tersedia.</p>";
}else{
?>
<h2>Detail Laporan Transaksi</h2>
<?php

$revenue = 0;
$sold = 0;
$i = 1;
foreach($data as $d){
    echo "<strong>Order #".$i."</strong><br>";
    $total_per_order = 0;
    $sold_per_order = 0;
    foreach(json_decode($d->product) as $p){
        echo "<label style='color:red'>".ucfirst($p[0])."</label>, Jumlah: ".$p[1].", @ Rp. ".$p[2]."<br>";
        $total_per_order+=$p[2];
        $sold_per_order+=$p[1];
        $revenue+=$p[2];
        $sold+=$p[1];
    }
    echo "<p style='color:blue'>Total: Rp.".$total_per_order*$sold_per_order."</p>";
    echo "<hr>";
    $i++;
}

?>
<p><strong>Total item terjual: <?= $sold; ?></strong></p>
<p><strong>Total penjualan: Rp. <?= $revenue*$sold; ?></strong></p>

<?php
}
echo view('footer');
?>