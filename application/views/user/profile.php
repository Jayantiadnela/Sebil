
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                    <div class="row">
                    	<div class="col-lg-8">

                    		<?= $this->session->userdata('info'); ?>

                    		<?= form_open_multipart('index.php/user/edit_profile'); ?>
	                    		<div class="form-group row">
								    <label for="email" class="col-sm-2 col-form-label">Email</label>
								    <div class="col-sm-10">
								    	 <input type="text" class="form-control" id="email" name="email" value="<?= $user['email_user']; ?>" readonly>
								    </div>
								 </div>

								 <div class="form-group row">
								    <label for="name" class="col-sm-2 col-form-label">Nama</label>
								    <div class="col-sm-10">
								    	 <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama_user']; ?>">
								    	 <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								 </div>

								 <div class="form-group row">
								    <label for="nohp" class="col-sm-2 col-form-label">No HP</label>
								    <div class="col-sm-10">
								    	 <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $user['nohp_user']; ?>" readonly>
								    	 <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								 </div>

								 <div class="form-group row">
								   <div class="col-sm-2">Image</div>
									   	<div class="col-sm-10">
										   	<div class="row">
										   		<div class="col-sm-3">
										   			<img src="<?= base_url('gambar/'); ?><?= $user['gambar_user']; ?>" class="img-thumnail" style="object-fit: cover;" width="150" height="150">
										   		</div>
										   		<div class="col-sm-9">
										   			<div class="custom-file">
													  <input type="file" id="image" name="image">
													  
													</div>
										   		</div>
										   	</div>
									   </div>
								 </div>
								 <div class="form-group row">
								 	<div class="col-sm-2">
								 		<button type="submit" class="btn btn-primary">Simpan!</button>
								 	</div>
								 </div>
                    			
                    		</form>
                    	</div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
