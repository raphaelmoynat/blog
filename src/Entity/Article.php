<?php

namespace App\Entity;


use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetRepository;

#[TargetRepository(name: ArticleRepository::class)]
#[Table(name: "articles")]
class Article
{
    private int $id;
    private string $title;
    private string $content;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getComments(): array
    {
        $commentRepository = new CommentRepository();
        $comments = $commentRepository->findAllByArticle($this);
        return $comments;
    }
}