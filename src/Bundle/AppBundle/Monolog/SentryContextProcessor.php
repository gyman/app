<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Monolog;

use Gyman\Domain\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class SentryContextProcessor
{
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function processRecord($record)
    {
        $token = $this->tokenStorage->getToken();

        if (null !== $token) {
            $user = $token->getUser();
            if ($user instanceof UserInterface) {
                $record['context']['user'] = [
//                    'name' => $user->getName(),
                    'username' => $user->getUsername(),
                    'email'    => $user->getEmail(),
                ];
            }
        }

        // Add various tags
        $record['context']['tags'] = ['key' => 'value'];

        // Add various generic context
        $record['extra']['key'] = 'value';

        return $record;
    }
}
