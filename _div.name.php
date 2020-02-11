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
 * @page функция вывода наименования блока
 */

function nameDiv($name){
	echo '<div class="d-flex flex-column itpharma2_raleway">
		 <div style="display:flex;align-items:center;justify-content:center;min-height:4em;font-size:1.5em;line-height:1.7em;">
			<div>' . $name . '</div>
		</div>	
	</div>';
}
?>