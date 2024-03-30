
$(document).ready(function(){

$(".re").click(function(){
  $(".render").html("<div class='acinfo'><h3>Account Name</h3>processing...<h3>Account Number</h3> processing...</div>")
  setTimeout(function(){$(".acinfo").hide();},6000);
});

});
