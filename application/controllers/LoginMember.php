<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoginMember extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
    }

    public function index()
    {
		if($this->session->userdata('logined1') && $this->session->userdata('logined1') == true) //jika ada session maka akan ke home
		{
			redirect('Welcome/index');
		}
		
		if(!$this->input->post()) //jika tidak ada input data post maka akan ke halaman login
		{
			$this->load->view('Login');
		}
		else
		{
			$cek_login = $this->Member_model->cek_login(
				$this->input->post('nama'),
				$this->input->post('pass')
				);
			if(!empty($cek_login))
			{
				$this->session->set_userdata('nama',$cek_login->nama);
				$this->session->set_userdata('logined1',true);				
				redirect("Welcome/index");
			}
			else 
			{
				redirect("Welcome/Gagal_login");
			}
		}
        
    } 
	
	public function logout()
    {
		$this->session->unset_userdata('logined1');//hapus session userdata
		redirect("/LoginMember");
    } 
}

/* End of file Workflows.php */
/* Location: ./application/controllers/Workflows.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-15 00:43:10 */
/* http://harviacode.com */
