<?php
$cfg_preg_number = '/[0-9]$/';
$cfg_preg_normal = '/[a-zA-Z0-9]$/';
$cfg_preg_normal2 = '/[a-zA-Z0-9,]$/';
$cfg_preg_normal3 = '/^[\x{4e00}-\x{9fa5}_a-zA-Z0-9]+$/u';
$cfg_preg_password = '/^[a-zA-Z0-9_~!@#$%^&*]{6,15}$/';
$cfg_preg_user = '/^[a-zA-Z0-9]{5,20}$/';
$cfg_preg_email = '/^[0-9a-zA-Z]+[0-9a-zA-Z_.]+[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i';
$cfg_preg_phone = '/^1[358]{1}[0-9]{1}[0-9]{8}$|14[57]{1}[0-9]{8}$/';
?>