<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="test")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/get", name="get")
     */
    public function getIndex()
    {
        $answers = $this->getDoctrine()->getRepository(Answer::class)->getAnswer();


        return new JsonResponse($answers);
    }



    /**
     * @Route("/save", name="save")
     */
    public function save()
    {
        $em = $this->getDoctrine()->getManager();
        $q = new Question();
        $a = new Answer();
        $a->setWording("Reponse5");

        $a1 = new Answer();
        $a1->setWording("Reponse525");


        $q->setWording("Question 5.5 ?");
        $q->addAnswer($a);
        $q->addAnswer($a1);

        $em->persist($q);
        $em->flush();

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
