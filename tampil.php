<?php
     include "library/library.php";  
	  $perintah = new oop();
	  $perintah->koneksi("localhost","root","","db_psb");


	@$where = "no_pendaftaran = $_GET[np]";
	@$redirect = "?menu=data";
	@$table = "tb_pendaftaran";
	if(isset($_GET['hapus'])){
	$perintah->hapus($table,$where,$redirect);
    }
     
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tampil Data</title>
</head>
<link rel="stylesheet" href="css/materialize.css">

<body>
<nav class="light-orange lighten-1" role="navigation">
   <div class="nav-wrapper container"><a id="logo" class="brand-logo">Penerimaan Siswa Baru</a>
     <ul class="right hide-on-med-and-down">
       <li class="active"><a class="waves-effect waves-light" href="tampil.php">Tampil data</a></li>
       <li><a class="waves-effect waves-light" href="pendaftaran.php">Tambah data</a></li>
     </ul>
   </div>
</nav>
<div class="container">
  <h5 class="orange-text">Data Siswa</h5>
  <table class="table table-hover">
  
    <tr class="orange">
      <td>No</td>
      <td>NP</td>
      <td>Nama Lengkap</td>
      <td>Jenis Kelamin</td>
      <td>Riwayat penyakit</td>
      <td>Asal Sekolah</td>
      <td>Tanggal Lahir</td>
      <td>Foto</td>
      <td>Aksi</td>
    </tr>
    
    <?php
	 
	  $t = $perintah->tampil($table);
	  $no = 0;
	  if($t == ""){
		  echo"-----";
	  }else {
	  foreach($t as $dat){
	    $no++;
	?>
    <tr>
     <td><?php echo $no ; ?></td>
     <td><?php echo $dat[0] ;?></td>
     <td><?php echo $dat[1];?></td>
     <td><?php echo $dat[3];?></td>
     <td><?php echo $dat[8];?></td>
     <td><?php echo $dat[9];?></td>
     <td><?php echo $dat[12];?></td>
     <td><img src="foto/<?php echo $dat[11];?>" width="50px" height="50px" style="border-radius:360px;"/></td>
     <td>
     <a class="btn-floating waves-effect waves-light orange" href="pendaftaran.php?edit&np=<?php echo $dat[0]?>">
     <i class="mdi-editor-mode-edit"></i></a>
     <a class="btn-floating waves-effect waves-light red" href="tampil.php?hapus&np=<?php echo $dat[0]?>" onClick="return confirm('Hapus Record ?')">
     <i class="mdi-action-delete"></i></a>
      </td>
    </tr> 
      <?php } } ?>
  </table>
  </div>
</body>
</html>