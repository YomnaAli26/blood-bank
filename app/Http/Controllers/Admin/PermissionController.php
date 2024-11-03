<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionController extends DashboardController
{
        public function __construct(Permission $permission)
    {
        $this->repository = $permission;
        $this->indexView = 'permissions.index';
        $this->createView = 'permissions.create';
        $this->editView = 'permissions.edit';
        $this->successMessage = 'Process success';
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:permissions,name'],
        ]);
        $this->repository->create(['name' => $validatedData['name']]);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);
    }
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'unique:permissions,name,' . $id],
        ]);
        $permission = $this->repository->findById($id);
        $permission->update(['name' => $validatedData['name']]);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);
    }

    public function destroy($id)
    {
        $permission = $this->repository->findById($id);
        $permission->delete();
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);
    }

}
