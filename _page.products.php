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
 * @page страница продукты
 */

	include_once '_div.name.php';	//функция вывода наименования блока
	nameDiv('Наши продукты'); 		//наименование блока
?>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="d-flex flex-row" style="border-top:1px solid #C4C4C4;box-sizing:border-box;height:2px;"></div>
</div>
<?php 
	echo apply_filters('the_content', get_post()->post_content); 
?>
<script>
	'use strict'
	document.addEventListener('DOMContentLoaded', function(event) {
		jQuery(document).ready(function($) {
			let softExpander = {
				iRetailPOSexpand: <?php if(isset($_GET['iRetailPOS'])){ echo 'false'; } else { echo 'true'; } ?>,
				iRetailManagementexpand: <?php if(isset($_GET['iRetailManagement'])){ echo 'false'; } else { echo 'true'; } ?>,
				iRetailCloudexpand: <?php if(isset($_GET['iRetailCloud'])){ echo 'false'; } else { echo 'true'; } ?>
			};
			function softExpanderFunc(arg){
				if((typeof(softExpander[arg]) === 'boolean') && $("div").is("#"+arg)){
					if(softExpander[arg]){
						$("#"+arg).css('display', 'none');
						softExpander[arg] = false;
					} else {
						$("#"+arg).css('display', 'block');
						softExpander[arg] = true;
					}
				}
			}
			if($("div").is("#iRetailPOSexpander")){
				$("#iRetailPOSexpander").click(function(event){
					event.preventDefault();
					softExpanderFunc('iRetailPOSexpand');
				});
				softExpanderFunc('iRetailPOSexpand');
			}
			if($("div").is("#iRetailManagementexpander")){
				$("#iRetailManagementexpander").click(function(event){
					event.preventDefault();
					softExpanderFunc('iRetailManagementexpand');
				});
				softExpanderFunc('iRetailManagementexpand');
			}
			if($("div").is("#iRetailCloudexpander")){
				$("#iRetailCloudexpander").click(function(event){
					event.preventDefault();
					softExpanderFunc('iRetailCloudexpand');
				});
				softExpanderFunc('iRetailCloudexpand');
			}
		});
	});
</script>

