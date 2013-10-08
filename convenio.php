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
  
      <img src="images/convenio_mudominhacasa.png" /><br /><br />
      
      <div class="pagestexto" style="text-align:justify; line-height:25px; font-size:16px">
      
Esta modalidade � ideal para quem quer fidelizar leitores e pode aumentar ainda mais o seu tr�fego de visitas. Ao optar por este modelo, n�s fornecemos ao administrador do blog/site um cupom de desconto personalizado para que o mesmo distribua o c�digo de desconto com o nome do blog para seus leitores.<br /><br /> 

Esta parceria � muito ben�fica para seus leitores e n�o implica em nenhum custo para voc�.<br /><br /> 

O cupom poder� ser publicado no seu site ou enviado por e-mail para seus leitores como um benef�cio ofertado � eles. A personaliza��o do cupom, assim como a valida��o do mesmo, fica a cargo do Mudo Minha Casa. Voc� precisa, apenas, enviar-nos a logomarca e a identidade visual do seu blog para ter acesso ao brinde. Os cupons ter�o prazo de validade conforme estipulado ou definido por voc� na hora da solicita��o do servi�o.<br /><br />

A ades�o ao conv�nio como modelo de parceria n�o implica e nem impede a participa��o do administrador do site em outras modalidades de publicidade e divulga��o. 


      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>