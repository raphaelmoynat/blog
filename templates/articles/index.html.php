<h1>Les articles</h1>

<?php foreach ($articles as $article): ?>

<div class="border border-primary rounded mb-3 p-2">
    <h3><?= $article->getTitle() ?></h3>
    <p class="fs-5"><?= $article->getContent() ?></p>
    <p class="fs-5 mt-5">Auteur : <?= $article->getAuthor()->getUsername() ?></p>
    <a href="?type=article&action=show&id=<?= $article->getId() ?>" class="btn btn-primary">Voir</a>
    <a href="?type=article&action=edit&id=<?= $article->getId() ?>" class="btn btn-secondary">Modifier</a>
    <a href="?type=article&action=delete&id=<?= $article->getId() ?>&userid=<?=$article->getUserId()?>" class="btn btn-warning">Supprimer</a>


</div>

<?php endforeach; ?>

<a href="?type=article&action=create" class="btn btn-success mt-5">Ajouter un article</a>
