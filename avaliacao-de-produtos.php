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
      Neste modelo de parceria você recebe um produto da nossa loja e, em contrapartida, faz uma postagem no seu site ou blog contanto sua experiência para os seus leitores. Você terá direito a escolher um produto que gostaria no site do Mudominhacasa e receberá o mesmo sem nenhum custo. <br /><br />

Basta acessar o nosso site, se cadastrar e escolher o produto. Após a aprovação da sua solicitação, você deve fazer a aplicação do adesivo Mudo Minha Casa onde você quiser e publicar na sua página uma avaliação sobre ele, ressaltando a qualidade dos nossos adesivos de parede. É imprescindível que o post seja bem escrito e contenha imagens da aplicação, do resultado final e os links de referência para que seu leitor possa conhecer a nossa loja. <br /><br />

A vantagem desta parceria é você Optando por este tipo de parceria você deverá solicitar o seu adesivo de parede entre os modelos disponíveis na loja para pronta entrega. Basta preencher o formulário, colocando os seus dados pessoais e os dados do seu site, média de visitantes, acessos, url, presença nas redes sociais, etc. Feito isso, nossa equipe vai avaliar a solicitação e entrar em contato.<br /><br />

Para este tipo de parceria não é permitida a escolha de adesivos da linha de personalizados ou encomendas de serviços especiais, como Foto Wall, Foto Art e 3 D.

      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>