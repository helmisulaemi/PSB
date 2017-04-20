<?php
 class oop{
	 
	 function koneksi($host , $user , $pass , $db){
		 mysql_connect("$host","$user","$pass") or die ("Tidak terkoneksi ke server");
		 mysql_select_db("$db") or die ("Database tidak ditemukan");
	 }
	  function simpan($table, array $field, $alamat){
            $sql = "INSERT INTO $table SET";
                foreach ($field as $key => $value){
                $sql.=" $key = '$value' ,";
            }
                $sql = rtrim($sql, ' ,');
                $jalan = mysql_query($sql);
            if($jalan){
                echo "<script>alert('Data berhasil disimpan');document.location.href='$alamat'</script>";
            }else{
                echo mysql_error();
            }
        }
	  function upload($foto, $tempat){
            $alamat = $foto['tmp_name'];
            $namafile = $foto['name'];
            move_uploaded_file($alamat, "$tempat/$namafile");
            return $namafile;
        }
      function tampil($table){
            $sql = "select * from $table";
            $tampil =  mysql_query($sql);
            while($data = mysql_fetch_array($tampil))
                $isi[] = $data;
            return $isi;
        }
		function edit($table, $where){
			$sql = "SELECT * FROM $table WHERE $where";
			$jalan = mysql_fetch_array(mysql_query($sql));
			return $jalan;
		}
        
        //hapus
        function hapus($table, $where, $redirect){
            $sql = "delete from $table where $where ";
            $jalan = mysql_query($sql);
            if($jalan){
                echo "<script>alert('Terhapus');
                document.location.href='$redirect'</script>";
            }else{
                echo mysql_error();
            }
        }
         
        //ubah
        function update($table, array $field, $where, $redirect){
            $sql = "update $table set";
            foreach($field as $key => $value){
                $sql.= " $key = '$value' ,";
            }
            $sql = rtrim($sql, ' ,');
			$sql .="WHERE $where";
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('Berhasil diupdate');document.location.href='$redirect'</script>";
			} else {
				mysql_error();
			}
        }
        

 }
?>