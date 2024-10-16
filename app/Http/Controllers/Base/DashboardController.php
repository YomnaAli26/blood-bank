<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $repositoryInterface;
    protected $storeRequestClass;
    protected $baseFolder = 'admin.';
    protected $indexView;
    protected $createView;
    protected $editView;
    protected $successMessage;
    protected $showView;


    public function index()
    {
        $data = $this->repositoryInterface->all();
        return view("{$this->baseFolder}{$this->indexView}", compact('data'));


    }

    public function create()
    {
        return view("{$this->baseFolder}{$this->createView}");

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->storeRequestClass->rules());
        $this->repositoryInterface->create($validatedData);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);

    }

    public function show($id)
    {
        $model = $this->repositoryInterface->find($id);
        return view("{$this->baseFolder}{$this->showView}",compact("model"));
    }

    public function edit($id)
    {
        $model = $this->repositoryInterface->find($id);
        return view("{$this->baseFolder}{$this->editView}", compact('model'));

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate($this->storeRequestClass->rules());
        $this->repositoryInterface->update($validatedData, $id);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);
    }

    public function destroy($id)
    {
        $this->repositoryInterface->delete($id);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")->with('success', $this->successMessage);
    }
}
