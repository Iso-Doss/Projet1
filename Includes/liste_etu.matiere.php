<?php
session_start();
if (empty($_session['pseudo']) && empty($_session['id'])) {
    header('Location:index.php?pg=connexion');
}
?>


<form method="post" action="">
    <table border="3">
        <caption>
            <h1>Liste Etudiants de <?php echo $_post['idfiliere'] ?></h1>
        </caption>

        <tr>
            <td>Id</td>
            <td>Filière</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date de Naissance</td>
            <td>Update_etudiant</td>
            <td>Supprime_etudiant</td>
        </tr>

        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM etudiant');
        while ($donnee = $reponse->fetch()) {
            ?>
            <tr>
                <td><input type="checkbox" name="id[]" value=" <?php $donnee['id'] ?> " ></td>
                <!--td><?php echo$donnee['id'] ?></td-->
                <td><?php echo$donnee['idfiliere'] ?></td>
                <td><?php echo$donnee['nom'] ?></td>
                <td><?php echo$donnee['prenom'] ?></td>
                <td><?php echo$donnee['datenaissance'] ?></td>
                <td><?php
                    $id = $donnee['id'];
                    echo "<a href='index.php?pg=Update_etudiant&id=$id'>Update_etudiant</a>";
                    ?></td>
                <td><?php
                    $id = $donnee['id'];
                    echo "<a href='index.php?pg=Supprime_etudiant&id=$id'>Supprime_etudiant</a>";
                    ?></td>
            </tr>

            <?php
        }
        $reponse->closeCursor();
        ?>

    </table>

    <input type="submit" value="Update_etudiant" name="pg">

    <input type="submit" name="pg" value="Supprime_etudiant">

    <a href="index.php?pg=deconnection">Deconnection</a>
</form>