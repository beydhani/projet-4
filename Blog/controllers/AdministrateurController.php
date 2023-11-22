<?php
// AdministrateurController.php

require_once (APP_ROOT .'/config/database.php');
require (APP_ROOT .'/models/Administrateur.php');

class AdministrateurController {
    private $adminModel;
    // Constructeur
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->adminModel = new Administrateur($db);
    }
    // Méthode pour la connexion de l'administrateur
    public function connecterAdmin($nom_utilisateur, $mot_de_passe) {
        // On vérifie que les données que nous a renvoyé l'user sont pas vides
        if (!empty($nom_utilisateur) && !empty($mot_de_passe)) {
            // On assigne les données à notre modèle.
            $this->adminModel->nom_utilisateur = $nom_utilisateur;
            $this->adminModel->mot_de_passe = $mot_de_passe;
            // Si on utilise la méthode connecter de notre modèle et qu'elle nous retourne true
            if ($this->adminModel->connecter()) {
                // On start une session pour stocker l'admin_id et le nom de l'admin
                session_start();
                $_SESSION['admin_id'] = $this->adminModel->id;
                $_SESSION['admin_nom_utilisateur'] = $this->adminModel->nom_utilisateur;
                // On renvoie vers la page de création d'article Administrateur
                header('Location: /Blog/router.php?action=afficherCreerArticleAdmin');
                // On exit.
                exit;
            } else {
                // Sinon on renvoie vers le formulaire de connexion administrateur et on exit
                header('Location: /Blog/router.php?action=afficherConnexionAdmin');
                exit;
            }
        // Si un petit malin essaye de nous envoyer des données vides.
        } else {
            // On le renvoie vers cette vue.
            header('Location:  /Blog/views/erreurConnexionAdmin.php');
        }
    }
}
?>