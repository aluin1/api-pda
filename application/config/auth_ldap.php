<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['hosts'] = array('pertamina.com');
$config['ports'] = array(389);
$config['basedn'] = 'dc=pertamina,dc=com';
$config['login_attribute'] = 'uid';
$config['proxy_user'] = '';
$config['proxy_pass'] = '';
$config['roles'] = array(1 => 'User', 
    3 => 'Power User',
    5 => 'Administrator');
$config['member_attribute'] = 'memberUid';
//$config['auditlog'] = 'application/logs/audit.log';  // Some place to log attempted logins (separate from message log)
?>
