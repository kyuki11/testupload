<?php

use Dompdf\Dompdf;

defined('BASEPATH') OR exit('No direct script access allowed');



class Siswa extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='siswa' ){
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['mapel'] = $this->session->userdata('mapel');

	
			$bc['header'] = $this->load->view('siswa/header',$bc,true);
			$bc['sidebar'] = $this->load->view('siswa/sidebar','',true);
			$bc['topbar'] = $this->load->view('siswa/topbar',$bc,true);


			$this->load->view('siswa/bg_home',$bc);

			

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
		if( !empty($cek) && $stts=='siswa' ){
			
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

			$bc['header'] = $this->load->view('siswa/header',$bc,true);
			$bc['sidebar'] = $this->load->view('siswa/sidebar','',true);
			$bc['topbar'] = $this->load->view('siswa/topbar',$bc,true);

			$bc['nilai'] = $this->web_app_model->getSelectedData('nilai','nis',$this->uri->segment(3));
			$tot_hal = $this->web_app_model->getAllData('nilai');

			$config['base_url']= base_url().'index.php/siswa/nilai/';
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

			$bc['nilai'] = $this->web_app_model->getSelectedData('nilai','nama_lengkap',$this->uri->segment(3));
			

			$this->load->view('siswa/bg_nilai',$bc);
		}
		else {
			header('location:'.base_url().'index.php/web');
		}
	}

	
	public function absen()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if( !empty($cek) && $stts=='siswa' ){
			
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

			$bc['header'] = $this->load->view('siswa/header',$bc,true);
			$bc['sidebar'] = $this->load->view('siswa/sidebar','',true);
			$bc['topbar'] = $this->load->view('siswa/topbar',$bc,true);

			$tot_hal = $this->web_app_model->getAllData('absen');

			$config['base_url']= base_url().'index.php/siswa/absen/';
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

			$this->load->view('siswa/bg_absen',$bc);
		}
		else {
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

	


}  