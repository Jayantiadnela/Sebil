<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= $pesan; ?></h1>
                                </div>

                                <?= $this->session->flashdata('info'); ?>

                                <form class="user" method="POST" action="<?= base_url('index.php/auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Masukkan Email...">
                                         <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                                         <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Masuk
                                    </button>
                                </form>
                                <hr>
                                
                                <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>index.php/auth/daftar">Buat akun baru!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>