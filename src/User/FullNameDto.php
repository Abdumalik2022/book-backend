<?php

declare(strict_types=1);

namespace App\User;

use Symfony\Component\Serializer\Annotation\Groups;

class FullNameDto
{
   public function __construct(
      #[Groups(['user:write', 'user:read'])]
      private $givenName,

      #[Groups(['user:write', 'user:read'])]
      private $surname,

      #[Groups(['user:write', 'user:read'])]
      private $age
   ){}

   /**
    * @return mixed
    */
   public function getGivenName()
   {
      return $this->givenName;
   }

   /**
    * @return mixed
    */
   public function getSurname()
   {
      return $this->surname;
   }

   /**
    * @return mixed
    */
   public function getAge()
   {
      return $this->age;
   }
}