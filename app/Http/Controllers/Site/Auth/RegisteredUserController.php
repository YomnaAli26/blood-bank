<?php

namespace App\Http\Controllers\Site\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Governorate;
use App\Repositories\Interfaces\BloodTypeRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\GovernorateRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function __construct(public GovernorateRepositoryInterface $governorateRepository,
    public BloodTypeRepositoryInterface $bloodTypeRepository,
    )
    {
    }

    public function create(): View
    {
        $governorates = $this->governorateRepository->all();
        $bloodTypes = $this->bloodTypeRepository->all();
        return view('site.auth.register',get_defined_vars());
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        $user = Client::create($request->validated());

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('site.home', absolute: false));
    }
}
