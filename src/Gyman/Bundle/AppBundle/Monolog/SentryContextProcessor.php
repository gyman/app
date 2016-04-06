<?php
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

        if ($token !== null){
            $user = $token->getUser();
            if ($user instanceof UserInterface) {
                $record['context']['user'] = array(
                    'name' => $user->getName(),
                    'username' => $user->getUsername(),
                    'email' => $user->getEmail(),
                );
            }
        }

        // Add various tags
        $record['context']['tags'] = array('key' => 'value');

        // Add various generic context
        $record['extra']['key'] = 'value';

        return $record;
    }
}