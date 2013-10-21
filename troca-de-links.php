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
<style>
.boxafiliado{border:1px solid #EBEBEB; width:990px; margin:0 0 15px 0; padding:10px;}
.boxafiliado ul{ list-style:none; margin:0; padding:0;}
.boxafiliado label { text-align: left; margin:0 0 5px 0; display: block; font-weight: bold;  font-size: 11px;}
.boxafiliado label .required{ color:red; }
.boxafiliado p { text-align: left; margin:0 0 5px 0; display: block; font-weight: bold;  font-size: 11px;}
.boxafiliado p .required{ color:red; }
.boxafiliado .float{float: left; margin-right: 50px;}
.tituloafiliado{ background-color:#ccc; color:#000; padding:5px; font-weight:bold}
.atuacao ul{margin:0; padding:0; border:0;}
.atuacao li{ float:left; width:230px; font-family:Tahoma; font-size:11px; padding:3px;}
label.error { margin:2px 0 0 0; color:red;}
</style>
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
      
      <br />
      
      <div class="pagestexto">
      		<form name="formParceiros" id="formParceiros" method="post">
      		<input type="hidden" name="action" value="cadastroParceiros" />
            <div class="tituloafiliado">Dados do Cadastrais</div>	
      		<div class="boxafiliado">
  				
                <p>*Nome:<br />
                <?=tep_draw_input_field('firstname','','size="40" maxlength="200"') ?>
                </p>
                
            	<p class="float">*E-mail:<br />
                <?=tep_draw_input_field('email_address','','size="40" maxlength="200" id="email_address"') ?>
                </p>
                
                <p>*Confirme E-Mail:<br />
                <?=tep_draw_input_field('email_address_cf','','size="40" maxlength="200" id="email_address_cf"') ?>
                </p>
                
                <p class="float">*Telefone <br />
                <?=tep_draw_input_field('telephone','','size="40" maxlength="200" id="telephone"') ?>
                </p>
                
                <p class="float">*CEP <br />
                <?=tep_draw_input_field('postcode','','size="40" maxlength="200" id="cep"') ?>
                </p>
                <div style="clear:both"></div>
            </div>
            
            
            <div class="tituloafiliado">Informa��es da M�dia (Blog, Site ou Rede Social)</div>	
      		<div class="boxafiliado">
  
            	<p class="float">Page Views: <span style="color:#999; font-size:10px; font-style:italic">(somente numeros)</span><br />
                <?=tep_draw_input_field('pagaviews','','size="40" maxlength="10" id="pagaviews"') ?>
                </p>
                
                <p>F�s ou Amigo - Informe para Rede Social: <span style="color:#999; font-size:10px; font-style:italic">(somente numeros)</span><br />
                <?=tep_draw_input_field('fan','','size="40" maxlength="200"') ?>
                </p>
                
                <p class="float">*URL ou endere�o do perfil que ser� utilizado: <br />
                <?=tep_draw_input_field('urle','','size="40" maxlength="200" id="urle"') ?>
                </p>
                
                <p>*Respons�vel pelo Site: <br />
                <?=tep_draw_input_field('responsavel','','size="40" maxlength="200" id="responsavel"');//precisa de ser incluso ?>
                </p>
                
                <p class="float">Area de Atua��o: <br />
                <?=tep_draw_input_field('area','','size="40" maxlength="200" id="area"') ?>
                </p>

                <p>Descri��o:<br />
                	<?=tep_draw_input_field('desc','','size="40" id="area" style="height:50px;"') ?>
                </p>
                
                <div style="clear:both"></div>
            </div>
            

             
            
                <div style="text-align:right"><?=tep_image_submit('button_send_partner.jpg', IMAGE_BUTTON_CONTINUE);?></div>
           </form> 
      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
  <script type="text/javascript" src="includes/librays/jquery.form.js" ></script>
  <script type="text/javascript" src="includes/librays/jquery.validate.min.js" ></script>
  <script type="text/javascript" src="includes/librays/jqueryAlerts/jquery.alerts.js" ></script>

  <script type="text/javascript">

  
  	// valida o formul�rio
    $('#formParceiros').validate({
        // define regras para os campos  
    	submitHandler: function(form) {   
    	$(form).ajaxSubmit({
    		dataType: "json",
            type: "POST",
            url: 'actions-json.php',
    		success: function(data){   
    			if(data.retorno == 0)
    				alert('erro')
    			else if(data.retorno == 1) alert('Salva com sucesso');
        	}   
        });
	return false; 
}, 
	rules: {
		email_address: { required: true,
						 email: true},
		email_address_cf: { required: true,
			equalTo:'#email_address',
			email: true
		},
		firstname: { required: true },
		telephone: { required: true },
		urle: { required: true },
		postcode: { required: true },
		responsavel: { required: true }
		
	 },
        // define messages para cada campo
        messages: {
        	email_address: { required: 'Informe seu email.',
							 email: 'Informe um e-mail v�lido'},
			email_address_cf: { required: 'Confirme seu e-mail',
								equalTo:'Seu e-mail n�o � o mesmo digitado acima. Favor verificar',
								email: 'Informe um email valido'
			},
			

			firstname: { required: 'Informe seu nome' },
			telephone: { required: 'Informe seu telefone' },
			urle: { required: 'Informe a URL do seu site e ou blog' },
			
			postcode: { required: 'Informe seu CEP' },
			responsavel: { required: 'O nome do responsavel' }
			
        }
    });
  
  
  </script>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>