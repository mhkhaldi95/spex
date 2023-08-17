<?php

namespace App\Models;


use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Activity
{


    public function scopeFilter($q)
    {

        return $q;
    }

    public function getSubjectType($arr, $subject_type)
    {
        foreach ($arr as $key => $value) {
            if ($key == $subject_type)
                return $value;
        }
        return null;
    }
}
