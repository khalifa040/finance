$(document).ready(function(){
	
	 $("#username").keyup(function(){
		var username = $("#usernaje").val();
		$.post("checkuserv.php",
		{
			username : $("#username").val()
		},
		function(data,status){
			$("#a").html(data);
			// alert(data+" "+status)
		}
		)
     });
	 
	 $("#kycbtn").click(function(){
		var bvn = $("#bvn").val();
		if(bvn.length < 11)
		{
		alert("invalid bvn")
		}
		else
		{
				$.post("kycr.php",
			{
				bvn : bvn
			},
			function(data,status){
				$("#a").html(data);
			}
			)
		}
	 });

});
