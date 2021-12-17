<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {


	public function update_profile($email, $data)
	{
	 	$this->db->set($data);
        $this->db->where('email_user', $email);
        $this->db->update('user');
	}

	public function TambahMerek($data)
	{
		return $this->db->insert('merek_mobil', $data);
	}
	
	// kueri merek mobil
	public function ambilMerek()
	{
		$this->db->select('*');
	    $this->db->from('merek_mobil');
	    $this->db->order_by('id_merek', 'DESC');
	    return $this->db->get();
	}

	// query data user
	public function ambilUser()
	{
		$this->db->select('*');
	    $this->db->from('user');
	    $this->db->where('role', 2);
	    $this->db->order_by('id_user', 'DESC');
	    return $this->db->get();
	}

	// 
	public function tambahMobil($data)
	{
		return $this->db->insert('mobil', $data);
	}

	// 
	public function semuaMobil()
	{
		$this->db->select('*');
	    $this->db->from('mobil');
	    $this->db->order_by('id_mobil', 'DESC');
	    return $this->db->get();
	}

	// hapus mobil
	public function hapusMobil($id)
	{
		$this->db->where('id_mobil', $id);
        $this->db->delete('mobil');
	    
	}

	// hapus merek
	public function hapusMerek($id)
	{
		$this->db->where('id_merek', $id);
        $this->db->delete('merek_mobil');
	}

	// hapus user
	public function hapusUser($id)
	{
		$this->db->where('id_user', $id);
        $this->db->delete('user');
	}
	// cari mobil
	public function cariMobil($id)
	{
		return $this->db->get_where('mobil', ['id_mobil' => $id]);
	}

	// cari merek
	public function cariMerek($id)
	{
		return $this->db->get_where('merek_mobil', ['id_merek' => $id]);
	}

	// update mobil
	public function updateMobil($id, $data)
	{
		$this->db->set($data);
        $this->db->where('id_mobil', $id);
        $this->db->update('mobil');
	}

	// upda merek
	public function updateMerek($data, $idmerek)
	{
		$this->db->set($data);
        $this->db->where('id_merek', $idmerek);
        $this->db->update('merek_mobil');
	}

	// jumlah mobil
	public function jumlahMobil()
	{
		$query = 'SELECT count(*) as mobil  FROM mobil';
        $a = $this->db->query($query);
        return $a->row()->mobil;
	}

	public function jumlahUsers()
	{
		$query = 'SELECT count(*) as users  FROM user';
        $a = $this->db->query($query);
        return $a->row()->users;
	}

	// jumlah pendapatan
	public function jumlahPendapatan()
	{
		$query = "SELECT SUM(jumlah_pembayaran) as pendapatan  FROM pembayaran";
        $a = $this->db->query($query);
        return $a->row()->pendapatan;
	}
}
