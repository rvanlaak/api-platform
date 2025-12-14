<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\PatchGreeting;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(
    mercure: true,
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Patch(
            map: true,
            write: true,
            input: PatchGreeting::class
        ),
    ],
)]
#[ORM\Entity]
class Greeting
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME)]
    public string $id;

    /**
     * A nice person
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name = '';

    public function __construct()
    {
        $this->id = Uuid::v7();
    }
}
