<html>
	<head>
		<?php require_once('head.php') ?> 
		<title>Salve seu Email</title>
    </head>
    <?php
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Desculpa, seu arquivo é muito grande para processarmos.";
        }else{
            if ($_FILES['fileToUpload'] != NULL){
                // Input
                $email = file_get_contents($_FILES['fileToUpload']['tmp_name']);
                
                // Filter
                function multiexplode ($delimiters,$string) {
                    $ready = str_replace($delimiters, $delimiters[0], $string);
                    $launch = explode($delimiters[0], $ready);
                    return  $launch;
                }
                $words = multiexplode(array('&','&&','&&&','&&&&','&&&&&','&&&&&&','&&&&&&&','&&&&&&&&','&&&&&&&&&',' ','  ','   ',), $email);
                $words = array_values(array_diff($words,array("null","")));
                $contwords = count($words);
            }else{
                echo 'Null';
            }
        }
    ?>
	<body>
		<div class="fcol-12 wrap" style="min-height: 100%; overflow-x: hidden;">
			<div class="vcol-6 wrap emails saveFilesAnimation" id="saveFilesAnimation">
				<h2 class="fcol-12 centerH CenterText" style="color:#4b4b4b;">Emails Válidos</h2>
				<div class="fcol-12 centerH">
					<form id="saveFilesForm" class="saveFilesForm" action="save.php" method="post">
						<input type="hidden" name="emailsValidos" id="emailsValidos" value="<?php
                            if (($_FILES["fileToUpload"]["size"] > 500000) != TRUE){
                                // Loop Valid
                                for ($num = 0; $num  != $contwords; $num++){
                                    $email = filter_var($words[$num], FILTER_SANITIZE_EMAIL);
                                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        echo $words[$num].';';
                                    }
                                }
                            }
                        ?>"/>
						<button id="saveFiles" class="saveFiles" onclick="saveInput('saveFilesAnimation')">Salvar</button>
					</form>
				</div>
				<div class="flex wrap">
                    <?php
                        if (($_FILES["fileToUpload"]["size"] > 500000) != TRUE){
                            // Loop Valid
                            for ($num = 0; $num  != $contwords; $num++){
                                $email = filter_var($words[$num], FILTER_SANITIZE_EMAIL);
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    echo '<div>'.$words[$num].'</div>';
                                }
                            }
                        }
                    ?>
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
				<div class="flex wrap">
                    <?php
                        if (($_FILES["fileToUpload"]["size"] > 500000) != TRUE){
                            // Loop Not Valid
                            for ($num = 0; $num  != $contwords; $num++){
                                $email = filter_var($words[$num], FILTER_SANITIZE_EMAIL);
                                if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
                                    echo '<div>'.$words[$num].'</div>';
                                }
                            }
                        }
                    ?>
				</div>
			</div>
		</div>
        <?php require_once('footer.php') ?> 
	</body>
</html>
