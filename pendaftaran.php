
<?php

 include "library/library.php";

 $perintah = new oop();
 $perintah->koneksi("localhost","root","","db_psb");

 @$table = "tb_pendaftaran";
 @$alamat = "?menu=pendaftaran";
 @$tempat = "foto";
 @$where  = "no_pendaftaran = $_GET[np]";
 @$foto = $_FILES['foto'];
 @$upload = $perintah->upload($foto,$tempat);
 @$field = array('no_pendaftaran' => $_POST['nopen'],
	         'nama_lengkap' => $_POST['nl'],
			 'nama_panggilan' => $_POST['np'],
			 'jk' => $_POST['jk'],
			 'alamat' => $_POST['alamat'],
			 'gol_darah' => $_POST['gd'],
			 'tinggi_badan' => $_POST['tb'],
			 'berat_badan' => $_POST['bb'],
			 'riwayat_penyakit' => $_POST['rp'],
			 'asal_sekolah' => $_POST['as'],
			 'alamat_asal_sekolah' => $_POST['ass'],
			 'foto_siswa' => $upload,
			 'tgl_lahir' => $_POST['tl'],
			 );

if(isset($_POST['simpan'])){
	$perintah->simpan($table,$field,$alamat);
}
if(isset($_GET['edit'])){
	@$edit = $perintah->edit($table,$where);
}
if(isset($_POST['batal'])){
	echo "<script>document.location.href='pendaftaran.php'</script>";
}
if(isset($_POST['update'])){
	$foto = $_FILES['foto'];
	$upload = $perintah->upload($foto,$tempat);
	if(empty($_FILES['foto']['name'])){
	$field = array('no_pendaftaran' => $_POST['nopen'],
	         'nama_lengkap' => $_POST['nl'],
			 'nama_panggilan' => $_POST['np'],
			 'jk' => $_POST['jk'],
			 'alamat' => $_POST['alamat'],
			 'gol_darah' => $_POST['gd'],
			 'tinggi_badan' => $_POST['tb'],
			 'berat_badan' => $_POST['bb'],
			 'riwayat_penyakit' => $_POST['rp'],
			 'asal_sekolah' => $_POST['as'],
			 'alamat_asal_sekolah' => $_POST['ass'],
			 'tgl_lahir' => $_POST['tl'],
			 );
	$perintah->update($table,$field,$where,$alamat);
	} else {
		$field = array('no_pendaftaran' => $_POST['nopen'],
	         'nama_lengkap' => $_POST['nl'],
			 'nama_panggilan' => $_POST['np'],
			 'jk' => $_POST['jk'],
			 'alamat' => $_POST['alamat'],
			 'gol_darah' => $_POST['gd'],
			 'tinggi_badan' => $_POST['tb'],
			 'berat_badan' => $_POST['bb'],
			 'riwayat_penyakit' => $_POST['rp'],
			 'asal_sekolah' => $_POST['as'],
			 'alamat_asal_sekolah' => $_POST['ass'],
			 'foto_siswa'=>$upload,
			 'tgl_lahir' => $_POST['tl'],
			 );
	$perintah->update($table,$field,$where,$alamat);

	}
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form Pendaftaran</title>
</head>
<link rel="stylesheet" href="css/materialize.css">
<body>
<nav class="light-orange lighten-1" role="navigation">
   <div class="nav-wrapper container"><a id="logo" class="brand-logo">Penerimaan Siswa Baru</a>
     <ul class="right hide-on-med-and-down">
       <li><a class="waves-effect waves-light" href="tampil.php">Tampil data</a></li>
       <li class="active"><a class="waves-effect waves-light" href="pendaftaran.php">Tambah data</a></li>
     </ul>
   </div>
</nav>
<div class="container z-depth-1" style="padding:20px;">

   <form method="post" enctype="multipart/form-data" class="col s12">
    <h5 class="orange-text">Tambah Data</h5>

           <div class="row">
           <div class="input-field col s8">
             <input type="number" name="nopen" value="<?php echo @$edit['no_pendaftaran']?>" required>
             <label class="active">No Pendaftaran</label>
           </div>
          </div>
          <div class="row">
           <div class="input-field col s4">
             <input type="text" name="nl" value="<?php echo @$edit['nama_lengkap']?>" required>
             <label class="active">Nama Lengkap</label>
           </div>

          <div class="input-field col s4">
             <input type="text" name="np" class="baru" value="<?php echo @$edit['nama_panggilan']?>" required>
             <label class="active">Nama Panggilan</label>
           </div>
          </div>

          <div class="row">
           <div class="input-field col s8">
            <select name="jk" class="browser-default">
              <option value="<?php echo @$edit['jk']?>"><?php echo @$edit['jk']?></option>
              <option value="Laki - laki">Laki - laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            </div>
         </div>
         <div class="row">
           <div class="input-field col s8">
             <textarea name="alamat" class="materialize-textarea" ><?php echo @$edit['alamat']?></textarea><label class="active">Alamat</label>
           </div>
          </div>

         <div class="row">
            <div class="input-field col s2">
               <input type="text" name="gd" value="<?php echo @$edit['gol_darah']?>" required><label class="active">Gol Darah</label>
            </div>
            <div class="input-field col s3">
               <input type="text" name="tb" value="<?php echo @$edit['tinggi_badan']?>" required><label class="active">Tinggi Badan</label>
            </div>
            <div class="input-field col s3">
               <input type="text" name="bb" value="<?php echo @$edit['berat_badan']?>" required><label class="active">Berat Badan</label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s4"><input type="date" class="datepicker" id="Tanggal_Lahir" name="tl" value="<?php echo @$edit['tgl_lahir']?>">
             <label class="active" for="Tanggal_Lahir">Tangggal Lahir</label></div>
            <div class="input-field col s4"><input type="text" name="rp" required value="<?php echo @$edit['riwayat_penyakit']?>"><label class="active">Riwayat Penyakit</label></div>
         </div>
         <div class="row">
               <div class="input-field col s3"><input type="text" name="as" value="<?php echo @$edit['asal_sekolah']?>">
               <label class="active">Asal Sekolah</label></div>
               <div class="input-field col s5"><input type="text" name="ass"
                value="<?php echo @$edit['alamat_asal_sekolah']?>"><label class="active">Alamat asal sekolah</label></div>
         </div>
          <div class="row">
          <div class="file-field input-field col s8">
           <div class="btn"><span>FILE</span></div>
            <input type="file" name="foto">
            <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
            </div>
          </div>
          </div>
          </br>
          <?php if(@$_GET['np']== ""){?>
          <div class="row">
            <div class="col s2"><button class="btn waves-effect waves-light" type="submit" name="simpan">SIMPAN</button></div>
            <div class="col s2"><button class="btn waves-effect waves-light" type="reset" >RESET</button></div>
          </div>
          <?php } else { ?>
          <div class="row">
            <div class="col s2"><button class="btn waves-effect waves-light" type="submit" name="update">UPDATE</button></div>
            <div class="col s2"><button class="btn waves-effect waves-light" type="submit" name="batal"
            onClick="return confirm('Yakin Ingin Membatalkan')" >Batal</button></div>
          </div>
          <?php } ?>
   </form>

 </div>
</body>
</html>
<script src="js/materialize.min.js">