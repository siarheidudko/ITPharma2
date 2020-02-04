<?php
/**
 * �������� ���� ��� ����� itpharma.by
 *
 * @package ITPharma2
 * @subpackage ITPharma2
 * @since 1.0
 * @version 1.0
 * @author Siarhei Dudko
 * @license MIT
 */

header('Content-Type: application/json; charset=utf-8');
try{
	$content = file_get_contents("php://input");
	$json = json_decode($content, TRUE);
	if(isset($json['message'])){
		//��������� ���� wp
		include '../../../wp-load.php';
		
		$subject = '��������� � ����� '.get_bloginfo('name');
		$body = $json['message'];
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$to = get_theme_mod('itpharma2_footer_email');
		if(isset($to)){
			if(wp_mail( $to, $subject, $body, $headers )){
				echo '{"status":"��������� ����������."}';
			} else {
				echo '{"status":"��������� �� ����������."}';
			}
		} else {
			echo '{"status":"�� ����� email �������� ����� � ���������� ����."}';
		}
	} else {
		echo '{"status":"��������� ������."}';
	}
} catch (Exception $e) {
	echo '{"status":"'.$e->getMessage().'"}';
}
exit;
?>