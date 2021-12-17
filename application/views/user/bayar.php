<div class="container-fluid">
  <form action="<?= base_url(); ?>index.php/user/lanjut_bayar" enctype="multipart/form-data" method="post" accept-charset="utf-8">
  <section>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-8 mb-4">
        
        <!-- Card -->
        <div class="card wish-list pb-1">
          <div class="card-body">

            <h5 class="mb-3"><?= $judul; ?></h5>

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-lg-12">
                
                <input type="hidden" class="form-control mb-0 mb-lg-2" id="id_bayar" name="id_bayar" value="<?= $bayar['id_pembayaran']; ?>">

                <!-- First name -->
                <div class="md-form md-outline mb-0 mb-lg-4">
                  <label for="firstName">Jumlah Pembayaran</label>
                  <input type="text" class="form-control mb-0 mb-lg-2" id="jumlah" name="jumlah" value="<?= $bayar['jumlah_pembayaran']; ?>" readonly="">
                </div>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->


            <!-- Address Part 2 -->
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pilih Metode Pembayaran!</label>
              <select class="form-control" name="metode" id="metode">
                <option value="">Silahkan pilih metode pembayaran</option>
                <option value="BCA">BCA | 12345678 a/n SEWA MOBIL</option>
                <option value="OVO">OVO | 08999212 a/n SEWA MOBIL</option>
              </select>
            </div>
            <!-- Postcode / ZIP -->

            <div class="md-form md-outline mb-lg-4">
              <label for="form17">Upload Bukti Pembayaran</label>
              <input type="file" id="bukti" name="bukti" class="form-control" required="">
            </div>

              <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Selesai!</button>

          </div>
        </div>
        <!-- Card -->

      </div>
      <!--Grid column-->

           


      

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->
    
  </section>
</form>
</div>