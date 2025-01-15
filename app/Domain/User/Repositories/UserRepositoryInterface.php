<?php


interface UserRepositoryInterface
{
    public function getAll() : array;
    public function getById(int $id) : array;
}