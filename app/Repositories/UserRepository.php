<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Odarych
 */
namespace App\Repositories;

use App\Models\Eloquent\User;

class UserRepository implements UserRepositoryInterface {

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all($columns = array('*')) {
        return $this->model->all();
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update(array $data, $id) {
        $record = $this->find($id);
        return $record->update($data);
    }

    public function delete($id) {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = ['*']) {
        return $this->model->findOrFail($id);
    }

    public function findWhere($conditions) {
        return $this->model->where($conditions)->first();
    }
}