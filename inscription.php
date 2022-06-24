<?php

session_start();
if (isset($_SESSION['nom'])) {
    header("Location: connecter.php");
}

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'memoire');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$motdepass = $_POST['motdepass'];
$matricule = $_POST['matricule'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$cmotdepass = $_POST['cmotdepass'];


        $s = "SELECT * from etudiant where matricule = '$matricule'";

        $result = mysqli_query($con, $s);

        $num = mysqli_num_rows($result);

    if($motdepass == $cmotdepass){

        if ($num === 1) {

            echo "Oups!Matricule deja existe ";

        } else {

            // $reg = "insert into etudiant(nom, motdepass) values ('$nom', '$motdepass')";
            $reg = "insert into etudiant(nom, prenom, motdepass, matricule, email, tel) values ('$nom', '$prenom', '$motdepass','$matricule','$email','$tel')";
            mysqli_query($con, $reg);
            echo "Enregistrement de l'utilisateur terminer";
            header("Location: connecter.php");

        }
    } else {
        echo "Le mot de passe ne correspond pas.";
    }
?>
