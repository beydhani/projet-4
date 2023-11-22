
<?php 
if (isset($commentaires) && $commentaires->rowCount() > 0) {

    echo '<div class="commentaires-container mt-5 text-center">';
    echo '<h3>Commentaires</h3>';
    echo ('<div>
    Les commentaires sont triés par ordre descendant de nombres de signalements.
    Cliquez sur le bouton pour supprimer le commentaire signalé.
    </div>');
    // Boucle sur les commentaires et les affiche
    while ($commentaire = $commentaires->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<p class="card-text">' . htmlspecialchars($commentaire['contenu']) . '</p>';
        echo '<footer class="blockquote-footer">Par ' . htmlspecialchars($commentaire['nom_utilisateur']) . ' le ' . htmlspecialchars($commentaire['date_publication']) . 'signalé '. ($commentaire['signalé']) . ' fois' .'</footer>';

        // Ajoute un bouton de suppression si le commentaire a été signalé
        if ($commentaire['signalé'] > 0) {
            echo '<form method="post" action="router.php?action=supprimerCommentaire">';
            echo '<input type="hidden" name="id_commentaire" value="' . $commentaire['id'] . '">';
            echo '<button type="submit" class="btn btn-danger btn-sm">Supprimer</button>';
            echo '</form>';
        }
        echo '</div>'; 
        echo '</div>'; 
    }
    
    echo '</div>'; 
} else {
    echo '<p class="text-center">Aucun commentaire pour cet article.</p>';
}
?>