<?php
// TousArticles.php
echo '<div class="container mt-5 text-center">';
include (APP_ROOT."/views/header.php");
echo'<div class="touschapitres">';
echo '<h1 class="mb-4">Tous les Chapitres</h1>';
echo '<p class="text-center">';
echo 'Bienvenue sur le roman en ligne du célèbre auteur Jean Forteroche, billet simple pour l\'Alaska. Vous pouvez lire les derniers chapitres ici en cliquant sur leur titre ou sur lire la suite. N\'hésitez pas à laisser des commentaires pour nous dire ce que vous en avez pensé. De nouveaux chapitres seront publiés régulièrement. Bonne lecture !';
echo '</p>';
echo '</div>';
while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="card mb-4">';
    echo '<div class="card-body">';
    echo '<h2 class="card-title"><a href="router.php?action=articleUnique&titre=' . $row['titre'] . '">' . $row['titre'] . '</a></h2>';
    echo '<p class="card-text">' . $row['extrait'] . '</p>';
    echo ' <a href="router.php?action=articleUnique&titre=' . urlencode($row['titre']) . '">[Lire la suite]</a></p>';
    echo '</div>';
    echo '</div>';
}
include (APP_ROOT."/views/footer.php");
echo '</div>';
?>