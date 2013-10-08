<?php
  require('includes/application_top.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php echo HTML_PARAMS; ?>>
<head>
<?php
if ( file_exists(DIR_WS_INCLUDES . 'header_tags.php') ) {
  require(DIR_WS_INCLUDES . 'header_tags.php');
} else {
?>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
  <title><?php echo TITLE; ?></title>
<?php
}
?>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>" />
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
<div id="header"><?php require(DIR_WS_INCLUDES . 'header.php'); ?></div>
<div id="container">
  <div id="mainContent" style="margin: 5px 0 0 0; padding:5px;">
  
      <img src="images/avaliacao_produtos.png" /><br /><br />
      
      <div class="pagestexto" style="text-align:justify; line-height:25px; font-size:16px">
      Neste modelo de parceria voc� recebe um produto da nossa loja e, em contrapartida, faz uma postagem no seu site ou blog contanto sua experi�ncia para os seus leitores. Voc� ter� direito a escolher um produto que gostaria no site do Mudominhacasa e receber� o mesmo sem nenhum custo. <br /><br />

Basta acessar o nosso site, se cadastrar e escolher o produto. Ap�s a aprova��o da sua solicita��o, voc� deve fazer a aplica��o do adesivo Mudo Minha Casa onde voc� quiser e publicar na sua p�gina uma avalia��o sobre ele, ressaltando a qualidade dos nossos adesivos de parede. � imprescind�vel que o post seja bem escrito e contenha imagens da aplica��o, do resultado final e os links de refer�ncia para que seu leitor possa conhecer a nossa loja. <br /><br />

A vantagem desta parceria � voc� Optando por este tipo de parceria voc� dever� solicitar o seu adesivo de parede entre os modelos dispon�veis na loja para pronta entrega. Basta preencher o formul�rio, colocando os seus dados pessoais e os dados do seu site, m�dia de visitantes, acessos, url, presen�a nas redes sociais, etc. Feito isso, nossa equipe vai avaliar a solicita��o e entrar em contato.<br /><br />

Para este tipo de parceria n�o � permitida a escolha de adesivos da linha de personalizados ou encomendas de servi�os especiais, como Foto Wall, Foto Art e 3 D.

      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>