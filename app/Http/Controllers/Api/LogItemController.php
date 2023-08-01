<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLogItemRequest;
use App\Repositories\LogItem\LogItemRepository;
use Illuminate\Http\Request;


class LogItemController extends Controller
{
    private $LogItemRepository;

    public function __construct(LogItemRepository $LogItemRepository)
    {
        $this->LogItemRepository = $LogItemRepository;
    }

    public function index(Request $request)
    {
        return $this->LogItemRepository->index($request);
    }

    public function store(StoreLogItemRequest $request)
    {
        // return 1;
        return $this->LogItemRepository->store($request);
    }

    public function show($id)
    {
        return $this->LogItemRepository->show($id);
    }


    public function update(Request $request, $id)
    {
        return $this->LogItemRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->LogItemRepository->destroy($id);
    }
}
