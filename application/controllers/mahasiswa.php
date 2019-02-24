<?php 
class mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mahasiswa'] = $this->mahasiswa_model->getAllMahasiswa();
		if ( $this->input->post('keyword')) {
				$data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
		}
		$this->load->view('templates/header',$data);
		$this->load->view('mahasiswa/index');
		$this->load->view('templates/footer');
	}
	public function tambah()
	{
		$data['judul'] = 'Form tambah';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('nim','NIM','required|numeric');

		if( $this->form_validation->run() == FALSE ) {
			 $this->load->view('templates/header');
			 $this->load->view('mahasiswa/tambah');
			 $this->load->view('templates/footer');
		} else {
			$this->mahasiswa_model->tambahDataMahasiswa();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('mahasiswa');
		}
		
	}

	public function hapus($id)

	{
		$this->mahasiswa_model->hapusDataMahasiswa($id);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('mahasiswa');
	
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail Data Mahasiswa';
		$data['mahasiswa'] = $this->mahasiswa_model->getMahasiswaByID($id);
		$this->load->view('templates/header',$data);
		$this->load->view('mahasiswa/detail',$data);
		$this->load->view('templates/footer');
	}
	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah';
		$data['mahasiswa'] = $this->mahasiswa_model->getMahasiswaByID($id);
		$data['jurusan'] = ['MM','TIF','RPL'];

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('nim','NIM','required|numeric');

		if( $this->form_validation->run() == FALSE ) {
			 $this->load->view('templates/header',$data);
			 $this->load->view('mahasiswa/ubah',$data);
			 $this->load->view('templates/footer');
		} else {
			$this->mahasiswa_model->ubahDataMahasiswa();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mahasiswa');
		}
		
	}
}

?>