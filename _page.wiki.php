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
 * @page страница база знаний
 */
	include_once '_div.name.php';	//функция вывода наименования блока
	nameDiv('База знаний');			//наименование блока
	$category = 'База знаний';		//категория
 ?>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="d-flex flex-row" style="border-top:1px solid #C4C4C4;box-sizing:border-box;height:2px;"></div>
</div>
<div class="d-flex flex-column itpharma2_raleway" style="display:flex;">
	<div style="margin:1.63em 2.22em 1.63em 2.22em;"><?php		
		$category_id = get_cat_ID( $category );				// Получим ID категории
		$categories = get_categories(array(
			'taxonomy' => 'category', 
			'parent' => $category_id,
			'orderby' => 'name',
			'order' => 'ASC'
		));
		foreach( $categories as $cat ){
			echo '<div class="d-flex flex-row w-100">
				<div class="d-flex flex-column w-100">';
					$category_id = $cat->cat_ID;
					echo '<div class="d-flex flex-row w-100" style="align-items:center;justify-content:flex-start;min-height:2em;font-size:1.5em;line-height:1.7em;">' . mb_strimwidth($cat->cat_name, 0, 50) . '</div>';
						$posts = get_posts(array(
							'category'    => $category_id,
							'orderby'     => 'name',
							'order'       => 'ASC',
						));
						foreach( $posts as $post ){
							echo '<a class="d-flex flex-row" href="' . $post->guid . '" style="color:#74C1D3;text-decoration:none;">
								<div class="d-flex flex-column" style="align-items:center;justify-content:center;">
									<svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M0 0L0 24L19 12L0 0Z" fill="#74C1D3"/>
									</svg>
								</div>
								<div class="d-flex flex-column" style="font-size:1.4em;line-height:1.5em;margin-left:0.5em;">
									' . mb_strimwidth($post->post_title, 0, 50) . '
								</div>
							</a>';
						}
			echo '</div>
			</div>';
		}
	?></div>
</div>
<div class="w-100" style="align-items:center;justify-content:center;height:1.5em;"></div>