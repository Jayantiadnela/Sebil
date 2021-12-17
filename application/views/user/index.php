

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
                    <?= $this->session->userdata('info'); ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mobil</th>
                                             <th>Merek</th>
                                             <th>Warna</th>
                                             <th>Jmlh Kursi</th>
                                             <th>Tahun Dibuat</th>
                                             <th>Nomor Poilis</th>
                                             <th>Harga Sewa</th>
                                             <th>Keterangan</th>
                                             <th>gambar</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($mobil as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $aa['nama_mobil']; ?></td>
                                            <td><?= $aa['merek_mobil']; ?></td>
                                            <td><?= $aa['warna_mobil']; ?></td>
                                            <td><?= $aa['jumlah_kursi']; ?></td>
                                            <td><?= $aa['tahun_produksi']; ?></td>
                                            <td><?= $aa['nomor_polisi']; ?></td>
                                            <td><?= $aa['harga_sewa']; ?></td>
                                            <td><?= $aa['keterangan']; ?></td>
                                             <td><img src="<?= base_url('mobil/'); ?><?= $aa['gambar']; ?>" width="50" height="50"></td>
                                            <td>
                                             
                                            <a href="user/sewa_mobil/<?= $aa['id_mobil'];?>" class="btn btn-primary" >Sewa</a>
                                            </td>
                                        </tr>
                                          
                                        <?php $i++; ?>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
