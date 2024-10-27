<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Repositories\Interfaces\ContactRepositoryInterface;


class ContactController extends DashboardController
{
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->repository = $contactRepository;
        $this->indexView = 'contact-us.index';

        $this->successMessage = 'Process success';
    }
    public function index()
    {
        $data = $this->repository->filter(request()->all());
        if (request()->ajax())
        {
            $html = view("{$this->baseFolder}contact-us.table", compact('data'));
            return response()->json(['html' => $html]);
        }
        return view("{$this->baseFolder}{$this->indexView}", compact('data'));
    }

}
