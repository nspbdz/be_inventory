<?php

namespace App\Repositories\Item;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Item;
use App\Http\Helpers\ResponseHelpers;
// use Laravel\Sanctum\Exceptions\MissingAbilityException;

class ItemRepositoryImplement extends Eloquent implements ItemRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return ResponseHelpers::sendSuccess('get items data', $this->model->all());
    }

    public function store($request)
    {
        $data = Item::create([
            'name' => $request['name'],
            'brand_id' => $request['brand_id'],
            'size' => $request['size'],
            'color' => $request['color'],
            'qty' => $request['qty'],
            'qr_code' => $request['qr_code'],
        ]);

        return ResponseHelpers::sendSuccess('Item created', $data);

    }

    public function show($id)
    {
        return ResponseHelpers::sendSuccess('get Item data', $this->model->find($id));
    }

    public function update($request, $id)
    {

        try {

            $this->model = $this->model->find($id);
            $this->model->name = $request->name ?? $this->model->name;
            $this->model->brand_id = $request->brand_id ?? $this->model->brand_id;
            $this->model->size = $request->size ?? $this->model->size;
            $this->model->color = $request->color ?? $this->model->color;
            $this->model->qty = $request->qty ?? $this->model->qty;
            $this->model->qr_code = $request->qr_code ?? $this->model->qr_code;
            $this->model->update();
        } catch (\Throwable $th) {
            throw $th;
        }


        return ResponseHelpers::sendSuccess('Item updated', $this->model);
    }

    public function destroy($id)
    {
        $this->model = $this->model->find($id);
        $this->model->delete();

        return ResponseHelpers::sendSuccess('Item deleted', $this->model);
    }



    // Write something awesome :)
}
