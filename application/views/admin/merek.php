

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
                    <p class="mb-4">Data dibawah berisikan semua lapangan yang bernah anda buat sebelumnya!.</p>
                    <?= $this->session->userdata('info'); ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold btn btn-primary" data-toggle="modal" data-target="#merekMobil">Tambahkan Merek Mobil!</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Merek Mobil</th>
                                            
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($merek as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $aa['merek_mobil']; ?></td>
                                            <td>
                                             <a href="edit_merek/<?= $aa['id_merek'];?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>

                                            <a href="hapus_merek/<?= $aa['id_merek'];?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');"><i class="fa fa-trash"></i></a>
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
