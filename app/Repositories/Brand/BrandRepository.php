<?php

namespace App\Repositories\Brand;

use LaravelEasyRepository\Repository;

interface BrandRepository extends Repository{

    public function index($request);
    public function store($request);
    public function show($id);
    public function update($request, $id);
    public function destroy($id);
}
