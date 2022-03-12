<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class sessionRooms extends Model
{
    use UUID;
    use SoftDeletes;
    public $incrementing = false;

    protected $guarded = [];

    public function background(){
        return $this->hasOne("\App\Image", "owner");
    }
    public function videoBg(){
        return $this->hasOne("\App\Video", "owner");
    }

    public function replicateWR(){
        $newRecord = $this->replicate();
        $newRecord->name = $this->name . " Copy";
        $newRecord->push();
        $this->relations = [];
        $this->load(["background","videoBg"]);
        $relations = $this->getRelations();
        foreach ($relations as $rname => $relation) {
            if(isset($relation)){
                $newRelationship = $relation->replicate();
                $newRelationship->owner = $newRecord->id;
                $newRelationship->push();
            }
        }
        return $newRecord;
    }

    public function event(){
        $this->belongsTo('\App\Event');
    }

}
