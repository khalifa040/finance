$(document).ready(function(){
	
	
	 $("#create").click(function(){
	 ran = Math.floor(Math.random() * 100) + 1;
	 ran1 = ran+Math.random()
	 seed = ran.toString(16);
	 
		$.post("createwallet.php",
		{
			seed : seed
		},
		function(data,status){
			$("#a").html(data);
			// alert(data+" "+status)
		}
		)
     });
	 
	 

});