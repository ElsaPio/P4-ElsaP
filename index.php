<?php
session_start();
require('./controleurs/controller.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['content'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['content']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'newArticle') {
            viewAddArticle();
        }
        elseif ($_GET['action'] == 'addArticle') {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    addArticle($_POST['title'], $_POST['content']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
        }
        elseif ($_GET['action'] == 'newUser') {
            viewAddUser();
        }
        elseif ($_GET['action'] == 'addUser') {
                if (!empty($_POST['username']) && !empty($_POST['password'])) {
                    addUser($_POST['username'], $_POST['password']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
        }
        elseif ($_GET['action'] == 'connexion') {
            viewConnexion();
        }
        elseif ($_GET['action'] == 'checkconnexion') {
            if(!empty($_POST['username']) && !empty($_POST['password'])) {
                connexion($_POST['username'], $_POST['password']);
            }   
            else {
                //erreur
                throw new Exception('Pseudo ou mot de passe non entré !');
            } 
        }
        elseif ($_GET['action'] == 'deconnexion') {
            deconnexion();
        }
        elseif ($_GET['action'] == 'listPostsAdmin') {
            listPostsAdmin();
        }

    }
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
