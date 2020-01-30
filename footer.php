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
<?php wp_footer() ?>
<?php 
	$footercode = get_theme_mod('itpharma2_footer_code');
	if($footercode)
		echo $footercode;
?>
<div class="w-100 d-flex flex-row justify-content-between <?php 
	$footerstyle = get_theme_mod('itpharma2_header_footer_textstyle');
	switch($footerstyle){
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
?>" id="itpharma2_footer" style="color:#ffffff;<?php 
	$footercolor = get_theme_mod('itpharma2_header_footer_background');
	if($footercolor){ echo 'background-color: '.$footercolor.';'; } 
?>">
	<div class="d-flex flex-column justify-content-start align-self-stretch" id="itpharma2_footer_1">
		<div>
			<?php
				$imglink = wp_get_attachment_image_src( get_theme_mod( 'itpharma2_footer_logo' ), 'full' );
				echo '<img id="itpharma2_footerlogo" src="'.$imglink[0].'" alt="ITPHARMA" />';
			?>
		</div>
		<div id="footer_copyright">
			<div>© 2019 ITPHARMA</div>
			<div>All Rights Reserved.</div>
		</div>
	</div>
	<div class="d-flex flex-column justify-content-start align-self-stretch" id="itpharma2_footer_2">
	<?php
		$menu = wp_get_nav_menu_items(get_nav_menu_locations()['primary']);
		foreach( $menu as $page ){
			echo '<div class="itpharma2_fakelink">
				<a href="'.$page->url.'">' . esc_html($page->title) . '</a>
			</div>';
		}
	?>
	</div>
	<div class="d-flex flex-column justify-content-start align-self-stretch" id="itpharma2_footer_3">
		<div class="d-flex flex-row">
			<div style="font-family: RalewayBold;font-style: normal;font-variant: normal;font-weight: 400;font-size: 30px;line-height: 35px;">контакты</div>
		</div>
		<div class="d-flex flex-row itpharma2_fakelink">
			<?php
				$footeremail = get_theme_mod('itpharma2_footer_email');
				if($footeremail){ 
					echo '<a href="mailto:'.$footeremail.'">'.$footeremail.'</a>'; 
				}
			?>
		</div>
		<div class="d-flex flex-row itpharma2_fakelink">
			<?php
				$footertel = get_theme_mod('itpharma2_footer_tel');
				if($footertel){ 
					echo '<a href="tel:'.str_replace(array(' ', '(', ')', '-'), '', $footertel).'">'.$footertel.'</a>'; 
				} 
			?>
		</div>
		<div class="d-flex flex-row" id="itpharma2_sociallink">
			<div class="d-flex flex-column justify-content-center align-self-stretch itpharma2_social">
				<?php
					$footerfacebook = get_theme_mod('itpharma2_footer_facebook');
					if($footerfacebook){ 
						echo '<a href="'.$footerfacebook.'"><img src="'.get_stylesheet_directory_uri().'/img/facebook.png" alt="FACEBOOK" /></a>'; 
					}
				?>
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch itpharma2_social">
				<?php
					$footerlinkedin = get_theme_mod('itpharma2_footer_linkedin');
					if($footerlinkedin){ 
						echo '<a href="'.$footerlinkedin.'"><img src="'.get_stylesheet_directory_uri().'/img/linkedin.png" alt="LINKEDIN" /></a>'; 
					}
				?>
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch itpharma2_social">
				<?php
					$footerskype = get_theme_mod('itpharma2_footer_skype');
					if($footerskype){ 
						echo '<a href="skype:'.$footerskype.'?call"><img src="'.get_stylesheet_directory_uri().'/img/skype.png" alt="SKYPE" /></a>'; 
					}
				?>
			</div>
		</div>
	</div>
</div>
</body>
</html> 