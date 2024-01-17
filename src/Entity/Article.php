<?php

namespace App\Entity;


use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Repository\UserRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetRepository;

#[TargetRepository(name: ArticleRepository::class)]
#[Table(name: "articles")]
class Article
{
    private int $id;
    private string $title;
    private string $content;

    private int $user_id;

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

    public function getAuthor(): User
    {
        $userRepository = new UserRepository();
        return $userRepository->find($this->user_id);
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }


    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setAuthor(User $user)
    {
        $this->user_id = $user->getId();
    }

}