<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

use Carbon\Carbon;
use Carbon\CarbonTimeZone;
/**
 * App\LoginLog
 *
 * @property string $id
 * @property string $ip
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LoginLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LoginLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LoginLog query()
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LoginLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LoginLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LoginLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LoginLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LoginLog whereUserId($value)
 */
class LoginLog extends Model
{
    protected $fillable = ["ip", "user_id","event_id"];

    public function user(){
        return $this->belongsTo("\App\User")->select([
            'id',
            'name as Name',
            'email as Email',
            'last_name as Last Name',
            'phone as Phone',
            'job_title as Job Title',
            'company_name as Company Name',
        ]);
    }
    // public function getCreatedAtAttribute($value)
    // {
    //     // dd($this);
    //     if($this->event_id){

    //         $tz = Event::findorfail($this->event_id)->timezone;
    //         $time = (new Carbon($value, "UTC"))->setTimezone(new CarbonTimeZone($tz));
    //         return $time;
    //     }else{
    //         return $value;
    //     }
    // }
}

