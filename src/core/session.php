<?php
	session_start();
	// If User tries to login to the interface this will stop him! Buhahaha :P
	if( !isset($_SESSION['user_id']) ) {
		die("�������� ��� ������ ��� ��� ��������� ��� ��������� ��������! Next time sweety :D");
		exit(1);
	}
?>