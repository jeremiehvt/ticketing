<?php

namespace App\Repository;

use App\Entity\TycketsType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TycketsType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TycketsType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TycketsType[]    findAll()
 * @method TycketsType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TycketsTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TycketsType::class);
    }

//    /**
//     * @return TycketsType[] Returns an array of TycketsType objects
//     */
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
    public function findOneBySomeField($value): ?TycketsType
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
