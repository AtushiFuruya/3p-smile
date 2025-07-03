window.onload = function(){
var dateObj = new Date();
var y = dateObj.getFullYear();
var m = dateObj.getMonth() + 1;
var d = dateObj.getDate();
var yb = "日月火水木金土".charAt(dateObj.getDay());
document.getElementById("currentDate").innerHTML = y+"年"+m+"月"+d+"日("+yb+")";
}