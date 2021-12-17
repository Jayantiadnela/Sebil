
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2021-2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin keluar dari aplikasi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik tombol keluar jika ingin keluar!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('index.php/auth/keluar'); ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nambah Mobil-->
    <div class="modal fade" id="tambahMobil" tabindex="-1" role="dialog" aria-labelledby="tambahMobil" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="tambahMobil">Tambahkan Mobil!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                        <?= form_open_multipart('index.php/admin/tambah_mobil'); ?>
                          <div class="modal-body">

                            <div class="form-group">
                                <label for="jumlah">Masukkan Nama Mobil!</label>
                                <input type="text" class="form-control" id="mobil" name="mobil" placeholder="Masukkan nama Mobil" required="">
                                
                            </div>
                            <div class="row">
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Warna:</label>
                                        <select name="warna" class="form-control">
                                            <option value="Hitam">Hitam</option>
                                            <option value="Merah">Merah</option>
                                            <option value="Putih">Putih</option>
                                            <option value="Abu-abu">Abu-abu</option>
                                            <option value="Hijau">Hijau</option>
                                            <option value="Kuning">Kuning</option>
                                            <option value="Biru">Biru</option>
                                            <option value="Orange">Orange</option>                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Merek:</label>
                                        <select name="merek" class="form-control">
                                            <?php foreach ($merek as $m) :?>
                                                <option value="<?= $m['merek_mobil']; ?>"><?= $m['merek_mobil']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Kode Mobil:</label>
                                         <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan kode mobil">
                                    </div>
                                </div>
                             </div>

                             <div class="row">
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Jumlah Kursi:</label>
                                        <input type="number" class="form-control" id="kursi" name="kursi" placeholder="Masukkan Jumlah Kursi">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tahun Produksi:</label>
                                        <input type="number" class="form-control" id="produksi" name="produksi" placeholder="Masukkan Tahun Produksi">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nomor Polisi:</label>
                                         <input type="text" class="form-control" id="polisi" name="polisi" placeholder="Masukkan no polisi">
                                    </div>
                                </div>
                             </div>

                             <div class="form-group">
                                <label for="harga">Harga Sewa!</label>
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Sewa Perhari">
                            </div>

                           
                            <div class="form-group">
                                <label for="jumlah">Gambar!</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                             </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan!</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                            </div>

                             
                           
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambahkan sekarang!</button>
                          </div>
                       </form>
                    </div>
                  </div>
    </div>

    <!-- modal menambah merek mobil -->
    <div class="modal fade" id="merekMobil" tabindex="-1" role="dialog" aria-labelledby="merekMobil" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="merekMobil">Tambahkan Merek Mobil!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="<?= base_url('index.php/admin/tambah_merek'); ?>" method="POST">
                          <div class="modal-body">

                            <div class="form-group">
                                <label for="jumlah">Masukkan Merek Mobil!</label>
                                <input type="text" class="form-control" id="merek" name="merek" placeholder="Masukkan merek Mobil" required="">
                             </div>
                             
                           
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Data!</button>
                          </div>
                       </form>
                    </div>
                  </div>
    </div>

   


   
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

    <script src="<?= base_url('assets/'); ?>js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#dataTable').DataTable();
      } );
    </script>

    <script>
      function jam()
      {
        var lama = document.getElementById("lama").value;
        var jumlah = document.getElementById("harga").value;
        

        var kali = lama * jumlah;

        document.getElementById("total").value=kali;
        document.getElementById("makai").innerHTML=lama;
      }

    </script>

    <script type="text/javascript">
      function pil()
      {
        var lama = document.getElementById("spr").value;
        var jumlah = document.getElementById("total").value;

        var x = parseInt(lama)+parseInt(jumlah);

        document.getElementById("jum").value=x;
      }
    </script>


    

    

</body>

</html>