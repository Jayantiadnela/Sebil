<div class="container-fluid">
  <form action="<?= base_url(); ?>index.php/user/bayar" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
                <input type="hidden" class="form-control mb-0 mb-lg-2" id="id_mobil" name="id_mobil" value="<?= $mobil['id_mobil']; ?>">
                <input type="hidden" class="form-control mb-0 mb-lg-2" id="kode_mobil" name="kode_mobil" value="<?= $mobil['kode_mobil']; ?>">
                <input type="hidden" class="form-control mb-0 mb-lg-2" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                <!-- First name -->
                <div class="md-form md-outline mb-0 mb-lg-4">
                  <label for="firstName">Nama Mobil</label>
                  <input type="text" class="form-control mb-0 mb-lg-2" id="mobil" name="mobil" value="<?= $mobil['nama_mobil']; ?>" readonly="">
                </div>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <!-- Company name -->
            <div class="md-form md-outline my-0 mb-lg-4">
              <label for="companyName">Merek Mobil</label>
              <input type="text" id="merek" name="merek" class="form-control mb-0" value="<?= $mobil['merek_mobil']; ?>" readonly="">
              
            </div>

            <!-- Address Part 1 -->
            <div class="md-form md-outline mt-0 mb-lg-4">
              <label for="form14">Warna Mobil</label>
              <input type="text" id="warna" name="warna" value="<?= $mobil['warna_mobil']; ?>" class="form-control" readonly="">
              
            </div>

             <div class="md-form md-outline mt-0 mb-lg-4">
              <label for="form14">Nomor Polisi</label>
              <input type="text" id="polisi" name="polisi" value="<?= $mobil['nomor_polisi']; ?>" class="form-control" readonly="">
              
            </div>

            <div class="md-form md-outline mt-0 mb-lg-4">
              <label for="form14">Harga Sewa</label>
              <input type="text" id="harga" name="harga" value="<?= $mobil['harga_sewa']; ?>" class="form-control" readonly="">
              
            </div>

            <div class="md-form md-outline mb-lg-4">
              <label for="form16">Tanggal Sewa</label>
              <input type="date" id="tgl_sewa" name="tgl_sewa" class="form-control">
              
            </div>

            <!-- Address Part 2 -->
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pilih Lama Sewa!</label>
              <select class="form-control" name="lama" id="lama" onclick="jam()">
                <option value="">Silahkan pilih lama sewa mobil</option>
                <option value="1">24 Jam</option>
                <option value="2">48 Jam</option>
                <option value="3">72 Jam</option>                
                <option value="4">96 Jam</option> 
                <option value="5">102 Jam</option> 
              </select>
            </div>
            <!-- Postcode / ZIP -->
            

            <!-- Town / City -->
            <div class="md-form md-outline mb-lg-4">
              <label for="form17">Jam Sewa</label>
              <input type="time" id="jam_sewa" name="jam_sewa" class="form-control">
              
            </div>

            <div class="md-form md-outline mb-lg-4">
              <label for="form17">Upload KTP</label>
              <input type="file" id="ktp" name="ktp" class="form-control" required="">
            </div>

             

          </div>
        </div>
        <!-- Card -->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4">

        <!-- Card -->
        <div class="card mb-4">
          <div class="card-body">

            <h5 class="mb-3">Jumlah yang harus dibayar!!</h5>

            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Harga Sewa Mobil perhari
                <span>Rp <?= $mobil['harga_sewa']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Lama Sewa?
                <span id="makai"></span>
              </li>
              
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total</strong>
                </div>
                <span><strong><input type="text" name="total" id="total" value="" class="form-control input-sm text-right" readonly=""></strong></span>
              </li>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Mau Makai Sopir atau tidak!!</label>
                <select class="form-control" name="spr" id="spr" onclick="pil()">
                  <option value="">Silahkan pilih mau pakai supir atau tidak</option>
                  <option value="150000">Iya!</option>
                  <option value="0">Tidak!</option>
                </select>
              </div>
               <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total yang harus dibayar!</strong>
                </div>
                <span><strong><input type="text" name="jum" id="jum" value="" class="form-control input-sm text-right" readonly=""></strong></span>
              </li>
            </ul>

            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Lanjut ke pembayaran!</button>

          </div>
        </div>
        <!-- Card -->

      

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->
    
  </section>
</form>
</div>