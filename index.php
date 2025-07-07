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
    

    //EXECUTION
    $req = $pdo->prepare($sql);
    $req->execute();
    $resultats = $req->fetchAll();

    //EXPLOITATION
    var_dump($resultats);
    foreach ($resultats as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo $value2;
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