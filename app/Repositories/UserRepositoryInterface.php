<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Odarich
 */
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function all($columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = ['*']);

    public function findWhere($conditions);
}