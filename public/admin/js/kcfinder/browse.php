<?php

/** This file is part of KCFinder project
  *
  *      @desc Browser calling script
  *   @package KCFinder
  *   @version 3.12
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://opensource.org/licenses/GPL-3.0 GPLv3
  *   @license http://opensource.org/licenses/LGPL-3.0 LGPLv3
  *      @link http://kcfinder.sunhater.com
  */

$mysqli = new mysqli('localhost', 'root', 'root', 'ci_my_personal');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}
$result = $mysqli->query("SELECT * FROM `ci_sessions` ORDER BY `last_activity` DESC LIMIT 1");
if ($result && $result->num_rows)
{
    $row = $result->fetch_assoc();
    $user_data = $row['user_data'];
    if (!empty($user_data))
    {
        $user_data = unserialize($user_data);
        if($user_data['logged_in'] != TRUE OR
                $row['ip_address'] != $_SERVER['REMOTE_ADDR'] OR
                $row['user_agent'] != $_SERVER['HTTP_USER_AGENT'])
        {
            exit('Access denied');
        }
    }
    else
    {
        exit('Access denied');
    }
}
else
{
    exit('Access denied');
}

require "core/bootstrap.php";
$browser = "kcfinder\\browser"; // To execute core/bootstrap.php on older
$browser = new $browser();      // PHP versions (even PHP 4)
$browser->action();

?>