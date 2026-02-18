<?php 
    /** 
     * Affichage de la partie admin : liste des commentaires d'un article avec un bouton "supprimer" pour chacun. 
     */
?>

<h2>liste des commentaires pour l'article "<?= $article->getTitle() ?>"</h2>

<div class="monitoringArticle">
    <div class="monitoringHead">
        <div class="title">Commentaire</div>
        <div class="content">Auteur</div>
        <div class="content">Date de création</div>
        <div class="content"></div>
    </div>
    <?php 
        if(empty($comments)) {?>
            <div class="monitoringLine"><div class="full">Aucun commentaire trouvé.</div></div>
        <?php
        }else{
            $i = 0;
            foreach ($comments as $comment) {
                    ?>
                <div class="monitoringLine<?= $i%2 === 1 ? ' light' : '' ?>">
                    <div class="title"><?= Utils::format($comment->getContent()) ?></div>
                    <div class="content"><?= $comment->getPseudo() ?></div>
                    <div class="content"><?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?></div>
                    <div class="content"><a class="submit" href="index.php?action=deleteComment&id=<?= $comment->getId() ?>&id_article=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce commentaire ?") ?>>Supprimer</a></div>
                </div>
            <?php
            $i++; 
            }
        
    } 
    ?>
</div>
<?php
include "views/templates/_parts/admin_menu.php";
?>