<?php 
    /** 
     * Affichage de la partie admin : liste des commentaires d'un article avec un bouton "supprimer" pour chacun. 
     */
?>

<h2>liste des commentaires pour l'article "<?= $article->getTitle() ?>"</h2>

<div class="comments">
    <?php 
        if (empty($comments)) {
            echo '<p class="info">Aucun commentaire pour cet article.</p>';
        } else {
            echo '<ul>';
            foreach ($comments as $comment) {
                echo '<li>';
                echo '  <div class="detailComment">';
                echo '      <h3 class="info">Le ' . Utils::convertDateToFrenchFormat($comment->getDateCreation()) . ", " . $comment->getPseudo() . ' a écrit :</h3>';
                echo '      <p class="content">' . Utils::format($comment->getContent()) . '</p>';
                echo '  </div>';
                echo '</li>';
            }               
            echo '</ul>';
        } 
    ?>
<?php
include "views/templates/_parts/admin_menu.php";
?>