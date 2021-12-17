 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card p-3 shadow h-100 py-2">

                              <?= $this->session->userdata('pesan'); ?>

                               <?= form_open_multipart('index.php/admin/update_mobil'); ?>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Mobil</label>
                                  <input type="text" class="form-control" id="mobil" name="mobil" value="<?= $cari_mobil['nama_mobil']; ?>">
                                  <?= form_error('mobil', ' <small class="text-danger pl-1">', '</small>'); ?>
                                  
                                </div>

                                <div class="row">
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Warna:</label>
                                        <select name="warna" class="form-control">
                                            <option value="<?= $cari_mobil['warna_mobil']; ?>"><?= $cari_mobil['warna_mobil']; ?></option>
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
                                           <option value="<?= $cari_mobil['merek_mobil']; ?>"><?= $cari_mobil['merek_mobil']; ?></option>
                                            <?php foreach ($merek as $m) :?>
                                                <option value="<?= $m['merek_mobil']; ?>"><?= $m['merek_mobil']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Kode Mobil:</label>
                                         <input type="text" class="form-control" id="kode" name="kode" value="<?= $cari_mobil['kode_mobil']; ?>">
                                    </div>
                                </div>
                              </div>

                                <div class="row">
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Jumlah Kursi:</label>
                                        <input type="number" class="form-control" id="kursi" name="kursi" value="<?= $cari_mobil['jumlah_kursi']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tahun Produksi:</label>
                                        <input type="number" class="form-control" id="produksi" name="produksi" value="<?= $cari_mobil['tahun_produksi']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nomor Polisi:</label>
                                         <input type="text" class="form-control" id="polisi" name="polisi" value="<?= $cari_mobil['nomor_polisi']; ?>">
                                    </div>
                                </div>
                             </div>

                            <div class="form-group">
                                <label for="harga">Harga Sewa!</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="<?= $cari_mobil['harga_sewa']; ?>">
                            </div>

                            <div class="form-group">
                              <img src="<?= base_url('mobil/'); ?><?= $cari_mobil['gambar']; ?>" width="150" height="150">
                              <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $cari_mobil['gambar']; ?>">
                              <input type="hidden" name="idMobil" id="idMobil" value="<?= $cari_mobil['id_mobil']; ?>">
                            </div>

                                 <div class="form-group">
                                <label for="jumlah">Gambar!</label>
                                <input type="file" class="form-control" id="image" name="image" >
                              </div>

                               <div class="form-group">
                                <label for="keterangan">Keterangan!</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $cari_mobil['keterangan']; ?></textarea>
                              </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            </div>
                        </div>
                    </div>