<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class DashboardController extends Controller
{
    protected $repository;
    protected $storeRequestClass;
    protected $updateRequestClass;
    protected $baseFolder = 'admin.';
    protected $indexView;
    protected $createView;
    protected $editView;
    protected $successMessage;
    protected $showView;
    protected $exculdeFile;
    protected $relations;


    public function index()
    {
        $this->relations ?  $data = $this->repository->with($this->relations) : $data = $this->repository->paginate();
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

        $model = $this->repository->create($validatedData);
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
        $model = $this->repository->find($id);
        return view("{$this->baseFolder}{$this->showView}", compact("model"));
    }

    public function edit($id)
    {
        $model = $this->repository->find($id);
        return view("{$this->baseFolder}{$this->editView}", compact('model'));

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate($this->updateRequestClass->rules($id));
        $validatedData = $this->excludeFilesFromValidatedData($validatedData);
        $model = $this->repository->find($id);
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
        $this->repository->update($validatedData, $id);
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);
    }

    public function destroy($id)
    {
        $model = $this->repository->find($id);

        if ($model) {
            // Check if the model has media before attempting to clear the media collection
            if (method_exists($model, 'hasMedia') && $model->hasMedia()) {
                $model->clearMediaCollection();
            }
        }
        $this->repository->delete($id);

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
