<?php

namespace App\Http\Services;

class RoleService {
    public function save($request, $model){
        $model->fill($request->only($model->getFillable()));
        $model->save();
        return true;
    }
}