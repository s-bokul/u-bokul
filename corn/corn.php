<?php
ini_set('max_execution_time', 3000);

$day_name = date('l');
/*if($day_name != 'Monday' || $day_name != 'Tuesday' || $day_name != 'Wednesday' || $day_name != 'Thursday' || $day_name != 'Friday')
exit;*/

include('db_functions.php');

db_connect();

$query = query('SELECT investment_id, user_id, investment_amount, draw_count FROM investments WHERE draw_count < 72;');
while($result  = mysql_fetch_array($query))
{
    $draw_count = $result['draw_count'] + 1;
	$interest = ($result['investment_amount']*2)/100;
    //echo "INSERT INTO `balance_history` (`history_id`, `user_id`, `transaction_type`, `transaction_d_c_type`, `information`, `amount`, `create_date`, `modified_date`) VALUES (NULL, '".$result['user_id']."', 'I', 'C', 'Return Amount', '".$interest."', NOW(), CURRENT_TIMESTAMP)";
    query("INSERT INTO `balance_history` (`history_id`, `user_id`, `transaction_type`, `transaction_d_c_type`, `information`, `amount`, `create_date`, `modified_date`) VALUES (NULL, '".$result['user_id']."', 'I', 'C', 'Return Amount', '".$interest."', NOW(), CURRENT_TIMESTAMP)");
    //echo "UPDATE investments SET draw_count = '".$draw_count."' WHERE  investment_id = '".$result['investment_id']."';";
	query("UPDATE investments SET draw_count = '".$draw_count."' WHERE  investment_id = '".$result['investment_id']."';");
    query("UPDATE `user_informations` SET `balance` = balance+".$interest." WHERE `user_informations`.`user_id` = ".$result['user_id'].";");
    //echo $result['investment_amount']."\n";
}
exit;
?>