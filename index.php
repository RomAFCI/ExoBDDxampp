<!-- BDD CONNECT -->
<?php
$host = 'localhost';
$dbname = 'rpg';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

    // Active les erreurs PDO en exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";

    //REQUETES SQL
    $sql = "SELECT arme.nom AS `nomArme`, surnom, degat
    FROM `arme`
    INNER JOIN `personnage` ON arme.idArme = personnage.idArmeUtilise";


    //PREPARATION + EXECUTION
    $req = $pdo->prepare($sql);
    $req->execute();

    //REPONSE - EXPLOITATION DES DONNEES
    $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
    // PDO::FETCH_ASSOC évite les données en doublon
    var_dump($resultats);

    //correction avec un SELECT * personnage
    foreach ($resultats as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo $key2 . " : " . $value2;
            echo "<br>";
        }
    }
    foreach ($resultats as $key => $value) {
        echo $value["surnom"] . " est en possesion de l'arme " . $value["nomArme"] . " qui inflige " . $value["degat"] . " de dégats ";
        echo "<br>";
        echo "<br>";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

?>




//CORRECTION

// Manière 1

foreach ($results as $key => $value) {
echo 'idPersonnage : ' . $value['idPersonnage'] . '<br>';
echo 'nom : ' . $value['nom'] . '<br>';
echo 'surnom : ' . $value['surnom'] . '<br>';
echo 'level : ' . $value['level'] . '<br>';
echo 'idArmeUtilise : ' . $value['idArmeUtilise'] . '<br>';
echo 'idClasse : ' . $value['idClasse'] . '<br>';

// foreach ($value as $key2 => $value2) {
// echo $key2 . " : " . $value2;
// echo '<br>';
// }
echo "<br>";
echo "<br>";
}


// Manière 2

// foreach ($results as $key => $value) {
// foreach ($value as $key2 => $value2) {
// echo $key2 . " : " . $value2;
// echo '<br>';
// }

// echo "<br>";
// echo "<br>";
// }