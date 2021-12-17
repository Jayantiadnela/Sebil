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

                              <?= $this->session->userdata('info'); ?>

                               <?= form_open_multipart('index.php/admin/update_merek'); ?>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Mobil</label>
                                  <input type="text" class="form-control" id="merek" name="merek" value="<?= $cari_merek['merek_mobil']; ?>">

                                  <input type="hidden" class="form-control" id="idmerek" name="idmerek" value="<?= $cari_merek['id_merek']; ?>">
                                 
                                  
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            </div>
                        </div>
                    </div>