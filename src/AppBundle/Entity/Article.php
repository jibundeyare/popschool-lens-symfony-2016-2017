<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Auteur;
use AppBundle\Entity\Tag;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 1,
     *      max = 255
     * )
     * @ORM\Column()
     */
    private $titre;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(type="text")
     */
    private $corps;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $publication;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $publie;

    /**
     * @var Auteur
     *
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Auteur", inversedBy="articles")
     * @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     */
    private $auteur;

    /**
     * @var ArrayCollection
     *
     * @Assert\Count(
     *      min = 0,
     *      max = 3
     * )
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
     * @ORM\JoinTable()
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->publication = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set corps
     *
     * @param string $corps
     *
     * @return Article
     */
    public function setCorps($corps)
    {
        $this->corps = $corps;

        return $this;
    }

    /**
     * Get corps
     *
     * @return string
     */
    public function getCorps()
    {
        return $this->corps;
    }

    /**
     * Set publication
     *
     * @param \DateTime $publication
     *
     * @return Article
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \DateTime
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set publie
     *
     * @param boolean $publie
     *
     * @return Article
     */
    public function setPublie($publie)
    {
        $this->publie = $publie;

        return $this;
    }

    /**
     * Get publie
     *
     * @return boolean
     */
    public function getPublie()
    {
        return $this->publie;
    }

    /**
     * Set auteur
     *
     * @param Auteur $auteur cette variable contient un auteur
     *
     * @return Article
     */
    public function setAuteur(Auteur $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return Auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Add tag
     *
     * @param Tag $tag
     *
     * @return Article
     */
    public function addTag(Tag $tag)
    {
        $this->tags->add($tag);

        return $this;
    }

    /**
     * Remove tag
     *
     * @param Tag $tag
     *
     * @return Article
     */
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * Get tags
     *
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set tags
     *
     * @param ArrayCollection $tags cette liste doit contenir des objets de type Tag
     *
     * @return Article
     */
    public function setTags(ArrayCollection $tags)
    {
        $this->tags = $tags;

        return $this;
    }
}
