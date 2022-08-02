<?php

declare(strict_types=1);

namespace Activity;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasActions
{
    // TODO: Write trait for models that have actions performed on them
    public static function storeActionPerformed(string $actionPerformed, $model){

        // $dynamicUserIdentitfier = config('action_config.performer_identifier');
        // $user =  isset(Auth::user()->$dynamicUserIdentitfier) ? Auth::user()->$dynamicUserIdentitfier : Auth::user()->email;
        $user = Auth::user()->id;
        $model_performed_on_name = get_class($model);
        $model_performed_on_id = $model->getKey();
        $ipAdd = Request::getClientIp();
        $summary = json_encode($model->getDirty());
        Action::create([
            'user_id' => $user,
            'ip_address' => $ipAdd,
            'model_performed_on_id' => $model_performed_on_id,
            'model_performed_on_name' => $model_performed_on_name,
            'summary' => $summary,
            'description' => $actionPerformed
        ]);
    }
    public static function bootHasActions():void
    {
        static::created(function($model){
            static::storeActionPerformed("The model was created",$model);
        });

        static::updated(function($model){
            static::storeActionPerformed("The model was updated",$model);
        });

        static::deleted(function($model){
            static::storeActionPerformed("The model was deleted",$model);
        });
    }

    public function actions(){
        return $this->hasMany(Action::class, 'model_performed_on_id')->where("model_performed_on_name", get_class($this));
    }

}
