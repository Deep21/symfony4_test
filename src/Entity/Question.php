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
    protected $wording;

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
}