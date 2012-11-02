<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/My_Controller.php');

class Register extends My_Controller {

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
        $title = 'Register';
        $this->template->write_view('content','pages/register',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function save()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data = $this->input->post();
        if($_POST)
        {
            $this->form_validation->set_rules('email', 'Email Address', 'required|Email|callback_checkEmailIsUsed');

            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|callback_checkMobileIsUsed');
            $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('company_name', 'Company Name', 'required|alpha');


            if ($this->form_validation->run() == FALSE)
            {
                $data = null;
                $error = null;
                $title = 'Register';
                $this->template->write_view('content','pages/register',array('data'=>$data,'error'=>$error,'title'=>$title));
                $this->template->render();
            }
            else
            {
                //$this->load->view('formsuccess');
                $data['password'] = rand(100000,999999);
                /*
                              * Include SMPP Config File
                              */

                include(APPPATH.'config/smpp'.EXT);
                $this->load->model('user_model');
                if($this->user_model->create($data))
                {
                    $message = "Thanks for join with us. Your password is :".$data['password'];

                    $this->load->library('smpp');

                    $this->smpp->debug= 0;

                    $this->smpp->open($smpp['host'], $smpp['port'], $smpp['system_id'], $smpp['password']);

                    $this->smpp->send_long($smpp['src'], $data['mobile_number'], $message);

                    $this->smpp->close();

                    $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Registration complete successfully.'
                    );

                    $data = json_encode($msg);

                    $this->session->set_flashdata('msg', $data);
                }
                else
                {
                    $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Registration failed please try again.'
                    );

                    $data = json_encode($msg);

                    $this->session->set_flashdata('msg', $data);
                }

                redirect('/register');
            }


        }

    }

    function checkEmailIsUsed($email, $internal = 1)
    {
        $status = true;
        $this->load->model('user_model');
        if($this->user_model->checkEmailIsUsed($email))
        {
            if($internal == 1)
                $this->form_validation->set_message('email_check', 'Email Already Taken');
            $status = false;
        }

        return $status;
    }


    function checkMobileIsUsed($number, $internal = 1)
    {
        $status = true;
        $this->load->model('user_model');
        if($this->user_model->checkMobileIsUsed($number))
        {
            if($internal == 1)
                $this->form_validation->set_message('number_check', 'Mobile Number Already Taken');
            $status = false;
        }

        return $status;
    }

}

if(isset($_GET['email']))
{
    $register = new Register();
    $status = $register->checkEmailIsUsed($_GET['email'], 0);
    if($status == true)
        echo 'true';
    else
        echo 'false';
    die();
}

if(isset($_GET['mobile_number']))
{
    $register = new Register();
    $status = $register->checkMobileIsUsed($_GET['mobile_number'], 0);
    if($status == true)
        echo 'true';
    else
        echo 'false';
    die();
}
/* End of file register.php */
/* Location: ./application/controllers/register.php */