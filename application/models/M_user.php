<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

		//amvil data mobil dari tabel modil 
	public function ambilMobil()
	{
		$this->db->select('*');
		$this->db->from('mobil');
		$this->db->order_by('id_mobil', 'DESC');
		return $this->db->get();
	}

	public function update_profile($email, $data)
	{
	 	$this->db->set($data);
        $this->db->where('email_user', $email);
        $this->db->update('user');
	}

	// cari mobil berdasarkan id
	public function cariMobil($id)
	{
		$this->db->select('*');
		$this->db->from('mobil');
		$this->db->where('id_mobil', $id);
		return $this->db->get();
	}

	// input data sewa
	public function dataSewa($data)
	{
		return $this->db->insert('sewa', $data);
	}

	public function pembayaran($id_mobil)
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->where('id_mobil', $id_mobil);
		$this->db->order_by('id_sewa', 'DESC');
		return $this->db->get();
	}

	// input data pembayaran
	public function dataPembayaran($data)
	{
		return $this->db->insert('pembayaran', $data);
	}

	// kuarti riwayat
	public function riwayat($id)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('id_user', $id);
		$this->db->order_by('id_pembayaran', 'DESC');
		return $this->db->get();

	}

	// hapus data sewa
	public function hapusSewa($id)
	{
		$this->db->where('id_pembayaran', $id);
		$this->db->delete('pembayaran');
	}

	// bayar
	public function bayar($id)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('id_pembayaran', $id);
		$this->db->order_by('id_pembayaran', 'DESC');
		return $this->db->get();
	}

	// 
	public function bayar_sewa($id)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('id_pembayaran', $id);
		$this->db->order_by('id_pembayaran', 'DESC');
		return $this->db->get();
	}

	// update pembayuaran
	public function updateBayar($bayar, $data)
	{
		$this->db->set($data);
        $this->db->where('id_pembayaran', $bayar);
        $this->db->update('pembayaran');
	}


}
