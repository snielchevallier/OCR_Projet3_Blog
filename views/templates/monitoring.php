<?php 
    /** 
     * Affichage de la partie monitoring : liste des articles avec le nombre de vues et de commentaires pour chacun. 
     * Et un lien pour voir les commentaires de chaque article.
     */
?>

<h2>Monitoring des articles</h2>

<div class="monitoringArticle">
    <?php
    $sorter=Utils::request("sort", "creation_date");
    $order=Utils::request("order", "desc");
    $pictoOrder="▼";
    if($order === "desc") {
        $neworder = "asc";
        $pictoOrder="▼";
    } else {
        $neworder = "desc";
        $pictoOrder="▲";
    }
    ?>
    <div class="monitoringHead">
        <div class="title"><a href="index.php?action=monitoringArticles&sort=title&order=<?= $neworder ?>"><?= ($sorter==='title') ? $pictoOrder : ''?> Titre</a></div>
        <div class="content"><a href="index.php?action=monitoringArticles&sort=nb_views&order=<?= $neworder ?>"><?= ($sorter==='nb_views') ? $pictoOrder : ''?> Nombre de vues</a></div>
        <div class="content"><a href="index.php?action=monitoringArticles&sort=nb_comments&order=<?= $neworder ?>"><?= ($sorter==='nb_comments') ? $pictoOrder : ''?> Nombre de commentaires</a></div>
        <div class="content"><a href="index.php?action=monitoringArticles&sort=creation_date&order=<?= $neworder ?>"><?= ($sorter==='creation_date') ? $pictoOrder : ''?> Date de création</a></div>
        <div class="content">commentaires</div>
    </div>
            
            <?php 
            if(empty($articles)) {?>
               <div class="monitoringLine"><div class="full">Aucun article trouvé.</div>
            <?php
            }else{
                $i = 0; 
                foreach ($articles as $article) { ?>
                    <div class="monitoringLine<?= $i%2 === 1 ? ' light' : '' ?>">
                        <div class="title"><?= $article->getTitle() ?></div>
                        <div class="content"><?= $article->getViews() ?></div>
                        <div class="content"><?= $comments[$article->getId()] ?? 0 ?></div>
                        <div class="content"><?= $article->getDateCreation()->format("d/m/Y") ?></div>
                        <div class="content"><?php if($comments[$article->getId()] ?? 0 > 0) { ?><a class="submit" href="index.php?action=showCommentsByArticle&id_article=<?= $article->getId() ?>">Voir les commentaires</a><?php } ?></div>
                    </div>
                <?php 
                $i++; 
                }
            } ?>
</div>
<?php
include "views/templates/_parts/admin_menu.php";
?>