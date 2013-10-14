<?php 

class Partner{
	
	
	public function newPartner($dados){
		
		$dadosCustomers = array(
			'customers_type_register' 	=> 'P',//Parceiros      
			'customers_firstname' 		=>  $dados['firstname'],        
			'customers_rg' 				=> $dados['rg'],                 
			'customers_cpf' 			=> $dados['cpf'],                
			'customers_email_address' 	=> $dados['email_address'],     
			//'customers_default_address_id' => 
			'customers_telephone' 		=>   $dados['telephone'],       
			'customers_newsletter' 		=> 1,                  
			'customers_revendedor' 		=> 0,        
			'customers_fax' 			=> $dados['fax'],               
			'customers_password' 		=> $dados['password'],        
			'customers_type' 			=>  0        
		);
		execute_db(TABLE_CUSTOMERS, $dadosCustomers);
		$idCustomers = mysql_insert_id();
		
		//Pega areas de atua��o
			$atuacao = $dados['area'];
			$numReg = count($atuacao);
			$dadosAtua = '';
			for($cont =0; $cont < $numReg; $cont++){
				$dadosAtua .= $atuacao[$cont].', ';
			}
		//Fim pega areas de atuacao
		
		$dadosPartner = array(
			'partner_name' 		=> $dados['firstname'],   
			'partner_url' 		=> $dados['url'],     
			'partner_pageviews' => $dados['pageviews'],
			'partner_atuacao' 	=> $dadosAtua, 
			'partner_status' 	=> 0,  
			'partner_cod' 		=> $this->geraCod(),    
			'partner_desc' 		=> $dados['desc'],    
			'customers_id' 		=> $idCustomers    
		);
		execute_db(TABLE_PARTNERS, $dadosPartner);
		$idPartner = mysql_insert_id();
		
		
		$dadosEndereco = array(
			'customers_id'			=>  $idCustomers,      
			'partner_id'			=>  $idPartner,        
			'entry_company'			=>  $dados['company'],     
			'entry_firstname'		=> 	$dados['firstname'],    
			'entry_street_address' 	=>	$dados['street_address'],
			'entry_street_number'	=>	$dados['street_number'], 
			'entry_suburb'			=>  $dados['suburb'],      
			'entry_complemento'		=>  $dados['complemento'], 
			'entry_postcode'		=>  $dados['postcode'],    
			'entry_city'			=>  $dados['city'],        
			'entry_state'			=>  $dados['state'],       
			'entry_country_id'		=>  30,  
			'entry_zone_id'			=>  $this->getCodEstado($dados['state'])    
		
		);
		execute_db(TABLE_ADDRESS_BOOK, $dadosEndereco);
		
		
		$html = '<table width="760" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC; padding:15px; background-color:#D7AB00" align="center">
		  
          <tr>
			<td>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="56%" rowspan="2" align="center">'.$dados['firstname'].'�&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><span style="font-size:20px">Seja</span><br><span style="font-size:40px">Bem Vindo!</span></td>
                    <td width="44%"><img src="images/mail/mudominhacasa.png" width="332" height="59"/></td>
                  </tr>
                  <tr>
                    <td style="color:#000; font-weight:bold; text-align:right; padding-right:3px;">wwww.mudominhacasa.com.br</td>
                  </tr>
                </table>

            </td>
		  </tr>
          <tr>
			<td class="texto">
            	<table width="760" border="0" cellspacing="0" cellpadding="0" style="background-color:#FFF; margin:5px">
                  <tr>
                    <td style="padding:5px"><p style="font-size:30px; text-align:center">Adesivos de Parede para Decora��o da sua Casa, Quarto ou Escrit�rio!</p><br>

<p style="text-align:center">O Mudominhacasa.com tem o prazer de lhe dar boas vindas, tendo em vista a sua recente inclus�o em nosso cadastro de clientes.  </p>      	
<p style="text-indent:15px; text-align:justify">
Na nossa loja virtual voc� confere uma enorme variedade de adesivos decorativos para todos os tipos de ambientes e com tem�ticas atuais. Nossos modelos s�o modernos e descolados, e ajudam a personalizar qualquer ambiente com um toque de requinte. S�o adesivos criativos que abordam diversas categorias e assuntos com grande apelo art�stico. N�s queremos realmente recriar as paredes brancas e os m�veis comuns.</p><br>  Confira abaixo alguns servi�os que voc� j� pode desfrutar:<br><br>
</td>
                  </tr>
                  <tr>
                  	<td>
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="16%" align="center"><img src="images/mail/6vezes.png"></td>
                            <td width="2%">&nbsp;</td>
                            <td width="82%" style="background-color:#FFDAA3">PAGAMENTO FACILITADO <br>
Todos os produtos da loja podem ser divididos em 6 vezes sem juros!
</td>
                          </tr>
                          <tr><td colspan="3" height="10"></td></tr>
                          <tr> 
                            <td align="center"><img src="images/mail/comprasegura.png"></td>
                            <td>&nbsp;</td>
                            <td style="background-color:#FFDAA3">COMPRA SEGURA <br>
Compra efetuada em ambiente seguro. N�o temos acesso a seus Dados Banc�rios.
</td>
                          </tr>
                          <tr><td colspan="3" height="10"></td></tr>
                          <tr>
                            <td align="center"><img src="images/mail/personalizados.png"></td>
                            <td>&nbsp;</td>
                            <td style="background-color:#FFDAA3">PRODUTOS PERSONALIZADOS<br/>
N�o encontrou o que procura? Criamos Produtos Exclusivos para voc�!
</td>
                          </tr>
                          <tr><td colspan="3" height="10"></td></tr>
                          <tr>
                            <td align="center"><img src="images/mail/qualidade.png"/></td>
                            <td>&nbsp;</td>
                            <td style="background-color:#FFDAA3">QUALIDADE INDISCUT�VEL<br/>
Produzido com adesivo ultrafino, de melhor desempenho encontrado no mercado.
</td>
                          </tr>
                          <tr><td colspan="3" height="10"></td></tr>
                          <tr>
                            <td align="center"><img  src="images/mail/entrega.png"></td>
                            <td>&nbsp;</td>
                            <td style="background-color:#FFDAA3">ENTREGA R�PIDA PARA TODO O BRASIL<br/>
Entregamos em todo o Brasil via Correios. Escolha a melhor op��o de entrega.
</td>
                          </tr>
                        </table>

                    </td>
                  </tr>  
                  <tr><td style="text-align:center; font-size:25px; font-weight:bold">www.mudominhacasa.com.br</td></tr>
                  <tr><td align="center">Em caso de d�vidas entre em contato atrav�s do e-mail: atendimento@mudominhacasa.com.br</td></tr>
                </table>
			</td>
		  </tr>
		  <tr>
			<td style="text-align:center; font-size:13px; font-family:Tahoma; padding:10px">
            Muito obrigado pela sua prefer�ncia e compreens�o!<br>
            Esperamos sua total satisfa��o na aquisi��o do seu produto Mudominhacasa - Adesivos Decorativos
            </td>
		  </tr>
		</table>';
		
		tep_sendMailOrders($dados['email_address'], EMAIL_SUBJECT, $html, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
		
		return array('retorno' => 1);
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $tamanho
	 * @param unknown_type $maiusculas
	 * @param unknown_type $numeros
	 * @param unknown_type $simbolos
	 */
	public function geraCod($tamanho = 10, $maiusculas = true, $numeros = true, $simbolos = false)
	{
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';
		
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
		
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
		
		return $retorno;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $estado
	 */
	public function getCodEstado($estado){
		$retorno = process_db(TABLE_ZONES, array('zone_id'),' WHERE zone_code="'.$estado.'"');
		return $retorno[0]['zone_id'];
	}
	
	
	
}

?>