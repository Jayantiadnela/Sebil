<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();
        // panggil model yang telah dibuat
        $this->load->model('M_user');

    }

	public function index()
	{
		$data['user']	= $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Silahkan Pilih Mobil Yang ingin disewa!';

		// amvbil data mobil di model
		$data['mobil'] = $this->M_user->ambilMobil()->result_array();

		$this->load->view('tampilan/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('tampilan/footer');
	}

	// sewa
	public function sewa_mobil()
	{
		$data['user']	= $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Silahkan lengkapi data sewa!';

		// ambil id mobil
		$id = $this->uri->segment(3);

		// cari didalam model
		$data['mobil'] = $this->M_user->cariMobil($id)->row_array();

		$this->load->view('tampilan/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/topbar', $data);
		$this->load->view('user/sewa', $data);
		$this->load->view('tampilan/footer');
	}

	// fungsi pembayaran
	public function bayar()
	{
		// amvil data dari form
		$id_mobil		= $this->input->post('id_mobil');
		$kode_mobil 	= $this->input->post('kode_mobil');
		$nama_mobil		= $this->input->post('mobil');
		$id_user 		= $this->input->post('id_user');
		$merek_mobil 	= $this->input->post('merek');
		$nomor_polisi 	= $this->input->post('polisi');
		$harga_sewa 	= $this->input->post('harga');
		$tgl_sewa	 	= $this->input->post('tgl_sewa');
		$lama_sewa	 	= $this->input->post('lama');
		$jam_sewa	 	= $this->input->post('jam_sewa');
		$jumlah_sewa	= $this->input->post('jum');

		// ambil konfigurasi untuk upload gambar ktp
		$config['upload_path'] 		= './ktp';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('ktp');
		$namaGambar		= $this->upload->data('file_name');

		// simpan data didalam array
		$data = 
		[
			'id_mobil'		=> $id_mobil,
			'kode_mobil'	=> $kode_mobil,
			'nama_mobil'	=> $nama_mobil,
			'id_user'		=> $id_user,
			'merek_mobil'	=> $merek_mobil,
			'nomor_polisi'	=> $nomor_polisi,
			'harga_sewa'	=> $harga_sewa,
			'tanggal_sewa'	=> $tgl_sewa,
			'lama_sewa'		=> $lama_sewa,
			'jam_sewa'		=> $jam_sewa,
			'jumlah_sewa'	=> $jumlah_sewa,
			'ktp'			=> $namaGambar
		];

		// lakukan proses input didalam model
		$this->M_user->dataSewa($data);

		// ambil data untuk melakukan pembayaran melalui model
		$data['bayar'] = $this->M_user->pembayaran($id_mobil)->row_array();
		$data['user']	= $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Pilih Metode Pembayaran!';

		$this->load->view('tampilan/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/topbar', $data);
		$this->load->view('user/pembayaran', $data);
		$this->load->view('tampilan/footer');
	}

	// pembayaran
	public function pembayaran()
	{
		// ambil data dri form
		$id_sewa =	$this->input->post('id_sewa');
		$jumlah  =	$this->input->post('jumlah');
		$metode  = 	$this->input->post('metode');
		$id_user =  $this->input->post('id_user');

		//upload gbukti pembayaran
		// ambil konfigurasi untuk upload gambar ktp
		$config['upload_path'] 		= './bukti';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('bukti');
		$namaGambar		= $this->upload->data('file_name');

		if (!$namaGambar) {
			$namaGambar = '';
		} else {
			$namaGambar = $namaGambar;
		}

		// simpan data didalam array
		$data = [
			'id_sewa'			=> $id_sewa,
			'id_user'			=> $id_user,
			'jumlah_pembayaran'	=> $jumlah,
			'metode_pembayaran'	=> $metode,
			'bukti_pembayaran'	=> $namaGambar
		];

		// inpout kedapatabase di model
		$this->M_user->dataPembayaran($data);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Berhasil disimpan, silahkan cek di riwayat sewa!</div>');

		// lakukan redirect
		redirect('index.php/user');
	}

	// menampilkan data riwayat sewa
	public function riwayat()
	{
		$data['user']	= $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Riwayat Sewa!';

		// iduser
		$id = $this->session->userdata('id_user');
		// kuari riwayat
		$data['riwayat']	= $this->M_user->riwayat($id)->result_array();

		$this->load->view('tampilan/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/topbar', $data);
		$this->load->view('user/riwayat', $data);
		$this->load->view('tampilan/footer');
	}

	// membatalkan sewa
	public function batalsewa()
	{
		// ambil id dari url
		$id = $this->uri->segment(3);

		// 
		// lakukan proses hapus di model
		$this->M_user->hapusSewa($id);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Berhasil dihapus!</div>');

		// lakukan redirect
		redirect('index.php/user/riwayat');

	}

	// edit profile
	public function edit()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Edit Profile User!';

		//menampilkan tampilan halaman dashboard admin
		$this->load->view('tampilan/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/topbar', $data);
		$this->load->view('user/profile', $data);
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
		$this->M_user->update_profile($email, $data);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Profile berhasil diubah!</div>');

		// lakukan redirect
		redirect('index.php/user/edit');
	}

	// bayar sewa
	public function bayar_sewa()
	{
		// lakukan kueri kedb dari data session saat login ke db untuk mencari data.
		$data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email_user')])->row_array();
		$data['judul']	= 'Lanjutkan Pembayaran!';

		$id = $this->uri->segment(3);

		$data['bayar']	= $this->M_user->bayar_sewa($id)->row_array();

		$this->load->view('tampilan/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/topbar', $data);
		$this->load->view('user/bayar', $data);
		$this->load->view('tampilan/footer');
	}

	// lanjut bayar
	public function lanjut_bayar()
	{
		// ambil data
		$metode = $this->input->post('metode');
		$bayar = $this->input->post('id_bayar');

		// ambil konfigurasi untuk upload bukti
		$config['upload_path'] 		= './bukti';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('bukti');
		$namaGambar		= $this->upload->data('file_name');

		// simpan didalam array
		$data = [
			'metode_pembayaran'	=> $metode,
			'bukti_pembayaran'	=> $namaGambar
		];

		// simpan menggunakan model
		$this->M_user->updateBayar($bayar, $data);

		// set pesan jika masuk ke proses ini untuk ditampilkan
		$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');

		// lakukan redirect
		redirect('index.php/user/riwayat');
	}
}
