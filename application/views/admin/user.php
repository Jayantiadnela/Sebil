

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
                                            <th>Merek Mobil</th>
                                             <th>Email</th>
                                             <th>No Hp</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($duser as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $aa['nama_user']; ?></td>
                                            <td><?= $aa['email_user']; ?></td>
                                            <td><?= $aa['nohp_user']; ?></td>
                                            <td>
                                             
                                            <a href="hapus_user/<?= $aa['id_user'];?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');"><i class="fa fa-trash"></i> Hapus</a>
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
