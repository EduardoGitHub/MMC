<?
require('includes/application_top.php');

/*
$query = tep_db_query('SELECT products_extra_images_id, products_extra_image FROM products_extra_images order by products_extra_images_id');
$teste= '';
$ids  = 0;
while($result = mysql_fetch_array($query)){
	
	$teste .= '"'.$result['products_extra_image'].'", '	;
	$ids .= $result['products_extra_images_id'].', ';
}
echo $ids;
*/

/*
$query = tep_db_query('SELECT products_extra_images_id, products_extra_image FROM products_extra_images order by products_extra_images_id');
$cont = 0;
while($result = mysql_fetch_array($query)){
	copy('images/ImgProdutos/produtos/'.$result['products_extra_image'], 'images/ImgProdutos/'.$result['products_extra_image']);
	$cont++;
}
echo $cont;
/*
$query = tep_db_query('SELECT products_extra_images_id, products_extra_image FROM products_extra_images order by products_extra_images_id');
$teste= '';
$ids  = 0;
while($result = mysql_fetch_array($query)){
	
	$teste .= '"'.$result['products_extra_image'].'", '	;
	$ids .= $result['products_extra_images_id'].', ';
}
echo $teste.'<br /><br /><br />';
echo $ids;
*/


/*
Resolve o problema da organização do tamanho dos produtos P, M G
$query = tep_db_query('SELECT options_values_id,products_attributes_id FROM products_attributes');
$cont = 0;
while($result = mysql_fetch_array($query)){
	if($result['options_values_id']==29)
		tep_db_query('UPDATE products_attributes SET options_values_id=30 where products_attributes_id='.$result['products_attributes_id']);
	else if($result['options_values_id']==30)
		tep_db_query('UPDATE products_attributes SET options_values_id=29 where products_attributes_id='.$result['products_attributes_id']);
}
*/



/*
//IMAGENS 1
$query = tep_db_query('SELECT products_image, products_id FROM PRODUCTS');

while($result = mysql_fetch_array($query)){
	copy('images/ImgProdutos/'.$result['products_image'], 'images/produtos/'.$result['products_image']);
	$cont++;
}
*/
$query = tep_db_query('SELECT products_image2, products_id FROM PRODUCTS');
while($result = mysql_fetch_array($query)){
	$car_a = ' -Á-À-Â-Ã-Ä-É-È-Ê-Ë-Í-Ì-Î-Ï-Ó-Ò-Ô-Õ-Ö-Ú-Ù-Û-Ü-Ç-á-à-â-ã-ä-é-è-ê-ë-í-ì-î-ï-ó-ò-ô-õ-ö-ú-ù-û-ü-ç-º->-<-(-)-/-*-"';
	$car_s = '_-A-A-A-A-A-E-E-E-E-I-I-I-I-O-O-O-O-O-U-U-U-U-C-a-a-a-a-a-e-e-e-e-i-i-i-i-o-o-o-o-o-u-u-u-u-c---------';
	$str = $result['products_image2'];
	$str = strtolower($str); //Deixa todos os caracteres em minúsculos 
	$texto = str_replace(explode('-', $car_a), explode('-', $car_s), $str);//Percorre o texto trocando as letras
	$name = str_replace(" ", "-", $texto);//Retira os espaços
	tep_db_query('UPDATE PRODUCTS SET products_image2="'.$name.'" WHERE products_id='.$result['products_id']);
	//rename("images/produtos/".$result['products_image'], "images/produtos/".$name);
	echo $name."</br>";
}


/*
//IMAGENS 2
$query = tep_db_query('SELECT products_image2, products_id FROM PRODUCTS');

while($result = mysql_fetch_array($query)){
	copy('images/ImgProdutos/'.$result['products_image2'], 'images/produtos/'.$result['products_image2']);
	$cont++;
}





//IMAGENS EXTRAS
$query = tep_db_query('SELECT products_extra_images_id, products_extra_image FROM products_extra_images order by products_extra_images_id');
$cont = 0;

while($result = mysql_fetch_array($query)){
	copy('images/ImgProdutos/'.$result['products_extra_image'], 'images/produtos/'.$result['products_extra_image']);
	$cont++;
	echo $result['products_extra_image'];
}

$query = tep_db_query('SELECT products_extra_images_id, products_extra_image FROM products_extra_images order by products_extra_images_id');
while($result = mysql_fetch_array($query)){
	$car_a = ' -Á-À-Â-Ã-Ä-É-È-Ê-Ë-Í-Ì-Î-Ï-Ó-Ò-Ô-Õ-Ö-Ú-Ù-Û-Ü-Ç-á-à-â-ã-ä-é-è-ê-ë-í-ì-î-ï-ó-ò-ô-õ-ö-ú-ù-û-ü-ç-º->-<-(-)-/-*-"';
	$car_s = '_-A-A-A-A-A-E-E-E-E-I-I-I-I-O-O-O-O-O-U-U-U-U-C-a-a-a-a-a-e-e-e-e-i-i-i-i-o-o-o-o-o-u-u-u-u-c---------';
	$str = $result['products_extra_image'];
	$str = strtolower($str); //Deixa todos os caracteres em minúsculos 
	$texto = str_replace(explode('-', $car_a), explode('-', $car_s), $str);//Percorre o texto trocando as letras
	$name = str_replace(" ", "-", $texto);//Retira os espaços
	tep_db_query('UPDATE products_extra_images SET products_extra_image="'.$name.'" WHERE products_extra_images_id='.$result['products_extra_images_id']);
	//rename("images/produtos/".$result['products_extra_image'], "images/produtos/".$name);
	echo $name."</br>";
}
*/
?>