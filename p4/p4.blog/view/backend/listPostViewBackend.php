<?php 

if(isset($_SESSION["identifiant"]) && isset($_SESSION["mdp"])){ //on vérifie que l'on a bien les id et mdp pour acceder à l'interface d'admin
    echo $_SESSION["user"];
    echo "<br>" .$_SESSION["mdp"];
    $title = "Admin mon blog"; 

 ob_start(); ?>
 
    <h1>Administration super blog</h1>
    
    <div id="readpost"><i class="fas fa-book-open"></i>Lire les posts</div>
    <div id="createpost"><a href="index.php?action=createPostView"><i class="fas fa-plus-circle"></i>Créer un post </a></div>
    <div id="updatepost"><i class="fas fa-edit"></i>Modifier un post</div>
    <div id="deletepost"><i class="fas fa-trash-alt"></i>Supprimer un post</div>

    <?php
        while($data = $posts->fetch()) //récupération de $posts passé en paramètres dans le index.php qui viens lui même du model.php
        {
    ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                <em>le <?= $data['creation_date_fr'] ?></em>
            </h3>
                    
            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Vue détaillée</a></em>
            </p>
        </div>
    <?php
    }
    $posts->closeCursor();

    $content = ob_get_clean();

 require("templateBackend.php"); 

/*Ce code fait 3 choses :

    Il définit le titre de la page dans $title. Celui-ci sera intégré dans la balise <title> dans le template.

    Il définit le contenu de la page dans $content. Il sera intégré dans la balise <body> du template.
    Comme ce contenu est un peu gros, on utilise une astuce pour le mettre dans une variable. On appelle 
    la fonction ob_start() (ligne 3) qui "mémorise" toute la sortie HTML qui suit, puis, à la fin, on récupère 
    le contenu généré avec ob_get_clean()  (ligne 28) et on met le tout dans $content .

    Enfin, il appelle le template avec un require. Celui-ci va récupérer les variables $title et $content qu'on vient de créer... pour afficher la page !
*/
}
?>