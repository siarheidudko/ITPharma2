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
 * @page блок технологий
 */

	include_once '_div.name.php';	//функция вывода наименования блока
	nameDiv('Технологии'); 			//наименование блока
?>
<div class="d-flex flex-column itpharma2_raleway">	
	<div style="display:flex;align-items:center;justify-content:center;min-height:4em;margin-right:2em;margin-left:2em;">
		<div class="d-flex flex-row" id="galleryTehnology" style="overflow-x:hidden;">
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology1" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-ws.png'; ?>" alt="websocket" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology2" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-dotnet.png'; ?>" alt="dotnet" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology3" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-devexpress.png'; ?>" alt="devexpress" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology4" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-react.png'; ?>" alt="react" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology5" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-node.png'; ?>" alt="node" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology6" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-fr.png'; ?>" alt="fastreport" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology7" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-delphi.png'; ?>" alt="delphi" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology8" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-js.png'; ?>" alt="js" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology9" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-csharp.png'; ?>" alt="csharp" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology10" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-1c.png'; ?>" alt="1c" />
			</div>
			<div class="d-flex flex-column justify-content-center align-self-stretch" id="nextTehnology11" style="margin-left:2em;">
				<img style="max-height:6em" src="<?php echo get_stylesheet_directory_uri().'/img/home-lent-php.png'; ?>" alt="php" />
			</div>
		</div>
	</div>
</div>
<script>
	'use strict'
	document.addEventListener('DOMContentLoaded', function(event) {
		jQuery(document).ready(function($) { 
			let arr = [															//массив идентификаторов элементов и их позиций
				'nextTehnology1', 
				'nextTehnology2',
				'nextTehnology3',
				'nextTehnology4',
				'nextTehnology5',
				'nextTehnology6',
				'nextTehnology7',
				'nextTehnology8',
				'nextTehnology9',
				'nextTehnology10',
				'nextTehnology11'
			],
				obj = {},														//объект идентификаторов элементов и их позиций
				obj2 = {},														//объект идентификаторов элементов и их сдвига относительно зоны видимости
				marginLeft = parseInt(parseFloat(getComputedStyle(document.getElementById('galleryTehnology')).fontSize)*2),	//margin-left:2em;
				w2 = 0,															//ширина полосы, за пределами зоны видимости
				w1 = $('#galleryTehnology').innerWidth(),						//ширина полосы, в зоне видимости
				arr2 = [],														//элементы за пределами зоны видимости (полностью или частично)
				j = 1,															//направление перемотки
				freq = 3000,													//частота анимации
				speed = 1000;													//скорость анимации
			for(let k = 0; k < arr.length; k++){
				let wt = w2+$('#'+arr[k]).outerWidth()+marginLeft;
				obj[arr[k]] = [w2, wt];
				w2 = wt;
			}
			//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!отладить координаты
			if(w1 < w2){
				for(let k = 0; k < arr.length; k++){
					if(obj[arr[k]][1] > w1){
						arr2.push(arr[k]);
						obj2[arr[k]] = obj[arr[k]][1] - w1;
					}
				}
				let k = -1;
				setInterval(function(){
					if(k === (arr2.length-1)){
						j = -1;
					} else if(k === 0){
						j = 1;
					}
					k += j;
					$('#galleryTehnology').animate({
						scrollLeft:obj2[arr2[k]]
					}, speed);
				}, freq);
			}
		});
	});
</script>