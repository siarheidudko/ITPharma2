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
 * @page страница связаться с нами
 */

	include_once '_div.name.php';	//функция вывода наименования блока
	nameDiv('Связаться с нами'); 	//наименование блока
?>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="d-flex flex-row" style="border-top:1px solid #C4C4C4;box-sizing:border-box;height:2px;"></div>
</div>
<div class="d-flex flex-column itpharma2_raleway">
	<div class="d-flex flex-row" style="margin:2.7em 2.329em 0em 2.329em;">
		<div class="d-flex flex-column">
			<div class="d-flex flex-row" style="width:44.14em;max-width:815px;">
				<div class="d-flex flex-column" style="flex:1;font-size:1.4em;line-height:1.5em;">По телефону:</div>
				<div class="d-flex flex-column" style="flex:3;">
					<?php
						$contactstel = get_theme_mod('itpharma2_footer_tel');
						if($contactstel){ 
							echo '<div class="d-flex flex-row itpharma2-overflow-dotted">
								<a href="tel:'.$contactstel.'" style="text-decoration:none;color:#0D3445;font-size:1.4em;line-height:1.5em;">'.$contactstel.'</a>
							</div>'; 
						}

						$contactsfax = get_theme_mod('itpharma2_contacts_tel');
						if($contactsfax){ 
							echo '<div class="d-flex flex-row itpharma2-overflow-dotted">
								<a href="tel:'.$contactsfax.'" style="text-decoration:none;color:#0D3445;font-size:1.4em;line-height:1.5em;">'.$contactsfax.' (FAX)</a>
							</div>'; 
						}
					?>
				</div>
			</div>
			<div class="d-flex flex-row" style="margin-top:2.7em;width:44.14em;max-width:815px;">
				<div class="d-flex flex-column" style="flex:1;font-size:1.4em;line-height:1.5em;">E-mail:</div>
				<div class="d-flex flex-column itpharma2-overflow-dotted" style="flex:3;">
					<?php
						$contactsemail= get_theme_mod('itpharma2_footer_email');
						if($contactsemail){ 
							echo '<a href="mailto:'.$contactsemail.'" style="text-decoration:none;color:#0D3445;font-size:1.4em;line-height:1.5em;">'.$contactsemail.'</a>'; 
						}
					?>
				</div>
			</div>
			<div class="d-flex flex-row" style="margin-top:2.7em;width:44.14em;max-width:815px;">
				<div class="d-flex flex-column" style="flex:1;font-size:1.4em;line-height:1.5em;">Адрес:</div>
				<div class="d-flex flex-column itpharma2-overflow-dotted" style="flex:3;">
					<?php
						$contactsaddress= get_theme_mod('itpharma2_contacts_address');
						if($contactsaddress){ 
							echo '<div style="font-size:1.4em;line-height:1.5em;">' . $contactsaddress . '</div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="d-flex flex-row" style="margin:2.7em 2.329em 0em 2.329em;">
		<div class="d-flex flex-column">
			<form>
				<div class="d-flex flex-row form-group" style="font-size:1.4em;line-height:1.5em;">
					Или воспользуйтесь формой ниже:
				</div>
				<div class="d-flex flex-row form-group">
					<input type="text" class="form-control" id="formControlName" placeholder="Имя" style="border:3px solid #74C1D3;box-sizing:border-box;border-radius:3px;width:44.14em;max-width:815px;font-size:1.1em;line-height:1.2em;" />
				</div>
				<div class="d-flex flex-row form-group">
					<input type="email" class="form-control" id="formControlEmail" placeholder="E-mail" style="border:3px solid #74C1D3;box-sizing:border-box;border-radius:3px;width:44.14em;max-width:815px;font-size:1.1em;line-height:1.2em;" />
				</div>
				<div class="d-flex flex-row form-group">
					<textarea class="form-control" id="formControlMessage" rows="7" placeholder="Сообщение" style="border:3px solid #74C1D3;box-sizing:border-box;border-radius:3px;width:44.14em;max-width:815px;font-size:1.1em;line-height:1.2em;"></textarea>
				</div>
				<div class="d-flex flex-row form-group" style="justify-content:flex-end;">
					<div class="d-flex flex-column" id="statusMessage" style="align-items:center;justify-content:center;margin-right:3em;font-size:1.1em;line-height:1.2em;color:#74c1d3;"></div>
					<div class="d-flex flex-column">
						<button type="submit" class="btn btn-primary" id="sendMessage" style="background:#74C1D3;border-color:#74C1D3;border-radius:3px;width:11em;height:2.11em;font-size:1.1em;line-height:1.2em;">Отправить</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="d-flex flex-row" style="align-items:center;justify-content:center;min-height:4em;font-size:1.4em;line-height:1.8em;">
		<div>Спасибо, что обратились в нашу компанию!</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
<script>
	'use strict'
	document.addEventListener('DOMContentLoaded', function(event) {
		jQuery(document).ready(function($) {
			function sendMail(){
				let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				let st = $('#statusMessage');
				let cName = $('#formControlName'),
					cEmail = $('#formControlEmail'),
					cMsg = $('#formControlMessage');
				
				if(!(cMsg && cMsg.val())){
					cMsg.css("border", "3px solid #d3747b");
					cName.css("border", "3px solid #74C1D3");
					cEmail.css("border", "3px solid #74C1D3");
					st.css("color", "#d3747b");
					st.text('Сообщение пустое.');
				} else if(!(cName && cName.val())){
					cMsg.css("border", "3px solid #74C1D3");
					cName.css("border", "3px solid #d3747b");
					cEmail.css("border", "3px solid #74C1D3");
					st.css("color", "#d3747b");
					st.text('Заполните имя.');
				} else if(!(cEmail && cEmail.val() && re.test(cEmail.val()))){
					cMsg.css("border", "3px solid #74C1D3");
					cName.css("border", "3px solid #74C1D3");
					cEmail.css("border", "3px solid #d3747b");
					st.css("color", "#d3747b");
					st.text('Некорректный email.');
				} else {
					cMsg.css("border", "3px solid #74C1D3");
					cName.css("border", "3px solid #74C1D3");
					cEmail.css("border", "3px solid #74C1D3");
					let link = <?php echo '"'.get_stylesheet_directory_uri().'/"';?>+"_api.sendmail.php";
					let key = CryptoJS.MD5(cEmail.val()+CryptoJS.MD5(cName.val()).toString()+'itpharma').toString();
					st.css("color", "#74c1d3");
					st.text('Отправляется...');
					fetch(link, {
						method: 'POST',
						mode: 'cors',
						cache: 'no-cache',
						credentials: 'same-origin',
						headers: {
							'Content-Type': 'application/json; charset=UTF-8',
						},
						redirect: 'follow',
						referrer: 'no-referrer',
						body: JSON.stringify({message: cMsg.val(), name: cName.val(), email:cEmail.val(), key:key})
					}).then(function(response){
						return response.json();
					}).then(function(answer){
						if(answer.status === 'Сообщение отправлено.'){
							st.css("color", "#74c1d3");
						} else {
							st.css("color", "#d3747b");
						}
						st.text(answer.status);
					}).catch(function(error){
						st.css("color", "#d3747b");
						st.text(error.message);
					});
				}
			}
			$("#sendMessage").click(function(event){
				event.preventDefault();
				sendMail();
			});
		});
	});
</script>