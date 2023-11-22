<?php
// On vérifie que l'utilisateur soit connecté.
if (isset($_SESSION['id_utilisateur'])):
?>

<div class="container mt-4">
    <h2>Laissez un commentaire</h2>
    <form action="router.php?action=ecrireCommentaire" method="post">
        <input type="hidden" name="id_article" value="<?php echo $id_article; ?>"> 
        <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['id_utilisateur']; ?>">
        
        <div class="form-group">
            <label for="contenu">Votre commentaire :</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="3" required></textarea>
        </div>    
        <button type="submit" class="btn btn-primary">Envoyer le commentaire</button>
        <?php 
        // On affiche les messages
        if (isset($_SESSION['flash_messages'])) {
            if (isset($_SESSION['flash_messages']['success'])) {
                echo '<div class="alert alert-success">' . $_SESSION['flash_messages']['success'] . '</div>';
                unset($_SESSION['flash_messages']['success']);
            }
            if (isset($_SESSION['flash_messages']['error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['flash_messages']['error'] . '</div>';
                unset($_SESSION['flash_messages']['error']);
            }

            if (empty($_SESSION['flash_messages'])) {
                unset($_SESSION['flash_messages']);
            }
        }
        ?>
    </form>
</div>

<?php else: ?>
<p style="color:red;">Vous devez être connecté pour écrire un commentaire.</p>
<?php endif; ?>
