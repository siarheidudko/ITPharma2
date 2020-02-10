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
 * @page блок новостей (на главной странице)
 */

	include_once '_div.name.php';		//функция вывода наименования блока
	nameDiv('Новости'); 				//наименование блока
?>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="w-100" style="display:flex;align-items:center;justify-content:center;min-height:4em;font-size:1.625em;line-height:1.885em;">
		<div class="d-flex flex-row" style="margin: 0em 2em 0em 2em;"><?php
			// Получим ID категории
			$category_id = get_cat_ID( 'Новости' );
			$posts = get_posts( array(
				'numberposts' => 2,
				'category'    => $category_id,
				'orderby'     => 'date',
				'order'       => 'DESC',
			) );
			$flg = true;
			foreach( $posts as $post ){
				echo '<div class="d-flex flex-column justify-content-center align-self-stretch w-50" style="text-align:center;';
				if($flg === true){
					echo 'margin-right:1em;';
					$flg = false;
				}
				if(get_the_post_thumbnail_url( $post->ID ) !== false)
					$thisimg = get_the_post_thumbnail_url( $post->ID );
				else 
					$thisimg = get_stylesheet_directory_uri().'/_api.fakeimg.php?w=380&h=301';
				echo '">
					<a class="d-flex flex-row" style="color:#0D3445;;text-decoration:none;background:#FFFFFF;border:1px solid #C4C4C4;box-sizing:border-box;border-radius:3px;" href="' . $post->guid . '">
						<div class="d-flex flex-column justify-content-center align-self-stretch" style="flex:2;overflow:hidden;">
							<img class="mw-100" src="' . $thisimg . '" alt="ITPharma News" /> 
						</div>
						<div class="d-flex flex-column justify-content-center align-self-stretch" style="flex:1;margin:0.2em;max-height:301px;">
							<div class="d-flex flex-row" style="margin:auto;font-size:0.75em;line-height:1.1em;overflow:hidden;">
								' . mb_strimwidth($post->post_title, 0, 30) . '...
							</div>
							<div class="d-flex flex-row justify-content-end">
								<svg width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="justify-content:flex-end;margin:0.5em;">
									<path d="M0.714495 17.1429L7.85735 10L0.714495 2.85714L2.14307 0L12.1431 10L2.14307 20L0.714495 17.1429Z" fill="#0D3445" fill-opacity="0.3"/>
								</svg>
							</div>
						</div>
					</a>
				</div>';
			}
		?></div>
	</div>
	<div style="display:flex;align-items:center;justify-content:flex-end;min-height:4em;font-size:1.17em;line-height:1.365em;">
		<div style="margin-right:2em;"><a style="color:#0D3445;;" href="/news/">Все новости</a></div>
	</div>
</div>