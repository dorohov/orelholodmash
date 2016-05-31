<?
// Страница
?>


<div class="col-lg-9 _cb__left-col">
	
	<div class="{class}">
		
		<?
			if($param['company_id']['id']) {
				$link = $this->FE->CMS->genLink($param['company_id'], 'company', true, true);
				?>
				<div class="_azbn_company_title_in_header" ><a href="<?=$link;?>" ><?=$param['company_id']['title'];?></a></div>
				<?
			}
			?>
		
		<div class="heading-block ">
			
			<h1 class="heading-site"><?=$param['item_id']['title'];?></h1>
			
		</div>
		
		<?=$param['item_id']['main_info'];?>
		
	</div>
	
</div>

<div class="col-lg-3 _cb__right-col">
	<?
	//$param['mdl']['main/site-banner']='main/site-banner';
	//$this->FE->Viewer->module('main/site-banner', $param);
	$this->FE->Viewer->view_banner(array(
		'view_at'=>1,
		'tpl'=>'banner/right-col',
		'limit'=>4,
		'cache_time'=>3600,
		'order_by'=>'rating',
	),$param);
	?>
</div>