<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 22/08/18
 * Time: 14:25
 */
namespace App\Repository;
use App\Entity\Answer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * @method Answer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Answer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Answer[]    findAll()
 * @method Answer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Answer::class);
    }

    public function getAnswer()
    {
/*        $result = $this
            ->createQueryBuilder('qz')
            ->select('a', 'question')
            ->from(Answer::class, 'a')
            ->join('a.question', 'question')
            ->getQuery()
            ->getResult();*/

        $result = $this->getEntityManager()
            ->createQuery('SELECT a, q FROM App\Entity\Answer a JOIN a.question q')

            ->getArrayResult();
        return $result;
    }


}