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
  
      <img src="images/troca_de_posts.png" /><br /><br />
      
      <div class="pagestexto" style="text-align:justify; line-height:25px; font-size:16px">
     Tendo em vista que o blog do Mudo Minha Casa alcança um número de visitações significantes todos os dias, este modelo de parceria pode resultar em maior visibilidade para o seu site, além da divulgação do seu conteúdo para outros leitores.<br /><br /> 

Em nosso site estamos sempre divulgando outros sites ou blogs interessantes, contando um pouco da história das pessoas que estão por trás da mídia. Nesta parceria promovemos a troca de posts para ajuda mútua, uma vez que os blogs não são concorrentes e sim parceiros. <br /><br />
Para ter seu post publicado no nosso site e receber um nosso para publicação, basta preencher o formulário de interesse e escolher o assunto do qual deseja tratar para que possamos preparar o conteúdo de acordo com o nicho do seu blog e público alvo.  Envie-nos também um post do seu blog, de preferência exclusivo, para que possamos publicar e linkar para o seu site. <br /><br />

Nosso blog fala de decoração e idéias criativas em geral e temos muito para contribuir com a sua publicação.


      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>