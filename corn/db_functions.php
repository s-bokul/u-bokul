<?php
include('db_conf.php');
$DB = "";
function db_connect()
{
    global $DB;
    /* connect to server */
    $DB=mysql_connect(HOST,USER,PASS);
    if(!$DB)
    {
        echo 'Warning : Fail to connect server!';
        exit;
    }
    /* function for database connection */
    $DB_sel=mysql_select_db(DB_NAME,$DB);
    if(!$DB_sel)
    {
        echo 'Warning : Fail to connect database!';
        exit;
    }
}

/* function for query */
function query($statement)
{
    global $DB;
    $result = mysql_query($statement,$DB);
    return $result;
}

/* function for database disconnect */
function db_close()
{
    global $DB;
    mysql_close($DB);
}
?>