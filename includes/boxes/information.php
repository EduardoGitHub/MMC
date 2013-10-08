<div class="box" id="informacao">
<div class="lay_bordaBox"><span>Informações Úteis</span></div>
<div class="boxconteudo">
<ul style="list-style:none; padding:0; margin:0;">
	 <? 
		for($i=0; $i<$numText; $i++){
			if($textosLinks[$i]['local'] == 3 || $textosLinks[$i]['local'] == 1){
				echo '<li>'.tep_image(DIR_WS_IMAGES . 'seta.gif').'&nbsp;&nbsp;<a href="'.tep_href_link(FILENAME_INFORMATION,'cod='.$textosLinks[$i]['id']).'">'.$textosLinks[$i]['text'].'</a></li>';
			}
		}
	 ?>
</ul>    
</div>
</div>