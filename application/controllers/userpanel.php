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

            case 'profile':
                $this->profile();
                break;

            case 'profile-save':
                $this->profile_save();
                break;

            case 'change-password':
                $this->change_password();
                break;

            case 'change-pin':
                $this->change_pin();
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

            case 'payment':
                $this->payment();
                break;

            case 'status':
                $this->status();
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

            case 'withdraw-history':
                $this->withdraw_history();
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
        $data['total_withdraw'] = $this->user_model->total_withdraw($user_id);
        $data['total_pending'] = $this->user_model->total_pending($user_id);
        $data['completed_withdraw'] = $this->user_model->completed_withdraw($user_id);
        $data['total_earning'] = $this->user_model->total_earning($user_id);
        $data['referral_commission'] = $this->user_model->referral_commission($user_id);
        $data['active_deposits'] = $this->user_model->active_deposits($user_id);
        $data['total_deposits'] = $this->user_model->total_deposits($user_id);

        $error = null;
        $title = 'Home';
        //$this->template->write_view('header', 'template/user/header',array('data'=>$data));
        $this->template->write_view('content','template/user/pages/home',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function profile()
    {
        $this->load->helper('form');
        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $this->load->model('user_model');
        $data['user_info'] = $this->user_model->getUserInfo($user_id);
        $error = null;
        $title = 'Profile Information';
        $this->template->write_view('content','template/user/pages/profile',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function profile_save()
    {
        $this->load->model('user_model');

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $data_profile = $this->input->post();

        if($this->user_model->profile_update($data_profile, $user_id))
        {
            $msg = array(
                'status' => true,
                'class' => 'alert alert-success',
                'msg' => 'Profile Successfully Updated.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'alert alert-error',
                'msg' => 'Failed please try again.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }

        redirect('/userpanel/profile');
    }

    public function change_password()
    {
        $this->load->model('user_model');

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $data_password = $this->input->post();

        if($this->user_model->check_pin($data_password['pins'], $user_id))
        {
            if($this->user_model->change_password($data_password['passwd'], $user_id))
            {
                $msg = array(
                    'status' => true,
                    'class' => 'alert alert-success',
                    'msg' => 'Password Successfully Changed.'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }
            else
            {
                $msg = array(
                    'status' => false,
                    'class' => 'alert alert-error',
                    'msg' => 'Failed To Change Password. Please Try Again.'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }

        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'alert alert-error',
                'msg' => 'Wrong Pin Code.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }

        redirect('/userpanel/profile');
    }

    public function change_pin()
    {
        $this->load->model('user_model');

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $data_password = $this->input->post();

        if($this->user_model->check_password($data_password['passwd1'], $user_id))
        {
            if($this->user_model->change_pin($data_password['pin'], $user_id))
            {
                $msg = array(
                    'status' => true,
                    'class' => 'alert alert-success',
                    'msg' => 'Pin Successfully Changed.'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }
            else
            {
                $msg = array(
                    'status' => false,
                    'class' => 'alert alert-error',
                    'msg' => 'Failed To Change Pin. Please Try Again.'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }

        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'alert alert-error',
                'msg' => 'Wrong Password.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }

        redirect('/userpanel/profile');
    }

    public function new_investment()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        $this->load->model('user_model');
        //echo $this->user_model->getParentId('asdasd@asd.com');
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
                'class' => 'alert alert-success',
                'msg' => 'Successfully Invested.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'alert alert-error',
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

        if($status = $this->user_model->purchase_save($data_parchase))
        {
            $data_parchase['insert_id'] = $status;
            $this->session->set_userdata('data_parchase', $data_parchase);

            $msg = array(
                'status' => true,
                'class' => 'alert alert-success',
                'msg' => 'Request Sent Successfully. Your Account balance is update within 24 hours.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'alert alert-error',
                'msg' => 'Request failed please try again.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
            redirect('/userpanel/purchase');
        }

        redirect('/userpanel/payment');

    }

    public function payment()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $error = null;
        $title = 'Payment';
        $data['data_parchase'] = $this->session->userdata('data_parchase');
        //print_r($data['data_parchase']);
        //die();
        $this->template->write_view('content','template/user/pages/payment',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function status()
    {
        $insert_id = $this->uri->segment(3);
        $amount = $this->uri->segment(4);
        $status = $this->uri->segment(5);
        if($status == md5('fail'))
        {
            $this->user_model->update_payment_status($insert_id, 1, $amount, $user_id);
            $msg = array(
                'status' => false,
                'class' => 'alert alert-error',
                'msg' => 'Request Failed.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
            redirect('/userpanel/purchase');
        }
        else if($status == md5('success'))
        {
           if($amount == $_GET['lr_amnt'])
           {
               $user_info = $this->session->userdata('user_info');
               $user_id = $user_info['user_id'];
               $this->load->model('user_model');
               $this->user_model->update_payment_status($insert_id, 1, $amount, $user_id);

               $msg = array(
                   'status' => true,
                   'class' => 'alert alert-success',
                   'msg' => 'Successfully Received your balance.'
               );

               $data = json_encode($msg);

               $this->session->set_flashdata('msg', $data);
               redirect('/userpanel/purchase');
           }
        }
        else
        {
            $this->user_model->update_payment_status($insert_id, 1, $amount, $user_id);
            $msg = array(
                'status' => false,
                'class' => 'alert alert-error',
                'msg' => 'Request Failed.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
            redirect('/userpanel/purchase');
        }
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
        $this->load->helper('form');
        $row = $this->uri->segment(3);
        $this->load->model('user_model');
        //$transaction_type = $_GET['transaction_type'];
        //$data = null;
        $error = null;
        $title = 'Transaction History';

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];

        $this->load->library('pagination');

        $config['base_url'] = '/userpanel/transaction';
        $config['total_rows'] = $this->user_model->transaction_history_num_rows($user_id);
        $config['per_page'] = 10;
        $data['transaction_history'] = $this->user_model->transaction_history($user_id, $row);

        if(!empty($_GET['transaction_type']))
        {
            $data['transaction_history'] = $this->user_model->transaction_history_search($_GET['transaction_type'], $user_id, $row);
        }

        $this->pagination->initialize($config);





        /*echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        //$this->template->write_view('header', 'template/user/header',array('data'=>$data));
        $this->template->write_view('content','template/user/pages/transaction',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        //$this->output->enable_profiler(TRUE);
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

        if($this->user_model->check_pin($data_withdraw['pin'], $user_id))
        {
            unset($data_withdraw['pin']);

            if($data['user_info']['balance'] >= $data_withdraw['withdraw_amount'])
            {
                if($this->user_model->withdraw_save($data_withdraw))
                {
                    $msg = array(
                        'status' => true,
                        'class' => 'alert alert-success',
                        'msg' => 'Request Sent Successfully. Your request will be processed within 24 hours.'
                    );

                    $data = json_encode($msg);

                    $this->session->set_flashdata('msg', $data);
                }
                else
                {
                    $msg = array(
                        'status' => false,
                        'class' => 'alert alert-error',
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
                    'class' => 'alert alert-error',
                    'msg' => 'Request Failed. Not have enough credit'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }
        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'alert alert-error',
                'msg' => 'Wrong Pin Code.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }


        redirect('/userpanel/withdraw');
    }

    public function withdraw_history()
    {
        $row = $this->uri->segment(3);
        $this->load->model('user_model');
        //$data = null;
        $error = null;
        $title = 'Withdraw History';

        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];

        $this->load->library('pagination');

        $config['base_url'] = '/userpanel/withdraw-history';
        $config['total_rows'] = $this->user_model->withdraw_history_num_rows($user_id);
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['withdraw_history'] = $this->user_model->withdraw_history($user_id, $row);


        $this->template->write_view('content','template/user/pages/withdraw_history',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        //$this->output->enable_profiler(TRUE);
    }

    public function update_user_account($account, $gateway)
    {
        $this->load->model('user_model');
        $user_info = $this->session->userdata('user_info');
        $user_id = $user_info['user_id'];
        return $this->user_model->update_user_account($account, $gateway, $user_id);
    }
}

if(!empty($_GET['liberty_account_number']))
{
    $user_panel = new Userpanel();
    $status = $user_panel->update_user_account($_GET['liberty_account_number'], 'liberty_account');
    if($status == true)
        echo 'true';
    else
        echo 'false';
    die();
}

if(!empty($_GET['payza_account_number']))
{
    $user_panel = new Userpanel();
    $status = $user_panel->update_user_account($_GET['payza_account_number'], 'payza_account');
    if($status == true)
        echo 'true';
    else
        echo 'false';
    die();
}