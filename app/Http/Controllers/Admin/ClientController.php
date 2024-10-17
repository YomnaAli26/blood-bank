<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use http\Env\Request;
use Illuminate\Http\JsonResponse;


class ClientController extends DashboardController
{
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->repositoryInterface = $clientRepository;
        $this->indexView = 'clients.index';
        $this->successMessage = 'Process success';
    }

    public function index()
    {
        $data = $this->repositoryInterface->filter(request()->all());
        return view("{$this->baseFolder}{$this->indexView}", compact('data'));
    }

    public function toggleStatus($id): JsonResponse
    {
        $client = $this->repositoryInterface->find($id);
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
