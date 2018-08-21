<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 21/08/18
 * Time: 23:54
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answers")
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $wording;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answers")
     */
    protected $question;

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param Question $question
     */
    public function setQuestion(Question $question): void
    {
        $this->question = $question;
    }


}