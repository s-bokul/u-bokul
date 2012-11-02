<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/User_Controller.php');

class Userpanel extends User_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Campaign';
        $this->template->write_view('content','template/user/pages/campaign',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function account_details()
    {
        $this->load->helper('form');
        //$data = null;
        $error = null;
        $title = 'Account Details';
        $data = $this->session->userdata('user_info');
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        $this->template->write_view('content','template/user/pages/account_details',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        $this->output->enable_profiler(TRUE);
    }

}