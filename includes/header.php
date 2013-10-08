<?
$chat_q = tep_db_query("SELECT status_boxes FROM boxes WHERE file_boxes = 'chat.php'");
$chat_r = tep_db_fetch_array($chat_q);
?>

<?php
//Verifica se o usuário esta logado ou não e exibi a mensagem que melhor adque!1
if (tep_session_is_registered('customer_id')) {
	$customers_query = tep_db_query("select customers_firstname from " . TABLE_CUSTOMERS. " where customers_id =".$customer_id);
	$customers = tep_db_fetch_array($customers_query);
	$stringShow = 'Seja bem  vindo, <b>'.$customers['customers_firstname'].'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.tep_href_link(FILENAME_ACCOUNT).'" style="color:#FFF">Minha Conta</a> | <a href="'.tep_href_link('logoff.php').'" style="color:#FFF"> Sair</a>';
	
}else $stringShow = 'Olá visitante! Faça seu <a href="'.tep_href_link(FILENAME_LOGIN).'" style="font-family:Tahoma; font-size:15px; color:#FFF; text-decoration:underline">login</a> ou <a href="'.tep_href_link(FILENAME_LOGIN).'" style="font-family:Tahoma; font-size:15px; color:#FFF; text-decoration:underline">cadastre-se</a> | <a href="'.tep_href_link('account.php').'" style="color:#FFF">Veja seu cadastro</a> | <a href="'.tep_href_link('account_history.php').'" style="color:#FFF">Veja seus pedidos</a>';
?>


<div class="HeaderTop">
	<div class="HeaderTop_txt">
    	<div style="float:left; width:440px;"><?=$stringShow?></div>
        <div style="float:right; width:510px; font-size:13px;">
       		<div style="width:200px; float:left"><img src="images/icon_atendimento.png" align="left" />&nbsp;&nbsp;<a href='<?=tep_href_link('fale-conosco.html')?>' style="color:#FFF">Central de Atendimento</a></div>
        	<div style="width:280px; float:left; padding-left:10px;"><img src="images/icon_telefone.png" align="left"/>&nbsp;&nbsp;Compre pelo telefone: <b>0800 032 1777</b></div>
        	<div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>
    
    
    
<div class="header_default">
	<div class="header_infor">
      <div style="position:absolute; top:40px;"><img src="images/Porta.png" /></div>
      <div style="margin:15px 0 0 85px; float:left; width:307px;"><?php echo '<a href="' . tep_href_link('adesivos-de-parede.html') . '">' . tep_image(DIR_WS_IMAGES . 'logo.png', (tep_not_null($header_tags_array['logo_text']) ? $header_tags_array['logo_text'] : STORE_NAME)) . '</a>'; ?></div>
      <div  style="float:left; width:400px; margin:32px 0 0 35px;">
      		<div style="position:relative;">
            <!-- PROCURAR -->
            <?=tep_draw_form('quick_find', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get')?>
            <?=tep_draw_input_field('keywords', '', 'id="txtSearch" onkeyup="searchSuggest();" size="200" maxlength="50" onclick="this.value=\'\'" value="Informe uma palavra chave para busca"   class="se" style="width:350px;"') . ' ' . tep_hide_session_id()?><div id="search_suggest"></div>
            <div style="position:absolute; top:0px; left:322px"><?php echo tep_image_submit('button_quick_find.gif','Buscar','style="background:none;"')?></div><br />
            <div style="position:absolute; top:35px; left:0px;"><a href="<?=tep_href_link('busca-avancada.html')?>" style="font-family:Tahoma; font-size:11px; color:#FFF; text-transform:none">Busca avançada</a></div>
            </form>
            </div>
            <!-- FIM PROCURAR -->
      </div>
      <div  style="float:left; width:120px; margin:27px 0 0 0">
      <a href="<?=tep_href_link('meu-carrinho-de-compras.html')?>" style="font-weight:bold; color:#FFF; text-transform:lowercase; font-size:11px;"><img src="images/icon-cesta.png" align="left" border="0" /><div style="text-align:center; padding-left:5px; padding-top:5px"> minha cesta<br /><? if($cart->count_contents() <=1) echo $cart->count_contents().' item'; elseif($cart->count_contents() >1) echo $cart->count_contents().' itens'; ?></div></a>
      </div>
      <div style="clear:both;"></div>
      <div style="margin-top:27px;">
      	<div id='cssmenu'>
            <ul>
               <li class='active' style=" border-right:1px solid #FFF"><a href='<?=tep_href_link(FILENAME_DEFAULT)?>'><span>Home</span></a></li>
               <li class='has-sub' style=" border-right:1px solid #FFF"><a><span>Categorias <img src="images/menuseta.png" /></span></a>
                  <?php
					$GLOBALS['this_level'] = 0;
					$categories_string = tep_make_catsf_ullist(0, 0, 'and c.categories_highlights = 0 and c.categories_temas = 0');
					echo '<ul id="sidebarmenu1"><li class="titulo">Ambientes</li>'.$categories_string.'<li class="titulo"></li>';	
				?>
                
                <?php
					$GLOBALS['this_level'] = 0;
					$categories_string2 = tep_make_catsf_ullist(0, 0, 'and c.categories_highlights = 0 and c.categories_temas = 1');
					echo '<li class="titulo">Temas</li>'.$categories_string2.'<li class="titulo"></li></ul>';	
				?>
               </li>
               <li style="border-right:1px solid #FFF"><a><span>Coleções Especiais <img src="images/menuseta.png" /></span></a>
    
                	<?php
					$show_full_tree = true;	
					$classname_for_selected = false;  // see superfish.css
					$classname_for_parent = false;  //see superfish.css	
					$GLOBALS['this_level'] = 0;
					$categories_string = tep_make_catsf_ullist(0, 0, 'and c.categories_highlights = 1');
					echo '<ul id="sidebarmenu1"><li class="titulo">Coleções Especiais</li>'.$categories_string.'<li class="titulo"></li></ul>';	
					?>
 
               </li>
               <li style=" border-right:1px solid #FFF"><a><span>Personalizados <img src="images/menuseta.png" /></span></a>
               	<ul>
                	<li class="titulo">Personalizados</li>
                    <li><a href="<?=tep_href_link('produtos-personalizados.php')?>">Produtos Personalizados</a></li>
                    <li><a href="<?=tep_href_link('projetos-corporativos.php')?>">Projetos Corporativovs</a></li>
                    <li><a href="<?=tep_href_link('foto-wall.php')?>">Foto Wall</a></li>
                    <li><a href="<?=tep_href_link('foto-art.php')?>">Foto Art</a></li>
                    <li><a href="<?=tep_href_link('frases.php')?>">Frases</a></li>
                    <li><a href="<?=tep_href_link('envie-seu-modelo.php')?>">Envie seu modelo</a></li>
                    <li class="titulo"></li>
                </ul>
               </li>
               <li style=" border-right:1px solid #FFF"><a><span>Dúvidas <img src="images/menuseta.png" /></span></a>
               	<ul>
                    <li class="titulo">Informações</li>
                	<li><a href="<?=tep_href_link('como-comprar-i-1.html')?>">Como Comprar</a></li>
                    <li><a href="<?=tep_href_link('como-aplicar.php')?>">Como Aplicar</a></li>
                    <li><a href="<?=tep_href_link('formas-pagamento-i-5.html')?>">Formas de Pagamento</a></li>
                    <li><a href="<?=tep_href_link('formas-entrega-i-6.html')?>">Formas de Entrega</a></li>
                    <li><a href="<?=tep_href_link('garantia-durabilidade-i-4.html')?>">Garantia e Durabilidade</a></li>
                    <li><a href="<?=tep_href_link('seguranca-privacidade-i-7.html')?>">Segurança e Privacidade</a></li>
                    <li><a href="<?=tep_href_link('troca-devolucao-pedido-i-11.html')?>">Troca e devolução de pedido</a></li>
                    <li><a href="<?=tep_href_link('faq-i-8.html')?>">Perguntas Frequentes</a></li>
                    <li><a href="<?=tep_href_link('paleta-de-cores.php')?>">Significado das Cores</a></li>
                    <li><a href="<?=tep_href_link('arquitetos-decoradores-i-19.html')?>">Arquitetos e Decoradores</a></li>
                    
                    <li class="titulo">Institucional</li> 
                    <li><a href="<?=tep_href_link('quem-somos-i-2.html')?>">Quem Somos</a></li>
                    <li><a href="<?=tep_href_link('galeria-de-fotos.php')?>">Galeria de Fotos</a></li>
                    <li><a href="<?=tep_href_link('promocoes-vigentes-i-18.html')?>">Promoções vigentes</a></li>
                    <li><a href="<?=tep_href_link('mande-arte-i-15.html')?>">Mande sua Arte</a></li>
                    <li><a href="<?=tep_href_link('seja-revendedor-i-16.html')?>">Seja um revendedor</a></li>
                    <li><a href="<?=tep_href_link('parceiros.html')?>">Parceiros</a></li>
                    <li><a href="<?=tep_href_link('afiliados.html')?>">Afiliados</a></li>
                    
                    <!--
                    <li><a href="<?=tep_href_link('contato-uteis-i-3.html')?>">Contato Úteis</a></li>
                    <li><a href="<?=tep_href_link('curiosidades-i-9.html')?>">Curiosidades</a></li>
                    <li><a href="<?=tep_href_link('dicas-i-10.html')?>">Dicas</a></li>
                    <li><a href="<?=tep_href_link('eventos-i-12.html')?>">Eventos</a></li>
                    <li><a href="<?=tep_href_link('onde-encontrar-i-13.html')?>">Onde Encontrar?</a></li>
                    <li><a href="<?=tep_href_link('promocoes-i-14.html')?>">Promoções</a></li>
                    
                    
                    <li><a href="<?=tep_href_link('projetos-corporativos-i-17.html')?>">Projetos Corporativos</a></li>
                    
                    <li><a href="<?=tep_href_link('acompanhe-pedido-i-20.html')?>">Acompanhe seu pedido</a></li>
                    <li><a href="<?=tep_href_link('ganhe-pontos-i-21.html')?>">Ganhe Pontos</a></li>
                       -->                 
                    
                </ul>
               </li>
               <li><a href='<?=tep_href_link('fale-conosco.html')?>'><span>Fale Conosco</span></a></li>
            </ul>
        </div>

      </div>
    </div>
</div>

<div style="width:990px; margin:0 auto; position:relative">
<ul id="demo">
<?

	if(strpos($_SERVER['PHP_SELF'],'Index.php') !== false or strpos($_SERVER['PHP_SELF'],'index.php') !== false && $cPath == 0){
		$random_banner_select = tep_db_query("select banners_url, banners_image from banners where banners_group LIKE 'bPrincipal_%' and status = 1 order by banners_group ");
		$random_banner = tep_db_fetch_array($random_banner_select);
		$ramdon_num_rows = tep_db_num_rows($random_banner_select);
		if($ramdon_num_rows > 0){
			for($cont4 =1; $cont4 <= $ramdon_num_rows; $cont4++){
				if($random_banner['banners_url']=='')
					echo "<li style='width: 990px; height:400px;'><img src='images/banners/".$random_banner['banners_image']."' /></li>\n\r";
				else 
					echo "<li style='width: 990px; height:400px;'><a href='".$random_banner['banners_url']."'><img src='images/banners/".$random_banner['banners_image']."' /></a></li>\n\r";
					
				$random_banner = tep_db_fetch_array($random_banner_select);		
			}
		}
	}


if(isset($cPath) and  $cPath <> '' and $cPath <> 0 && (strpos($_SERVER['PHP_SELF'],'Index.php') !== false or strpos($_SERVER['PHP_SELF'],'index.php') !== false)){
	$random_banner_select = tep_db_query("select banners_url, banners_image from banners where banners_group LIKE 'bCategoria".$cPath."%' and status = 1 order by banners_group ");
	$random_banner = tep_db_fetch_array($random_banner_select);
	$ramdon_num_rows = tep_db_num_rows($random_banner_select);
	if($ramdon_num_rows > 0){
		for($cont4 =1; $cont4 <= $ramdon_num_rows; $cont4++){
			if($random_banner['banners_url']=='')
				echo "<li style='width: 990px; height:90px;'><img src='images/banners/".$random_banner['banners_image']."' /></li>\n\r";
			else 
				echo "<li style='width: 990px; height:90px;'><a href='".$random_banner['banners_url']."'><img src='images/banners/".$random_banner['banners_image']."' /></a></li>";
				
			$random_banner = tep_db_fetch_array($random_banner_select);		
		}
	}
}

?>
</ul>
<? if(isset($cPath) and $cPath == 0){ if($ramdon_num_rows > 0) echo'<div style="position:absolute; top:150px; left:10px; z-index:1;"><button id="prev" class="btnP"></button></div><div style="position:absolute; top:150px; right:10px; z-index:1;"><button id="next" class="btnN"></button></div>';}?>
<? //if ($banner = tep_banner_exists('dynamic', 'banner_principal'.$cPath)) echo tep_display_banner('static', $banner);?>
</div>
<? if(strrpos($_SERVER['PHP_SELF'],'product_info.php') === false){?>
<div class="Social" <? if($ramdon_num_rows > 0) echo 'style="margin-top:0px;"'?>>
	<div style="width:990px; margin:0 auto;">
        <div style="float:left; margin-top:3px;">
                <div class="addthis_toolbox addthis_default_style ">
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <a class="addthis_button_tweet"></a>
                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                <a class="addthis_counter addthis_pill_style"></a>
                </div>
        	</div> 
        

        <div style="float:right; font-size:11px; font-family:Tahoma; color:#FFF; width:530px; margin-top:3px;"><div style="margin-top:3px; float:left;">Receba novidades, ofertas exclusivas e mais em 1ª mão. Cadastre-se. <?=tep_draw_input_field('email', '', 'size="20" maxlength="50" id="email"    onclick="this.value=\'\'" value="Informe seu e-mail"  style="width:150px;"').'</div>';?> <div style="margin:3px 0 0 3px; width:25px; height:17px; float:left;"><img style="cursor:pointer;" onClick="javascript: _gaq.push(['_trackPageview', '/virtual-assinatura-newsletter']); excuteAct('inReg');" alt="Recebe informativos" src="includes/languages/portugues/images/buttons/button_newletter_cad.png"></div><div style="clear:both;"></div></div></div>
        <div style="clear:both;"></div>
    </div>
</div>
<? } ?>

<?php
// check if the 'install' directory exists, and warn of its existence
  if (WARN_INSTALL_EXISTENCE == 'true') {
    if (file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . '/install')) {
      $messageStack->add('header', WARNING_INSTALL_DIRECTORY_EXISTS, 'warning');
    }
  }

// check if the configure.php file is writeable
 /* if (WARN_CONFIG_WRITEABLE == 'true') {
    if ( (file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . '/includes/configure.php')) && (is_writeable(dirname($_SERVER['SCRIPT_FILENAME']) . '/includes/configure.php')) ) {
      $messageStack->add('header', WARNING_CONFIG_FILE_WRITEABLE, 'warning');
    }
  }*/

// check if the session folder is writeable
  if (WARN_SESSION_DIRECTORY_NOT_WRITEABLE == 'true') {
    if (STORE_SESSIONS == '') {
      if (!is_dir(tep_session_save_path())) {
        $messageStack->add('header', WARNING_SESSION_DIRECTORY_NON_EXISTENT, 'warning');
      } elseif (!is_writeable(tep_session_save_path())) {
        $messageStack->add('header', WARNING_SESSION_DIRECTORY_NOT_WRITEABLE, 'warning');
      }
    }
  }

// check session.auto_start is disabled
  if ( (function_exists('ini_get')) && (WARN_SESSION_AUTO_START == 'true') ) {
    if (ini_get('session.auto_start') == '1') {
      $messageStack->add('header', WARNING_SESSION_AUTO_START, 'warning');
    }
  }

  if ( (WARN_DOWNLOAD_DIRECTORY_NOT_READABLE == 'true') && (DOWNLOAD_ENABLED == 'true') ) {
    if (!is_dir(DIR_FS_DOWNLOAD)) {
      $messageStack->add('header', WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT, 'warning');
    }
  }

  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  

?>

