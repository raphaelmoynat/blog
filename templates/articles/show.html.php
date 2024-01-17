

<div class="border border-primary rounded mb-5 p-2 ">
    <h3><?= $article->getTitle() ?></h3>
    <p class="fs-5"><?= $article->getContent() ?></p>
    <p class="fs-5 mt-5">Auteur : <?= $article->getAuthor()->getUsername() ?></p>

    <a href="?type=article&action=edit&id=<?= $article->getId() ?>" class="btn btn-secondary">Modifier</a>
    <a href="?type=article&action=delete&id=<?= $article->getId() ?>" class="btn btn-warning">Supprimer</a>
    <a href="?type=article&action=index" class="btn btn-primary">Retour</a>



</div>


    <?php foreach ($article->getComments() as $comment): ?>
<div class="border border-warning rounded mb-3 p-1">
        <h6 class="fs-5"><strong><?= $comment->getContent() ?></strong></h6>
        <p class="fs-5 mt-5">Auteur : <?= $comment->getAuthor()->getUsername() ?></p>

        <a href="?type=comment&action=delete&id=<?= $comment->getId() ?>" class="btn btn-danger">Supprimer</a>
        <a href="?type=comment&action=update&id=<?= $comment->getId() ?>" class="btn btn-warning">Editer</a>

</div>
    <?php endforeach; ?>


<div>
    <form action="?type=comment&action=create" method="post" class="mt-5">

        <div>
            <input class="form-control" type="text" name="content" placeholder="ecrire un commentaire">
        </div>
        <input type="hidden" name="articleId" value="<?= $article->getId() ?>">
        <div class="mt-4">
            <button type="submit" class="btn btn-success">Commenter</button>
        </div>

    </form>
</div>




