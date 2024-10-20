<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class DashboardController extends Controller
{
    protected $repositoryInterface;
    protected $storeRequestClass;
    protected $updateRequestClass;
    protected $baseFolder = 'admin.';
    protected $indexView;
    protected $createView;
    protected $editView;
    protected $successMessage;
    protected $showView;
    protected $exculdeFile;


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
        $validatedData = $this->excludeFilesFromValidatedData($validatedData);

        $model = $this->repositoryInterface->create($validatedData);
        if (count($request->allFiles()) > 0) {
            foreach ($request->allFiles() as $inputName => $file) {
                if ($file instanceof UploadedFile) {
                    $model->addMedia($file)->toMediaCollection($inputName);
                }
            }
        }
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);

    }

    public function show($id)
    {
        $model = $this->repositoryInterface->find($id);
        return view("{$this->baseFolder}{$this->showView}", compact("model"));
    }

    public function edit($id)
    {
        $model = $this->repositoryInterface->find($id);
        return view("{$this->baseFolder}{$this->editView}", compact('model'));

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate($this->updateRequestClass->rules($id));
        $validatedData = $this->excludeFilesFromValidatedData($validatedData);
        $model = $this->repositoryInterface->find($id);
        if (count($request->allFiles()) > 0) {
            foreach ($request->allFiles() as $inputName => $file) {
                if ($file instanceof UploadedFile) {
                    if ($model->hasMedia($inputName)) {
                        $model->clearMediaCollection($inputName);
                    }
                    $model->addMedia($file)->toMediaCollection($inputName);
                }
            }
        }
        $this->repositoryInterface->update($validatedData, $id);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);
    }

    public function destroy($id)
    {
        $model = $this->repositoryInterface->find($id);

        if ($model) {
            $model->clearMediaCollection();

            $this->repositoryInterface->delete($id);

            return redirect()->route("{$this->baseFolder}{$this->indexView}")
                ->with('success', $this->successMessage);
        }
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('error', 'Model not found');
    }

    protected function excludeFilesFromValidatedData(array $validatedData): array
    {
        $files = $this->exculdeFile;

        if (is_array($files)) {
            foreach ($files as $file) {
                unset($validatedData[$file]);
            }
        }

        return $validatedData; // Return the modified validated data
    }
}
