<?php 

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService {
    
    public function save($request, $model){
        $model->fill($request->only($model->getFillable()));
        $model->save();
        return $model;
    }
}