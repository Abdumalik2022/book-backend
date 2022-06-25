<?php

declare(strict_types=1);

namespace App\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
   public function __construct(private EntityManagerInterface $entityManager)
   {
   }

   public function save(User $user, bool $isNeedFlush = false) {
      $this->entityManager->persist($user);

      if ($isNeedFlush) {
         $this->entityManager->flush();
      }
   }
}