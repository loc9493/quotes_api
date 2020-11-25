<?php
// api/src/Entity/Author.php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * A review of a book.
 *
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"author.read"}, "skip_null_values" = false,})
 */
class Author
{
    /**
     * @var int The id of this review.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"quote.read"})
     */
    private $id;

    /**
     * @var string the body of the review.
     *
     * @ORM\Column(type="string")
     * @Groups({"quote.read", "category.read"})
     */
    public $name;

    /**
     * @var Author[] Available reviews for this book.
     *
     * @ORM\OneToMany(targetEntity="Quote", mappedBy="author", cascade={"persist", "remove"})
     */
    public $quotes;

    public function getId(): ?int
    {
        return $this->id;
    }
}