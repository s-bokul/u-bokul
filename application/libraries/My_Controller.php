<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class My_Controller extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->set_temlates();
    }
	
	public function set_temlates(){
		$this->template->write_view('header', 'template/header',array());
		$this->template->write_view('footer', 'template/footer',array());
	}
}

/* End of file Someclass.php */