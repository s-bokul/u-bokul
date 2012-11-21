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

    public function getCountryCode($country_name)
    {
        $this->db->select('country_code');
        $this->db->from('int_country_codes');
        $this->db->where('country_name', $country_name);
        $query = $this->db->get();
        //$query = $this->db->get('int_country_codes');
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result[0]['country_code'];
        }


        return null;
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

    public function getParentId($parent_email)
    {
        $status = null;
        $this->db->select('user_id');
        $this->db->from('user_informations');
        $this->db->where('email', $parent_email);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            $status = $result[0]['user_id'];
        }
        return $status;

    }
	
	public function create($params){
        $status = false;

        $params['parent_user_id'] = $this->getParentId($params['parent_email']);

        $params['passwd'] = md5($params['passwd']);
        $params['activating_code'] = $this->create_guid();
        $params['pin'] = rand(1001,9999);
        //print_r($params);
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] = 'html';

        $this->email->initialize($config);
        $this->email->from('info@ufredis.com', 'UFREDIS');
        $this->email->to($params['email']);

        $this->email->subject('Activation Link Form UFREDIS');
        $this->email->message("Hello ".$params['lname']."
        <br />Your Pin Code : ".$params['pin']."
        <br />Please click the link bellow to activate your account. <a href='http://ufredis.local.com/register/activate/".$params['activating_code']."'></a>
        <br />Thanks<br />Ufredis Team.");

        $this->email->send();

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

    public function update_payment_status($id, $status, $amount, $user_id)
    {
        $data = array(
            'paid_status' => $status
        );
        $this->db->where('purchase_id', $id);
        $this->db->update('purchase', $data);
        if($status == 1)
            $result = $this->db->simple_query("UPDATE `user_informations` SET `balance` = balance+".$amount." WHERE `user_informations`.`user_id` = ".$user_id.";");
        else
        {
            $show_data = array(
                'show_status' => 0
            );
            $this->db->where('purchase_id', $id);
            $this->db->update('purchase', $data);
        }
        return null;

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
            'passwd' => md5($data['passwd1']),
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

    public function profile_update($params, $user_id)
    {
        $status = false;
        $this->db->where('user_id', $user_id);
        if($this->db->update('user_informations', $params))
            $status = true;
        return $status;
    }

    public function purchase_save($params){
        $status = false;
        $params['paid_status'] = 0;
        $params['date_created'] = date('Y-m-d');
        $this->db->set($params);
        if($this->db->insert('purchase'))
        {
            //$status = true;
            $status = $this->db->insert_id();
            $history_data = array(
                'user_id' => $params['user_id'],
                'transaction_type' => 'P',
                'transaction_d_c_type' => 'C',
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
                'transaction_d_c_type' => 'D',
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
                    'transaction_d_c_type' => 'D',
                    'information' => 'Invest Credit',
                    'amount' => $params['investment_amount'],
                    'payment_status' => 1,
                    'create_date' => date('Y-m-d h:m:s')
                );
                $this->db->set($history_data);
                $this->db->insert('balance_history');

                $this->parent_commission($params['user_id'], $params['investment_amount']);
            }
        }


        return $status;
    }

    /*public function insert_balance_history($params)
    {

    }*/

    public function parent_commission($user_id, $amount)
    {
        $status = null;
        $this->db->select('parent_user_id');
        $this->db->from('user_informations');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            $parent1_id = $result[0]['parent_user_id'];
            if($parent1_id == 0)
                return;
            $commission1 = ($amount*8)/100;
            $query1 = $this->db->simple_query("UPDATE `user_informations` SET `balance` = balance+".$commission1." WHERE `user_informations`.`user_id` = ".$parent1_id.";");

            if($query1)
            {
                $status = true;
                $history_data = array(
                    'user_id' => $parent1_id,
                    'transaction_type' => 'C',
                    'transaction_d_c_type' => 'C',
                    'information' => 'Referral Investment Commission',
                    'amount' => $commission1,
                    'payment_status' => 1,
                    'create_date' => date('Y-m-d h:m:s')
                );
                $this->db->set($history_data);
                $this->db->insert('balance_history');

            }

            $this->db->select('parent_user_id');
            $this->db->from('user_informations');
            $this->db->where('user_id', $parent1_id);
            $query = $this->db->get();
            if($query->num_rows() > 0)
            {
                $result = $query->result_array();
                $parent2_id = $result[0]['parent_user_id'];
                if($parent2_id == 0)
                    return;
                $commission2 = ($amount*5)/100;
                $query2 = $this->db->simple_query("UPDATE `user_informations` SET `balance` = balance+".$commission2." WHERE `user_informations`.`user_id` = ".$parent2_id.";");

                if($query2)
                {
                    $status = true;
                    $history_data = array(
                        'user_id' => $parent2_id,
                        'transaction_type' => 'C',
                        'transaction_d_c_type' => 'C',
                        'information' => 'Referral Investment Commission',
                        'amount' => $commission2,
                        'payment_status' => 1,
                        'create_date' => date('Y-m-d h:m:s')
                    );
                    $this->db->set($history_data);
                    $this->db->insert('balance_history');

                }


            }

            $this->db->select('parent_user_id');
            $this->db->from('user_informations');
            $this->db->where('user_id', $parent2_id);
            $query = $this->db->get();
            if($query->num_rows() > 0)
            {
                $result = $query->result_array();
                $parent3_id = $result[0]['parent_user_id'];
                if($parent3_id == 0)
                    return;
                $commission3 = ($amount*2)/100;
                $query3 = $this->db->simple_query("UPDATE `user_informations` SET `balance` = balance+".$commission3." WHERE `user_informations`.`user_id` = ".$parent3_id.";");

                if($query3)
                {
                    $status = true;
                    $history_data = array(
                        'user_id' => $parent3_id,
                        'transaction_type' => 'C',
                        'transaction_d_c_type' => 'C',
                        'information' => 'Referral Investment Commission',
                        'amount' => $commission3,
                        'payment_status' => 1,
                        'create_date' => date('Y-m-d h:m:s')
                    );
                    $this->db->set($history_data);
                    $this->db->insert('balance_history');

                }


            }
        }
        return;
    }

    public function transaction_history($user_id, $row)
    {
        $result = null;
        $conditional_array = array(
            'user_id' => $user_id
        );
        $this->db->order_by('history_id', 'desc');
        $query = $this->db->get_where('balance_history', $conditional_array, 10, $row);

        //echo $this->db->last_query();
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }

        return $result;
    }

    public function transaction_history_search($transaction_type, $user_id, $row)
    {
        $result = null;
        $conditional_array = array(
            'user_id' => $user_id,
            'transaction_type' => $transaction_type
        );
        $this->db->order_by('history_id', 'desc');
        $query = $this->db->get_where('balance_history', $conditional_array, 10, $row);
        //echo $this->db->last_query();
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

        return $query->num_rows();
    }

    public function transaction_history_search_num_rows($transaction_type, $user_id)
    {
        $conditional_array = array(
            'user_id' => $user_id,
            'transaction_type' => $transaction_type
        );
        $query = $this->db->get_where('balance_history', $conditional_array);

        return $query->num_rows();
    }

    public function withdraw_history_num_rows($user_id)
    {
        $conditional_array = array(
            'user_id' => $user_id
        );
        $query = $this->db->get_where('withdraw_accounts', $conditional_array);

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

    public function total_withdraw($user_id)
    {
        $conditional_array = array(
            'user_id' => $user_id
        );
        $this->db->select_sum('withdraw_amount');
        $this->db->from('withdraw_accounts');
        $this->db->where($conditional_array);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            //print_r($result[0]['amount']);
            if($result[0]['withdraw_amount']>0)
                return $result[0]['withdraw_amount'];
            else
                return 0;
        }
        else
            return 0;
    }

    public function total_pending($user_id)
    {
        $val = 0;
        $conditional_array = array(
            'user_id' => $user_id,
            'paid_status' => 0,
        );
        $this->db->select_sum('withdraw_amount');
        $this->db->from('withdraw_accounts');
        $this->db->where($conditional_array);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            //print_r($result[0]['amount']);
            if($result[0]['withdraw_amount']>0)
                return $result[0]['withdraw_amount'];
            else
                return $val;
        }
        else
            return 0;
    }

    public function total_earning($user_id)
    {
        $val = 0;
        $conditional_array = array(
            'user_id' => $user_id,
            'transaction_d_c_type' => 'C'
        );
        $this->db->select_sum('amount');
        $this->db->from('balance_history');
        $this->db->where($conditional_array);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            //echo $this->db->last_query();
            $result = $query->result_array();
            //print_r($result[0]['amount']);
            if($result[0]['amount']>0)
                return $result[0]['amount'];
            else
                return $val;
        }
        else
            return $val;
    }

    public function completed_withdraw($user_id)
    {
        $val = 0;
        $conditional_array = array(
            'user_id' => $user_id,
            'paid_status' => 1
        );
        $this->db->select_sum('withdraw_amount');
        $this->db->from('withdraw_accounts');
        $this->db->where($conditional_array);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            //echo $this->db->last_query();
            $result = $query->result_array();
            //print_r($result[0]['amount']);
            if($result[0]['withdraw_amount']>0)
                return $result[0]['withdraw_amount'];
            else
                return $val;
        }
        else
            return $val;
    }

    public function referral_commission($user_id)
    {
        $val = 0;
        $conditional_array = array(
            'user_id' => $user_id,
            'transaction_type' => 'C'
        );
        $this->db->select_sum('amount');
        $this->db->from('balance_history');
        $this->db->where($conditional_array);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            //echo $this->db->last_query();
            $result = $query->result_array();
            //print_r($result[0]['amount']);
            if($result[0]['amount']>0)
                return $result[0]['amount'];
            else
                return $val;
        }
        else
            return $val;
    }

    public function active_deposits($user_id)
    {
        $val = 0;
        $conditional_array = array(
            'user_id' => $user_id,
        );
        $this->db->select_sum('investment_amount');
        $this->db->from('investments');
        $this->db->where($conditional_array);
        $this->db->where('draw_count <', 72);

        $query = $this->db->get();

        //echo $this->db->last_query();
        if($query->num_rows() > 0)
        {
            //echo $this->db->last_query();
            $result = $query->result_array();
            //print_r($result[0]['amount']);
            if($result[0]['investment_amount']>0)
                return $result[0]['investment_amount'];
            else
                return $val;
        }
        else
            return $val;
    }

    public function total_deposits($user_id)
    {
        $val = 0;
        $conditional_array = array(
            'user_id' => $user_id,
        );
        $this->db->select_sum('investment_amount');
        $this->db->from('investments');
        $this->db->where($conditional_array);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            //echo $this->db->last_query();
            $result = $query->result_array();
            //print_r($result[0]['amount']);
            if($result[0]['investment_amount']>0)
                return $result[0]['investment_amount'];
            else
                return $val;
        }
        else
            return $val;
    }

    public function check_pin($pin, $user_id)
    {
        $status = false;
        $conditional_array = array(
            'user_id' => $user_id,
            'pin' => $pin
        );
        $this->db->select('*');
        $this->db->from('user_informations');
        $this->db->where($conditional_array);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $status = true;
        }

        return $status;
    }

    public function change_pin($pin, $user_id)
    {
        $status = false;
        $params = array(
            'pin' => $pin
        );
        $this->db->where('user_id', $user_id);
        if($this->db->update('user_informations', $params))
            $status = true;
        return $status;
    }

    public function check_password($password, $user_id)
    {
        $status = false;
        $conditional_array = array(
            'user_id' => $user_id,
            'passwd' => md5($password)
        );
        $this->db->select('*');
        $this->db->from('user_informations');
        $this->db->where($conditional_array);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $status = true;
        }

        return $status;
    }

    public function change_password($password, $user_id)
    {
        $status = false;
        $params = array(
            'passwd' => md5($password)
        );
        $this->db->where('user_id', $user_id);
        if($this->db->update('user_informations', $params))
            $status = true;
        return $status;
    }

}



