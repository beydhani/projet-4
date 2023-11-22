<?php
// UtilisateurController.php

require_once APP_ROOT.'/models/Utilisateur.php';
require_once APP_ROOT.'/config/database.php';

class UtilisateurController {
    private $utilisateurModel;
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->utilisateurModel = new Utilisateur($db);
    }
    // Méthode pour inscrire un utilisateur
    public function inscrire() {
        // Démarre session
        session_start();
        // Assigne données
        $this->utilisateurModel->nom_utilisateur = $_POST['nom_utilisateur'];
        $this->utilisateurModel->email = $_POST['email'];
        $this->utilisateurModel->mot_de_passe = $_POST['mot_de_passe'];
        // Si l'email existe déjà erreur et retour au formulaire
        if ($this->utilisateurModel->emailExiste()) {
            $_SESSION['error'] = "L'adresse email est déjà utilisée.";
            header('Location: /Blog/router.php?action=afficherInscriptionUser'); 
            return;
        }
        // Si le nom d'utilisateur existe déjà erreur et retour au formulaire
        if ($this->utilisateurModel->nomUtilisateurExiste()) {
            $_SESSION['error'] = "Le nom d'utilisateur est déjà pris.";
            header('Location: /Blog/router.php?action=afficherInscriptionUser');
            return;
        }
        // Si la méthode de modèle retourne true
        if ($this->utilisateurModel->inscrire()) {
            // Message de succès et retour au formulaire
            $_SESSION['success'] = "Vous êtes inscrit. Connecetez vous";
            header('Location: /Blog/router.php?action=afficherConnexionUser'); 
        } else {
            // Sinon message d'erreur et retour au formulaire
            $_SESSION['error'] = "Erreur lors de l'inscription.";
            header('Location: /Blog/router.php?action=afficherInscriptionUser');
        }
    }
    // Méthode pour connecter l'utilisateur
    public function connecter() {
        // On assigne les données reçues aux propriétés
        $this->utilisateurModel->email = $_POST['email'];
        $this->utilisateurModel->mot_de_passe = $_POST['mot_de_passe'];
        // Démarre une session
        session_start();
        // Si la méthode du modèle retourne true
        if ($this->utilisateurModel->connecter()) {
            // On enregistre tout ça avec SESSION
            $_SESSION['success'] = "Vous êtes connecté en tant que ". $this->utilisateurModel->nom_utilisateur;
            $_SESSION['id_utilisateur'] = $this->utilisateurModel->id;
            $_SESSION['nom_utilisateur'] = $this->utilisateurModel->nom_utilisateur;
            // On renvoie vers le blog
            header('Location: /Blog/');
            exit;
        } else {
            // Sinon on met un message d'erreur et on renvoie vers le formulaire de connexion
            $_SESSION['error'] = "Votre e-mail et/ou mot de passe sont incorrects.";
            header('Location: /Blog/router.php?action=afficherConnexionUser');
            exit;
        }
    }
    // Méthode pour afficher le formulaire de connexion
    public function afficherConnexionUser() {
        include APP_ROOT.'/views/FormulaireConnexion.php';
    }
}
?>