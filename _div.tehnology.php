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
 * @page блок технологий
 */

	include_once '_div.name.php';	//функция вывода наименования блока
	nameDiv('Технологии'); 			//наименование блока
?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<div class="d-flex flex-column itpharma2_raleway">	
	<div style="align-items:center;justify-content:center;margin-right:2em;margin-left:2em;">
		<div class="d-flex flex-row" id="galleryTehnology" style="overflow-x:hidden;display:block !important;">
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-ws.png'; ?>" alt="websocket" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-dotnet.png'; ?>" alt="dotnet" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-devexpress.png'; ?>" alt="devexpress" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-react.png'; ?>" alt="react" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-node.png'; ?>" alt="node" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-fr.png'; ?>" alt="fastreport" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-delphi.png'; ?>" alt="delphi" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-js.png'; ?>" alt="js" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-csharp.png'; ?>" alt="csharp" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-1c.png'; ?>" alt="1c" />
			</div>
			<div class="d-flex flex-column justify-content-center">
				<img class="mw-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-php.png'; ?>" alt="php" />
			</div>
		</div>
	</div>
</div>
<script>
	'use strict'
	document.addEventListener('DOMContentLoaded', function(event) {
		jQuery(document).ready(function($) { 
			$('#galleryTehnology').slick({
				slidesToShow: 7,
				slidesToScroll: 1,
				autoplay: true,
				arrows: false,
				autoplaySpeed: 1000
			});
		});
	});
</script>