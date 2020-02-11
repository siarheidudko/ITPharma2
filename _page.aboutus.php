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
 * @page страница о нас
 */

	include_once '_div.name.php';	//функция вывода наименования блока
	nameDiv('О нас'); 				//наименование блока
?>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="d-flex flex-row" style="border-top:1px solid #C4C4C4;box-sizing:border-box;height:2px;"></div>
</div>
<?php 
	echo apply_filters('the_content', get_post()->post_content); 
?>