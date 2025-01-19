<?php

namespace app\Domain\User\Services;

use app\Domain\User\Model\UserModel;
use vendor\Interfaces\ResponseInterface;
use vendor\Response\Response;

/*
 * Извините, что нарушил принцип DRY и DI в этом классе. Можно через конструкт внедрить модель пользователей,
 * но имеет ли это смысл для такого маленького приложения?
 */
class UserService
{
    public function getAll() : ResponseInterface
    {
        $usersModel = new UserModel();
        return new Response($usersModel->all());
    }

    public function getById(int $id) : ResponseInterface
    {
        $usersModel = new UserModel();
        return new Response($usersModel->getBy($id, 'id'));
    }
}