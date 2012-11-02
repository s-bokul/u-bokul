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
	
	public function create($params){
        $status = false;
        $params['passwd'] = md5($params['passwd']);
        unset($params['cnf_password']);
        $this->db->set($params);
        if($this->db->insert('user_informations'))
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
        $query = $this->db->get_where('user_informations', array('parent_email' => $parent_email));
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

}



