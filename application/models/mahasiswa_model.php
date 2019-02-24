<?php 

class mahasiswa_model extends CI_model {
	public function getAllMahasiswa()
	{
		return $this->db->get('mahasiswa')->result_array();
	}

	public function tambahDataMahasiswa()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"nim" => $this->input->post('nim', true),
			"jurusan" => $this->input->post('jurusan', true)

		];

		$this->db->insert('mahasiswa', $data);
	}

	public function hapusDataMahasiswa($id)
	{
		// $this->db->where('nama',$nama);
		$this->db->delete('mahasiswa', ['id' => $id]);
	}

	public function getMahasiswaByID($id)
	{
		return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
	}

	public function ubahDataMahasiswa()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"nim" => $this->input->post('nim', true),
			"jurusan" => $this->input->post('jurusan', true)

		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('mahasiswa', $data);
	}

	public function cariDataMahasiswa()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('nama', $keyword);
		$this->db->or_like('jurusan',$keyword);
		$this->db->or_like('email',$keyword);
		$this->db->or_like('nim',$keyword);
		return $this->db->get('mahasiswa')->result_array();
	}

}