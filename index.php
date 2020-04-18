<?php
	Session_start();
	if(!isset($_SESSION["loginid"]))
	{
		header("Location: login.html");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>

		function ajaxForInMessage(sendbyid)
		{
			console.log(sendbyid);
			var reqInMsg;
			reqInMsg= new XMLHttpRequest();
			reqInMsg.onreadystatechange= function(){
				if(reqInMsg.readyState == 4) {
					var content=document.getElementById('in');
					content.innerHTML=reqInMsg.responseText;
				}
			}
			var user="<?php echo $_SESSION['loginid'] ?>";
			var sendById=sendbyid;
			
			var qu="?user="+user;
			qu+="&sendById="+sendById;
			
			reqInMsg.open("GET","getInboxMessage.php"+qu,true);
			reqInMsg.send(null);
		}

		function ajaxForInbox()
		{
			var reqIN;
			reqIN= new XMLHttpRequest();
			reqIN.onreadystatechange= function(){
				if(reqIN.readyState == 4) {
					var con=document.getElementById('in');
					con.innerHTML=reqIN.responseText;
				}
			}
			var user="<?php echo $_SESSION['loginid'] ?>";
			var qu="?user="+user;
			reqIN.open("GET","getInbox.php"+qu,true);
			reqIN.send(null);
		}
		
	</script>
	<script>
		$(document).ready(function(){
  			$("#compose").click(function(){
    		$("#in").css("display","none");
    		$("#com").css("display","block");
    		$("#com").load(" #com > *");
  			});
  			
  			$("#inbox").click(function(){
			$("#com").css("display","none");
    		$("#in").css("display","block");
    		ajaxForInbox();
  			});
		});
	</script>
	<script>
		function ajaxFunc()
		{
			var req;
			req= new XMLHttpRequest();
			req.onreadystatechange= function() {
				if(req.readyState == 4) {
					//var dis=document.getElementById('com');
					//dis.innerHTML=dis;
					document.getElementById('com_result').innerHTML=req.responseText;
					
				}
			}
			var email=document.getElementById('emailid').value;
			var msg=document.getElementById('message').value;
			var from= "<?php echo $_SESSION['loginid'] ?>";
			var query="?email="+email;
			query+="&msg="+msg;
			query+="&from="+from;
			req.open("GET","sendEmail.php"+query,true);
			req.send(null);	
			
		}
		
	</script>
	<style type="text/css">
		.wrapper{
			display: grid;
			height: 100vh;
			position: auto;
			/*grid-template-columns:1fr 1fr;*/
			/*grid-template-rows: 0.6fr 2fr 0.4fr;*/
			grid-template-rows: 20% 70% 10%;
			/*grid-gap:1em;*/
		}
		.wrapper > div {
			background: #eee;
			padding: 1em;

		}
		.wrapper >div:nth-child(odd){
			background: #ddd;

		}
		.bodyIn{
			display: grid;
			grid-template-columns: 0.3fr 2fr;
			grid-gap:1em;
			height: 100%;	
			
		}
		.bodyIn >div {
			
			background :#bbb;
			padding:1em;

		}
		#in
		{

			overflow: scroll;
		}
		#com
		{
			display: none;
		}
	</style>
</head>
<body onload="ajaxForInbox()">
	<div class="wrapper">
		<div>
			
			<?php 
				echo "<p> Hello ".$_SESSION["name"]."</p>";
			?>
			
			<a href="logout.php">logout</a>
		</div>
		<div class="bodyIn">
			<div>
				<p><button id="inbox" class="w3-button w3-block w3-teal" value="easy">Inbox</button></p>
				<p><button id="compose" class="w3-button w3-block w3-teal">Compose</button></p>
				<p><button id="sent" class="w3-button w3-block w3-teal">Sent</button></p>
			</div>
			<div id="in">
			
			</div>
			<div id="com">
				Compose email:
				<form>
				Email id : <input type="text" id="emailid" /> <br/>
				Message : <br/> <textarea id="message" rows="4" cols="50"> </textarea> <br/>
				<input type="button" onclick="ajaxFunc()" value="Sent">
				</form>
				<p id="com_result"></p>
			</div>
		</div>

		<div>
			footr :
		</div>
	</div>

</body>
</html>