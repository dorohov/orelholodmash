<?
// ЦМС
?>

<div class="servicesI-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _srcb__heading-block">
			<h1 class="heading-site big"><?=$param['item_id']['title'];?></h1>
		</div>
		
		<?
		$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' AND cat='4' ORDER BY rating,id");
		if(mysql_num_rows($item_list)) {
		?>
		<ul class="_cs__flex _srcb__nav">
			<?
			while($row = mysql_fetch_array($item_list)) {
				$link = $this->FE->CMS->genLink($row, 'page', true, true);
			?>
				<li class="_cs__col _srcb__nav-col <?if($param['item_id']['id'] == $row['id']){echo 'active';}?> "><a href="<?=$link;?>"><?=$row['title'];?></a></li>
			<?
			}
			mysql_data_seek($item_list,0);
			?>
		</ul>
		<?
		}
		?>
		
		<div class=""> 
			<div class="_srcb__img-right">
				<img src="<?=$param['item_id']['img'];?>" alt="">
			</div>
			
			<?=$param['item_id']['main_info'];?>
			
		</div>
		
	</div>
</div>