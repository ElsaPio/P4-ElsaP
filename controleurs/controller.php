<?php

require_once('./modeles/PostManager.php');
require_once('./modeles/CommentManager.php');
require_once('./modeles/LoginManager.php');


function listPosts()
{
    $postManager = new PostManager(); //Création Objet
    $posts = $postManager->getPosts();

    require('vues/homeview.php');
}

function listAllPosts()
{
    $postManager = new PostManager(); //Création Objet
    $allposts = $postManager->getAllPosts();

    require('vues/allpostsview.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    
    require('./vues/articleview.php');
}


function listPostsAdmin()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $allposts = $postManager->getAllPosts();
    $allcomments = $commentManager->getAllComments();

    require('vues/adminHome.php');
}


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }    
    else {
        header('Location: /index.php?action=post&id=' . $postId);
        exit;
    }
}

function suppComment($id)
{
    $commentManager = new CommentManager();

    $delete = $commentManager->deleteComment($id);
    echo "<script>alert(\"Commentaire effacé\");
        document.location.href = '/index.php?action=listPostsAdmin'</script>";
}

function signalementComment($id)
{
    $postManager = new PostManager();

    $post = $postManager->getPost($_GET['postid']);

    $commentManager = new CommentManager();

    $affectedLines = $commentManager->signalComment($id);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible de signaler supprimer le commentaire !');
    }    
    else {
        // Redirection vers l'article 
        header('Location: /index.php?action=post&id=' . $post['id']);
        exit;
    }
}

function unsignalementComment($id)
{

    $commentManager = new CommentManager();

    $affectedLines = $commentManager->unsignalComment($id);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible de désignaler le commentaire !');
    }    
    else {
        // Redirection vers l'article 
        header('Location: /index.php?action=listPostsAdmin');
        exit;
    }
}

function viewBiography()
{
    require('vues/biographie.php');
}

function viewAddArticle()
{
    require('vues/newarticleview.php');
}

function addArticle($title, $content)
{
    $postManager = new PostManager();

    $affectedLines = $postManager->postArticle($title, $content);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le billet !');
    }    
    else {
        header('Location: /index.php?action=listPostsAdmin');
        exit;
    }
}

function viewEditArticle($id)
{
    $postManager = new PostManager();

    $post = $postManager->getPost($_GET['id']);

    require('vues/editarticleview.php');
}

function editArticle($title, $content, $id)
{
    $postManager = new PostManager();

    $affectedLines = $postManager->editArticle($title, $content, $id);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'éditer le billet !');
    }    
    else {
        header('Location: /index.php?action=listPostsAdmin');
        exit;
    }
}

function suppArticle($id)
{
    $postManager = new PostManager();

    $delete = $postManager->deleteArticle($id);
    echo "<script>alert(\"Article effacé\");
        document.location.href = '/index.php?action=listPostsAdmin'</script>";
}

function viewAddUser()
{
    require('vues/inscriptionview.php');
}

function addUser($username, $password)
{
    $loginManager = new LoginManager();

    $affectedLines = $loginManager->registerUser($username, $password);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        echo "<script>alert(\"Inscription impossible ! Le pseudo que vous tentez de prendre est peut-être déjà utilisé....\");
        document.location.href = '/index.php?action=newUser'</script>";
        
    }    
    else {
        echo "<script>alert(\"Vous êtes maintenant inscrit ! Veuillez vous connecter.\");
        document.location.href = '/index.php?action=connexion'</script>";
    }
}

function viewConnexion()
{
    require('vues/connexionview.php');
}

function connexion($username, $passwordform)
{
    $loginManager = new LoginManager();
    $login = $loginManager->sessionUser($username);
    $user = $login->fetch(PDO::FETCH_OBJ);

    if (!$user) { //Si rien dans $user = infos non récupérées dans BDD donc user n'existe pas 
        echo "<script>alert(\"Pseudo incorrect\");
        document.location.href = '/index.php?action=connexion'</script>";
    }
    else { //Si infos dans $login = user existe -> vérifier mot de passe 
        $mdp = $user->password;
        $validPassword = password_verify($passwordform, $mdp);

        
        if($validPassword) { //Si $validPassword est TRUE, la connexion est réussie

         // commencer session
        $_SESSION['username'] = $username;
        $_SESSION['iduser'] = $user->id;
        $_SESSION['typeuser'] = $user->FKtype_user;

        echo "<script>alert(\"Vous êtes connecté !\");
           document.location.href = '/index.php'</script>";
        }

        else { //Si $validPassword est FALSE, le password_verify a échoué

            echo "<script>alert(\"Mot de passe incorrect\");
            document.location.href = '/index.php?action=connexion'</script>";
        }
    }
    
}

function deconnexion()
{
    $_SESSION = array();
    session_destroy();
    header('Location: /index.php?action=connexion');
    exit;
}
