<html>
	<head>
		<?php require_once('head.php') ?> 
		<title>Envie seu Email</title>
	</head>
	<body>
		<div class="fcol-12" style="height: 100vh;width: 100%;overflow: hidden;">
			<div class="fcol-12 center wrap send sendFilesAnimation" id="sendFilesAnimation">
				<h2 class="fcol-12 centerH centerText" style="color:#4b4b4b;">Por favor envie seu arquivo com os emails.</h2>
				<form action="seeEmails.php" method="post" id="sendFilesForm" class="flex center wrap" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" -->
					<input type="file" name="fileToUpload" id="fileToUpload" required style="padding:10px;"/>
					<button value="Enviar" id="sendFiles" class="sendFiles" onclick="sendInput('sendFilesAnimation')">Processar</button>
				</form>
			</div>
		</div>
		<script>
			var form = document.getElementById("sendFilesForm"), button = document.getElementById("sendFiles");
			sendFilesForm.onsubmit = function() {
				return false;
			}
			
			function sendInput(hi){
				var cantSend = document.forms["sendFilesForm"]["fileToUpload"].value;
				if (cantSend == '') {
					alert("Adicione um arquivo");
					return;
				}
				if ( document.getElementById(hi).classList.contains('sendFilesAnimation'))
                	document.getElementById(hi).classList.add('sendingFiles');
					document.getElementById(hi).classList.remove('sendFilesAnimation');
				setTimeout(function() {
				form.submit();
				}, 800);
				return false;
			}
		</script>
		<?php require_once('footer.php') ?> 
	</body>
</html>
