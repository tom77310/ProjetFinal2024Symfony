<?php

namespace App\Repository;

use App\Entity\Pagepresentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pagepresentation>
 *
 * @method Pagepresentation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pagepresentation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pagepresentation[]    findAll()
 * @method Pagepresentation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PagepresentationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pagepresentation::class);
    }

//    /**
//     * @return Pagepresentation[] Returns an array of Pagepresentation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Pagepresentation
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
