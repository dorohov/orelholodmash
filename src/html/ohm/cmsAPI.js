/*
Прослойка для работы с API CMS
*/

var cmsAPI={

config:{
	api_url:'/api/call/',
	app_key:'public',
	service:'online',
	method:'check',
	div_result_id:'#cmsAPIResult',
	browser:'unknown',
	},

call:function(params) {
	params.app_key=this.config.app_key;
	
	$.ajax({
		url: this.config.api_url,
		type: 'POST',
		dataType: 'json',
		data: params,
		success: function(resp) {
			cmsAPI.callbacks[resp.req.callback](resp);
			//$('body').jqfeInfoMsg({html:resp.info.info_msg,showtime:5000});
			}
		});
	},

UI:{
	
	/*
	addItem2LinkingCardsList:function(id,img,title) {
		//$('body').jqfeInfoMsg({html:'',showtime:3000});
		},
	*/
	
},

callbacks:{
	
	CheckOnline:function(resp) {
		
		},
	
	ShowEntityList:function(resp) {
		var div = $(cmsAPI.config.div_result_id);
		div.html('');
		
		for(var i=0; i<resp.response.item_list.length; i++) {
			var item=resp.response.item_list[i];
			
			$('<div/>',{
				id:resp.req.prefix+'-'+resp.req.type+'-item-'+item.id,
				html:item.name
				}).appendTo(div);
			
			}
		
		},
	
	LiveEditCallback:function(resp) {
		
		},
		
},

}