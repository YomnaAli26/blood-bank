<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\BloodTypeRepositoryInterface;

class BaseRepository
{
    public function __construct(protected $model)
    {}

    public function all()
    {
        return $this->model->latest()->paginate(10);
    }

    public function create(array $data)
    {
        return $this->model->create($data);

    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $modelObject = $this->find($id);
        if ($modelObject) {
            $modelObject->update($data);
            $modelObject->refresh();
        }
        return $modelObject;
    }

    public function delete($id)
    {
        return $this->find($id)->delete();

    }
}
