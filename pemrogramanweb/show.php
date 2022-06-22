<?php include "header.php" ?>
 <div class="row">
 <div class="col-md-12">
 <h2>Data Mahasiswa</h2>
 <form action="show.php" method="get">
 <div class="input-group mb-3">
 <input type="text" class="form-control" placeholder="Masukan NIM atau Nama..." name="search">
 <div class="input-group-append">
 <button class="btn btn-primary" type="submit" value="Cari" id="button-search">Cari</button>
 </div>
 </div>
 </form>
 </div>
 </div>
 
 <div class="row">
 <div class="col-md-12">
 <a href="add.php" class="btn btn-primary mb-2">Tambah Data</a> 
 <a href="print.php" class="btn btn-success mb-2" target="_blank">Cetak Data</a>
 <div class="table-responsive">
 <table class="table table-sm table-bordered table-hover m-0 text-center">
 <tr>
 <th>No</th>
 <th>NIM</th>
 <th>Nama</th>
 <th>Alamat</th>
 <th>Email</th>
 <th>Telepon</th>
 <th>Aksi</th>
 </tr>
 <?php
 include 'connection.php';
 if (isset($_GET['search'])) 
{
 $keyword = $_GET['search'];
 $result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim LIKE '%".$keyword."%' OR nama LIKE '%".$keyword."%'");
}else
 $result = mysqli_query($con, "SELECT * FROM mahasiswa ORDER BY nim ASC");
 $no = 1;
 while($data = mysqli_fetch_array($result)){
 ?>
 
 <tr>
 <td><?php echo $no++; ?></td>
 <td><?php echo $data['nim']; ?></td>
 <td><?php echo $data['nama']; ?></td>
 <td><?php echo $data['alamat']; ?></td>
 <td><?php echo $data['email']; ?></td>
 <td><?php echo $data['telepon']; ?></td>
 <td>
 <a class="btn btn-sm btn-success" href="update.php?id=<?php echo $data['id']; ?>">Edit</a>
 <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
 </td>
 </tr>
 <?php
 }
 ?>
 </table>
 </div> 
 </div>
 </div>
<?php include "footer.php" ?>