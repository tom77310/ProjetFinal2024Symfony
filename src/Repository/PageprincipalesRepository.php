<?php

namespace App\Repository;

use App\Entity\Pageprincipales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pageprincipales>
 *
 * @method Pageprincipales|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pageprincipales|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pageprincipales[]    findAll()
 * @method Pageprincipales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageprincipalesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pageprincipales::class);
    }

//    /**
//     * @return Pageprincipales[] Returns an array of Pageprincipales objects
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

//    public function findOneBySomeField($value): ?Pageprincipales
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
