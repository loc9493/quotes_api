<?php
// api/src/Entity/Author.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * A review of a book.
 *
 * @ORM\Entity
 */
class Author
{
    /**
     * @var int The id of this review.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string the body of the review.
     *
     * @ORM\Column(type="string")
     * @Groups({"book"})
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