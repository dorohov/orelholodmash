<?
$uniq = $this->FE->randstr(12);
$ufpath = $param['attach_file']['element']['upload_path'].'/files';
?>

<script>

$(document).ready(function() {
	
	$('#fe-attach-somefileuploader-<?=$uniq;?>-files').jqfeDropUploader3({
		action:'/admin/upload/file/?path=<?=$ufpath;?>',
		name:'uploading_file',
		callback:function(file,response,counter){
			
			$('#attach-<?=$uniq;?>').val(response);
			
		}
	});
	
});
</script>

<div class="form-group">

<div class="row">
	
	<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11" >
		
		
			<label for="seo" >Прикрепленный файл</label>
			<input class="form-control" name="param[attach]" id="attach-<?=$uniq;?>" value="<?=$param['upload_file']['element']['value'];?>" />
		
	</div>
	
	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" >
		
			<label for="seo" >&nbsp;</label>
			<a href="#fe-attach-somefileuploader-<?=$uniq;?>" id="fe-attach-somefileuploader-<?=$uniq;?>-files" class="btn btn-primary btn-sm " ><img class="icon" src="/img/cms.azbn.ru/add.png" /></a>
		
	</div>
	
</div>

</div>