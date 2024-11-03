<?php

namespace App\Repositories\Interfaces;
interface BaseInterface
{
    public function all();
    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);
    public function with($relations);

}
