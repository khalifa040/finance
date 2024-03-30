window.onload = function (){
setInterval(
function data(){
  var amount = Math.floor(Math.random()*9999);
  var sender = Math.random()*9999999;
  var sender = sender.replace (".", "");

var time = new Date();
var time = time.toDateString();

document.getElementById('amount').innerHTML = amount.toLocaleString();
document.getElementById('sender').innerHTML = "dsc" +sender;
document.getElementById('time').innerHTML =  time;
if(amount>10000){
 alert("Sender : " + sender + " Amount : "+ amount);
}
},100);
}
