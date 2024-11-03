<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use Illuminate\Http\JsonResponse;


class ClientController extends DashboardController
{
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->repository = $clientRepository;
        $this->storeRequestClass = new StoreClientRequest();
        $this->updateRequestClass = new UpdateClientRequest();
        $this->indexView = 'clients.index';
        $this->createView = 'clients.create';
        $this->editView = 'clients.edit';
        $this->successMessage = 'Process success';
        $this->relations  = ['city','bloodType'];
    }

    public function index()
    {
        $data = $this->repository->filter(request()->all(),$this->relations)->paginate(10);
        return view("{$this->baseFolder}{$this->indexView}", compact('data'));
    }

    public function toggleStatus($id): JsonResponse
    {
        $client = $this->repository->find($id);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        $client->update(['is_active' => !$client->is_active]);

        return response()->json([
            'message' => 'Status updated successfully',
            'is_active' => $client->is_active,
        ]);
    }

}
