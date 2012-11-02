<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/My_Controller.php');

class Register extends My_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {

        $this->load->helper('form');
        $this->load->model('user_model');
        $data['country_list'] = $this->user_model->getCountryList();
        $error = null;
        $title = 'Register';
        $this->template->write_view('content','pages/register',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        //$this->output->enable_profiler(TRUE);
    }

    public function save()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data = $this->input->post();
        if($_POST)
        {
            $this->form_validation->set_rules('email', 'Email Address', 'required|Email|callback_checkEmailIsUsed');

            $this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');


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
                $this->load->model('user_model');
                if($this->user_model->create($data))
                {
                    $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Registration complete successfully. Please check your email to activate your account.'
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

    function checkParentIsExists($parent_email, $internal = 1)
    {
        $status = false;
        $this->load->model('user_model');
        if($this->user_model->checkParentIsExists($parent_email))
        {
            if($internal == 1)
                $this->form_validation->set_message('parent_email', 'Parent Email not exists');
            $status = true;
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

if(isset($_GET['parent_email']))
{
    $register = new Register();
    $status = $register->checkParentIsExists($_GET['parent_email'], 0);
    if($status == true)
        echo 'true';
    else
        echo 'false';
    die();
}
/* End of file register.php */
/* Location: ./application/controllers/register.php */