<?php

namespace App\Services;

use App\Models\Client;
use App\Notifications\DonationRequestNotification;
use App\Repositories\Interfaces\DonationRequestRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


class DonationRequestService
{
    public function __construct(public DonationRequestRepositoryInterface $donationRequestRepository)
    {
    }

    public function getRequests($filters = [],$relations = [])
    {

        return $this->donationRequestRepository->filter($filters,$relations)->paginate(3);
    }

    public function showRequest($id)
    {
        return $this->donationRequestRepository->find($id);

    }

    public function storeRequest($donationRequest)
    {
        $donationRequest = $donationRequest->user()->donationRequests()->create($donationRequest->validated());
        $clients = Client::whereHas('governorates', function ($query) use ($donationRequest) {
            $query->where('governorate_id', $donationRequest->city->governorate_id);
        })->whereHas('bloodTypes', function ($query) use ($donationRequest) {
            $query->where('blood_type_id', $donationRequest->bloodType->id);
        })->get();
        $clientsIds = $clients->pluck('id')->toArray();
        if (count($clientsIds)) {
            DB::beginTransaction();
            try {
                $notification = $donationRequest->notifications()->create([
                    'title' => 'يوجد حالة تبرع قريبة منك.',
                    'content' => $donationRequest->bloodType->name . ' اريد متبرع لفصيلة دم',
                ]);
                $notification->clients()->attach($clientsIds);

                Notification::send($clients, new DonationRequestNotification($donationRequest));
                DB::commit();
                return [
                    'status' => true,
                    'data' => $donationRequest,
                ];

            } catch (\Exception $exception) {
                DB::rollBack();
                return [
                    'status' => false,
                    'message' => $exception->getMessage(),
                ];
            }


        }
        return [
            'status' => true,
            'data' => $donationRequest,
        ];

    }

}
