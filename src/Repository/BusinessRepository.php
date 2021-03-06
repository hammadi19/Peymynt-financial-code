<?php

namespace App\Repository;

use App\Entity\Business;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Business|null find($id, $lockMode = null, $lockVersion = null)
 * @method Business|null findOneBy(array $criteria, array $orderBy = null)
 * @method Business[]    findAll()
 * @method Business[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Business::class);
    }


    public function findBusinessByUser($user){
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery('SELECT b FROM App\Entity\Business b WHERE b.user = :user')->setParameter('user', $user);
        return $query->execute();
    }

//    /**
//     * @return Business[] Returns an array of Business objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Business
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
