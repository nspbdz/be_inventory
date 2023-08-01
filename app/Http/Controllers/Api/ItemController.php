<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Repositories\Item\ItemRepository;


class ItemController extends Controller
{
    private $ItemRepository;

    public function __construct(ItemRepository $ItemRepository)
    {
        $this->ItemRepository = $ItemRepository;
    }

    public function index(Request $request)
    {
        return $this->ItemRepository->index($request);
    }

    public function store(StoreItemRequest $request)
    {
        return $this->ItemRepository->store($request);
    }

    public function show($id)
    {
        return $this->ItemRepository->show($id);
    }


    public function update(Request $request, $id)
    {
        return $this->ItemRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->ItemRepository->destroy($id);
    }
}
