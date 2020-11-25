<?php
// api/src/Entity/Quote.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A book.
 *
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"book"}})
 */
class Quote
{
    /**
     * @var int The id of this book.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The content of this book.
     *
     * @ORM\Column(type="text")
     * @Groups({"book"})
     */
    public $content;
    
    /**
     * @var Quote The book this review is about.
     *
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="quotes")
     * @Groups({"book"})
     */
    public $author;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}