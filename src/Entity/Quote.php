<?php
// api/src/Entity/Quote.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A quote.
 * @ApiResource(normalizationContext={"groups"={"quote.read"}, "skip_null_values" = false,})
 * @ORM\Entity
 */
class Quote
{
    /**
     * @var int The id of this quote.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The content of this quote.
     * @Groups({"quote.read", "category.read"})
     * @ORM\Column(type="text")
     */
    public $content;
    
    /**
     * @var Author The book this review is quote.
     *
     * @Groups({"quote.read", "category.read"})
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="quotes")
     */
    public $author;

    /**
     * @var Category[]
     * @Groups({"quote.read"})
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="quotes")
     */
    public $categories;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategories()
    {
        return $this->categories->getValues();
    }
}