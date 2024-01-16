<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Comment;
use Core\Attributes\TargetEntity;

#[TargetEntity(name: Comment::class)]
class CommentRepository extends \Core\Repository\Repository
{
    public function findAllByArticle(Article $article)
    {
        $query = $this->pdo->prepare("SELECT * FROM $this->tableName WHERE article_id = :article_id");
        $query->execute([
            "article_id"=>$article->getId()
        ]);
        $comments = $query->fetchAll(\PDO::FETCH_CLASS,get_class(new $this->targetEntity()));

        return $comments;

    }

    public function save(Comment $comment):object
    {
        $query = $this->pdo->prepare("INSERT INTO $this->tableName SET content = :content, article_id = :article_id");
        $query->execute([
            "content"=>$comment->getContent(),
            "article_id"=>$comment->getArticleId()
        ]);

        return $this->find($this->pdo->lastInsertId());
    }

    public function edit(object $comment):object
    {
        $query = $this->pdo->prepare("UPDATE $this->tableName SET content = :content WHERE id = :id");
        $query->execute([
            "content"=>$comment->getContent(),
            "id"=>$comment->getId()
        ]);

        return $this->find($comment->getId());
    }
}