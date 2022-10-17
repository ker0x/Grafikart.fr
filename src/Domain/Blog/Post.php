<?php

namespace App\Domain\Blog;

use App\Domain\Application\Entity\Content;
use App\Domain\Blog\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ORM\Table(name: 'blocg_post')]
class Post extends Content
{
    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'posts')]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?Category $category = null;

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function hasVideo(): bool
    {
        if (null !== $this->getContent()) {
            return 1 === preg_match('/^[^\s]*youtube.com/mi', $this->getContent());
        }

        return false;
    }
}
