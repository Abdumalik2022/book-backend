<?php

declare(strict_types=1);

namespace App\Controller;

use App\User\FullNameDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class UserFullNameAction extends AbstractController
{
   public function __invoke(Request $request, SerializerInterface $serializer): FullNameDto
   {
      return $serializer->deserialize($request->getContent(), FullNameDto::class, 'json');
   }
}