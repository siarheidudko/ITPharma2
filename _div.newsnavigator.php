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
 * @page блок навигации по новостям
 */

	$category = 'Новости';							// Категория поста
	$category_id = get_cat_ID( $category );			// Получим ID категории
	$post = get_post();								// Получим объект поста
 ?>

<div class="d-flex flex-column itpharma2_raleway" style="display:flex;">
	<div class="d-flex flex-row">
		<div class="d-flex flex-column justify-content-center align-self-stretch" style="flex:1;">
			<?php
				$prewposts = get_posts( array(
					'numberposts'	=> 1,
					'category'		=> $category_id,
					'orderby'		=> 'date',
					'order'			=> 'DESC',
					'date_query' => array(
						'before'		=> $post->post_date,
						'inclusive'		=> true,
					),
					'exclude'		=> $post->ID,
				));
				if(count($prewposts)===1){
					foreach( $prewposts as $prewpost ){
						echo '<a href="' . $prewpost->guid . '" class="d-flex flex-row" style="color:#74C1D3;text-decoration:none;align-items:center;justify-content:center;">
							<div class="d-flex flex-column">
								<svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15.8335 20L15.8335 0L0.000163078 10L15.8335 20Z" fill="#74C1D3"/>
								</svg>
							</div>
							<div class="d-flex flex-column" style="font-size:1.4em;line-height:1.5em;margin-left:0.5em;">
								Предыдущая
							</div>
						</a>';
					}
				}
			?>
		</div>
		<div class="d-flex flex-column justify-content-center align-self-stretch" style="flex:3;"></div>
		<div class="d-flex flex-column justify-content-center align-self-stretch" style="flex:1;">
			<?php
				$nextposts = get_posts( array(
					'numberposts'	=> 1,
					'category'		=> $category_id,
					'orderby'		=> 'date',
					'order'			=> 'ASC',
					'date_query' => array(
						'after'			=> $post->post_date,
						'inclusive'		=> true,
					),
					'exclude'		=> $post->ID,
				));
				if(count($nextposts)===1){
					foreach( $nextposts as $nextpost ){
						echo '<a href="' . $nextpost->guid . '" class="d-flex flex-row" style="color:#74C1D3;text-decoration:none;align-items:center;justify-content:center;">
							<div class="d-flex flex-column" style="font-size:1.4em;line-height:1.5em;margin-right:0.5em;">
								Следующая
							</div>
							<div class="d-flex flex-column">
								<svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0 0L0 24L19 12L0 0Z" fill="#74C1D3"/>
								</svg>
							</div>
						</a>';
					}
				}
			?>
		</div>
	</div>
</div>
<div class="w-100" style="align-items:center;justify-content:center;height:1.5em;"></div>