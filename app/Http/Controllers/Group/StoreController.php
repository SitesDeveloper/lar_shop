<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Models\Group;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Group::FirstOrCreate($data);
        return redirect()->route('group.index');
    }
}
