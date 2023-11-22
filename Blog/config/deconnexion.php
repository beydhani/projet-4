<!-- deconnexion.php -->
<!-- Fichier pour déconnecter les utilisateurs et l'auteur -->
<?php
// On reprends la session
session_start(); 
// On assigne un tableau vide a SESSION pour effacer les données
$_SESSION = array();
// On vérfie si la session utilise des cookies
if (ini_get("session.use_cookies")) {
    // On récupère les paramètres du cookie
    $params = session_get_cookie_params();
    // On définit l'heure d'expiration du cookie à une heure dans le passé ce qui le rend invalide
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// On détruit la session
session_destroy();
// On redirige vers la page d'acceuil
header('Location: /Blog/'); 
exit;
?>