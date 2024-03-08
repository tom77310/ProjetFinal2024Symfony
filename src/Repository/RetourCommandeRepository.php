<?php

namespace App\Repository;

use App\Entity\RetourCommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RetourCommande>
 *
 * @method RetourCommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method RetourCommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method RetourCommande[]    findAll()
 * @method RetourCommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RetourCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RetourCommande::class);
    }

//    /**
//     * @return RetourCommande[] Returns an array of RetourCommande objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RetourCommande
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
