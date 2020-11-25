<?php
// api/src/Entity/Category.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A category.
 *
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"category.read"}, "skip_null_values" = false,})
 */
class Category
{
    /**
     * @var int The id of this book.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @Groups({"quote.read", "category.read"})
     * @ORM\Column(type="integer")
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
     * @var Quote[] Available reviews for this book.
     *
     * @ORM\ManyToMany(targetEntity="Quote", inversedBy="categories")
     * @Groups({"category.read"})
     * @ORM\JoinTable(name="category_quote")
     */
    public $quotes;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}