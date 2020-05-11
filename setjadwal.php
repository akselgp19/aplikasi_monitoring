<?php
include "config/koneksi.php";
if(isset($_POST['simpan'])){
  $sql = mysqli_query($con,"INSERT INTO setjadwal(waktuawal,waktuahir,kegiatan,setpelajaran) VALUES ('$_POST[waktuawal]','$_POST[waktuahir]','$_POST[kegiatan]','$_POST[setpelajaran]')");

  $eksekusi = mysqli_query($con, $sql);
  echo "<script>alert('Berhasil tersimpan');document.location.href='dashboard.php?menu=setjadwal'</script>";


}
 // ini untuk opsi delete hapus
       if(isset($_GET['delete'])){
            $sql = mysqli_query($con,"DELETE FROM setjadwal WHERE kegiatan = '$_GET[kegiatan]'");
            if($sql){
                echo "<script>alert('data berhasil dihapus');document.location.href='dashboard.php?menu=setjadwal'</script>";
            }
            else{
                echo "<script>alert('data gagal dihapus');document.location.href='dashboard.php?menu=setjadwal'</script>";
            }
        }
        if(isset($_GET['edit'])){
            $sql = mysqli_query($con,"SELECT * FROM setjadwal WHERE kegiatan ='$_GET[kegiatan]'");
            $row_edit = mysqli_fetch_array($sql);
        }else{
            $row_edit=null;
        }
        if(isset($_POST['update'])){
            $sql = mysqli_query($con,"UPDATE setjadwal SET waktuawal = '$_POST[waktuawal]',waktuahir = '$_POST[waktuahir]', kegiatan = '$_POST[kegiatan]', setpelajaran = '$_POST[setpelajaran]' WHERE kegiatan = '$_GET[kegiatan]'");
            if($sql){
                echo "<script>alert('data berhasil diupdate');
                document.location.href= 'dashboard.php?menu=setjadwal'</script>";
            }
            else{
                echo "<script>alert('data gagal diupdate');
                document.location.href= 'dashboard.php?menu=setjadwal'</script>";
            }
          }
?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Set Jadwal</h6>

              <table>
              <tr> 
                <th>NIS : 
                <?php
                    $sql = mysqli_query($con,"SELECT * FROM register");
                    while ($r=mysqli_fetch_array($sql)){  
                ?>
                    <?php echo $r['nis']?>
                <?php } ?>
                </th> 
              </tr>         
                  <th><?php echo date ("D/d/M/Y");?></th>
              </table>

            </div>
            <div class="card-body">
            <form method="post">
              <div class="form-group">
                <div class="row">

                      WAKTU AWAL
                    <input type="time" name="waktuawal"  value="<?php echo $row_edit['waktuawal'];?>" class="form-control">
                      
                      WAKTU AKHIR
                    <input type="time" name="waktuahir"  value="<?php echo $row_edit['waktuahir'];?>" class="form-control">

                      KEGIATAN         
                    <input type="text" name="kegiatan"  value="<?php echo $row_edit['kegiatan'];?>" class="form-control">

                    SET PELAJARAN
                    <input type="text" name="setpelajaran"  value="<?php echo $row_edit['setpelajaran'];?>" class="form-control">
                    
                </div>
              </div>
                <?php
          if(isset ($_GET['edit'])){
            ?>
            <button type="submit" name="update" class="btn btn-primary" value="update"> Update</button>
            <td><a href="dashboard.php?menu=setjadwal">Batal</a></td>
            <?php
          }else{
            ?>
            <td><input type="submit" name="simpan" value="simpan"></td>
            <?php
          }
        ?>
            </form>
            <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>WAKTU AWAL</th>
                      <th>WAKTU AKHIR</th>
                      <th>KEGIATAN</th>
                      <th>SET PELAJARAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = mysqli_query($con,"SELECT * FROM setjadwal");
                      while ($r=mysqli_fetch_array($sql)){  
                    ?>
                    <tr>
                      <td><?php echo $r['waktuawal']?></td>
                      <td><?php echo $r['waktuahir']?></td>
                      <td><?php echo $r['kegiatan']?></td>
                      <td><?php echo $r['setpelajaran']?></td>
                      <td><a href="?menu=setjadwal&delete&kegiatan=<?php echo $r['kegiatan']?>"onClick="return confirm('Apakah anda yakin akan menghapus ini?')">HAPUS</a></td>
                      <td><a href="?menu=setjadwal&edit&kegiatan=<?php echo $r['kegiatan']?>">EDIT</a></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>