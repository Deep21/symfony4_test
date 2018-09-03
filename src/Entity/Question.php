<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 21/08/18
 * Time: 23:53
 */

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="questions")
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    private $wording;

    /**
     * @var Collection|Answer[] $users
     * @ORM\OneToMany(targetEntity=Answer::class, cascade={"persist", "remove"}, mappedBy="question")
     */
    protected $answers;

    /**
     * Question constructor.
     */
    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getAnswers() : Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer)
    {
        $this->answers->add($answer);
        $answer->setQuestion($this);
    }

    /**
     * @return mixed
     */
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * @param mixed $wording
     */
    public function setWording($wording): void
    {
        $this->wording = $wording;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
            }
        }

        return $this;
    }
}