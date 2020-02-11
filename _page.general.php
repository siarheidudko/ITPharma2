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
 * @page главная страница
 */

	include_once '_div.name.php';	//функция вывода наименования блока
?>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="card w-100" style="font-family:RalewayBold;font-style:normal;font-variant:normal;font-weight:400;font-size:1.7em;line-height:1.2em;color:#FFFFFF;text-shadow:0px 4px 4px rgba(0, 0, 0, 0.25);border:0px;border-radius:0px;">
		<img class="card-img-top w-100" src="<?php
			echo get_stylesheet_directory_uri().'/img/home-presentation.jpg';
		?>" alt="ITPharma" style="border-top-left-radius:0px;border-top-right-radius:0px;">
		<div class="card-img-overlay w-100 h-100" style="display:flex;align-items:flex-end;">
			<div style="margin-left:3.055em;margin-bottom:1em;max-width:67%">Разработка и внедрение программного обеспечения в сфере фармацевтического бизнеса</div>
		</div>
	</div>
</div>
	<?php 
		nameDiv('Наши продукты'); 	//наименование блока
	?>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="w-100" style="pading-right:2em;pading-left:2em;">
		<div class="d-flex flex-row justify-content-center">
			<a href="/products?iRetailPOS" class="d-flex flex-column justify-content-center align-self-stretch w-25" style="text-align:center;margin-left:2em;background:rgba(169, 221, 251, 0.2);border-radius:3px;color:#000000;text-decoration:none;">
				<div class="d-flex flex-row" style="margin:auto;">
					<img class="w-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-products-iretailpos.jpg'; ?>" alt="iRetailPOS" />
				</div>
				<div class="d-flex flex-row" style="margin: 1.82em auto;">
					<div class="d-flex flex-column justify-content-center align-self-stretch">
						<img src="<?php echo get_stylesheet_directory_uri().'/img/home-products-iretailpos2.png'; ?>" alt="iRetailPOS" /> 
					</div>
					<div class="d-flex flex-column justify-content-center align-self-stretch" style="margin-left:1em;font-size:1.0em;overflow:hidden;">iRetailPOS</div>
				</div>
			</a>
			<a href="/products?iRetailManagement" class="d-flex flex-column justify-content-center align-self-stretch w-25" style="text-align:center;margin-left:2em;background:rgba(169, 221, 251, 0.2);border-radius:3px;color:#000000;text-decoration:none;">
				<div class="d-flex flex-row" style="margin:auto;">
					<img class="w-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-products-iretailmanagement.jpg'; ?>" alt="iRetailManagement" />
				</div>
				<div class="d-flex flex-row" style="margin: 1.82em auto;">
					<div class="d-flex flex-column justify-content-center align-self-stretch">
						<img src="<?php echo get_stylesheet_directory_uri().'/img/home-products-iretailmanagement2.png'; ?>" alt="iRetailManagement" />
					</div>
					<div class="d-flex flex-column justify-content-center align-self-stretch" style="margin-left:1em;font-size:1.0em;overflow:hidden;">iRetailManagement</div>
				</div>
			</a>
			<a href="/products?iRetailCloud" class="d-flex flex-column justify-content-center align-self-stretch w-25" style="text-align:center;margin-left:2em;background:rgba(169, 221, 251, 0.2);border-radius:3px;color:#000000;text-decoration:none;">
				<div class="d-flex flex-row" style="margin:auto;">
					<img class="w-100" src="<?php echo get_stylesheet_directory_uri().'/img/home-products-iretailcloud.jpg'; ?>" alt="iRetailCloud" />
				</div>
				<div class="d-flex flex-row" style="margin: 1.82em auto;">
					<div class="d-flex flex-column justify-content-center align-self-stretch">
						<img src="<?php echo get_stylesheet_directory_uri().'/img/home-products-iretailcloud2.png'; ?>" alt="iRetailCloud" />
					</div>
					<div class="d-flex flex-column justify-content-center align-self-stretch" style="margin-left:1em;font-size:1.0em;overflow:hidden;">iRetailCloud</div>
				</div>
			</a>
		</div>
	</div>
</div>
<?php 
	nameDiv('О нас'); 													//наименование блока

	echo apply_filters('the_content', get_post()->post_content); 		//вывожу контент страницы

	include '_div.tehnology.php';										//подключаю блок технологий
	include '_div.news.php';											//подключаю блок новостей
?>