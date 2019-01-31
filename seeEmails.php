<html>
	<head>
		<?php require_once('head.php') ?> 
		<title>Envie seu Email</title>
	</head>
	<body>
		<div class="fcol-12 wrap" style="min-height: 100%;">
			<div class="vcol-6 wrap emails saveFilesAnimation" id="saveFilesAnimation">
				<h2 class="fcol-12 centerH CenterText" style="color:#4b4b4b;">Emails Válidos</h2>
				<div class="fcol-12 centerH">
					<form id="saveFilesForm" class="saveFilesForm" action="save.php" method="post">
						<input type="hidden" id="emailsValidos"/>
						<button id="saveFiles" class="saveFiles" onclick="saveInput('saveFilesAnimation')">Salvar</button>
					</form>
				</div>
				<div class="grid">
					<div>email</div>
					<div>email</div>
					<div>email</div>
					<div>email</div>
					<div>email</div>
				</div>
			</div>
			<script>
				var form = document.getElementById("saveFilesForm"), button = document.getElementById("saveFiles");
				saveFilesForm.onsubmit = function() {
					return false;
				}
				
				function saveInput(ho){
					if ( document.getElementById(ho).classList.contains('saveFilesAnimation'))
						document.getElementById(ho).classList.add('savingFiles');
						document.getElementById(ho).classList.remove('saveFilesAnimation');
					setTimeout(function() {
					form.submit();
					}, 1000);
					return false;
				}
			</script>

			<div class="vcol-6 wrap emails CenterText">
				<h2 class="fcol-12 centerH" style="color:#4b4b4b;">Emails Inválidos</h2>
				<div class="grid">
					<div>email</div>
					<div>email</div>
				</div>
			</div>
		</div>
        <?php require_once('footer.php') ?> 
	</body>
</html>
