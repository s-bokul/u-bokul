<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/User_Controller.php');

class Userpanel extends User_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function _remap( $method )
    {
        // $method contains the second segment of your URI
        switch( $method )
        {
            case 'index':
                $this->index();
                break;

            case 'new-investment':
                $this->new_investment();
                break;

            case 'why-sms':
                $this->why_sms();
                break;

            case 'long-code':
                $this->long_code();
                break;

            case 'other-services':
                $this->other_services();
                break;


            case 'about':
                $this->about();
                break;


            case 'successful':
                $this->display_successful_message();
                break;

            default:
                $this->page_not_found();
                break;
        }
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $this->load->model('user_model');
        $data['user_info'] = $this->user_model->getUserInfo($user_id);

        $error = null;
        $title = 'Campaign';
        $this->template->write_view('header', 'template/user/header',array('data'=>$data));
        $this->template->write_view('content','template/user/pages/campaign',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function new_investment()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $this->load->model('user_model');
        $data['user_info'] = $this->user_model->getUserInfo($user_id);

        $error = null;
        $title = 'Campaign';
        $this->template->write_view('header', 'template/user/header',array('data'=>$data));
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
        $this->template->write_view('header', 'template/user/header',array('data'=>$data));
        $this->template->write_view('content','template/user/pages/account_details',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        $this->output->enable_profiler(TRUE);
    }

}