//用于未来扩展的提示正确错误的JS
//错误提示
$.showErr = function(str,func){
	 if(window.top != window.self) {
		//网页整体宽度
		var pageWidth=$(parent.window).width();
		if($(parent.leftFrame).length>0){
			var leftWidth=$(parent.leftFrame.window).width();
		}else{
			var leftWidth=$(parent.parent.leftFrame.window).width();	
		}
		var left=(pageWidth-247)/2-10-leftWidth;
		
		var pageHeight=$(parent.window).height();;
		var topHeight=150;
		var top=(pageHeight-178)/2-topHeight;
		layer.alert(str, {icon: 2,title :'错误',offset: [top+'px', left+'px']},func);
	}else{
		layer.alert(str, {icon: 2,title :'错误',area:['240px','auto'],scroll:'no'},func);
	}
	
};

$.showErrSon = function(str,func){
	layer.alert(str, {icon: 2,title :'错误'},func);
};


//正确提示
$.showSuccess = function(str,func){
	if (window.top != window.self) {
		//网页整体宽度
		var pageWidth=$(parent.window).width();
		if($(parent.leftFrame).length>0){
			var leftWidth=$(parent.leftFrame.window).width();
		}else{
			var leftWidth=$(parent.parent.leftFrame.window).width();	
		}
		var left=(pageWidth-247)/2-10-leftWidth;
		
		var pageHeight=$(parent.window).height();;
		var topHeight=150;
		var top=(pageHeight-178)/2-topHeight;
		layer.alert(str, {icon: 1,title :'正确',offset: [top+'px', left+'px']},func);
	}else{
		layer.alert(str, {icon: 1,title :'正确'},func);
	}
	
};


$.showSuccessSon = function(str,func){
	layer.alert(str, {icon: 1,title :'正确'},func);
};





//确认提示
$.showConfirm = function(str,func)
{
	if (window.top != window.self) {
		//网页整体宽度
		var pageWidth=$(parent.window).width();
		if($(parent.leftFrame).length>0){
			var leftWidth=$(parent.leftFrame.window).width();
		}else{
			var leftWidth=$(parent.parent.leftFrame.window).width();	
		}
		var left=(pageWidth-247)/2-10-leftWidth;
		
		var pageHeight=$(parent.window).height();;
		var topHeight=80;
		var top=(pageHeight-178)/2-topHeight;
		layer.confirm(str, {icon: 3,title:'提示',offset: [top+'px', left+'px']}, func);
	}else{
		layer.confirm(str, {icon: 3,title:'提示'}, func);
	}
	

};


//加载层
$.showLoad= function(){
	return layer.load(0, {shade: [0.8, '#393D49']});
};

$.closeLoad= function(index){
	layer.close(index);   
};

//审核操作显示的窗体
$.showAuditWindow=function(title,url,area){
	
	if(title==""){
		title="提示";
	}
	
	if(area==""){
		area=['450px', '300px'];
	}
	
	if (window.top != window.self) {
		//网页整体宽度
		$isThree=false;//是否在第三级框架
		if($(parent.leftFrame).length>0){
			var pageWidth=$(window).width();
			var pageHeight=$(window).height();
			var leftWidth=$(parent.leftFrame.window).width();
		}else{
			var pageWidth=$(parent.window).width();
			var pageHeight=$(parent.window).height();
			var leftWidth=$(parent.parent.leftFrame.window).width();	
			isThree=true;
		}
		
		var left=pageWidth/2-parseInt(area[0])/2-(leftWidth+10)/2;
		
		var topHeight=80;
		
		var top=pageHeight/2-parseInt(area[1])/2-topHeight/2-10;
	
		layer.open({
			id:'caozuo',
			type: 2,
			title:title,
			area: area,
			shade: 0,
			offset: [top+'px', left+'px'],
			fix:true, //不固定
			maxmin:true,
			content:url,
			cancel: function(index){ 
				$(".sure").removeAttr("disabled");
			}
		});
	}else{
		layer.open({
			id:'caozuo',
			type: 2,
			title:title,
			area: area,
			//shade: 0,
			fix: true, //不固定
			maxmin: true,
			content: url,
			cancel: function(index){ 
				$(".sure").removeAttr("disabled");
			}
		});	
	}
};

//只显示一个窗体（点击之后当前元素失效无法再点击）
$.showOnlyWindow=function(title,url,area,btnId){
	
	if(title==""){
		title="提示";
	}
	
	if(area==""){
		area=['450px', '300px'];
	}
	
	 /* if (window.top != window.self) {
		  //网页整体宽度
		  $isThree=false;//是否在第三级框架
		  if($(parent.leftFrame).length>0){
			  var pageWidth=$(window).width();
			  var pageHeight=$(window).height();
			  var leftWidth=$(parent.leftFrame.window).width();
		  }else{
			  var pageWidth=$(parent.window).width();
			  var pageHeight=$(parent.window).height();
			  var leftWidth=$(parent.parent.leftFrame.window).width();	
			  isThree=true;
		  }
		  
		  var left=pageWidth/2-parseInt(area[0])/2-(leftWidth+10)/2;
		  
		  var topHeight=80;
		  
		  var top=pageHeight/2-parseInt(area[1])/2-topHeight/2-10;
	  
		  layer.open({
			  id:'caozuo',
			  type: 2,
			  title:title,
			  area: area,
			  shade: 0,
			  offset: [top+'px', left+'px'],
			  fix:true, //不固定
			  maxmin:true,
			  content:url,
			  cancel: function(index){ 
				  //$("#"+btnId).show();
				  $("#"+btnId).fadeIn(500);
			  }
		  });
	  }else{*/
		layer.open({
			 id:'caozuo',
			  type: 2,
			  title:title,
			  area: area,
			  shade: 0,
			  fix:true, //不固定
			  maxmin:true,
			  content:url,
			cancel: function(index){ 
				//$("#"+btnId).show();
				$("#"+btnId).fadeIn(500);
			}
		});	
	//}
};

//编辑窗体
$.showEditWindow=function(title,url,area,btnId){
	if(title==""){
		title="提示";
	}
	
	if(area==""){
		area=['450px', '300px'];
	}
	layer.open({
		 id:'caozuo',
		 type: 2,
		 title:title,
		 area: area,
		 shade: 0.1,
		 fix:true, //不固定
		 maxmin:false,
		 content:url 
	});	
	
};
