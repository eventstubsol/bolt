<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UUID;
class LeadPoint extends Model
{
    //
    use UUID;
    public $incrementing = false;
    protected $guarded = [];
    protected $table = 'lead_point';
    

}
