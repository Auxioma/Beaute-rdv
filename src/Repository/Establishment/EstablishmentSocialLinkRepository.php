<?php

namespace App\Repository\Establishment;

use App\Entity\Establishment\EstablishmentSocialLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstablishmentSocialLink>
 */class EstablishmentSocialLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstablishmentSocialLink::class);
    }
}