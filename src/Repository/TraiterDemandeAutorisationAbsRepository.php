<?php

namespace App\Repository;

use App\Entity\TraiterDemandeAutorisationAbs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TraiterDemandeAutorisationAbs|null find($id, $lockMode = null, $lockVersion = null)
 * @method TraiterDemandeAutorisationAbs|null findOneBy(array $criteria, array $orderBy = null)
 * @method TraiterDemandeAutorisationAbs[]    findAll()
 * @method TraiterDemandeAutorisationAbs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraiterDemandeAutorisationAbsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TraiterDemandeAutorisationAbs::class);
    }

    // /**
    //  * @return TraiterDemandeAutorisationAbs[] Returns an array of TraiterDemandeAutorisationAbs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TraiterDemandeAutorisationAbs
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
