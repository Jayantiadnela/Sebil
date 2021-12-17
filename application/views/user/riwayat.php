

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
                                            <th>ID SEWA</th>
                                             <th>Metode Pembayaran</th>
                                             <th>Jumlah</th>
                                             <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($riwayat as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $aa['id_sewa']; ?></td>
                                            <td><?= $aa['metode_pembayaran']; ?></td>
                                            <td><?= $aa['jumlah_pembayaran']; ?></td>
                                            <td>
                                                <?php $b = $aa['bukti_pembayaran']; ?>

                                                <?php if (!$b): ?>
                                                    <h4 class="badge badge-danger"> Belum Bayar!</h4>
                                                <?php endif; ?>

                                                <?php if ($b ): ?>
                                                    <h4 class="badge badge-success"> Lunas!</h4>
                                                <?php endif; ?>
                                                    
                                            </td>
                                            <td>
                                             <?php $b = $aa['bukti_pembayaran']; ?>

                                                <?php if (!$b): ?>
                                                    <a href="bayar_sewa/<?= $aa['id_pembayaran']; ?>" class="btn btn-primary"><i class="fa fa-circle"></i> Bayar Sekarang!</a>


                                                    <a href="batalsewa/<?= $aa['id_pembayaran']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin membatalklan sewa?');"><i class="fa fa-trash"></i> Batal Sewa</a>
                                                <?php endif; ?>

                                            

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
