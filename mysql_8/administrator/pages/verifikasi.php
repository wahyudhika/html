<?php
include ('../../../connect.php');

$edit = mysqli_query($conn, "update admin set role='C' where username='@$_GET[user]'");

if($edit){
	header('location:http://webgista.ddns.net/mysql_8/hotel_bkt/admin/login.php');
}
