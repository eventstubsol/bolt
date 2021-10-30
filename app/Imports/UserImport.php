<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Event;

class UserImport implements ToModel,WithHeadingRow
{
    use Importable;
    public function __construct($id)
    {
        $this->event_id = $id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row,)
    {
        // dd($row["event_name"]);
        $eventSlug = str_replace(" ","-",strtolower(trim($row["event_name"])));
        
        // $event = Event::where("name",trim($row["event_name"]))->first();
        
        // dd($row);
        return new User([
            "name"=>$row["name"],
            "last_name" =>$row["last_name"],
            "email" =>$row["email"],
            "phone"=>$row["phone"],
            "password" =>password_hash($row["password"],PASSWORD_DEFAULT),
            "event_id"=> $this->event_id,
            "type" => $row["type"],
            "country" => $row["country"]
        ]);
    }
}
