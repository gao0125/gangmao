/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function showLayer(url){
    console.log(url);
    $("#product_layer_iframe").attr('src', url);
    console.log(  $("#product_layer_iframe").attr('src'));
    $("#product_layer_iframe").attr('height',document.documentElement.clientHeight-(document.documentElement.clientHeight/8));
    $("#product_layer_iframe").attr('width',document.documentElement.clientWidth-(document.documentElement.clientWidth/5));
    $("#product_layer").show();
    $("#maskLayer").css({  height:document.documentElement.clientWidth });
    $("#maskLayer").show();
     
}
function hiddenLayer(){
    $("#product_layer").hide();
    $("#maskLayer").hide();     
}