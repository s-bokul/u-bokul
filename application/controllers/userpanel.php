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

            case 'purchase':
                $this->purchase();
                break;

            case 'purchase-save':
                $this->purchase_save();
                break;

            case 'investment-save':
                $this->investment_save();
                break;


            case 'account_details':
                $this->account_details();
                break;


            case 'transaction':
                $this->transaction();
                break;

            case 'withdraw':
                $this->withdraw();
                break;

            case 'withdraw-save':
                $this->withdraw_save();
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
        //$this->template->write_view('header', 'template/user/header',array('data'=>$data));
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
        $title = 'New Investment';
        $this->template->write_view('content','template/user/pages/investment',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function investment_save()
    {
        $this->load->model('user_model');

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $data_investment = $this->input->post();
        $data_investment['user_id'] = $user_id;
        if($this->user_model->investment_save($data_investment))
        {
            $msg = array(
                'status' => true,
                'class' => 'successbox',
                'msg' => 'Successfully Invested.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'errormsgbox',
                'msg' => 'Failed please try again.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }

        redirect('/userpanel/new-investment');
    }

    public function purchase()
    {
        $this->load->helper('form');
        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $this->load->model('user_model');
        $data['user_info'] = $this->user_model->getUserInfo($user_id);

        $error = null;
        $title = 'Purchase';
        $this->template->write_view('content','template/user/pages/purchase',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function purchase_save()
    {
        $this->load->model('user_model');

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $data_parchase = $this->input->post();
        $data_parchase['user_id'] = $user_id;
        if($this->user_model->purchase_save($data_parchase))
        {
            $msg = array(
                'status' => true,
                'class' => 'successbox',
                'msg' => 'Request Sent Successfully. Your Account balance is update within 24 hours.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'errormsgbox',
                'msg' => 'Request failed please try again.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }

        redirect('/userpanel/purchase');

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
        //$this->template->write_view('header', 'template/user/header',array('data'=>$data));
        $this->template->write_view('content','template/user/pages/account_details',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        //$this->output->enable_profiler(TRUE);
    }

    public function transaction()
    {
        $row = $this->uri->segment(3);
        $this->load->model('user_model');
        //$data = null;
        $error = null;
        $title = 'Transaction History';

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];

        $this->load->library('pagination');

        $config['base_url'] = '/userpanel/transaction';
        $config['total_rows'] = $this->user_model->transaction_history_num_rows($user_id);
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['transaction_history'] = $this->user_model->transaction_history($user_id, $row);


        /*echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        //$this->template->write_view('header', 'template/user/header',array('data'=>$data));
        $this->template->write_view('content','template/user/pages/transaction',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        $this->output->enable_profiler(TRUE);
    }

    public function withdraw()
    {
        $this->load->helper('form');
        //$data = null;
        $error = null;
        $title = 'Withdraw';
        $data = $this->session->userdata('user_info');
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        //$this->template->write_view('header', 'template/user/header',array('data'=>$data));
        $this->template->write_view('content','template/user/pages/withdraw',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function withdraw_save()
    {
        $this->load->model('user_model');

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $data_withdraw = $this->input->post();
        $data_withdraw['user_id'] = $user_id;
        $data['user_info'] = $this->user_model->getUserInfo($user_id);

        //print_r($data['user_info']['balance']);
        //print_r($data_withdraw);
        //die();
        if($data['user_info']['balance'] >= $data_withdraw['withdraw_amount'])
        {
            if($this->user_model->withdraw_save($data_withdraw))
            {
                $msg = array(
                    'status' => true,
                    'class' => 'successbox',
                    'msg' => 'Request Sent Successfully. Your request process within 24 hours.'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }
            else
            {
                $msg = array(
                    'status' => false,
                    'class' => 'errormsgbox',
                    'msg' => 'Request failed please try again.'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }
        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'errormsgbox',
                'msg' => 'Request Failed. Not have enough credit'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }


        redirect('/userpanel/withdraw');
    }

}