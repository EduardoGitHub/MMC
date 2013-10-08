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
     Links s�o uma forma interessante de crescer dentro da net. Eles geram referenciais na internet remetendo � sua publica��o e quanto mais deles voc� tiver, melhor ser� o seu posicionamento nos resultados de busca do Google, o maior buscador da internet.<br /><br />

Nesta modalidade promovemos uma simples troca de links para divulga��o do seu trabalho e, em contrapartida, voc� divulga o nosso link na sua p�gina. Voc� nos envia o link do seu site e os dados de visita��o (se poss�vel um M�dia Kit) para que possamos definir melhor o posicionamento do seu link na nossa p�gina. Quanto mais visita��es voc� atrair para o nosso site, mais voc� subir� na nossa lista de sites e blogs linkados, o que resultar� em mais visitas para o seu blog. Funciona como uma troca de visitantes entre os sites e � feita ap�s o envio da sua solicita��o. Ap�s linkar o nosso site dentro do seu, voc� j� poder� ver, em no m�ximo 48 horas, seu link publicado no blog do Mudo Minha Casa. <br /><br />

Esta parceria � muito simples e eficaz, uma vez que o site e blog do Mudo Minha Casa tamb�m recebem centenas de visitas diariamente e pode contribuir para o aumento de visita��es no seu site. Esta parceria n�o impede na realiza��o de outras e pode ser desfeita a qualquer momento, desde que seja manifestado o interesse do administrador do blog ou site por e-mail.<br /><br />




<i>"Quando h� mais pessoas formando uma parceria... a primeira coisa a buscar... � um objetivo comum."           <br />

Walter Grando</i>



      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>