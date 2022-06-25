<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\UserController;
use App\Controller\UserFullNameAction;
use App\Repository\UserRepository;
use App\User\FullNameDto;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
   collectionOperations: [
      'get',
      'createUser' => [
         'method' => 'post',
         'path' => '/user/add',
         'controller' => UserController::class
      ],
      'fullName' => [
         'method' => 'post',
         'path' => '/user/full-name',
         'input' => FullNameDto::class,
         'controller' => UserFullNameAction::class
      ],
      'auth' => [
         'method' => 'post',
         'path' => 'users/auth',
      ]
   ],
   itemOperations: ['get', 'delete'],
   denormalizationContext: ['groups' => ['user:write']],
   normalizationContext: ['groups' => ['user:read']]
)]
class User implements PasswordAuthenticatedUserInterface, UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['user:read'])]
    private string $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['user:read', 'user:write'])]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['user:read', 'user:write'])]
    private string $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array{
         return ['ROLE_USER'];
    }

    public function getSalt(){
    }

    public function eraseCredentials(){
    }

    public function getUsername():string {
      return $this->getEmail();
    }

}
