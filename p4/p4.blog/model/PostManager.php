<?php
//tous les appels ce font directement dans le index.php
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4735685
//require_once("model/ManagerDb.php"); // Appel de la classe ManagerDb.php source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4744941-tirer-parti-de-lheritage#/id/r-4745131

class PostManager  extends ManagerDb 
{ //class qui va regrouper l'ensemble des fonctions utiliser pour les posts (billets)
    //Sélection de tous les posts
    public function getPosts() 
    {
    $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
    $posts = $db->query("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%y à %Hh%imin%ss') as 
            creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0,5");

    return $posts;
    }
    //pour ne sélectionner qu'un post
    public function getPost($postId) 
    {
        $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
    
        return $post;
    }
    public function updatePost($title,$content,$postId) //fonction utilisé pour update un post dans le backend
    {
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        $updatePost = $req->execute(array($title,$content,$postId));
        return $updatePost;
        
    }

    //fonction qui sera utilisé pour créer un post (admin backend)
    public function createPost($title, $content){
        $db= $this->dbConnect(); // conntection avec la base de données
        $req = $db->prepare("INSERT INTO posts(title, content, creation_date) VALUES (:title, :content, NOW())");
        $createPost = $req->execute(array(
            ":title"    => $title,
            ":content"  => $content
        ));
        return $createPost;
    }

    //fonction utilisé pour supprimer un post
}