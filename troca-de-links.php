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
  
      <img src="images/troca_de_links.png" /><br /><br />
      
      <div class="pagestexto" style="text-align:justify; line-height:25px; font-size:16px">
     Links são uma forma interessante de crescer dentro da net. Eles geram referenciais na internet remetendo à sua publicação e quanto mais deles você tiver, melhor será o seu posicionamento nos resultados de busca do Google, o maior buscador da internet.<br /><br />

Nesta modalidade promovemos uma simples troca de links para divulgação do seu trabalho e, em contrapartida, você divulga o nosso link na sua página. Você nos envia o link do seu site e os dados de visitação (se possível um Mídia Kit) para que possamos definir melhor o posicionamento do seu link na nossa página. Quanto mais visitações você atrair para o nosso site, mais você subirá na nossa lista de sites e blogs linkados, o que resultará em mais visitas para o seu blog. Funciona como uma troca de visitantes entre os sites e é feita após o envio da sua solicitação. Após linkar o nosso site dentro do seu, você já poderá ver, em no máximo 48 horas, seu link publicado no blog do Mudo Minha Casa. <br /><br />

Esta parceria é muito simples e eficaz, uma vez que o site e blog do Mudo Minha Casa também recebem centenas de visitas diariamente e pode contribuir para o aumento de visitações no seu site. Esta parceria não impede na realização de outras e pode ser desfeita a qualquer momento, desde que seja manifestado o interesse do administrador do blog ou site por e-mail.<br /><br />




<i>"Quando há mais pessoas formando uma parceria... a primeira coisa a buscar... é um objetivo comum."           <br />

Walter Grando</i>



      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>