<?php

declare(strict_types=1);

namespace Activity;

trait PerformsActions
{
    // TODO: Write trait for models that perform actions, e.g. User

    public function performedActions(){
        // $dynamicUserIdentitfier = config('action_config.performer_identifier');
        // return $this->hasMany(Action::class, $dynamicUserIdentitfier);
        return $this->hasMany(Action::class, 'user_id');
    }
}
