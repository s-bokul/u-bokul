<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_model extends CI_Model{

	protected $errors;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function getCountryList()
    {
        $this->db->select('country_name');
        $this->db->from('int_country_codes');
        $query = $this->db->get();
        //$query = $this->db->get('int_country_codes');
        $result = $query->result_array();
        return $result;
    }

    public function create_guid($namespace = '') {
        static $guid = '';
        $uid = uniqid("", true);
        $data = $namespace;
        $data .= $_SERVER['REQUEST_TIME'];
        $data .= $_SERVER['HTTP_USER_AGENT'];
        $data .= $_SERVER['REMOTE_ADDR'];
        $data .= $_SERVER['REMOTE_PORT'];
        $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
        $guid = '' .
            substr($hash,  0,  8) .
            '-' .
            substr($hash,  8,  4) .
            '-' .
            substr($hash, 12,  4) .
            '-' .
            substr($hash, 16,  4) .
            '-' .
            substr($hash, 20, 12) .
            '';
        return $guid;
    }
	
	public function create($params){
        $status = false;
        $params['passwd'] = md5($params['passwd']);
        $params['activating_code'] = $this->create_guid();
        //print_r($params);
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] = 'html';

        $this->email->initialize($config);
        $this->email->from('info@ufredis.com', 'UFREDIS');
        $this->email->to($params['email']);

        $this->email->subject('Activation Link Form UFREDIS');
        $this->email->message("Hello ".$params['lname']."
        <br />Please click the link bellow to activate your account. <a href='http://ufredis.local.com/register/activate/".$params['activating_code']."'></a>
        <br />Thanks<br />Ufredis Team.");

        $this->email->send();

        /*echo $this->email->print_debugger();
        die();*/
        unset($params['cnf_password']);
        $this->db->set($params);
        if($this->db->insert('user_informations'))
		$status = true;
        return $status;
	}

    public function checkActivateID($activation_id)
    {
        $status = false;
        $query = $this->db->get_where('user_informations', array('activating_code' => $activation_id));
        if($query->num_rows() > 0)
            $status = true;
        return $status;
    }

    public function activate($activation_id)
    {
        $result = $this->db->simple_query("UPDATE `user_informations` SET `balance` = 10 WHERE `user_informations`.`activating_code` = '".$activation_id."';");

        $status = false;
        $data = array(
            'is_active' => 1,
            'activating_code' => ''
        );

        $this->db->where('activating_code', $activation_id);
        $this->db->update('user_informations', $data);


        //echo $this->db->last_query();
        //die();
        if($this->db->update('user_informations', $data))
            $status = true;
        return $status;
    }
	
    public function checkEmailIsUsed($email)
    {
        $status = false;
        $query = $this->db->get_where('user_informations', array('email' => $email));
        if($query->num_rows() > 0)
            $status = true;
        return $status;
    }

    public function checkMobileIsUsed($number)
    {
        $status = false;
        $query = $this->db->get_where('user_informations', array('mobile' => $number));
        if($query->num_rows() > 0)
            $status = true;
        return $status;
    }

    public function checkParentIsExists($parent_email)
    {
        $status = false;
        $query = $this->db->get_where('user_informations', array('email' => $parent_email));
        //echo $this->db->last_query();
        if($query->num_rows() > 0)
            $status = true;
        return $status;
    }

    public function login_check($data)
    {
        $status = false;
        $conditional_array = array(
            'email' => $data['email'],
            'passwd' => md5($data['passwd']),
            'is_active' => 1
        );
        $query = $this->db->get_where('user_informations', $conditional_array);
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            $this->session->set_userdata('user_info', $result[0]);
            $status = true;
        }

        return $status;
    }

    public function getUserInfo($user_id)
    {
        $conditional_array = array(
            'user_id' => $user_id
        );
        $query = $this->db->get_where('user_informations', $conditional_array);
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }

        return $result[0];
    }

    public function purchase_save($params){
        $status = false;
        $params['paid_status'] = 0;
        $params['date_created'] = date('Y-m-d');
        $this->db->set($params);
        if($this->db->insert('purchase'))
        {
            $status = true;
            $history_data = array(
                'user_id' => $params['user_id'],
                'transaction_type' => 'P',
                'information' => 'Purchase Credit',
                'amount' => $params['amount'],
                'payment_status' => 0,
                'create_date' => $params['date_created']
            );
            $this->db->set($history_data);
            $this->db->insert('balance_history');
        }

        return $status;
    }

    public function withdraw_save($params){
        $status = false;

        $result = $this->db->simple_query("UPDATE `user_informations` SET `balance` = balance-".$params['withdraw_amount']." WHERE `user_informations`.`user_id` = ".$params['user_id'].";");

        $params['paid_status'] = 0;
        $params['create_date'] = date('Y-m-d');
        $this->db->set($params);
        if($this->db->insert('withdraw_accounts'))
        {
            $status = true;
            $history_data = array(
                'user_id' => $params['user_id'],
                'transaction_type' => 'W',
                'information' => 'Withdraw Credit',
                'amount' => $params['withdraw_amount'],
                'payment_status' => 0,
                'create_date' => $params['create_date']
            );
            $this->db->set($history_data);
            $this->db->insert('balance_history');
        }

        return $status;
    }

    public function investment_save($params)
    {
        $status = false;
        $params['payment_status'] = 1;
        $params['created_date'] = date('Y-m-d');
        $this->db->set($params);

        $result = $this->db->simple_query("UPDATE `user_informations` SET `balance` = balance-".$params['investment_amount']." WHERE `user_informations`.`user_id` = ".$params['user_id'].";");

        if($result)
        {
            if($this->db->insert('investments'))
            {
                $status = true;
                $history_data = array(
                    'user_id' => $params['user_id'],
                    'transaction_type' => 'I',
                    'information' => 'Invest Credit',
                    'amount' => $params['investment_amount'],
                    'payment_status' => 1,
                    'create_date' => $params['created_date']
                );
                $this->db->set($history_data);
                $this->db->insert('balance_history');
            }
        }


        return $status;
    }

    public function transaction_history($user_id, $row)
    {
        $conditional_array = array(
            'user_id' => $user_id
        );
        $query = $this->db->get_where('balance_history', $conditional_array, 10, $row);
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }

        return $result;
    }

    public function transaction_history_num_rows($user_id)
    {
        $conditional_array = array(
            'user_id' => $user_id
        );
        $query = $this->db->get_where('balance_history', $conditional_array);
        /*if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }*/

        return $query->num_rows();
    }

    public function withdraw_history_num_rows($user_id)
    {
        $conditional_array = array(
            'user_id' => $user_id
        );
        $query = $this->db->get_where('withdraw_accounts', $conditional_array);
        /*if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }*/

        return $query->num_rows();
    }

    public function withdraw_history($user_id, $row)
    {
        $conditional_array = array(
            'user_id' => $user_id
        );
        //$this->db->order_by("withdraw_id", "desc");
        $this->db->select('*');
        $this->db->from('withdraw_accounts');
        $this->db->where($conditional_array);
        $this->db->order_by("withdraw_id", "desc");
        $this->db->limit(10, $row);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
        else
            return null;

    }

}



