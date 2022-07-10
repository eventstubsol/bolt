<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Booth;

use Carbon\Carbon;
use Carbon\CarbonTimeZone;
/**
 * App\BoothInterest
 *
 * @property int $id
 * @property string $booth_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Booth $booth
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|BoothInterest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothInterest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothInterest query()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothInterest whereBoothId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothInterest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothInterest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothInterest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothInterest whereUserId($value)
 * @mixin \Eloquent
 */
class BoothInterest extends Model
{
    protected $fillable = ["booth_id", "user_id"];

    public function booth(){
        return $this->belongsTo("App\Booth");
    }

    public function getCreatedAtAttribute($value){
        $booth = Booth::find($this->booth_id);
        $tz = Event::findorfail($booth->event_id)->timezone;
        $time = (new Carbon($value,"UTC"))->setTimezone(new CarbonTimeZone($tz));
        return $time;
    }

    public function user(){
        return $this->belongsTo("App\User")->select([
            "id",
            "name",
            "last_name",
            "job_title",
            "company_name",
            "country",
            "industry",
            "type",
            "phone",
            "email",
            "profileImage",
            "company_website_link",
            "facebook_link",
            "twitter_link",
            "linkedin_link",
            "website_link",
            "online_status",
        ]);
    }
}
