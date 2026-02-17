<?php 
    /** 
     * Affichage de la partie monitoring : liste des articles avec le nombre de vues et de commentaires pour chacun. 
     * Et un lien pour voir les commentaires de chaque article.
     */
?>

<h2>Monitoring des articles</h2>

<div class="monitoringArticle">
    <div class="monitoringHead">
        <div class="title">Titre</div>
        <div class="content">Nombre de vues</div>
        <div class="content">Nombre de commentaires</div>
        <div class="content">Date de création</div>
        <div class="content">commentaires</div>
    </div>
    
            <?php 
            $i = 0; 
            foreach ($articles as $article) { ?>
                <div class="monitoringLine<?= $i%2 === 1 ? ' light' : '' ?>">
                    <div class="title"><?= $article->getTitle() ?></div>
                    <div class="content"><?= $article->getViews() ?></div>
                    <div class="content"><?= $comments[$article->getId()] ?? 0 ?></div>
                    <div class="content"><?= $article->getDateCreation()->format("d/m/Y") ?></div>
                    <div class="content"><a class="submit" href="index.php?action=showCommentsByArticle&id=<?= $article->getId() ?>">Voir les commentaires</a></div>
                </div>
            <?php 
            $i++; 
            } ?>
</div>
<?php
include "views/templates/_parts/admin_menu.php";
?>