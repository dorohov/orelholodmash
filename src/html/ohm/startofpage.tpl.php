<?
// CMS Azbn.ru Публичная версия

?><!DOCTYPE html>
<html dir="ltr" lang="ru-RU"> 
<head>

<meta charset="utf-8">	
<title><?=$param['page_html']['seo']['title'].' - '.$this->fe_config['enginetitle'];?></title>
<meta name="revisit" content="20" />
<meta name="document-state" content="Dynamic" />
<meta name="resource-type" content="document" />
<meta name="generator" content="CMS Azbn.ru <?=$this->FE->version['number'];?>" />
<meta HTTP-EQUIV="Cache-Control" content="no-cache" />
<meta name="Copyright" content="Александр Зыбин" lang="ru" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?=$param['page_html']['seo']['desc'];?>" />
<meta name="keywords" content="<?=$param['page_html']['seo']['kw'];?>" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta HTTP-EQUIV="Cache-Control" content="no-cache" />

<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
<link type="image/x-icon" href="/favicon.ico" rel="icon" />

<link href="/css/site.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="/js/jquery.min.js" ></script>

<script src="/js/bootstrap.min.js" ></script>
<script src="/js/jquery.bootstrap-autohidingnavbar.min.js" ></script>
<script src="/js/storage.js" ></script>
<script src="/js/device.min.js" ></script>

<script src="/js/jquery-plugin/jquery.jqfeShowMoreBtn.js" ></script>

<script src="/js/jquery.jqfeInfoMsg.js"></script>
<script src="/js/ohm_cmsAPI.js"></script>

<script>
$(document).ready(function() {
	
	//cmsAPI.call({service:'online',method:'check',callback:'CheckOnline'});
	
	//cmsAPI.UI.OnReady.GetBrowserName();
	//cmsAPI.UI.OnReady.FancyboxConfig();
	//cmsAPI.UI.OnReady.FTSearchFilterOnClick();
	//cmsAPI.UI.OnReady.FaqSessionControl();
	//cmsAPI.UI.OnReady.FeedbackSessionControl();
	//cmsAPI.UI.OnReady.LiveEditInit();
	//cmsAPI.UI.OnReady.PageHashOnChange();
	
	//$("body").eq(0).jqfeProgressBarPage({});
	
	$(function(){
		
		var msg = $('body').attr('data-msg') || '';
		if(msg != '') {
			$('body').jqfeInfoMsg({html:msg,showtime:5000});
		}
		
	});
	
	$('.azbn-jqfeShowMoreBtn-btn')
		.jqfeShowMoreBtn({
			container:'.azbn-jqfeShowMoreBtn-container',
			items:'.azbn-jqfeShowMoreBtn-item',
			display:'block',
			count:5,
			css_hidden:{
				opacity:0,
			},
			css_visible:{
				opacity:1,
			},
			animation_time:700,
		})
		.trigger('click')
	;
	
	$('.azbn-api-call-ohm-orderconsult').on('submit', function(event){
		event.preventDefault();
		
		var f = $(this);
		
		var order = {
			name : f.find('input[name="name"]').val(),
			org : f.find('input[name="org"]').val(),
			phone : f.find('input[name="phone"]').val(),
			product : f.find('input[name="product"]').val(),
		};
		
		cmsAPI.callbacks.AfterOrderConsult = function(resp) {
			
			if(resp.response.result.item == 1) {
				f.closest('#modal-form-cons').find('button.close').trigger('click');
			} else {
				
			}
			
			$('body').jqfeInfoMsg({html:resp.info.info_msg,showtime:5000});
			
		};
		
		//cmsAPI.call(order);
		cmsAPI.call({
			service : 'ohm',
			method : 'orderconsult',
			callback : 'AfterOrderConsult',
			name : order.name,
			org : order.org,
			phone : order.phone,
			product : order.product,
		});
		
	});
	
	$('.azbn-api-call-ohm-orderproduct').on('submit', function(event){
		event.preventDefault();
		
		var f = $(this);
		
		var order = {
			product_id : f.find('input[name="product_id"]').val(),
			product_title : f.find('input[name="product_title"]').val(),
			name : f.find('input[name="name"]').val(),
			org : f.find('input[name="org"]').val(),
			phone : f.find('input[name="phone"]').val(),
			position : f.find('input[name="position"]').val(),
			comment : f.find('input[name="comment"]').val(),
		};
		
		cmsAPI.callbacks.AfterOrderProduct = function(resp) {
			
			if(resp.response.result.item == 1) {
				f.closest('#modal-form-bay').find('button.close').trigger('click');
			} else {
				
			}
			
			$('body').jqfeInfoMsg({html:resp.info.info_msg,showtime:5000});
			
		};
		
		//cmsAPI.call(order);
		cmsAPI.call({
			service : 'ohm',
			method : 'orderproduct',
			callback : 'AfterOrderProduct',
			product_id : order.product_id,
			product_title : order.product_title,
			name : order.name,
			org : order.org,
			phone : order.phone,
			position : order.position,
			comment : order.comment,
		});
		
	});
	
});
</script>



<script src="/js/document-ready.js" ></script>

<?
$this->FE->PluginMng->event('viewer:head:after', $param);
?>

</head>
<body class="" data-msg="<?=$_SESSION['tmp']['msg'];?>" >
<?
unset($_SESSION['tmp']['msg']);
?>

<?=$this->FE->config['metrika_counter'];?>

<?
//$param['mdl']['page_header']='admin/menu_entityitem_list';
$this->FE->Viewer->module_live('page_header',$param);
?>