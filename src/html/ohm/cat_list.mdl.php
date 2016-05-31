<?
/* Пустой файл модуля. НЕ УДАЛЯТЬ! */
$cat_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_productcat']."` WHERE visible='1' AND (parent='0') ORDER BY title");
?>

<div class="_icb__navbar">
	<div class="panel-group" id="accordion">
		
		<?
		if(mysql_num_rows($cat_list)) {
			while($cat=mysql_fetch_array($cat_list)) {
				$subcat_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_productcat']."` WHERE visible='1' AND (parent='{$cat['id']}') ORDER BY title");
				
				if(mysql_num_rows($subcat_list)) {
		?>
		
		<div class="panel _icb__navbar-item">
			<div class="_icb__navbar-link">
				<a data-toggle="collapse" data-parent="#accordion" href="#<?=$cat['url'];?>"> 
					<?=$cat['title'];?>
					<span class="caret"></span>
				</a>
			</div>
			<div id="<?=$cat['url'];?>" class="panel-collapse collapse">
				<div class="_icb__navbar-inner">
					<ul>
						<?
						while($subcat=mysql_fetch_array($subcat_list)) {
						$link = $this->FE->CMS->genLink($subcat, 'productcat', true, true);
						?>
						
						<li><a href="<?=$link;?>"><?=$subcat['title'];?></a></li>
						
						<?
						}
						mysql_data_seek($subcat_list, 0);
						?>
					</ul> 
				</div>
			</div>
		</div>
		
		<?
				} else {
		$link = $this->FE->CMS->genLink($cat, 'productcat', true, true);
		?>
		
		<div class="panel _icb__navbar-item">
			<div class="_icb__navbar-link">
				<a href="<?=$link;?>">
				<?=$cat['title'];?>
				</a>
			</div>
		</div>
		
		<?
				}
			}
			mysql_data_seek($cat_list, 0);
		}
		?>
		
	</div>
</div>