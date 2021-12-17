<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();
        // panggil model yang telah dibuat
        $this->load->model('M_auth');

    }

	// fungsi untuk melakukan login
	public function index()
	{
		// mensetting rules/aturan di setiap inputan di form pendaftaran login
		$this->form_validation->set_rules('email', 'Email', 'required|trim', ['required' => 'Silahkan masukkan email untuk login!']);

		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Silahkan masukkan password untuk login!']);

		// fungsi jika form dijalankan bernilai false akan menampilkan ulang tmpilan form
		if ($this->form_validation->run() == FALSE) {
			$data['pesan']	= 'Halaman Login!';

			$this->load->view('layout/header', $data);
			$this->load->view('auth/index');
			$this->load->view('layout/footer');
		} else {
			// mengambil data yang user input di form
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			// cari email yang dimasukkan user di database
			// lakukan didalam model
			$query = $this->M_auth->cariuser($email);

			// jika ada
			if ($query) {
				// ambil password dan cocokkan dari inputan user
				// lakukan verify password untuk menjadikan password yg acak ke semula
				if (password_verify($password, $query['password_user'])) {
					// jika sama ambil rolenya
					if ($query['role'] == 2) {
						// ambil sata untuk dijadikan session
						$data = [
							'id_user'		=> $query['id_user'],
							'email_user'	=> $query['email_user'],
							'nohp_user'		=> $query['nohp_user']
						];

						// lakukan set sessioan datanya
						$this->session->set_userdata($data);

						// lakukan redirect kehalaman user
						// jika role 2 maka akan ke halaman dashboard user
						redirect('index.php/user');
					} else {
						// ambil sata untuk dijadikan session
						$data = [
							'email_user'	=> $query['email_user'],
							'nohp_user'		=> $query['nohp_user']
						];
						// lakukan set sessioan datanya
						$this->session->set_userdata($data);

						// lakukan redirect kehalaman user
						// jika role selain 2 maka akan ke halaman admin
						redirect('index.php/admin');

					}
				} else {
					// set pesan jika masuk ke proses ini untuk ditampilkan
					$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					// lakukan redirect
					redirect('index.php/auth');
				}
			} else {
				// set pesan jika masuk ke proses ini untuk ditampilkan
				$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Akun tidak ditemukan!</div>');

				// lakukan redirect
				redirect('index.php/auth');
			}

		}

		
	}

	// fungsi untuk melakkkan registari user baru
	public function daftar()
	{
		// mensetting rules/aturan di setiap inputan di form pendaftaran user baru
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Wajib diisi!']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email_user]', 
			[
				'required' 	=> 'Nama Wajib diisi!',
				'is_unique'	=>	'Email sudah terdaftar, silahkan coba gunakan email yang lain!'
			]
		);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', 
			[
				'required' 		=> 'Password Wajib diisi!',
				'min_length'	=> 'Minimal password 5 karakter!',
				'matches'		=> 'Password tidak sama!'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		// fungsi jika form dijalankan bernilai false akan menampilkan ulang tmpilan form
		if ($this->form_validation->run() == FALSE) {
			$data['pesan']	= 'Halaman Pendaftaran!';

			$this->load->view('layout/header', $data);
			$this->load->view('auth/daftar');
			$this->load->view('layout/footer');
		} else {
			// ambil data inputan dari form pendaftaran
			$nama 	= $this->input->post('nama');
			$email 	= $this->input->post('email');
			$nohp 	= $this->input->post('nohp');
			$pass   = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			// password hash digunakan untuk enkripsi password menjadi kode random/acak

			// simpan hasil data yang diambil didalam array
			$data = [
				'nama_user'		=> $nama,
				'email_user'	=> $email,
				'nohp_user'		=> $nohp,
				'password_user'	=> $pass,
				'role'			=> 2,
				'gambar_user'	=> 'default.jpg'
			];
			// melakukan input data yang ada didalam array didalam model
			$this->M_auth->pendaftaran($data);

			// men setting data untuk ditampilkan apabila proses sampai disini
			$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Selamat! Akun berhasil dibuat!</div>');

			// melakukan redirect ke halaman login apabila semua data sukses di input kedalam database
			redirect('index.php/auth');
		}

	}

	// fungsi untuk keluar dari akun
	public function keluar()
	{
        $this->session->unset_userdata('email_user');
        $this->session->unset_userdata('nohp_user');

        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Berhasil keluar!</div>');

        redirect('index.php/auth');
	}


}
