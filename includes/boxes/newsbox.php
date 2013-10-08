<div class="box" id="noticias">
<div class="lay_bordaBox"><span>Notícias de Casa</span></div>
<div class="boxconteudo">
<?php
/*
$news_select = tep_db_query("select UID FROM news");
if(mysql_num_rows($news_select)>0){

$news_query = tep_db_query("SELECT title, body, UID, link FROM news limit 0,3");
$news_result = tep_db_fetch_array($news_query);
$news_num_rows = tep_db_num_rows($news_query);
$show = '';
for($cont =0; $cont <$news_num_rows; $cont++){
$show .= '<p align="left" style="border-bottom:1px dashed #CCC; padding-bottom:3px;">
			<span style="font-family:Tahoma; font-size:12px; color:#333;font-weight:bold;">&raquo; <a href="'.tep_href_link('news.php','idnot='.$news_result['UID']).'" target="_top" style="color:#A11099">'.$news_result['title'].'</a></span><br />
			<span style="font-family:Tahoma, Geneva, sans-serif; font-size:11px; color:#333;line-height:18px;"><a href="'.$news_result['link'].'" target="_blank">'.substr($news_result['body'],0,100).'...</a></span><br /><a href="'.$news_result['link'].'" target="_top" style="color:#5F255A">Ler mais =></a><br /><br />
</p>';	
$news_result = tep_db_fetch_array($news_query);
}
echo $show;
 }*/
 ?>
 <?php
$url = 'http://www.mudominhacasa.com.br/blog/feed/';
$xml = simplexml_load_file($url);

if($xml !== false){
  echo '<ol>';
    foreach($xml->channel->item as $node){
  printf('<li><a href="%s">%s</a></li>', $node->link, utf8_decode($node->title));
}
echo '</ol>';
}
?>
</div>
</div>
