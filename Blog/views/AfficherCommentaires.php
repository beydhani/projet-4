<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Affichage des commentaires
if (isset($commentaires) && $commentaires->rowCount() > 0) {
    echo '<div class="commentaires-container mt-5">';
    echo '<h3>Commentaires</h3>';
    
    // Boucle sur les commentaires et les affiche
    while ($commentaire = $commentaires->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<p class="card-text">' . htmlspecialchars($commentaire['contenu']) . '</p>';
        echo '<footer class="blockquote-footer">Par ' . htmlspecialchars($commentaire['nom_utilisateur']) . ' le ' . htmlspecialchars($commentaire['date_publication']) . '</footer>';
        
        // Vérifie si l'utilisateur est connecté
        if (isset($_SESSION['nom_utilisateur'])) {
            
            $commentSignalId = 'signal-' . $commentaire['id'];
            
            // Vérifie si le commentaire a déjà été signalé dans la session
            if (!isset($_SESSION['commentaires_signales'][$commentSignalId])) {
                // Affichez le bouton de signalement si le commentaire n'a pas été signalé
                echo '<form method="post" action="router.php?action=signalerCommentaire">';
                echo '<input type="hidden" name="id_commentaire" value="' . $commentaire['id'] . '">';
                echo '<button type="submit" class="btn btn-warning btn-sm">Signaler</button>';
                echo '</form>';
            } else {
                // Informe l'utilisateur que le commentaire a déjà été signalé
                echo '<p class="">Commentaire signalé</p>';
            }
        }

        echo '</div>'; 
        echo '</div>'; 
    }
    
    echo '</div>'; 
} else {
    echo '<p >Aucun commentaire pour cet article.</p>';
}
?>