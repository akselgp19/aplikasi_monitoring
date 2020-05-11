<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>WAKTU AWAL</th>
                      <th>WAKTU AKHIR</th>
                      <th>KEGIATAN</th>
                      <th>SET PELAJARAN</th>
                      <th>DESKRIPSI</th>
                      <th>TAMBAH FOTO</th>
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
                      <td><?php echo $r['desk']?></td>
                      <td><?php echo $r['foto']?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>