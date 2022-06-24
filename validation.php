<?php

session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'memoire');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$motdepass = $_POST['motdepass'];
$matricule = $_POST['matricule'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$s = "SELECT * from etudiant where matricule = '$matricule' && motdepass = '$motdepass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num === 1) {
    // $_SESSION['prenom'] = 'wail';
    header('location:home.php');
} else {
    echo "Oups!Matricule ou mot de passe n'est pas correct ";
    header('location:connecter.php');
    
}

?>