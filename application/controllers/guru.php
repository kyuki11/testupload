<?php

use Dompdf\Dompdf;

defined('BASEPATH') OR exit('No direct script access allowed');



class Guru extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='guru' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['mapel'] = $this->session->userdata('mapel');

	
			$bc['header'] = $this->load->view('guru/header',$bc,true);
			$bc['sidebar'] = $this->load->view('guru/sidebar','',true);
			$bc['topbar'] = $this->load->view('guru/topbar',$bc,true);


			$this->load->view('guru/bg_home',$bc);

			

		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	//NILAI SISWA	
	public function nilai()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='guru' ){
			
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
			$bc['mapel'] = $this->session->userdata('mapel');

			$bc['header'] = $this->load->view('guru/header',$bc,true);
			$bc['sidebar'] = $this->load->view('guru/sidebar','',true);
			$bc['topbar'] = $this->load->view('guru/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('nilai');

			$config['base_url']= base_url().'index.php/guru/nilai/';
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

			$bc['nilai'] = $this->web_app_model->getAllDataLimited('nilai', $offset, $limit);
			

			$this->load->view('guru/bg_nilai',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function tambah_nilai()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='guru' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('guru/header',$bc,true);
			$bc['sidebar'] = $this->load->view('guru/sidebar','',true);
			$bc['topbar'] = $this->load->view('guru/topbar',$bc,true);

			$bc['nilai'] = $this->web_app_model->getAllData('nilai');
			$bc['guru'] = $this->web_app_model->getAllData('guru');
			$bc['siswa'] = $this->web_app_model->getAllData('siswa');
			$bc['mapel'] = $this->web_app_model->getAllData('mapel');
			$bc['pengajar'] = $this->web_app_model->getAllData('mapel');
			$this->load->view('guru/tambah_nilai',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function get_all_siswa()
	{
		$data = $this->web_app_model->lihat_siswa($_POST['nis']);
		echo json_encode($data);
	}


	public function simpan_nilai(){

		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='guru'){
				$st = $this->input->post("stts");

				$simpan["id_nilai"] 	= $this->input->post("id_nilai");
				$simpan["nis"] 	= $this->input->post("nis");
				$simpan["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan["kelas"] 			= $this->input->post("kelas");
				$simpan["semester"] 			= $this->input->post("semester");
				$simpan["nama"] 	= $this->input->post("nama");
				$simpan["kkm"] 	= $this->input->post("kkm");
				$simpan["nh"] 		= $this->input->post("nh");
				$simpan["nh2"] 		= $this->input->post("nh2");
				$simpan["nh3"] 		= $this->input->post("nh3");
				$simpan["nh4"] 		= $this->input->post("nh4");
				$simpan["uts"] 		= $this->input->post("uts");
				$simpan["uas"] 		= $this->input->post("uas");
				$simpan["n_peng"] 		= $this->input->post("n_peng");
				$simpan["predikat"] 		= $this->input->post("predikat");
				$simpan["deskrip"] 		= $this->input->post("deskrip");
				$simpan["np"] 		= $this->input->post("np");
				$simpan["np2"] 		= $this->input->post("np2");
				$simpan["np3"] 		= $this->input->post("np3");
				$simpan["np4"] 		= $this->input->post("np4");
				$simpan["nketram"] 		= $this->input->post("nketram");
				$simpan["pred"] 		= $this->input->post("pred");
				$simpan["deskripsi"] 		= $this->input->post("deskripsi");
				$simpan["n_raport"] 		= $this->input->post("n_raport");

				if($st=="edit"){
					$id_nilai = $this->input->post('id_nilai');
					$where = array('id_nilai'=>$id_nilai);
					$this->web_app_model->updateDataMultiField("nilai", $simpan, $where);
					?>

					<?php
					{
						header('location:'.base_url().'index.php/guru/nilai');
						$this->session->set_flashdata("save_nilai", "Data Berhasil Di Update");
					}
					?>
					<?php
				}
				else if($st=="tambah"){
				$simpan3["id_nilai"] = $this->input->post("id_nilai");
				$simpan3["nis"] = $this->input->post("nis");
				$simpan3["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan3["kelas"] 			= $this->input->post("kelas");
				$simpan3["nama"] 	= $this->input->post("nama");
				$simpan3["mapel"] 	= $this->input->post("mapel");
				$simpan3["semester"] 			= $this->input->post("semester");
				$simpan3["kkm"] 	= $this->input->post("kkm");
				$simpan3["nh"] 		= $this->input->post("nh");
				$simpan3["nh2"] 		= $this->input->post("nh2");
				$simpan3["nh3"] 		= $this->input->post("nh3");
				$simpan3["nh4"] 		= $this->input->post("nh4");
				$simpan3["uts"] 		= $this->input->post("uts");
				$simpan3["uas"] 		= $this->input->post("uas");
				$simpan3["n_peng"] 		= $this->input->post("n_peng");
				$simpan3["predikat"] 		= $this->input->post("predikat");
				$simpan3["deskrip"] 		= $this->input->post("deskrip");
				$simpan3["np"] 		= $this->input->post("np");
				$simpan3["np2"] 		= $this->input->post("np2");
				$simpan3["np3"] 		= $this->input->post("np3");
				$simpan3["np4"] 		= $this->input->post("np4");
				$simpan3["nketram"] 		= $this->input->post("nketram");
				$simpan3["pred"] 		= $this->input->post("pred");
				$simpan3["deskripsi"] 		= $this->input->post("deskripsi");
				$simpan3["n_raport"] 		= $this->input->post("n_raport");

				// $q_ambil_data = $this->db->get_where('pengajar', array('id' => $u));
				// foreach ($q_ambil_data->result() as $qad) {
				// 	$sess_data['logged_in'] 	= 'yes';
				// 	$sess_data['username']		= $qad->username;
				// 	$sess_data['nama'] 			= $qad->nama_lengkap;
				// 	$sess_data['mapel'] 			= $qad->mapel;
				// 	$sess_data['id'] 			= $qad->id;
				// 	$sess_data['nip'] 			= $qad->nip;
				// 	$sess_data['nama_lengkap'] 	= $qad->nama_lengkap;
				// 	$sess_data['tmpt_lhr'] 		= $qad->tmpt_lhr;
				// 	$sess_data['tnggl_lhr'] 	= $qad->tnggl_lhr;
				// 	$sess_data['jk'] 			= $qad->jk;
				// 	$sess_data['agama'] 		= $qad->agama;
				// 	$sess_data['alamat'] 		= $qad->alamat;
				// 	$sess_data['kd_mapel'] 		= $qad->kd_mapel;
				// 	$sess_data['stts'] 			= 'guru';
				// 	$this->session->set_userdata($sess_data);
				// 		}
				// 	header('location:'.base_url().'index.php/tambah_nilai.php');
					
					if($this->web_app_model->insertData('nilai', $simpan3)){
						
						?>
						<?php
						{
							header('location:'.base_url().'index.php/guru/tambah_nilai');
              $this->session->set_flashdata("save_nilai", "<div class='alert alert-block alert-success'>
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
            $this->session->set_flashdata("save_nilai", "<div class='alert alert-error'>
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
          
					{
						header('location:'.base_url().'index.php/guru/tambah_nilai');
					}
					
				}	
        }
      }
      else{
        header('location:'.base_url().'index.php/web');
      }
      
  }

  public function hapus_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='guru')
		{
			$id_nilai = $this->uri->segment(3);
			$hapus = array('id_nilai'=>$id_nilai);
			$this->web_app_model->deleteData('nilai',$hapus);
			header('location:'.base_url().'index.php/guru/nilai');
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	public function edit_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='guru')
		{
			$bc['nilai'] = $this->web_app_model->getSelectedData('nilai','id_nilai',$this->uri->segment(3));
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['header'] = $this->load->view('guru/header',$bc,true);
			$bc['sidebar'] = $this->load->view('guru/sidebar','',true);
			$bc['topbar'] = $this->load->view('guru/topbar',$bc,true);
			
			$this->load->view('guru/edit_nilai',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	public function absen()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='guru' ){
			
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

			$bc['header'] = $this->load->view('guru/header',$bc,true);
			$bc['sidebar'] = $this->load->view('guru/sidebar','',true);
			$bc['topbar'] = $this->load->view('guru/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('absen');

			$config['base_url']= base_url().'index.php/guru/absen/';
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

			$bc['absen'] = $this->web_app_model->getAllDataLimited('absen', $offset, $limit);
			$bc['siswa'] = $this->web_app_model->getAllDataLimited('siswa', $offset, $limit);

			$this->load->view('guru/bg_absen',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function tambah_absen()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='guru' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['header'] = $this->load->view('guru/header',$bc,true);
			$bc['sidebar'] = $this->load->view('guru/sidebar','',true);
			$bc['topbar'] = $this->load->view('guru/topbar',$bc,true);

			$bc['absen'] = $this->web_app_model->getAllData('absen');
			$bc['siswa'] = $this->web_app_model->getAllData('siswa');
			$this->load->view('guru/tambah_absen',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	public function simpan_absen(){
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='guru'){
				$st = $this->input->post("stts");

				$simpan["nis"] = $this->input->post("nis");
				$simpan["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan["kelas"] 			= $this->input->post("kelas");
				$simpan["sakit"] 	= $this->input->post("sakit");
				$simpan["izin"] 		= $this->input->post("izin");
				$simpan["tk"] 			= $this->input->post("tk");
				$simpan2["sakit"] 	= $this->input->post("sakit");
				$simpan2["izin"] 		= $this->input->post("izin");
				$simpan2["tk"] 			= $this->input->post("tk");


				if($st=="edit"){
					$nis = $this->input->post('nis');
					$where = array('nis'=>$nis);
					$this->web_app_model->updateDataMultiField("absen", $simpan, $where);
					$this->web_app_model->updateDataMultiField("nilai", $simpan2, $where);
					?>

					<?php
					{
						header('location:'.base_url().'index.php/guru/absen');
						$this->session->set_flashdata("save_absen", "Data Berhasil Di Update");
					}
					?>
					<?php
				}
				else if($st=="tambah"){
					$simpan["nis"] = $this->input->post("nis");
					$simpan["nama_lengkap"] 		= $this->input->post("nama_lengkap");
				$simpan["kelas"] 			= $this->input->post("kelas");
				$simpan["sakit"] 	= $this->input->post("sakit");
				$simpan["izin"] 		= $this->input->post("izin");
				$simpan["tk"] 			= $this->input->post("tk");
				$simpan2["sakit"] 	= $this->input->post("sakit");
				$simpan2["izin"] 		= $this->input->post("izin");
				$simpan2["tk"] 			= $this->input->post("tk");

					if($this->web_app_model->cekNISSiswaMax2($simpan["nis"])==0){
						$this->web_app_model->insertData('absen', $simpan);
						?>
						<?php
						{
							header('location:'.base_url().'index.php/guru/tambah_absen');
              $this->session->set_flashdata("save_absen", "<div class='alert alert-block alert-success'>
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
            $this->session->set_flashdata("save_absen", "<div class='alert alert-error'>
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
						header('location:'.base_url().'index.php/guru/tambah_absen');
					}
					
				}	
        }
      }
      else{
        header('location:'.base_url().'index.php/web');
      }
  }

  public function hapus_absen()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='guru')
		{

			$nis = $this->uri->segment(3);
			$hapus = array('nis'=>$nis);
			$this->web_app_model->deleteData('absen',$hapus);
			header('location:'.base_url().'index.php/guru/absen');
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	public function edit_absen()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='guru')
		{
			$bc['absen'] = $this->web_app_model->getSelectedData('absen','nis',$this->uri->segment(3));
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['header'] = $this->load->view('guru/header',$bc,true);
			$bc['sidebar'] = $this->load->view('guru/sidebar','',true);
			$bc['topbar'] = $this->load->view('guru/topbar',$bc,true);
			
			$this->load->view('guru/edit_absen',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}

	

	public function pdf(){
		$this->load->library('dompdf_gen');

		// $bc['nilai'] = $this->web_app_model->tampil_data('nilai')->result()
		$bc['nilai'] = $this->web_app_model->getSelectedData('nilai','nis',$this->uri->segment(3));
		$bc['all'] = $this->web_app_model->getSelectedData('nilai','nis',$this->uri->segment(3));


		$this->load->view('guru/laporan_pdf',$bc);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("guru/laporan_nilai.pdf", array('Attachment' =>0));
		
	}

	public function pdf2(){
		$this->load->library('dompdf_gen');

		// $bc['nilai'] = $this->web_app_model->tampil_data('nilai')->result()
		$bc['nilai'] = $this->web_app_model->getAllData('nilai');


		$this->load->view('guru/laporan_pdf2',$bc);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("guru/laporan_nilai.pdf", array('Attachment' =>0));
		
	}

	

	// public function pdf(){
	// 	$dompdf = new Dompdf();
	// 	// $this->data['perusahaan'] = $this->m_usaha->lihat();
	// 	$bc['nilai'] = $this->web_app_model->getSelectedData('nilai','nis',$this->uri->segment(3));
		
	// 	$dompdf->setPaper('A4', 'Landscape');
	// 	$html = $this->load->view('guru/laporan_pdf', $this->bc, true);
	// 	$dompdf->load_html($html);
	// 	$dompdf->render();
	// 	$dompdf->stream('laporan nilai', array("Attachment" => false));
	// }

	// public function pdf(){
	// // 	$this->load->library('dompdf_gen');

	// // 	$bc['nilai'] = $this->web_app_model->tampil_data('nilai')->result();

	// // 	$this->load->view('guru/laporan_pdf',$bc);

	// // 	$paper_size = 'A4';
	// // 	$orientation = 'Landscape';
	// // 	$html = $this->output->get_output();
	// // 	$this->dompdf->set_paper($paper_size, $orientation);

	// // 	$this->dompdf->load_html($html);
	// // 	$this->dompdf->render();
	// // 	$this->dompdf->stream("laporan_nilai.pdf", array('Attachment'=>0));
	// // }

}  