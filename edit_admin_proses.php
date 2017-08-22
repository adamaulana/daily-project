  <?php
  include('config.php');
          $uss = $_POST['uss'];
          $pass = $_POST['pass'];
          $id = $_POST['id'];
          $query = mysql_query("UPDATE admin set nama_admin = '$uss',password = '$pass' where id_admin = '$id'") or die (mysql_error());
          if($query){
            header("location:data_admin.php");
          }else{
            echo "Data gagal di update";
          }
        ?>