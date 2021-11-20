<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    use UUID;
    public $incrementing = false;

    //For mass assignment whitelisting
    protected $guarded = [
        "id",
    ];

    public function images(){
        return $this->hasMany("\App\Image", "owner");
    }
    public function videoBg(){
        return $this->hasOne("App\Video","owner");
    }

    public function treasures(){
        return $this->hasMany("\App\Treasure","owner");
    }

    public function replicateWR(){
        $newRecord = $this->replicate();
        $newRecord->name = $this->name . " Copy";
        $newRecord->push();
        $this->relations = [];
        $this->load(["images","links","videoBg"]);
        $relations = $this->getRelations();
        foreach ($relations as $rname => $relation) {
            // dd($relations);
            if($rname === "videoBg" && isset($relation)){
                $newRelationship = $relation->replicate();
                $newRelationship->owner = $newRecord->id;
                $newRelationship->push();
            }else{
                if(isset($relation)){
                    foreach ($relation as $relationRecord) {
                        $newRelationship = $relationRecord->replicate();
                        if($rname === 'links'){
                            $newRelationship->page = $newRecord->id;
                        }else{
                            $newRelationship->owner = $newRecord->id;
                        }
                        $newRelationship->push();
                    } 
                }
            }
        }
        return $newRecord;
    }

    public function links()
    {
        return $this->hasMany("\App\Link","page");
    }

}
