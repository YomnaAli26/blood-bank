<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends DashboardController
{
    public function __construct(Role $role)
    {
        $this->repository = $role;
        $this->storeRequestClass = new StoreRoleRequest();
        $this->updateRequestClass = new UpdateRoleRequest();
        $this->indexView = 'roles.index';
        $this->createView = 'roles.create';
        $this->editView = 'roles.edit';
        $this->successMessage = 'Process success';
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->storeRequestClass->rules());
        $role = $this->repository->create(['name' => $validatedData['name']]);
        $validatedData['permissions'] ??= [];
        $role->syncPermissions($validatedData['permissions']);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate($this->updateRequestClass->rules($id));
        $role = $this->repository->findById($id);
        $role->update(['name' => $validatedData['name']]);
        $validatedData['permissions'] ??= [];
        $role->syncPermissions($validatedData['permissions']);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);
    }

    public function destroy($id)
    {
        $role = $this->repository->findById($id);
        $role->syncPermissions([]);
        $role->delete();
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);

    }

}
