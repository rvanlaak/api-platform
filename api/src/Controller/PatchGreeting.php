<?php

namespace App\Controller;

use App\Entity\Greeting;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[Map(target: Greeting::class)]
class PatchGreeting {
    public function __construct(
        public string $name,
    ) {}
}
