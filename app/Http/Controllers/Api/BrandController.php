<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Repositories\Brand\BrandRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $BrandRepository;

    public function __construct(BrandRepository $BrandRepository)
    {
        $this->BrandRepository = $BrandRepository;
    }

    public function index(Request $request)
    {
        return $this->BrandRepository->index($request);
    }

    public function store(StoreBrandRequest $request)
    {
        return $this->BrandRepository->store($request);
    }

    public function show($id)
    {
        return $this->BrandRepository->show($id);
    }


    public function update(Request $request, $id)
    {
        return $this->BrandRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->BrandRepository->destroy($id);
    }



}
