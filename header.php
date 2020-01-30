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
 */
?>
<!DOCTYPE html>
<html><head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" />
	<title><?php echo get_bloginfo("name") . ' - ' . get_page_by_path(get_page_uri(), 'OBJECT', array('post', 'page'))->post_title; ?></title>
	<?php wp_head() ?>
	<style type="text/css">
		body{ <?php 
			$backgroundimg = get_background_image();
			$backgroundcolor = get_background_color();
			if($backgroundcolor){
				echo 'background-color: #'.$backgroundcolor.';';
			}
			if($backgroundimg){
				echo 'background-image:url('.$backgroundimg.')';
			}
		?> }
	</style>
	<?php 
		$headcode = get_theme_mod('itpharma2_head_code');
		if($headcode)
			echo $headcode;
	?>
</head>
<body  <?php body_class() ?>>
<?php 
	$headercode = get_theme_mod('itpharma2_header_code');
	if($headercode)
		echo $headercode;
?>
<nav class="navbar navbar-expand-lg w-100 <?php 
	$headerstyle = get_theme_mod('itpharma2_header_footer_textstyle');
	switch($headerstyle){
		case 'light':
			echo 'navbar-dark';
			break;
		case 'dark':
			echo 'navbar-light';
			break;
		default:
			echo 'navbar-dark';
			break;
	}
?>" id="itpharma2_primarynavbar" style="<?php 
	$headercolor = get_theme_mod('itpharma2_header_footer_background');
	if($headercolor){ echo 'background-color: '.$headercolor.';'; } 
?>" aria-label="<?php esc_attr_e( 'Основное меню', 'itpharma2' ); ?>">
	<a class="navbar-brand" href="/"><?php 
		$logotext = get_bloginfo("name");
		if(has_custom_logo()){
			$imglink = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
			echo '<img id="itpharma2_logoimg" src="'.$imglink[0].'" alt="ITPharma">';
		}elseif($logotext){
			echo $logotext;
		} else {
			echo 'Логотип';
		}
		
	?></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon" id="itpharma2_toggler"></span>
	</button>
	<div class="collapse navbar-collapse justify-content-end" id="navbarText">
		<ul class="navbar-nav">
			<?php
				$menu = wp_get_nav_menu_items(get_nav_menu_locations()['primary']);
				foreach( $menu as $page ){
					echo '<li class="nav-item';
					if((get_permalink() == ($page->url)) && ($page->title !== 'связаться с нами')){
						echo ' active';
					}
					echo '">';
					echo '<a class="nav-link" href="'.$page->url.'"><div class="itpharma2_nav_normal';
					if($page->title === 'связаться с нами'){
						echo ' itpharma2_nav_orange';
					}
					echo '"><div>' . esc_html($page->title) . '</div></div></a></li>';
				}
			?>
		</ul>
	</div>
</nav>