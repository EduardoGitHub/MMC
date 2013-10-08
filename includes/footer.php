<?php
   require(DIR_WS_INCLUDES . 'counter.php');
   
   $shipping1 = strpos(MODULE_SHIPPING_INSTALLED, 'sedex');
   $shipping2 = strpos(MODULE_SHIPPING_INSTALLED, 'pac.php');
   $payment1 = strpos(MODULE_PAYMENT_INSTALLED, 'pagseguro.php');
   $payment2 = strpos(MODULE_PAYMENT_INSTALLED, 'boleto');
   $payment3 = strpos(MODULE_PAYMENT_INSTALLED, 'moneyorder.php');
   $payment4 = strpos(MODULE_PAYMENT_INSTALLED, 'transferencia');
   
   $array_pages = array('checkout_confirmation.php','checkout_payment.php','checkout_payment_address.php','checkout_process.php','checkout_shipping.php','checkout_shipping_address.php','checkout_success.php','login.php','logoff.php','shopping_cart.php','create_account.php');
   $pag_name = substr($PHP_SELF, strrpos($PHP_SELF,'/')+1);
   $desabledScri = 'false';
   foreach ($array_pages as $value) {
    if($value == $pag_name){
		$desabledScri = 'true';
		break;
	}
}
?>
<div class="basemudominhacasa">
<div style="position:absolute; margin-left:360px; margin-top:80px;"><img src="images/pagseguro.png" alt="Meios de Pgamento" /></div>
<div style="position:absolute; margin-left:560px; margin-top:80px;"><img src="images/toda-loja-6-juros.png" alt="Tudo em 6 vezes em juros" /></div>
</div>

<div class="bg-footer"> 
 
		<div style="float:left; height:715px; border-right:1px dotted #CCC; width:400px; padding:0 0 0 5px">
        	<div class="TitulosRodape"><img src="images/email.png" align="left" /><div class="txt">&nbsp;&nbsp;Contato Via e-mail</div></div>
        
         <?php echo tep_draw_form('contact_us', tep_href_link(FILENAME_CONTACT_US, 'action=send')); ?>
            <select name="tipo">
        <option value="DÚVIDAS">DÚVIDAS</option>
        <option value="ORÇAMENTOS">ORÇAMENTOS</option>
        <option value="REVENDA – PESSOA FÍSICA">REVENDA – PESSOA FÍSICA</option>
        <option value="REVENDA – LOJISTA">REVENDA – LOJISTA</option>
        <option value="SUGESTÃO">SUGESTÃO</option>
        <option value="RECLAMAÇÃO E ELOGIOS">RECLAMAÇÃO E ELOGIOS</option>
        </select>
            <br /><br />
            
            Nome Completo:<br />
            <?php echo tep_draw_input_field('name','','size="40"'); ?><br /><br />
            
            E-Mail:<br />
            <?php echo tep_draw_input_field('email','','size="40"'); ?><br /><br />
            
            Confirme seu E-Mail:<br />
			<?php echo tep_draw_input_field('email_confirmation','','size="40"'); ?><br /><br />
                    
            Telefone:<br />
            <?php echo tep_draw_input_field('telefone','','id="telefone"'); ?><br /><br />
            
            Cidade:<br />
			<?php echo tep_draw_input_field('cidade','','size="40"'); ?><br /><br />
            
            Estado:<br />
            <?php echo tep_draw_input_field('estado','','size="40"'); ?><br /><br />
            
            Mensagem:<br />
            <textarea name="enquiry" wrap="soft" cols="3" rows="5" style="width:350px;"></textarea>
            <?php //echo tep_draw_textarea_field('enquiry', 'soft', 2, 2); ?><br /><br />
            <?php echo tep_image_submit('button_enviar_form_rodape.jpg', IMAGE_BUTTON_CONTINUE); ?> 
          </form>
          
          <br /><br />
          <center>
            <span style="font-size:18px; font-family:Tahoma;">Caso necessite enviar algum arquivo <u>OU IMAGEM</u> envie um e-mail direto para: <br /><br /><a href="mailto:atendimento@mudominhacasa.com.br" style="font-size:18px; font-family:Tahoma;">atendimento@mudominhacasa.com.br</a></span></center>
        </div>
        <div style="float:left; height:506px; border-right:1px dotted #CCC; width:350px;">
        	<div class="TitulosRodape"><img src="images/duvidas-frequentes.png" align="left" /><div>&nbsp;&nbsp;<a href="<?=tep_href_link(FILENAME_INFORMATION,'cod=8')?>">Dúvidas Frequentes</a></div></div>
            <div class="TitulosRodape"><img src="images/chat.png" align="left" /><div>&nbsp;&nbsp;<a href="">Atendimento via Chat</a></div></div>
            <div class="TitulosRodape"><img src="images/atendimento-telefonico.png" align="left" /><div>&nbsp;&nbsp;<a href="">Atendimento via Telefone<br />Ligue: 31 3327.3267</a></div></div>
            
            <div style="background-color:#CCC; width:292px; height:75px; color:#FFF; font-size:20px; text-align:center; margin:5px auto; padding:10px 0 0 0;">Horário de Atendimento<br />Seg a Sex de 09:00 as 18:00</div>
            
            <div class="TitulosRodape"><img src="images/como-comprar.png" align="left" /><div>&nbsp;&nbsp;<a href="<?=tep_href_link(FILENAME_INFORMATION,'cod=1')?>">Como comprar</a></div></div>
            <div class="TitulosRodape"><img src="images/prazo-de-entrega.png" align="left" /><div>&nbsp;&nbsp;<a href="<?=tep_href_link(FILENAME_INFORMATION,'cod=6')?>">Prazos de Entrega</a></div></div>
            <div class="TitulosRodape"><img src="images/como-aplicar.png" align="left" /><div>&nbsp;&nbsp;<a href="<?=tep_href_link('como-aplicar.php')?>">Como Aplicar</a></div></div>
            
            
        </div>
        <div style="float:right; height:506px; border-right:1px dotted #CCC;  width:230px; text-align:center">
        	<div class="TitulosRodape"><div>Contato pelas Redes:</div></div>
            <div><a href="https://www.facebook.com/mudominhacasa?fref=ts" target="_blank"><img src="images/icon-facebook-rodape.jpg" /></a>&nbsp;&nbsp;<a href="https://twitter.com/mudominhacasa" target="_blank"><img src="images/icon-twitter-rodape.jpg" /></a>&nbsp;&nbsp;<a href="#" target="_blank"><img src="images/icon-pi-rodape.jpg" /></a></div>
            
            <div class="TitulosRodape"><div>Conheça nosso blog:</div></div>
            <div><a href="http://mudominhacasa.wordpress.com/" target="_blank"><img src="images/icon-blog-rodape.jpg" /></a></div>
            
            <br /><br />
            
            <img src="images/icon-compra-segura.jpg" />
            
            <br /><br /><br /><br />
            
            <div style="text-align:center"><a href="" style="font-size:20px;">Seja um <br />Revendedor!</a></div>
        </div>
        <div style="float:left; width:580px; border-top:1px dotted #CCC;">
        	
            <div style="float:left; padding-left:5px;">
            	<div class="TitulosRodape" style="width:240px"><div>Formas de pagamento aceitas na loja:</div></div>
                <img src="images/icon-pagseguro.jpg" />
            </div>
            <div style="float:right; width:160px;">
            	<div class="TitulosRodape"><div>Rastrear Produto</div></div>
                <form method="get" target="_blank" action="http://websro.correios.com.br/sro_bin/txect01$.QueryList?" name="rastreamento">
                <input type="hidden" name="P_TIPO" value="001" />
                <center><img src="images/icon-compra-rastrear-pedido.jpg"/><center><br />
                Número do Objeto:<br />
                <textarea name="P_COD_UNI" cols="30" rows="4" style="border:1px solid #CCC;" onClick="limpa_modelo();">Informe aqui o número do objeto fornecido pela loja, ex: SR398190350BR</textarea>
                <input type="hidden" name="P_LINGUA" value="001" checked="checked" />
                <input type="submit" value="Rastrear" />
                </form>
            </div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
</div> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e7c9a053b9bc07e"></script>
<script type="text/javascript" src="includes/librays/jquery.js" ></script>
<script type="text/javascript" src="includes/librays/jquery.corner.js" ></script>
<script type="text/javascript" src="includes/librays/slider/jquery.moodular.js?v3.1"></script>
<script type="text/javascript" src="includes/librays/slider/jquery.moodular.controls.js?v3.1"></script>
<script type="text/javascript" src="includes/librays/slider/jquery.moodular.effects.js?v3.1"></script>
<script src="includes/librays/elastislide/modernizr.custom.17475.js"></script>
<script type="text/javascript" src="includes/librays/elastislide/jquerypp.custom.js"></script>
<script type="text/javascript" src="includes/librays/elastislide/jquery.elastislide.js"></script>
<? if(ENTRY_LINK_TWITTER != ''){?>
<!--<script type="text/javascript" src="includes/librays/twitter/jquery.mousewheel.js"></script>
<script type="text/javascript" src="includes/librays/twitter/jScrollPane-1.2.3.min.js"></script>
<script type="text/javascript">var tweetUsers = ['<?=ENTRY_LINK_TWITTER?>'];</script>
<script type="text/javascript" src="includes/librays/twitter/script.js"></script>-->
<? } ?>
<script language="javascript" type="text/javascript">
jQuery(document).ready(function () {
	jQuery('#demo').moodular({
		effects: 'left ',
		controls: 'buttons',
		legendContainer : jQuery('#legend'),
		legendSpeed: 200,
		indexElement : jQuery('#index'),
		bt_prev : jQuery('#prev'),
		bt_next : jQuery('#next'),
		thumbsContainer : jQuery('#demo_thumbs'),
		thumbsItem : 'li',
		auto: true,
		easing: '',
		speed: 1000,
		dispTimeout: 3000					});
	
	$( '#carousel' ).elastislide();
	$( '#carousel2' ).elastislide( {
				height : '300px'
			} );
	
});	
<? if ($banner = tep_banner_exists('dynamic', 'banner_flutuante')){?>
function controlaCamada(nomeDiv) 
{ 
    if( document.getElementById(nomeDiv).style.visibility == "hidden" ) 
    { 
        document.getElementById(nomeDiv).style.visibility = "visible"; 
    } else 
    { 
        document.getElementById(nomeDiv).style.visibility = "hidden"; 
    } 
}
<?php } ?>
<!--
//:: SUGESTÃO DE BUSCA
function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else if(window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		alert("Atualize seu browser!");
	}
}
var searchReq = getXmlHttpRequestObject();
function searchSuggest() {
	if (searchReq.readyState == 4 || searchReq.readyState == 0) {
		var str = escape(document.getElementById('txtSearch').value);
		searchReq.open("GET", 'searchSuggest.php?search=' + str, true);
		searchReq.onreadystatechange = handleSearchSuggest; 
		searchReq.send(null);
	}		
}
function handleSearchSuggest() {
	if (searchReq.readyState == 4) {
		var ss = document.getElementById('search_suggest')
		ss.innerHTML = '';
		var str = searchReq.responseText.split("\n");
		for(i=0; i < str.length - 1; i++) {
			//Build our element string.  This is cleaner using the DOM, but
			//IE doesn't support dynamically added attributes.
			var suggest = '<div onmouseover="javascript:suggestOver(this);" ';
			suggest += 'onmouseout="javascript:suggestOut(this);" ';
			suggest += 'onclick="javascript:setSearch(this.innerHTML);" ';
			suggest += 'class="suggest_link">' + str[i] + '</div>';
			ss.innerHTML += suggest;
		}
	}
}

function suggestOver(div_value) {
	div_value.className = 'suggest_link_over';
}
function suggestOut(div_value) {
	div_value.className = 'suggest_link';
}

function replaceAll2(string, token, newtoken) {  
	var num = token.length;
	for(var cont =0; cont < num; cont++){
		while (string.indexOf(token[cont]) != -1) {  
			string = string.replace(token[cont], newtoken);  
		 }  
		// alert(token[cont]);
	}
    return string;  
}

//window.alert(replaceAll(str, "<b>", "[A]"));  
function setSearch(value) {
	var words = new Array("<B>","</B>","<b>","</b>");
	document.getElementById('txtSearch').value = replaceAll2(value,words,"");
	document.getElementById('search_suggest').innerHTML = '';
}
//==================================================


//:: NEWSLETTER
function excuteAct (act){
var head = document.getElementsByTagName('head').item(0);
var eScript = document.createElement("script");
reg1 = document.getElementById('email').value;
//reg2 = document.getElementById('nomenewsletter').value;
eScript.setAttribute('src','putmailnewsletter.php?action='+act+'&nome=&email='+reg1);
head.appendChild(eScript);
}
//=============================

function limpa_modelo(){ document.rastreamento.P_COD_UNI.value = ""; }
$(function() {
		$('div.box').corner("rounded 10px");
		$('div.boxconteudo').corner("rounded 5px");
		//$('div.pagestitulo').corner("rounded 5px");
		$('div.pagestitulo').corner("top");
		//$("#bannerPrincipal").moodular();
		jQuery('#bannerPrincipal').moodular({
			effects: 'left',
			controls: '',
			auto: true,
			easing: '',
			speed: 1000,
			dispTimeout: 3000       
		});

		
		
});


$(document).ready(function(){
  $("#navmenu-h li,#navmenu-v li").hover(
    function() { $(this).addClass("iehover"); },
    function() { $(this).removeClass("iehover"); }
  );
});


function popup(URL){ 
   window.open(URL,"janela1","width=640,height=700,scrollbars=YES") 
}
function compartilhe(URL){ 
   window.open(URL,"janela1","width=640,height=300,scrollbars=YES") 
}
/*menu*/
//Nested Side Bar Menu (Mar 20th, 09)
//By Dynamic Drive: http://www.dynamicdrive.com/style/



-->

</script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang: 'pt-BR'}</script>
<? if(ENTRY_GOOGLE_KEY_ANALYTICS != ''){ ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?=ENTRY_GOOGLE_KEY_ANALYTICS ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php }?>
