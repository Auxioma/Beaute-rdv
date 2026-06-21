<?php

namespace App\Repository\Establishment;

use App\Entity\Establishment\EstablishmentOpeningHour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstablishmentOpeningHour>
 */class EstablishmentOpeningHourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstablishmentOpeningHour::class);
    }
}