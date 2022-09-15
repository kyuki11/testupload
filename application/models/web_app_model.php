<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Web_App_Model extends CI_Model {
	
	protected $_table2 = 'guru';
	protected $_table3 = 'mapel';
	protected $_table4 = 'siswa';
	
	//query otomatis dari active record CodeIgniter

	public function lihat_guru($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['id' => $id]);
		$query = $this->db->get($this->_table2);
		return $query->row();
	}

	public function lihat_siswa($nis)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['nis' => $nis]);
		$query = $this->db->get($this->_table4);
		return $query->row();
	}

	public function lihat_mapel($kd_mapel)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['kd_mapel' => $kd_mapel]);
		$query = $this->db->get($this->_table3);
		return $query->row();
	}

	public function getAllData($table){
		return $this->db->get($table);
	}
	public function getAllData2($table){
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table, $offset, $limit){
		return $this->db->get($table, $limit, $offset);
	}
	public function getAllDataLimited2($table, $offset, $limit){
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getSelectedData($table, $key, $value){
		$this->db->where($key, $value);
		return $this->db->get($table);
	}
	public function getSelectedData2($table, $key, $value){
		$this->db->where($key, $value);
		return $this->db->get($table);
	}

	public function getSelectedDataMultiple($table, $data){
		return $this->db->get_where($table, $data);
	}
	public function getSelectedDataMultiple2($table, $data){
		return $this->db->get_where($table, $data);
	}

	public function insertData($table, $data){
		$this->db->insert($table, $data);
	}
	public function insertData2($table, $data){
		$this->db->insert($table, $data);
	}

	public function deleteData($table, $data){
		$this->db->delete($table, $data);
	}
	public function deleteData2($table, $data){
		$this->db->delete($table, $data);
	}

	public function updateDataMultiField($table, $data, $field_key){
		return $this->db->update($table, $data, $field_key);
	}
	public function updateDataMultiField2($table, $data, $field_key){
		return $this->db->update($table, $data, $field_key);
	}

	public function updateData($table, $data, $field, $key){
    $this->db->where($key, $field);
		$this->db->update($table, $data);
	}
	public function updateData2($table, $data, $field, $key){
    $this->db->where($key, $field);
		$this->db->update($table, $data);
	}

	


  // model login user
	public function getLoginData($usr, $psw){
		$link = mysqli_connect("localhost", "root", "", "rapot") or die($link);
		$u = mysqli_real_escape_string($link, $usr);
		$p = md5(mysqli_real_escape_string($link, $psw));

		$q_cek_login = $this->db->get_where('tbl_login', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())> 0){
			foreach ($q_cek_login->result() as $qck) {
			if($qck->stts=='siswa'){
				$q_ambil_data = $this->db->get_where('siswa', array('id' => $u));
				foreach ($q_ambil_data->result() as $qad) {
					$sess_data['logged_in'] 	= 'yes';
					$sess_data['id'] 			= $qad->id;
					$sess_data['nis'] 			= $qad->nis;
					$sess_data['nama'] 			= $qad->nama_lengkap;
					$sess_data['nama_lengkap'] 	= $qad->nama_lengkap;
					$sess_data['kelas'] 		= $qad->kelas;
					$sess_data['tmpt_lhr'] 		= $qad->tmpt_lhr;
					$sess_data['tnggl_lhr'] 	= $qad->tnggl_lhr;
					$sess_data['jk'] 			= $qad->jk;
					$sess_data['agama'] 		= $qad->agama;
					$sess_data['alamat'] 		= $qad->alamat;
					$sess_data['stts'] 			= 'siswa';
					$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/siswa');
				}
			else if($qck->stts=='guru'){
				$q_ambil_data = $this->db->get_where('guru', array('id' => $u));
				foreach ($q_ambil_data->result() as $qad) {
					$sess_data['logged_in'] 	= 'yes';
					$sess_data['username']		= $qad->username;
					$sess_data['mapel']			= $qad->mapel;
					$sess_data['nama'] 			= $qad->nama_lengkap;
					$sess_data['id'] 			= $qad->id;
					$sess_data['nip'] 			= $qad->nip;
					$sess_data['nama_lengkap'] 	= $qad->nama_lengkap;
					$sess_data['tmpt_lhr'] 		= $qad->tmpt_lhr;
					$sess_data['tnggl_lhr'] 	= $qad->tnggl_lhr;
					$sess_data['jk'] 			= $qad->jk;
					$sess_data['agama'] 		= $qad->agama;
					$sess_data['alamat'] 		= $qad->alamat;
					$sess_data['kd_mapel'] 		= $qad->kd_mapel;
					$sess_data['stts'] 			= 'guru';
					$this->session->set_userdata($sess_data);
						}
					header('location:'.base_url().'index.php/guru');
				}
			else if($qck->stts=='admin'){
				$q_ambil_data = $this->db->get_where('tbl_login', array('username' => $u));
				foreach ($q_ambil_data->result() as $qad) {
					$sess_data['logged_in'] 	= 'yes';
					$sess_data['username']		= $qad->username;
					$sess_data['nama'] 			= $qad->nama_lengkap;
					$sess_data['stts'] 			= 'admin';
					$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/admin');
				}
			}
		}
		else{
			header('location:'.base_url().'index.php/web');
			$this->session->set_flashdata('info', '<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Username atau Password Salah...!!
										<br>
									</div>');
		}
	}

  //  query untuk mengecek nim yang sudah ada di database
	function cekIdMax($id){
    $q = $this->db->query("select * from tbl_login where id='".$id."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekIdSiswaMax($id){
    $q = $this->db->query("select * from siswa where id='".$id."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekIDSiswa2Max($id_siswa){
    $q = $this->db->query("select * from absen where id_siswa='".$id_siswa."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekIdPengajarMax($id){
    $q = $this->db->query("select * from pengajar where id='".$id."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekIdWalasMax($id){
    $q = $this->db->query("select * from walas where id='".$id."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekIdGuruMax($id){
    $q = $this->db->query("select * from guru where id='".$id."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekKdMapelMax($kd_mapel){
    $q = $this->db->query("select * from mapel where kd_mapel='".$kd_mapel."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekNISSiswaMax($nis){
    $q = $this->db->query("select * from nilai where nis='".$nis."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekNISSiswaMax2($nis){
    $q = $this->db->query("select * from absen where nis='".$nis."'");
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}

	function cekNISSiswaMax3($nis){
    $q = $this->db->query("select * from siswa where nis='".$nis."'");
    
    $hasil = 0;
    if($q->num_rows()>0){
    	$hasil = 1;
    }
    return $hasil;
	}
	

	//User
public function SemuaData()
	{
		return$this->db->get('tbl_login')->result_array();
	}
  
	public function proses_edit_data_user($id)
	{
		$data = [
			"nama_lengkap" => $this->input->post('nama_lengkap'),
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_login' , $data);
	}

	

	//Edit Mahasiswa
	public function getSelectedMahasiswa_nama($value){
		$q_ambil_data = $this->db->get_where('tbl_mahasiswa', array('nim'=>$value));
		foreach ($q_ambil_data->result()as $qad) return $qad->nama_mahasiswa;
	}
	
	public function getSelectedMahasiswa_angkatan($value){
		$q_ambil_data = $this->db->get_where('tbl_mahasiswa', array('nim'=>$value));
		foreach ($q_ambil_data->result()as $qad) return $qad->angkatan;
	}
	public function getSelectedMahasiswa_jurusan($value){
		$q_ambil_data = $this->db->get_where('tbl_mahasiswa', array('nim'=>$value));
		foreach ($q_ambil_data->result()as $qad) return $qad->jurusan;
	}
	
	
	

	//Edit Dosen

	public function getSelectedDosen_nidn($value){
		$q_ambil_data = $this->db->get_where('tbl_dosen', array('kd_dosen'=>$value));
		foreach ($q_ambil_data->result()as $qad) return $qad->nidn;
	}
	
	public function getSelectedDosen_nama($value){
		$q_ambil_data = $this->db->get_where('tbl_dosen', array('kd_dosen'=>$value));
		foreach ($q_ambil_data->result()as $qad) return $qad->nama_dosen;
	}

	
	//mata kuliah
	
	
}