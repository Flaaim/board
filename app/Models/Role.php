<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public $timestamps = false;

    public function savePermissions($perms){
        if(!empty($perms)){
            $this->permissions()->sync($perms);
        } else {
            $this->permissions()->detach();
        }
    }

    public function hasPermission($alias){
        foreach($this->permissions as $perm){
            if($perm->alias == $alias){
                return true;
            }
        }
        return false;
    }

}
