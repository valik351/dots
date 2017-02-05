<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function getLinkAttribute() {
        return action('ModuleController@show', ['id' => $this->id]);
    }


}
