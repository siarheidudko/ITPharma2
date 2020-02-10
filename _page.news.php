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
 * @page страница новостей
 */

	include_once '_div.name.php';	//функция вывода наименования блока
	nameDiv('Новости');				//наименование блока
	$col = 3;						//кол-во слолбцов для вывода
 ?>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="d-flex flex-row" style="border-top:1px solid #C4C4C4;box-sizing:border-box;height:2px;"></div>
</div>
<div class="d-flex flex-column itpharma2_raleway" style="display:flex;">
	<div style="margin:1.63em 2.22em 1.63em 2.22em;"><?php
		// Получим ID категории
		$category_id = get_cat_ID( 'Новости' );
		$posts = get_posts( array(
			'numberposts' => 50,
			'category'    => $category_id,
			'orderby'     => 'date',
			'order'       => 'DESC',
		) );
		$flg = 0;
		foreach( $posts as $post ){
			if(($flg % $col) === 0){
				echo '<div class="d-flex flex-row" style="align-items:center;justify-content:center;margin-top:1.63em;">';
			}
			echo '<a class="d-flex flex-column justify-content-center align-self-stretch" href="' . $post->guid . '" style="flex:1;max-width:380px;color:#0D3445;text-decoration:none;background:#FFFFFF;border:1px solid #C4C4C4;box-sizing:border-box;';
				if(($flg % $col) !== ($col - 1)){
					echo 'margin-right:2em;';
				}
				if(get_the_post_thumbnail_url( $post->ID ) !== false)
					$thisimg = get_the_post_thumbnail_url( $post->ID );
				else 
					$thisimg = get_stylesheet_directory_uri().'/_api.fakeimg.php?w=380&h=301';
				echo '">
					<div class="d-flex flex-row w-100" style="flex:1;align-items:flex-start;justify-content:center;">
						<img class="mw-100" src="' . $thisimg . '" alt="ITPharma News" />
					</div>
					<div class="d-flex flex-row w-100" style="flex:2;">
						<div class="d-flex flex-column w-100 h-100" style="padding:2.33em 1.34em 1.34em 1.34em;">
							<div class="d-flex flex-row w-100" style="flex:2;font-size:1.4em;line-height:1.5em;font-width:600;">' . mb_strimwidth($post->post_title, 0, 50) . '...</div>
							<div class="d-flex flex-row w-100" style="flex:5;font-size:1.1em;line-height:1.2em;margin-top:1.40em;">' . mb_strimwidth(wp_filter_nohtml_kses($post->post_content), 0, 100) . '...</div>
							<div class="d-flex flex-row w-100" style="flex:1;">
								<div class="d-flex flex-column"style="align-items:center;justify-content:center;font-size:1.3em;line-height:1.4em;color:#C4C4C4;">
									<svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5.61607 8.4375H4.09821C3.84777 8.4375 3.64286 8.2793 3.64286 8.08594V6.91406C3.64286 6.7207 3.84777 6.5625 4.09821 6.5625H5.61607C5.86652 6.5625 6.07143 6.7207 6.07143 6.91406V8.08594C6.07143 8.2793 5.86652 8.4375 5.61607 8.4375ZM9.71429 8.08594V6.91406C9.71429 6.7207 9.50938 6.5625 9.25893 6.5625H7.74107C7.49062 6.5625 7.28571 6.7207 7.28571 6.91406V8.08594C7.28571 8.2793 7.49062 8.4375 7.74107 8.4375H9.25893C9.50938 8.4375 9.71429 8.2793 9.71429 8.08594ZM13.3571 8.08594V6.91406C13.3571 6.7207 13.1522 6.5625 12.9018 6.5625H11.3839C11.1335 6.5625 10.9286 6.7207 10.9286 6.91406V8.08594C10.9286 8.2793 11.1335 8.4375 11.3839 8.4375H12.9018C13.1522 8.4375 13.3571 8.2793 13.3571 8.08594ZM9.71429 10.8984V9.72656C9.71429 9.5332 9.50938 9.375 9.25893 9.375H7.74107C7.49062 9.375 7.28571 9.5332 7.28571 9.72656V10.8984C7.28571 11.0918 7.49062 11.25 7.74107 11.25H9.25893C9.50938 11.25 9.71429 11.0918 9.71429 10.8984ZM6.07143 10.8984V9.72656C6.07143 9.5332 5.86652 9.375 5.61607 9.375H4.09821C3.84777 9.375 3.64286 9.5332 3.64286 9.72656V10.8984C3.64286 11.0918 3.84777 11.25 4.09821 11.25H5.61607C5.86652 11.25 6.07143 11.0918 6.07143 10.8984ZM13.3571 10.8984V9.72656C13.3571 9.5332 13.1522 9.375 12.9018 9.375H11.3839C11.1335 9.375 10.9286 9.5332 10.9286 9.72656V10.8984C10.9286 11.0918 11.1335 11.25 11.3839 11.25H12.9018C13.1522 11.25 13.3571 11.0918 13.3571 10.8984ZM17 3.28125V13.5938C17 14.3701 16.1842 15 15.1786 15H1.82143C0.815848 15 0 14.3701 0 13.5938V3.28125C0 2.50488 0.815848 1.875 1.82143 1.875H3.64286V0.351562C3.64286 0.158203 3.84777 0 4.09821 0H5.61607C5.86652 0 6.07143 0.158203 6.07143 0.351562V1.875H10.9286V0.351562C10.9286 0.158203 11.1335 0 11.3839 0H12.9018C13.1522 0 13.3571 0.158203 13.3571 0.351562V1.875H15.1786C16.1842 1.875 17 2.50488 17 3.28125ZM15.1786 13.418V4.6875H1.82143V13.418C1.82143 13.5146 1.92388 13.5938 2.04911 13.5938H14.9509C15.0761 13.5938 15.1786 13.5146 15.1786 13.418Z" fill="#C4C4C4"/>
									</svg>
								</div>
								<div class="d-flex flex-column" style="margin-left:0.5em;align-items:center;justify-content:center;font-size:1.3em;line-height:1.4em;color:#C4C4C4;">
									' . date_create_from_format("Y-m-d H:i:s", $post->post_date)->format("j.m.Y") . '
								</div>
							</div>
						</div>
					</div>
			</a>';
			if(($flg % $col) === ($col - 1)){
				echo '</div>';
			}
			++$flg;
		}
		while(($flg !== 0) && (($flg % $col) === ($col - 1))){
			echo '<div class="d-flex flex-column justify-content-center align-self-stretch" style="flex:1;max-width:380px;color:#0D3445;text-decoration:none;"></div>';
			if(($flg % $col) === ($col - 1)){
				echo '</div>';
				break;
			}
			++$flg;
		}
	?></div>
</div>
<!--div class="w-100" style="align-items:center;justify-content:center;height:1.5em;"></div-->
	
