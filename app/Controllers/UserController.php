<?php

namespace Maw11Jbm\Controllers;

class UserController
{
    public function index(): false|string
    {
        return 'Hello';
    }

    /**
     * @param array<string> $params
     * @return string
     */
    public function show(array $params): string
    {
        $userId = filter_var($params['id'], FILTER_VALIDATE_INT);
        if ($userId === false) {
            return 'Invalid user ID';
        }

        return "Showing user profile for ID: {$userId}";
    }
}
