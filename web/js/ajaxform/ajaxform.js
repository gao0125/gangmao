$(document).ready(function(){
	load_ajax_form();
	load_ajax_a();
	load_son_ajax_form();
	load_son_son_ajax_form();
});
function load_ajax_form(){
	
	$(".ajax_form").bind("submit",function(){
		var fromLoad =$.showLoad();
		var ajaxurl = $(this).attr("action");
		var query = $(this).serialize() ;
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			cache:false, 
			success: function(ajaxobj){
				$.closeLoad(fromLoad); 
				if(ajaxobj.status==1){
					if(ajaxobj.info!=""){
						$.showSuccess(ajaxobj.info,function(index){
							layer.close(index);
							if(ajaxobj.url!=""){
								location.href = ajaxobj.url;
							}
						});	
						
					}else{
						if(ajaxobj.url!=""){
							location.href = ajaxobj.url;
						}
					}
				}else{
					if(ajaxobj.info!=""){
						if(ajaxobj.__hash__){
							$("input[name='__hash__']").val(ajaxobj.__hash__);
							$("meta[name='__hash__']").attr('content',ajaxobj.__hash__);
							if(isExitsFunction("fleshVerify")){
								fleshVerify();
							}
						}
						$.showErr(ajaxobj.info,function(index){
							layer.close(index);
							
							
							if(ajaxobj.url!=""){
								location.href = ajaxobj.url;
							}
						});	
					}else{
						if(ajaxobj.url!=""){
							location.href = ajaxobj.url;
						}
					}							
				}
			},
			error:function(ajaxobj)
			{
				$.closeLoad(fromLoad); 
				if(ajaxobj.responseText!='')
				alert(ajaxobj.responseText);
			}
		});
		return false;
	});
}

function load_son_ajax_form(){
	
	$(".son_ajax_form").bind("submit",function(){
		var fromLoad =$.showLoad();
		var ajaxurl = $(this).attr("action");
		var query = $(this).serialize() ;
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			cache:false, 
			success: function(ajaxobj){
				$.closeLoad(fromLoad); 
				if(ajaxobj.status==1){
					$.showSuccessSon(ajaxobj.info,function(index){
						layer.close(index);
						$(window.parent.document).find(".die").trigger("click");
					});	
				}else{
					if(ajaxobj.info!=""){
						if(ajaxobj.__hash__){
							$("input[name='__hash__']").val(ajaxobj.__hash__);
							$("meta[name='__hash__']").attr('content',ajaxobj.__hash__);
							if(isExitsFunction("fleshVerify")){
								fleshVerify();
							}
						}
						$.showErrSon(ajaxobj.info,function(index){
							layer.close(index);
						});	
					}else{
						if(ajaxobj.url!=""){
							parent.location.href = ajaxobj.url;
						}
					}							
				}
			},
			error:function(ajaxobj)
			{
				$.closeLoad(fromLoad); 
				if(ajaxobj.responseText!='')
				alert(ajaxobj.responseText);
			}
		});
		return false;
	});
}


function load_son_son_ajax_form(){
	
	$(".son_son_ajax_form").bind("submit",function(){
		var fromLoad =$.showLoad();
		var ajaxurl = $(this).attr("action");
		var query = $(this).serialize() ;
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			cache:false, 
			success: function(ajaxobj){
				$.closeLoad(fromLoad); 
				if(ajaxobj.status==1){
					$.showSuccessSon(ajaxobj.info,function(index){
						layer.close(index);
						$(window.parent.document).find(".die").trigger("click");
					});	
				}else{
					if(ajaxobj.info!=""){
						if(ajaxobj.__hash__){
							$("input[name='__hash__']").val(ajaxobj.__hash__);
							$("meta[name='__hash__']").attr('content',ajaxobj.__hash__);
							if(isExitsFunction("fleshVerify")){
								fleshVerify();
							}
						}
						$.showErrSon(ajaxobj.info,function(index){
							layer.close(index);
						});	
					}else{
						if(ajaxobj.url!=""){
							//parent.location.href = ajaxobj.url;
						}
					}							
				}
			},
			error:function(ajaxobj)
			{
				$.closeLoad(fromLoad); 
				if(ajaxobj.responseText!='')
				alert(ajaxobj.responseText);
			}
		});
		return false;
	});
}



function load_ajax_a(){
	$(".ajax_a").bind("click",function(){
		var fromLoad =$.showLoad();
		var ajaxurl = $(this).attr("href");
		//var query = $(this).serialize() ;
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			type: "GET",
			cache:false, 
			success: function(ajaxobj){
				$.closeLoad(fromLoad); 
				if(ajaxobj.status==1){
					if(ajaxobj.info!=""){
						$.showSuccess(ajaxobj.info,function(index){
							layer.close(index);
							if(ajaxobj.url!=""){
								window.location.href = ajaxobj.url;
							}
						});	
						
					}else{
						if(ajaxobj.url!=""){
							window.location.href = ajaxobj.url;
						}
					}
				}else{
					if(ajaxobj.info!=""){
						if(ajaxobj.__hash__){
							$("input[name='__hash__']").val(ajaxobj.__hash__);
							$("meta[name='__hash__']").attr('content',ajaxobj.__hash__);
						}
						$.showErr(ajaxobj.info,function(index){
							layer.close(index);
							if(ajaxobj.url!=""){
								window.location.href = ajaxobj.url;
							}
						});	
					}else{
						if(ajaxobj.url!=""){
							window.location.href = ajaxobj.url;
						}
					}							
				}
			},
			error:function(ajaxobj)
			{
				$.closeLoad(fromLoad); 		
				if(ajaxobj.responseText!='')
				alert(ajaxobj.responseText);
			}
		});
		return false;
	});
}
function isExitsFunction(funcName) {
    try {
        if (typeof(eval(funcName)) == "function") {
            return true;
        }
    } catch(e) {}
    return false;
}	


