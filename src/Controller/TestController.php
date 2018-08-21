<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="test")
     */
    public function index()
    {
        $questions = $this->getDoctrine()->getRepository(Question::class)->findAll();
        foreach ($questions[0]->getAnswers() as $a){
            dump($a);
        }
        $a = $this->getDoctrine()->getRepository(Answer::class)->findAll();
        dump($a[0]->getQuestion());
        exit;
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/test", name="nardinne")
     */
    public function getTest()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
