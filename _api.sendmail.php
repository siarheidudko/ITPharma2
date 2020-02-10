<?php
/**
 * Основная тема для сайта itpharma.by
 *
 * @package ITPharma2
 * @subpackage ITPharma2
 * @since 1.0
 * @version 1.0
 * @author Siarhei Dudko
 * @license MIT
 * @page API отправки почты
 */

header('Content-Type: application/json; charset=utf-8');
try{
	$content = file_get_contents("php://input");
	$json = json_decode($content, TRUE);
	if(!isset($json['email'])){
		echo '{"status":"Не заполнен email."}';
		exit;
	} elseif (!isset($json['name'])){
		echo '{"status":"Не заполнено имя."}';
		exit;
	} elseif (!(isset($json['key']) && ($json['key'] === md5($json['email'] . md5($json['name']) . 'itpharma')))){
		echo '{"status":"Не соответствие ключа безопасности."}';
		exit;
	} elseif (isset($json['message'])){
		//подключаю ядро wp
		include '../../../wp-load.php';
		
		$subject = 'Сообщение с сайта '.get_bloginfo('name');
		$body = $json['message'];
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$to = get_theme_mod('itpharma2_footer_email');
		if(isset($to)){
			if(wp_mail( $to, $subject, $body, $headers )){
				echo '{"status":"Сообщение отправлено."}';
				exit;
			} else {
				echo '{"status":"Сообщение не отправлено."}';
				exit;
			}
		} else {
			echo '{"status":"Не задан email обратной связи в настройках темы."}';
			exit;
		}
	} else {
		echo '{"status":"Сообщение пустое."}';
		exit;
	}
} catch (Exception $e) {
	echo '{"status":"'.$e->getMessage().'"}';
	exit;
}
?>