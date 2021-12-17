<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();
        // panggil model yang telah dibuat
        $this->load->model('M_admin');

    }

	public function index()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Dashboard Admin!';

		// ambil data jumlah mobil
		$data['mobil']	= $this->M_admin->jumlahMobil();

		// ambil data jumlah user terdaftar
		$data['users']	= $this->M_admin->jumlahUsers();

		// menghitung jumlah pendaoatan
		$data['pendapatan']	= $this->M_admin->jumlahPendapatan();

		//menampilkan tampilan halaman dashboard admin
		$this->load->view('tampilan/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('tampilan/footer');
	}

	// fungsi untuk menampilkan tampila edit user
	public function edit()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Edit Profile Admin!';

		//menampilkan tampilan halaman dashboard admin
		$this->load->view('tampilan/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('tampilan/footer');
	}

	// lakukan proses edit profile admin
	public function edit_profile()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();

		// ambil data yang ingin diganti
		$nama = $this->input->post('nama');

		// ambil konfigurasi untuk upload gambar
		$config['upload_path'] 		= './gambar';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('image');
		$namaGambar		= $this->upload->data('file_name');

		if (!$namaGambar) {
			$namaGambar = 'default.jpg';
		} else {
			$namaGambar = $namaGambar;
		}

		$email 	= $this->session->userdata('email_user');

		// tmpung data
		$data = [
			'nama_user'			=> $nama,
			'gambar_user'		=> $namaGambar
		];

		// lakukan proses update di model
		$this->M_admin->update_profile($email, $data);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Profile berhasil diubah!</div>');

		// lakukan redirect
		redirect('index.php/admin/edit');
	}

	// menampilkan daftar mobile dari database
	public function daftarmobil()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Daftar Mobil Untuk Disewakan!';

		// query untuk ambil data merek mobil
		// lakukan query di model
		$data['merek']	= $this->M_admin->ambilMerek()->result_array();

		// query data mobil
		$data['semua_mobil']	= $this->M_admin->semuaMobil()->result_array();

		//menampilkan tampilan halaman dashboard admin
		$this->load->view('tampilan/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/mobil', $data);
		$this->load->view('tampilan/footer', $data);
	}

	// daftar merek
	public function daftarmerek()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Daftar Merek!';

		// query untuk ambil data merek mobil
		// lakukan query di model
		$data['merek']	= $this->M_admin->ambilMerek()->result_array();

		//menampilkan tampilan halaman dashboard admin
		$this->load->view('tampilan/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/merek', $data);
		$this->load->view('tampilan/footer', $data);
	}

	// daftar user
	public function daftaruser()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Daftar User!';

		// query untuk ambil data merek mobil
		// lakukan query di model
		$data['duser']	= $this->M_admin->ambilUser()->result_array();

		//menampilkan tampilan halaman dashboard admin
		$this->load->view('tampilan/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('tampilan/footer', $data);
	}

	// menamba merek mobil
	public function tambah_merek()
	{
		$merek = $this->input->post('merek');

		$data = ['merek_mobil'	=> $merek];

		$this->M_admin->TambahMerek($data);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Merek Mobil Berhasil ditambahkan!</div>');

		// lakukan redirect
		redirect('index.php/admin/daftarmobil');

	}

	// menambahkan mobil ke db
	public function tambah_mobil()
	{
		// ambil dari dari form
		$nama_mobil = $this->input->post('mobil');
		$warna 		= $this->input->post('warna');
		$merek 		= $this->input->post('merek');
		$kode 		= $this->input->post('kode');
		$kursi 		= $this->input->post('kursi');
		$produksi 	= $this->input->post('produksi');
		$polisi 	= $this->input->post('polisi');
		$keterangan = $this->input->post('keterangan');
		$harga 		= $this->input->post('harga');

		// ambil konfigurasi untuk upload gambar
		$config['upload_path'] 		= './mobil';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('image');
		$namaGambar		= $this->upload->data('file_name');

		
		// simpan data didalam array
		$data = [
			'nama_mobil'	=> $nama_mobil,
			'warna_mobil'	=> $warna,
			'kode_mobil'	=> $kode,
			'merek_mobil'	=> $merek,
			'jumlah_kursi'	=> $kursi,
			'tahun_produksi'=> $produksi,
			'nomor_polisi'	=> $polisi,
			'keterangan'	=> $keterangan,
			'gambar'		=> $namaGambar,
			'harga_sewa'	=> $harga
		];

		// lakukan proses input didalam model
		$this->M_admin->tambahMobil($data);


		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Mobil Berhasil ditambahkan!</div>');

		// lakukan redirect
		redirect('index.php/admin/daftarmobil');

	}

	// fungsi menghpus mobil
	public function hapus_mobil()
	{
		// ambil ID mobil dari URL
		$id = $this->uri->segment(3);

		// lakukan penghapusan di model
		$this->M_admin->hapusMobil($id);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Mobil Berhasil dihapus!</div>');

		// lakukan redirect
		redirect('index.php/admin/daftarmobil');
	}

	// fungsi menghapus merek
	public function hapus_merek()
	{
		// ambil ID mobil dari URL
		$id = $this->uri->segment(3);

		// lakukan penghapusan di model
		$this->M_admin->hapusMerek($id);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Merek Mobil Berhasil dihapus!</div>');

		// lakukan redirect
		redirect('index.php/admin/daftarmerek');
	}

	// hapus user
	public function hapus_user()
	{
		// ambil id user dri url
		$id = $this->uri->segment(3);

		// lakukan hpus di model
		// lakukan penghapusan di model
		$this->M_admin->hapusUser($id);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">User Berhasil dihapus!</div>');

		// lakukan redirect
		redirect('index.php/admin/daftaruser');
	}

	// fungsi edit mobil
	public function edit_mobil()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Edit Data Mobil!';

		// mengambil id dari URL
		$id = $this->uri->segment(3);

		// melakukan query berdasarkan id di database
		// lakukan proses di model
		$data['cari_mobil'] = $this->M_admin->cariMobil($id)->row_array();

		// query untuk ambil data merek mobil
		// lakukan query di model
		$data['merek']	= $this->M_admin->ambilMerek()->result_array();

		//menampilkan tampilan halaman dashboard admin
		$this->load->view('tampilan/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/edit_mobil', $data);
		$this->load->view('tampilan/footer', $data);
	}

	// update merek
	public function edit_merek()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul'] = 'Edit Merek Mobil!';
		// mengambil id dari URL
		$id = $this->uri->segment(3);

		// melakukan query berdasarkan id di database
		// lakukan proses di model
		$data['cari_merek'] = $this->M_admin->cariMerek($id)->row_array();

		$this->load->view('tampilan/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/edit_merek', $data);
		$this->load->view('tampilan/footer', $data);
		
	}

	// update merek
	public function update_merek()
	{
		$merek = $this->input->post('merek');
		$idmerek = $this->input->post('idmerek');

		$data = ['merek_mobil' => $merek];
		// update di model
		$this->M_admin->updateMerek($data, $idmerek);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!</div>');

		// lakukan redirect
		redirect('index.php/admin/daftarmerek');
	}

	// proses update mobil
	public function update_mobil()
	{
		// amil data dari form
		$nama_mobil = $this->input->post('mobil');
		$warna 		= $this->input->post('warna');
		$merek 		= $this->input->post('merek');
		$kode 		= $this->input->post('kode');
		$kursi 		= $this->input->post('kursi');
		$produksi 	= $this->input->post('produksi');
		$polisi 	= $this->input->post('polisi');
		$keterangan = $this->input->post('keterangan');
		$harga 		= $this->input->post('harga');
		$lama 		= $this->input->post('gambarLama');
		$id 		= $this->input->post('idMobil');
		

		$this->form_validation->set_rules('mobil', 'Mobil', 'required', ['required'	=> 'Judul Mobil tidak boleh kosong!']);


		// ambil konfigurasi untuk upload gambar
		$config['upload_path'] 		= './mobil';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('image');
		$namaGambar		= $this->upload->data('file_name');

		if (!$namaGambar) {
			$namaGambar = $lama;
		} else {
			$namaGambar = $namaGambar;
		}

		$data = [
			'nama_mobil'	=> $nama_mobil,
			'warna_mobil'	=> $warna,
			'kode_mobil'	=> $kode,
			'merek_mobil'	=> $merek,
			'jumlah_kursi'	=> $kursi,
			'tahun_produksi'=> $produksi,
			'nomor_polisi'	=> $polisi,
			'keterangan'	=> $keterangan,
			'gambar'		=> $namaGambar,
			'harga_sewa'	=> $harga
		];

		// lakukan proses input didalam model
		$this->M_admin->updateMobil($id, $data);


		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!</div>');

		// lakukan redirect
		redirect('index.php/admin/daftarmobil');

	}
}
