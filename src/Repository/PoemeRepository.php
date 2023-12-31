<?php

namespace App\Repository;

use App\Entity\Poeme;
use App\Repository\Traits\PaginateTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Poeme>
 *
 * @method Poeme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poeme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poeme[]    findAll()
 * @method Poeme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoemeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poeme::class);
    }

    use PaginateTrait;

    public function searchByTitle(string $title)
    {
        return $this->createQueryBuilder('poeme')
            ->where('poeme.titre LIKE :title')
            ->setParameter('title', '%'.$title.'%')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Poeme[] Returns an array of Poeme objects
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

//    public function findOneBySomeField($value): ?Poeme
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
