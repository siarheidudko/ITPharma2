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
 * @page подвал сайта
 */
?>
<div class="cropbody">
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
					echo '<a  href="/"><img id="itpharma2_footerlogo" src="'.$imglink[0].'" alt="ITPHARMA" /></a>';
				?>
			</div>
			<div id="footer_copyright">
				<div style="font-family: RalewayRegular;font-style: normal;font-variant: normal;font-weight: 400;font-size: 1.17em;line-height: 1.365em;">© 2019 ITPHARMA All Rights Reserved.</div>
			</div>
		</div>
		<div class="d-flex flex-column justify-content-start align-self-stretch" id="itpharma2_footer_2">
		<?php
			$menu = wp_get_nav_menu_items(get_nav_menu_locations()['secondary']);
			foreach( $menu as $page ){
				echo '<div class="itpharma2_fakelink itpharma2-overflow-dotted" style="max-width:6em;">
					<a href="'.$page->url.'">' . esc_html($page->title) . '</a>
				</div>';
			}
		?>
		</div>
		<div class="d-flex flex-column justify-content-start align-self-stretch" id="itpharma2_footer_3">
			<div class="d-flex flex-row">
				<div  style="font-family: RalewayRegular;font-style: normal;font-variant: normal;font-weight: 400;font-size: 1.17em;line-height: 1.365em;">связаться с нами:</div>
			</div>
			<div class="d-flex flex-row" style="height:100%;">
				<div style="margin: auto 0;">
					<div class="d-flex flex-row itpharma2_fakelink itpharma2-overflow-dotted" style="max-width:10em;">
						<?php
							$footeremail = get_theme_mod('itpharma2_footer_email');
							if($footeremail){ 
								echo '<a href="mailto:'.$footeremail.'">'.$footeremail.'</a>'; 
							}
						?>
					</div>
					<div class="d-flex flex-row itpharma2_fakelink itpharma2-overflow-dotted" style="max-width:10em;">
						<?php
							$footertel = get_theme_mod('itpharma2_footer_tel');
							if($footertel){ 
								echo '<a href="tel:'.str_replace(array(' ', '(', ')', '-'), '', $footertel).'">'.$footertel.'</a>'; 
							} 
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column justify-content-start align-self-stretch" id="itpharma2_footer_4">
			<div class="d-flex flex-row">
				<div  style="font-family: RalewayRegular;font-style: normal;font-variant: normal;font-weight: 400;font-size: 1.17em;line-height: 1.365em;text-align: center;">мы в социальных сетях:</div>
			</div>
			<div class="d-flex flex-row" id="itpharma2_sociallink" style="margin:auto;padding-top:0.5em;height:100%;">
				<div class="d-flex flex-column">
					<div class="d-flex flex-row" style="margin: auto 0;">
						<div class="d-flex flex-column justify-content-center align-self-stretch itpharma2_social">
							<?php
								$footerfacebook = get_theme_mod('itpharma2_footer_facebook');
								if($footerfacebook){ 
									echo '<a href="'.$footerfacebook.'"><img src="'.get_stylesheet_directory_uri().'/img/footer-fb.png" alt="FACEBOOK" /></a>'; 
								}
							?>
						</div>
						<div class="d-flex flex-column justify-content-center align-self-stretch itpharma2_social">
							<?php
								$footerlinkedin = get_theme_mod('itpharma2_footer_linkedin');
								if($footerlinkedin){ 
									echo '<a href="'.$footerlinkedin.'"><img src="'.get_stylesheet_directory_uri().'/img/footer-linkedin.png" alt="LINKEDIN" /></a>'; 
								}
							?>
						</div>
						<div class="d-flex flex-column justify-content-center align-self-stretch">
							<?php
								$footerskype = get_theme_mod('itpharma2_footer_skype');
								if($footerskype){ 
									echo '<a href="skype:'.$footerskype.'?call"><img src="'.get_stylesheet_directory_uri().'/img/footer-skype.png" alt="SKYPE" /></a>'; 
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html> 