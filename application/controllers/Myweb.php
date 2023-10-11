<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myweb extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->login) || $this->session->level == 4) {
			$this->session->sess_destroy();
			redirect(base_url("login"));
		}
	}
	
	public function index()
	{
		$this->load->view('dashboard');
	}
	public function dashboard()
	{
		$this->load->view('dashboard');
	}
	public function konsumen()
	{
		$this->load->view('konsumen');
	}
	public function property()
	{
		$this->load->view('property');
	}
	public function transaksi()
	{
		if ($this->session->level>2) {
			redirect(base_url());
		}
		$this->load->view('transaksi');
	}
	public function pengguna()
	{
		if ($this->session->level>1) {
			redirect(base_url());
		}
		$this->load->view('pengguna');
	}
    public function logout(){
        $this->session->sess_destroy();
		redirect(base_url());
    }
}
