<!--
	Theme Name: ITPharma2
	Theme URI: https://github.com/siarheidudko/ITPharma2
	Author: Siarhei Dudko (admin@sergdudko.tk), Alena Moroz
	Author URI: https://sergdudko.tk
	Description: Тема для сайта itpharma.by
	Version: 1.0
	License: GNU General Public License v2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domain: itpharma2
	Tags: multicolor, custom-color, one-column, top-sidebar, flexible-width, custom-header, custom-menu, microformats, bootstrap
-->
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
 * @page главная страница (кроме 404)
 */
?>
<?php 
	get_header(); 
?>
<div class="cropbody">
	<div id="bodycontent" style="margin:0em;">
		<?php
			switch(get_post()->post_title){
				case 'главная':
					include '_page.general.php';
					include '_div.contacts.php';
					break;
				case 'база знаний':
					include '_page.wiki.php';
					break;
				case 'связаться с нами':
					include '_page.contacts.php';
					break;
				case 'новости':
					include '_page.news.php';
					include '_div.contacts.php';
					break;
				default:
					echo '<div style="display:block;float:left;">';	//защита от схлопывания
					if( have_posts() ){
						while( have_posts() ):
							the_post();
							the_content();
						endwhile;
					}
					echo '</div>';
					include '_div.contacts.php';
					break;
			}
		?>
	</div>
</div>

<?php 
	get_footer(); 
?>