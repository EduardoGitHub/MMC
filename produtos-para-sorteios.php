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
  
      <img src="images/sorteio.png" /><br /><br />
      
      <div class="pagestexto" style="text-align:justify; line-height:25px; font-size:16px">
      Método mais eficaz para angariar visitas e fidelizar leitores, as promoções agradam tanto a quem participa delas quanto os blogueiros que ganham a chance de oferecer uma gratificação à eles. O Mudo Minha Casa propõe, nesta modalidade, uma parceria para que você possa ofertar ao seu público um adesivo de parede de alta qualidade e sofisticação. <br/><br/>

Fornecemos ao parceiro um produto ou vale-presente para que o mesmo seja sorteado no ambiente do site. Nesse caso o produto pode ser diretamente enviado ao administrador da mídia após a definição da parceria ou enviado diretamente do Mudo Minha Casa ao vencedor da promoção. O valor do adesivo ou vale-compra da loja a ser sorteado será decidido pelo Mudo Minha Casa após avaliação da proposta enviada pelo administrador do blog.<br/><br/>
Caso seja enviado pelo Mudo Minha Casa após o sorteio, você não terá ônus com frete ou demais custos de envio. <br/><br/>

O regulamento, assim como a definição do produto, serão previamente definidos juntamente ao administrador do site. Este tipo de parceria não impede a contratação de outras modalidades de divulgação.


      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>