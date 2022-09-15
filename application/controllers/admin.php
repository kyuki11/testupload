<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

	
			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);


			$this->load->view('admin/bg_home',$bc);

			

		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	//Bagian User
	public function user()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			
			$page = $this->uri->segment(3);
			$limit = 10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('tbl_login');

			$config['base_url']= base_url().'index.php/admin/user/';
			$config['total_rows']= $tot_hal->num_rows();
			$config['per_page']= $limit;
			$config['uri_segment']= 3;

			$config['full_tag_open']= "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close']= "</ul>";
			$config['num_tag_open']= "<li>";
			$config['num_tag_close']= "</li>";
			$config['cur_tag_open']= "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close']= "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']= "<li>";
			$config['next_tag_close']= "</li>";
			$config['prev_tag_open']= "<li>";
			$config['prev_tag_close']= "</li>";
			$config['first_tag_open']= "<li>";
			$config['first_tag_close']= "</li>";
			$config['last_tag_open']= "<li>";
			$config['last_tag_close']= "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['user'] = $this->web_app_model->getAllDataLimited('tbl_login', $offset, $limit);

			$this->load->view('admin/bg_user',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function edit_user()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['user'] = $this->web_app_model->getSelectedData('tbl_login','id',$this->uri->segment(3));
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);
			
			$this->load->view('admin/edit_user',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	public function simpan_user(){
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin'){
				$st = $this->input->post("stts");

				$simpan["username"] 	= $this->input->post("username");
				$simpan["password"] 	= md5($this->input->post("password"));

				if($st=="edit"){
					$id = $this->input->post('id');
					$where = array('id'=>$id);
					$this->web_app_model->updateDataMultiField("tbl_login", $simpan, $where);
					?>

					<?php
					{
						header('location:'.base_url().'index.php/admin/user');
						$this->session->set_flashdata("save_mahasiswa", "Data Berhasil Di Update");
					}
					?>
					<?php
				}
				else if($st=="tambah"){
					$simpan["id"] = $this->input->post("id");
					$simpan2["id"] = $this->input->post("id");
					$simpan2["nama_lengkap"] = $this->input->post("nama_lengkap");
					$simpan2["username"] = $this->input->post("nama_lengkap");
					$simpan2["password"] = md5($this->input->post("nama_lengkap"));
					$simpan2["stts"] = "siswa";

					if($this->web_app_model->cekIdSiswaMax($simpan["id"])==0){
						$this->web_app_model->insertData('siswa', $simpan);
						$this->web_app_model->insertData('tbl_login', $simpan2);
						?>
						<?php
						{
							header('location:'.base_url().'index.php/admin/tambah_siswa');
              $this->session->set_flashdata("save_siswa", "<div class='alert alert-block alert-success'>
              <button type='button' class='close' data-dismiss='alert'>
                <i class='icon-remove'></i>
              </button>

                <p>
                  <strong>
                      <i class='icon-ok'></i>
                      Ea!
                  </strong>
                  Keren Sih Bang Bisa Nambah Gitu.MANTAP!
                </p>
              </div>");
						}
						?>
						<?php
					}
				
          else{
            $this->session->set_flashdata("save_siswa", "<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Oh no~ :v
										</strong>

										ID sudah di pakai.... :(
										<br />
									</div>");
          
					{
						header('location:'.base_url().'index.php/admin/tambah_mahasiswa');
					}
					
				}	
        }
      }
      else{
        header('location:'.base_url().'index.php/web');
      }
  }
	
	//SISWA	
	public function siswa()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			
			$page = $this->uri->segment(3);
			$limit = 10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('siswa');

			$config['base_url']= base_url().'index.php/admin/siswa/';
			$config['total_rows']= $tot_hal->num_rows();
			$config['per_page']= $limit;
			$config['uri_segment']= 3;

			$config['full_tag_open']= "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close']= "</ul>";
			$config['num_tag_open']= "<li>";
			$config['num_tag_close']= "</li>";
			$config['cur_tag_open']= "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close']= "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']= "<li>";
			$config['next_tag_close']= "</li>";
			$config['prev_tag_open']= "<li>";
			$config['prev_tag_close']= "</li>";
			$config['first_tag_open']= "<li>";
			$config['first_tag_close']= "</li>";
			$config['last_tag_open']= "<li>";
			$config['last_tag_close']= "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['siswa'] = $this->web_app_model->getAllDataLimited('siswa', $offset, $limit);

			$this->load->view('admin/bg_siswa',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function tambah_siswa()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$bc['siswa'] = $this->web_app_model->getAllData('siswa');
			$this->load->view('admin/tambah_siswa',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function simpan_siswa(){
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin'){
				$st = $this->input->post("stts");

				$simpan["id_siswa"] 	= $this->input->post("id");
				$simpan["nis"] 	= $this->input->post("nis");
				$simpan["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan["kelas"] 			= $this->input->post("kelas");
				$simpan["tmpt_lhr"] 	= $this->input->post("tmpt_lhr");
				$simpan["tnggl_lhr"] 		= $this->input->post("tnggl_lhr");
				$simpan["jk"] 			= $this->input->post("jk");
				$simpan["agama"] 	= $this->input->post("agama");
				$simpan["alamat"] 		= $this->input->post("alamat");
				$simpan2["nama_lengkap"] 		= $this->input->post("nama_lengkap");

				if($st=="edit"){
					$id = $this->input->post('id');
					$where = array('id'=>$id);
					$this->web_app_model->updateDataMultiField("siswa", $simpan, $where);
					$this->web_app_model->updateDataMultiField("tbl_login", $simpan2, $where);
					?>

					<?php
					{
						header('location:'.base_url().'index.php/admin/siswa');
						$this->session->set_flashdata("save_siswa", "Data Berhasil Di Update");
					}
					?>
					<?php
				}
				else if($st=="tambah"){
					$simpan["id"] = $this->input->post("id");
					$simpan2["id"] = $this->input->post("id");
					$simpan2["nama_lengkap"] = $this->input->post("nama_lengkap");
					$simpan2["username"] = $this->input->post("id");
					$simpan2["password"] = md5($this->input->post("id"));
					$simpan2["stts"] = "siswa";

					if($this->web_app_model->cekIdSiswaMax($simpan["id"])==0){
						$this->web_app_model->insertData('siswa', $simpan);
						$this->web_app_model->insertData('tbl_login', $simpan2);
						?>
						<?php
						{
							header('location:'.base_url().'index.php/admin/tambah_siswa');
              $this->session->set_flashdata("save_siswa", "<div class='alert alert-block alert-success'>
              <button type='button' class='close' data-dismiss='alert'>
                <i class='icon-remove'></i>
              </button>

                <p>
                  <strong>
                      <i class='icon-ok'></i>
                      Ea!
                  </strong>
                  Keren Sih Bang Bisa Nambah Gitu.MANTAP!
                </p>
              </div>");
						}
						?>
						<?php
					}
				
          else{
            $this->session->set_flashdata("save_siswa", "<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Oh no~ :v
										</strong>

										ID sudah di pakai.... :(
										<br />
									</div>");
          
					{
						header('location:'.base_url().'index.php/admin/tambah_siswa');
					}
					
				}	
        }
      }
      else{
        header('location:'.base_url().'index.php/web');
      }
  }

  public function hapus_siswa()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id'=>$id);
			$this->web_app_model->deleteData('siswa',$hapus);
			$this->web_app_model->deleteData('tbl_login',$hapus);
			header('location:'.base_url().'index.php/admin/siswa');
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	public function edit_siswa()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['siswa'] = $this->web_app_model->getSelectedData('siswa','id',$this->uri->segment(3));
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);
			
			$this->load->view('admin/edit_siswa',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

//Guru
	public function guru()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			
			$page = $this->uri->segment(3);
			$limit = 10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('guru');

			$config['base_url']= base_url().'index.php/admin/guru/';
			$config['total_rows']= $tot_hal->num_rows();
			$config['per_page']= $limit;
			$config['uri_segment']= 3;

			$config['full_tag_open']= "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close']= "</ul>";
			$config['num_tag_open']= "<li>";
			$config['num_tag_close']= "</li>";
			$config['cur_tag_open']= "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close']= "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']= "<li>";
			$config['next_tag_close']= "</li>";
			$config['prev_tag_open']= "<li>";
			$config['prev_tag_close']= "</li>";
			$config['first_tag_open']= "<li>";
			$config['first_tag_close']= "</li>";
			$config['last_tag_open']= "<li>";
			$config['last_tag_close']= "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['guru'] = $this->web_app_model->getAllDataLimited('guru', $offset, $limit);

			$this->load->view('admin/bg_guru',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function tambah_guru()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$bc['guru'] = $this->web_app_model->getAllData('guru');
			$this->load->view('admin/tambah_guru',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function simpan_guru(){
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin'){
				$st = $this->input->post("stts");

				$simpan["id_guru"] 	= $this->input->post("id");
				$simpan["nip"] 	= $this->input->post("nip");
				$simpan["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan["tmpt_lhr"] 	= $this->input->post("tmpt_lhr");
				$simpan["tnggl_lhr"] 		= $this->input->post("tnggl_lhr");
				$simpan["jk"] 			= $this->input->post("jk");
				$simpan["agama"] 	= $this->input->post("agama");
				$simpan["alamat"] 		= $this->input->post("alamat");
				$simpan2["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan3["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan4["nama_lengkap"] 		= $this->input->post("nama_lengkap");

				if($st=="edit"){
					$id = $this->input->post('id');
					$where = array('id'=>$id);
					$this->web_app_model->updateDataMultiField("guru", $simpan, $where);
					$this->web_app_model->updateDataMultiField("tbl_login", $simpan2, $where);
					$this->web_app_model->updateDataMultiField("pengajar", $simpan3, $where);
					$this->web_app_model->updateDataMultiField("walas", $simpan4, $where);
					?>

					<?php
					{
						header('location:'.base_url().'index.php/admin/guru');
						$this->session->set_flashdata("save_guru", "Data Berhasil Di Update");
					}
					?>
					<?php
				}
				else if($st=="tambah"){
					$simpan["id"] = $this->input->post("id");
					$simpan2["id"] = $this->input->post("id");
					$simpan2["nama_lengkap"] = $this->input->post("nama_lengkap");
					$simpan2["username"] = $this->input->post("id");
					$simpan2["password"] = md5($this->input->post("id"));
					$simpan2["stts"] = "guru";

					if($this->web_app_model->cekIdGuruMax($simpan["id"])==0){
						$this->web_app_model->insertData('guru', $simpan);
						$this->web_app_model->insertData('tbl_login', $simpan2);
						?>
						<?php
						{
							header('location:'.base_url().'index.php/admin/tambah_guru');
              $this->session->set_flashdata("save_guru", "<div class='alert alert-block alert-success'>
              <button type='button' class='close' data-dismiss='alert'>
                <i class='icon-remove'></i>
              </button>

                <p>
                  <strong>
                      <i class='icon-ok'></i>
                      Ea!
                  </strong>
                  Keren Sih Bang Bisa Nambah Gitu.MANTAP!
                </p>
              </div>");
						}
						?>
						<?php
					}
				
          else{
            $this->session->set_flashdata("save_guru", "<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Oh no~ :v
										</strong>

										ID sudah di pakai.... :(
										<br />
									</div>");
          
					{
						header('location:'.base_url().'index.php/admin/tambah_guru');
					}
					
				}	
        }
      }
      else{
        header('location:'.base_url().'index.php/web');
      }
  }

  public function hapus_guru()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id'=>$id);
			$this->web_app_model->deleteData('guru',$hapus);
			$this->web_app_model->deleteData('tbl_login',$hapus);
			$this->web_app_model->deleteData('pengajar',$hapus);
			$this->web_app_model->deleteData('walas',$hapus);
			header('location:'.base_url().'index.php/admin/guru');
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	public function edit_guru()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['guru'] = $this->web_app_model->getSelectedData('guru','id',$this->uri->segment(3));
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);
			
			$this->load->view('admin/edit_guru',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

//Mapel
	public function mapel()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			
			$page = $this->uri->segment(3);
			$limit = 10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('mapel');

			$config['base_url']= base_url().'index.php/admin/mapel/';
			$config['total_rows']= $tot_hal->num_rows();
			$config['per_page']= $limit;
			$config['uri_segment']= 3;

			$config['full_tag_open']= "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close']= "</ul>";
			$config['num_tag_open']= "<li>";
			$config['num_tag_close']= "</li>";
			$config['cur_tag_open']= "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close']= "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']= "<li>";
			$config['next_tag_close']= "</li>";
			$config['prev_tag_open']= "<li>";
			$config['prev_tag_close']= "</li>";
			$config['first_tag_open']= "<li>";
			$config['first_tag_close']= "</li>";
			$config['last_tag_open']= "<li>";
			$config['last_tag_close']= "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['mapel'] = $this->web_app_model->getAllDataLimited('mapel', $offset, $limit);

			$this->load->view('admin/bg_mapel',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function tambah_mapel()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$bc['mapel'] = $this->web_app_model->getAllData('mapel');
			$this->load->view('admin/tambah_mapel',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function simpan_mapel(){
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin'){
				$st = $this->input->post("stts");

				$simpan["mapel"] 		= $this->input->post("mapel");

				if($st=="edit"){
					$kd_mapel = $this->input->post('kd_mapel');
					$where = array('kd_mapel'=>$kd_mapel);
					$this->web_app_model->updateDataMultiField("mapel", $simpan, $where);
					?>

					<?php
					{
						header('location:'.base_url().'index.php/admin/mapel');
						$this->session->set_flashdata("save_mapel", "Data Berhasil Di Update");
					}
					?>
					<?php
				}
				else if($st=="tambah"){
					$simpan["kd_mapel"] = $this->input->post("kd_mapel");

					if($this->web_app_model->cekKdMapelMax($simpan["kd_mapel"])==0){
						$this->web_app_model->insertData('mapel', $simpan);
						?>
						<?php
						{
							header('location:'.base_url().'index.php/admin/tambah_mapel');
              $this->session->set_flashdata("save_mapel", "<div class='alert alert-block alert-success'>
              <button type='button' class='close' data-dismiss='alert'>
                <i class='icon-remove'></i>
              </button>

                <p>
                  <strong>
                      <i class='icon-ok'></i>
                      Ea!
                  </strong>
                  Keren Sih Bang Bisa Nambah Gitu.MANTAP!
                </p>
              </div>");
						}
						?>
						<?php
					}
				
          else{
            $this->session->set_flashdata("save_mapel", "<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Oh no~ :v
										</strong>

										ID sudah di pakai.... :(
										<br />
									</div>");
          
					{
						header('location:'.base_url().'index.php/admin/tambah_mapel');
					}
					
				}	
        }
      }
      else{
        header('location:'.base_url().'index.php/web');
      }
  }

  public function hapus_mapel()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$kd_mapel = $this->uri->segment(3);
			$hapus = array('kd_mapel'=>$kd_mapel);
			$this->web_app_model->deleteData('mapel',$hapus);
			header('location:'.base_url().'index.php/admin/mapel');
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	public function edit_mapel()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['mapel'] = $this->web_app_model->getSelectedData('mapel','kd_mapel',$this->uri->segment(3));
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);
			
			$this->load->view('admin/edit_mapel',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

//pengajar
	public function pengajar()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			
			$page = $this->uri->segment(3);
			$limit = 10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('pengajar');

			$config['base_url']= base_url().'index.php/admin/pengajar/';
			$config['total_rows']= $tot_hal->num_rows();
			$config['per_page']= $limit;
			$config['uri_segment']= 3;

			$config['full_tag_open']= "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close']= "</ul>";
			$config['num_tag_open']= "<li>";
			$config['num_tag_close']= "</li>";
			$config['cur_tag_open']= "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close']= "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']= "<li>";
			$config['next_tag_close']= "</li>";
			$config['prev_tag_open']= "<li>";
			$config['prev_tag_close']= "</li>";
			$config['first_tag_open']= "<li>";
			$config['first_tag_close']= "</li>";
			$config['last_tag_open']= "<li>";
			$config['last_tag_close']= "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['pengajar'] = $this->web_app_model->getAllDataLimited('pengajar', $offset, $limit);

			$this->load->view('admin/bg_pengajar',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function tambah_pengajar()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$bc['pengajar'] = $this->web_app_model->getAllData('pengajar');
			$bc['guru'] 		= $this->web_app_model->getAllData('guru');
			$bc['mapel'] 		= $this->web_app_model->getAllData('mapel');
			$bc['siswa'] 		= $this->web_app_model->getAllData('siswa');
			$this->load->view('admin/tambah_pengajar',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function get_all_guru()
	{
		$data = $this->web_app_model->lihat_guru($_POST['id']);
		echo json_encode($data);
	}

	public function get_all_mapel()
	{
		$data = $this->web_app_model->lihat_mapel($_POST['kd_mapel']);
		echo json_encode($data);
	}

	public function simpan_pengajar(){
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin'){
				$st = $this->input->post("stts");

				$simpan["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan["kd_mapel"] 	= $this->input->post("kd_mapel");
				$simpan["mapel"] 		= $this->input->post("mapel");
				

				if($st=="edit"){
					$id = $this->input->post('id');
					$where = array('id'=>$id);
					$this->web_app_model->updateDataMultiField("pengajar", $simpan, $where);
					?>

					<?php
					{
						header('location:'.base_url().'index.php/admin/pengajar');
						$this->session->set_flashdata("save_pengajar", "Data Berhasil Di Update");
					}
					?>
					<?php
				}
				else if($st=="tambah"){
					$simpan["id"] = $this->input->post("id");
					
					if($this->web_app_model->cekIdPengajarMax($simpan["id"])==0){
						$this->web_app_model->insertData('pengajar', $simpan);
					
						?>
						<?php
						{
							header('location:'.base_url().'index.php/admin/tambah_pengajar');
              $this->session->set_flashdata("save_pengajar", "<div class='alert alert-block alert-success'>
              <button type='button' class='close' data-dismiss='alert'>
                <i class='icon-remove'></i>
              </button>

                <p>
                  <strong>
                      <i class='icon-ok'></i>
                      Ea!
                  </strong>
                  Keren Sih Bang Bisa Nambah Gitu.MANTAP!
                </p>
              </div>");
						}
						?>
						<?php
					}
				
          else{
            $this->session->set_flashdata("save_pengajar", "<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Oh no~ :v
										</strong>

										Guru Hanya Bisa Mengajar 1 Mata Pelajaran, JANGAN TAMAK! 
										<br />
									</div>");
          
					{
						header('location:'.base_url().'index.php/admin/tambah_pengajar');
					}
					
				}	
        }
      }
      else{
        header('location:'.base_url().'index.php/web');
      }
  }

  public function hapus_pengajar()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id'=>$id);
			$this->web_app_model->deleteData('pengajar',$hapus);
			header('location:'.base_url().'index.php/admin/pengajar');
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	public function edit_pengajar()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['pengajar'] = $this->web_app_model->getSelectedData('pengajar','id',$this->uri->segment(3));
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$bc['guru'] 		= $this->web_app_model->getAllData('guru');
			$bc['mapel'] 		= $this->web_app_model->getAllData('mapel');
			$bc['siswa'] 		= $this->web_app_model->getAllData('siswa');
			
			$this->load->view('admin/edit_pengajar',$bc);	


		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

//Wali Kelas
	public function walas()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			
			$page = $this->uri->segment(3);
			$limit = 10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('walas');

			$config['base_url']= base_url().'index.php/admin/walas/';
			$config['total_rows']= $tot_hal->num_rows();
			$config['per_page']= $limit;
			$config['uri_segment']= 3;

			$config['full_tag_open']= "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close']= "</ul>";
			$config['num_tag_open']= "<li>";
			$config['num_tag_close']= "</li>";
			$config['cur_tag_open']= "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close']= "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']= "<li>";
			$config['next_tag_close']= "</li>";
			$config['prev_tag_open']= "<li>";
			$config['prev_tag_close']= "</li>";
			$config['first_tag_open']= "<li>";
			$config['first_tag_close']= "</li>";
			$config['last_tag_open']= "<li>";
			$config['last_tag_close']= "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['walas'] = $this->web_app_model->getAllDataLimited('walas', $offset, $limit);

			$this->load->view('admin/bg_walas',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function tambah_walas()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='admin' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$bc['guru'] 		= $this->web_app_model->getAllData('guru');
			$bc['siswa'] 		= $this->web_app_model->getAllData('siswa');

			$this->load->view('admin/tambah_walas',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function simpan_walas(){
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin'){
				$st = $this->input->post("stts");

				$simpan["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan["kelas"] 			= $this->input->post("kelas");

				if($st=="edit"){
					$id = $this->input->post('id');
					$where = array('id'=>$id);
					$this->web_app_model->updateDataMultiField("walas", $simpan, $where);
					?>

					<?php
					{
						header('location:'.base_url().'index.php/admin/walas');
						$this->session->set_flashdata("save_walas", "Data Berhasil Di Update");
					}
					?>
					<?php
				}
				else if($st=="tambah"){
					$simpan["id"] = $this->input->post("id");

					if($this->web_app_model->cekIdWalasMax($simpan["id"])==0){
						$this->web_app_model->insertData('walas', $simpan);
						?>
						<?php
						{
							header('location:'.base_url().'index.php/admin/tambah_walas');
              $this->session->set_flashdata("save_walas", "<div class='alert alert-block alert-success'>
              <button type='button' class='close' data-dismiss='alert'>
                <i class='icon-remove'></i>
              </button>

                <p>
                  <strong>
                      <i class='icon-ok'></i>
                      Ea!
                  </strong>
                  Keren Sih Bang Bisa Nambah Gitu.MANTAP!
                </p>
              </div>");
						}
						?>
						<?php
					}
				
          else{
            $this->session->set_flashdata("save_walas", "<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Oh no~ :v
										</strong>

										Guru Hanya Bisa Menjadi Wali Kelas 1 saja, JANGAN TAMAK!
										<br />
									</div>");
          
					{
						header('location:'.base_url().'index.php/admin/tambah_walas');
					}
					
				}	
        }
      }
      else{
        header('location:'.base_url().'index.php/web');
      }
  }

  public function hapus_walas()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id'=>$id);
			$this->web_app_model->deleteData('walas',$hapus);
			header('location:'.base_url().'index.php/admin/walas');
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	public function edit_walas()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['walas'] = $this->web_app_model->getSelectedData('walas','id',$this->uri->segment(3));
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['header'] = $this->load->view('admin/header',$bc,true);
			$bc['sidebar'] = $this->load->view('admin/sidebar','',true);
			$bc['topbar'] = $this->load->view('admin/topbar',$bc,true);

			$bc['guru'] 		= $this->web_app_model->getAllData('guru');
			$bc['siswa'] 		= $this->web_app_model->getAllData('siswa');
			
			$this->load->view('admin/edit_walas',$bc);	


		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

}  