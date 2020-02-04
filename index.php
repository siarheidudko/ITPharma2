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
 */
?>
<?php 
	get_header(); 
?>

<div id="bodycontent">
	<?php
		if(get_post()->post_title === 'главная'){
			include '_general.php';
		} else {
			if( have_posts() ){
				while( have_posts() ):
					the_post();
					the_content();
				endwhile;
			}
		}
	?>
</div>

<?php 
	get_footer(); 
?>