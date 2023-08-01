<?php

namespace App\Repositories\LogItem;

use LaravelEasyRepository\Repository;

interface LogItemRepository extends Repository{

    public function index($request);
    public function store($request);
    public function show($id);
    public function update($request, $id);
    public function destroy($id);
}
