<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_Controller extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $user_info = $this->session->userdata('user_info');
        if(empty($user_info))
        {
            $msg = array(
                'status' => false,
                'class' => 'errormsgbox',
                'msg' => 'To access this page please login.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
            redirect('/login');
        }
        $this->template->set_template('user');
        //$template['active_template'] = 'user';
		$this->set_temlates();
    }
	
	public function set_temlates(){
		$this->template->write_view('header', 'template/user/header',array());
		$this->template->write_view('footer', 'template/user/footer',array());
	}
}

/* End of file Someclass.php */