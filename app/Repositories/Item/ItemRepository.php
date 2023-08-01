<?php

namespace App\Repositories\Item;

use LaravelEasyRepository\Repository;

interface ItemRepository extends Repository{

    public function index($request);
    public function store($request);
    public function show($id);
    public function update($request, $id);
    public function destroy($id);
}
