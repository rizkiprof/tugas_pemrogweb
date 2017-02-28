<html>
	<head>	
	</head>
	<body>
		<form method="post">
			Masukan NIM Fakultas Saudara (contoh 16908):<br>
			<input type="text" name="NIM">
			<input type="submit" value="CARI">
		</form>
		
		<?php
			if(isset($_POST['NIM'])){
				$xmlDoc=new DOMDocument();
				$xmlDoc->load("dataset.xml");

				$x=$xmlDoc->getElementsByTagName('NIM');

				//get the q parameter from URL
				$q=$_POST["NIM"];
				//lookup all links from the xml file if length of q>0
				if (strlen($q)>0) {
						$OK = 0;
					for($i=0; $i<($x->length); $i++) {
					
						for ($i=0; $i<=$x->length-1; $i++) {
							  //Process only element nodes
							  if ($x->item($i)->nodeType==1) {
									if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
										$y=($x->item($i)->parentNode);
										$OK=1;
									}
							  }
						}
						if($OK){
							$cd=($y->childNodes);

							for ($i=0;$i<$cd->length;$i++) { 
								//Process only element nodes
								if ($cd->item($i)->nodeType==1) {
									echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
									echo($cd->item($i)->childNodes->item(0)->nodeValue);
									echo("<br>");
								}
							}
						}
						else 
							echo "<b>NOT FOUND </b>";
						break;
					}
				}
			}
		?>
	
	</body>
	
</html>