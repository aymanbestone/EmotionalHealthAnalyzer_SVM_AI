
<!-- pour login -->
<?php
session_start();
# vérification de l'authentification
$found=0;
require_once('exo13.inc.php');
if( isset($_POST['email']) && isset($_POST['pass'])){

$sql='select * from utilisateur where email=:email and pass=:pass';
$statment=$db->prepare($sql);
$statment->execute([
"email" => $_POST['email'],
"pass" => $_POST['pass']
]);
$utilisateur= $statment->fetch(pdo::FETCH_ASSOC);
//var_dump($utilisateur);
$found=$statment->rowCount();
//var_dump($found);
if($found == 1)
{ 
	 $_SESSION['u']=$utilisateur;
	
	header("location: index.php ") ;             }

   


}


?>

<!-- pour l'inscription -->
<?php
	require_once('exo13.inc.php');
	# vérification des données et création du 
	if(isset($_POST['nom']) && isset($_POST['email']) &&  isset($_POST['pass']) )
	{
		$sql = 'INSERT INTO utilisateur(email, pass, nom, prenom, genre, role, telephone) VALUES( :email, :passe, :nom, :prenom, :genre, :role, :telephone)';
		$statement = $db->prepare($sql);
                                            
	$statement->execute([
		"email"     => $_POST['email'],
        "passe"     => $_POST['pass'],
        "nom"       => $_POST['nom'],
        "prenom"    => "x",
        "genre"     => "x",
        "role"      => "x",
        "telephone" => "x",
	]);
	}	
	

	?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="../css/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form   id="signupForm" action="login.php" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="nom" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pass" placeholder="Password" required="">
					<button id="boutton">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="login.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email"  id="email" placeholder="Email" >
					<input type="password" name="pass" id="pass" placeholder="Password">
					<button>Login</button>
				</form>
			</div>
	</div>
	<div id="ici" class="reponse">inscription reussi !!</div>
	<script>
    var x=document.getElementById('ici');
	var boutton = document.getElementById('boutton');
	x.style.display = 'none';

  



	</script>
</body>
</html>
<!-- partial -->
  
</body>
</html>
