<?php
		session_start();
		if($_SERVER["REQUEST_METHOD"]="POST"){
			if(isset($_POST['btnCart'])){
				if(isset($_SESSION["cart"])){

					$myitems=array_column($_SESSION["cart"],'nomProduit');
					if(in_array($_POST["nomProduit"],$myitems)){
						echo "<script>
						alert('Item Already Added');
						window.location.href='index.php';
						</script>";
					}

					else{
					$count=count($_SESSION["cart"]);
					$_SESSION['cart'][$count]=array('nomProduit'=>$_POST['nomProduit'],'prixProduit'=>$_POST['prixProduit'],'Quantity'=>1);
					echo "<script>
						alert('Item  Added');
						window.location.href='index.php';
						</script>";
					}
					
				}else{
					$_SESSION['cart'][0]=array('nomProduit'=>$_POST['nomProduit'],'prixProduit'=>$_POST['prixProduit'],'Quantity'=>1);
					echo "<script>
						alert('Item  Added');
						window.location.href='index.php';
						</script>";
				}
			}
		}






			if(isset($_POST['delete'])){
				foreach($_SESSION['cart'] as $key=>$value){
					if($value["nomProduit"]==$_POST["nomProduit"]){
						unset($_SESSION['cart'][$key]);
						$_SESSION['cart']=array_values($_SESSION['cart']);
						echo "<script>
						alert('Item Removed');
						window.location.href='index.php';
						</script>";
				}
			} 
		}
			?>