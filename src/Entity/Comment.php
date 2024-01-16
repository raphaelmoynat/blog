<?php

namespace App\Entity;


use App\Repository\CommentRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetEntity;
use Core\Attributes\TargetRepository;

#[TargetRepository(name: CommentRepository::class)]
#[Table(name: "comments")]
class Comment
{
    private int $id;
    private string $content;
    private int $article_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getArticleId(): int
    {
        return $this->article_id;
    }

    public function setArticleId(int $article_id): void
    {
        $this->article_id = $article_id;
    }
}