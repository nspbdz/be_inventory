<?php

namespace App\Repositories\Brand;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Brand;
use App\Http\Helpers\ResponseHelpers;

class BrandRepositoryImplement extends Eloquent implements BrandRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return ResponseHelpers::sendSuccess('get Brands data', $this->model->all());
    }

    public function store($request)
    {
        $data = Brand::create([
            'name' => $request['name'],
        ]);

        return ResponseHelpers::sendSuccess('Brand created', $data);
    }

    public function show($id)
    {
        return ResponseHelpers::sendSuccess('get Brand data', $this->model->find($id));
    }

    public function update($request, $id)
    {

        try {

            $this->model = $this->model->find($id);
            $this->model->name = $request->name ?? $this->model->name;
            $this->model->update();
        } catch (\Throwable $th) {
            throw $th;
        }


        return ResponseHelpers::sendSuccess('Brand updated', $this->model);
    }

    public function destroy($id)
    {
        $this->model = $this->model->find($id);
        $this->model->delete();

        return ResponseHelpers::sendSuccess('Brand deleted', $this->model);
    }


    // Write something awesome :)
}
