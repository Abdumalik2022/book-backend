<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\User\UserFactory;
use App\User\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
   public function __construct(private UserFactory $userFactory, private UserManager $userManager)
   {
   }

   public function __invoke(User $data): void
   {
      $user = $this->userFactory->create($data->getEmail(), $data->getPassword());
      $this->userManager->save($user, true);


      print_r($user);
      exit();
   }
}