<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BoothInterest;
use App\Booth;

use App\Room;
use Illuminate\Support\Facades\Log;
use App\User;

use App\BoothAdmin;

use App\Image;

use App\Video;
use App\Page;
use App\Link;
use App\sessionRooms;

use App\Resource;
use Illuminate\Support\Facades\Http;

class BoothController extends Controller
{
    //
    public function index($id)
  {
    $booths = Booth::with(["room", "admins"])->where('event_id',decrypt($id))->get(["id", "name", "url","type","boothurl","room_id"]);

    return view("eventee.booth.list")
      ->with(compact(["booths","id"]));
  }


  //booth create form
  public function create($id)
  {
    $rooms = Room::where('event_id',decrypt($id))->get()->load("booths");
    $users = User::where("type", "exhibiter")->where('event_id',decrypt($id))->get();
    return view("eventee.booth.create")
      ->with(compact(["rooms", "users","id"]));
  }

  //Create new booth instance
  public function store(Request $request,$id)
  {
      try{
          $booth = new Booth();
          if($request->has("name")){
            $booth->name = $request->get("name");
          }
          else{
              return false;
          }
          if($request->has("boothurl")){
            $booth->boothurl = $request->get("boothurl");
          }else{
            return false." Booth url ";
          }
          $booth->event_id = decrypt($id);
          if($request->has("calendly_link")){
            $booth->calendly_link=$request->calendly_link;
          }
          
          $booth->save();
          // if($booth->save()){
            Http::withHeaders([
              "apiKey" => env("COMET_CHAT_API_KEY"),
                "appId" => env("COMET_CHAT_APP_ID")
              ])
                ->post(env('COMET_CHAT_BASE_URL') . "/v2.0/groups", [
                  "type" => strtolower(env("COMET_CHAT_GROUP_TYPE")),
                  "guid" => $booth->id,
                  "name" => $booth->name
                ]);
          
              $user_ids = $request->get("userids");
              foreach ($user_ids as $user_id) {
                BoothAdmin::create([
                  "user_id" => $user_id,
                  "booth_id" => $booth->id,
                ]);
              }
          
              // create group admin
              Http::withHeaders([
                "apiKey" => env("COMET_CHAT_API_KEY"),
                "appId" => env("COMET_CHAT_APP_ID"),
                "Accept-Encoding"=> "deflate, gzip",
                "Content-Encoding"=> "gzip"
                ])
                ->post(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id . "/members", ["admins" => $user_ids]);
                flash("Booth Created Successfully")->success();
                return redirect()->to(route("eventee.booth",$id)); 
                // }
                // create group in comet chat
                
              }
              catch(\Exception $e){
            dd($e);

          Log::error($e->getMessage());
      }
    
  }

  //Show edit form
  public function edit($id,$booth_id)
  {
    $rooms = Room::where('event_id',decrypt($id))->get();
    $booth = Booth::findOrFail($booth_id);
    $booth->load(["admins", "room"]);
    $users = User::where("type", "exhibiter")->where('event_id',decrypt($id))->get();
    return view("eventee.booth.edit")
      ->with(compact(["booth", "rooms", "users","id"]));
  }

  //Update booth Instance
  public function update(Request $request,$id,  $booth){
    $request->validate(['name' => 'required',
    'userids' => 'required',
  ]);
  $booth = Booth::findOrFail($booth);
      $booth->update([
        "name" => $request->get("name"),
        "boothurl"=>$request->get("boothurl"),
        "calendly_link"=>$request->get("calendly_link"),
      ]);

      // update group
      Http::withHeaders([
          "apiKey" => env("COMET_CHAT_API_KEY"),
          "appId" => env("COMET_CHAT_APP_ID"),
          "Accept-Encoding"=> "deflate, gzip",
          "Content-Encoding"=> "gzip"
      ])
          ->put(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id, ["name" => $request->get("name")]);

      //update users
      BoothAdmin::where("booth_id",$booth->id)->delete();
      $user_ids = $request->get("userids");
      foreach ($user_ids as $user_id) {
        $boothadmin = BoothAdmin::create([
          "user_id" => $user_id,
          "booth_id" => $booth->id,
        ]);
      }
      // getting all group users
//      $response = Http::withHeaders([
//          "apiKey" => env("COMET_CHAT_API_KEY"),
//          "appId" => env("COMET_CHAT_APP_ID")
//      ])->get(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id . "/members");

//      $oldAdmins = array_map(function ($v) {
//          return $v["uid"];
//      }, $response["data"]);

      // kick old admins
//      foreach ($oldAdmins as $admin) {
//          Http::withHeaders([
//              "apiKey" => env("COMET_CHAT_API_KEY"),
//              "appId" => env("COMET_CHAT_APP_ID")
//          ])->delete(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id . "/members/" . $admin);
//      }

//    $oldAdmins = array_map(function ($v) {
//      return $v["uid"];
//    }, $response["data"]);
//
    // kick old admins
//    foreach ($oldAdmins as $admin) {
//      Http::withHeaders([
//        "apiKey" => env("COMET_CHAT_API_KEY"),
//        "appId" => env("COMET_CHAT_APP_ID")
//      ])->delete(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id . "/members/" . $admin);
//    }

    // add new admins
//    Http::withHeaders([
//      "apiKey" => env("COMET_CHAT_API_KEY"),
//      "appId" => env("COMET_CHAT_APP_ID")
//    ])
//      ->post(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id . "/members", ["admins" => $user_ids]);
    flash("Booth Updated Successfully")->success();
    return redirect()->to(route("eventee.booth",$id));
  }

  //Delete booth
  public function destroy(Booth $booth,$id)
  {
    Http::withHeaders([
      "apiKey" => env("COMET_CHAT_API_KEY"),
      "appId" => env("COMET_CHAT_APP_ID"),
      "Accept-Encoding"=> "deflate, gzip",
      "Content-Encoding"=> "gzip"
    ])
      ->delete(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id);

    $booth->delete();
    return redirect()->to(route("booth.index",$id));
  }

  public function adminEdit(Request $req, Booth $booth)
  {
    $pages = Page::where("event_id",$booth->event_id)->get();

    $booths = Booth::where("event_id",$booth->event_id)->get();

    $session_rooms = sessionRooms::where("event_id",$booth->event_id)->get();

    $booth->load(["images", "videos", "resources","links.background"]);
    $links = Link::where(["page"=>$booth->id])->with(["background"])->get();
  
      $booth->load(["images", "videos", "resources"]);
    return view("exhibitor.edit")->with(compact("booth","pages","booths","session_rooms"));
  }

  public function adminUpdate(Request $request, Booth $booth)
  {
    // dd($request->all());
    $booth->load(["images", "videos", "resources","links.background"]);



    $booth->links()->delete();
    if($request->has("linknames")){
        foreach($request->linknames as $id => $linkname){
            $to = "";
            // dd($request->type);
            switch($request->type[$id]){
                case "session_room": 
                    $to = $request->rooms[$id];
                    break;
                case "page":
                    $to = $request->pages[$id];
                    break;
                case "zoom":
                    $to = $request->zoom[$id];
                    break;
                case "booth":
                    $to = $request->booths[$id];
                    break;
                case "vimeo":
                    $to = $request->vimeo[$id];
                    break;
                case "pdf":
                    $to = $request->pdf[$id];
                    break;
                case "chat_user":
                    $to = $request->chatuser[$id];
                    break;
                case "chat_group":
                    $to = $request->chatgroup[$id];
                    break;
                case "custom_page":
                    $to = $request->custom_page[$id];
                    break;
            }
            $link  =Link::create([
              "page"=>$booth->id,
              "name"=> $linkname,
              "type"=>$request->type[$id],
              "to"=> $to,
              "top"=> $request->top[$id],
              "left"=> $request->left[$id],
              "width"=> $request->width[$id],
              "height"=> $request->height[$id],
              "perspective"=>isset($request->perspective[$id])?$request->perspective[$id]:'',
              "rotationtype"=>isset($request->rotationtype[$id])?$request->rotationtype[$id]:'',
              "rotation"=>isset($request->rotation[$id])?$request->rotation[$id]:'',
          ]);
          // dd($request->bgimages);
          if($request->has("bgimages") && isset($request->bgimages[$id]) ){
            if(count($request->bgimages[$id])>0 ){
              foreach($request->bgimages[$id] as $bgimage){
                if($bgimage){ //check if not null
                  $link->background()->create([
                    "owner"=>$link->id,
                    "url" => $bgimage,
                    "title" => "link"
                  ]);
                }

              }
            }

          }
        }
    }


    //uploading videos
    Video::where("owner", $booth->id)->delete();
    if ($request->has("boothvideos")  && is_array($request->boothvideos)) {
      foreach ($request->boothvideos as $id => $boothvideo) {
        if (!empty(trim($boothvideo))) {
          $booth->videos()->create([
            "url" => $boothvideo,
            "title" => $request->videotitles[$id],
          ]);
        }
      }
    }





    //updating resources
    $requesturls = $request->resources; //Recieved from form
    $deletedResources = [];
    if(!$requesturls || !is_array($requesturls)){
        $requesturls = [];
    }
    $oldResources = Resource::where("booth_id", $booth->id)->get();
    $oldResourceurls = []; //From database
    foreach ($oldResources as $id => $resource) {
      if (!in_array($resource->url, $requesturls)) {
        $resource->swagbag()->delete();
        $resource->delete();
        array_push($deletedResources, $resource->url);
      } else {
        array_push($oldResourceurls, $resource->url);
      }
    }
    if ($requesturls) {
      foreach ($requesturls as $id => $requrl) {
        if (!in_array($requrl, $oldResourceurls)) {
          if (!empty(trim($requrl))) {
            Resource::create([
              "booth_id" => $booth->id,
              "url" => $requrl,
              "title" => $request->resourcetitles[$id],
            ]);
          }
        } elseif (!in_array($requrl, $deletedResources)) {
          $resource = Resource::where("url", $requrl)->update(["title" => $request->resourcetitles[$id]]);
        }
      }
    }
    //booth description update
    $booth->update([
      "description" => $request->description,
      "description_two" => $request->description_two,
      "url" => $request->url,   //Booth Website
    ]);

      // $booth->load(["images", "videos", "resources","links"]);

    return redirect()->to(route("exhibiter.update", ["booth" => $booth->id]));}

  public function boothEnquiries(Booth $booth){
      $booth->load("interests.user");
//      return $booth;
      return view("exhibitor.enquiries")->with(compact("booth"));
  }

  public function boothEnquiriesRaw(Booth $booth){
      $booth->load("interests.user");
      $toReturn = [];
      foreach ($booth->interests as $interest){
          if($interest->user){
              $user = $interest->user;
              $toReturn[] = [
                  "Name" => $user->name,
                  "Last Name" => $user->last_name,
                  "Job Title" => $user->job_title,
                  "Phone" => $user->phone,
                  "Email" => $user->email,

                  "Company Name" => $user->company_name,
                  "company Website" => $user->company_website_link,

                  "Country" => $user->country,
                  "Industry" => $user->industry,

                  "Facebook" => $user->facebook_link,
                  "Twitter" => $user->twitter_link,
                  "Linkedin" => $user->linkedin_link,
                  "Website" => $user->website_link,
              ];
          }
      }

      return $toReturn;
  }

  public function publish(Booth $booth){
      $booth->publish();
      return ['success' => true];
  }

  public function unpublish(Booth $booth){
      $booth->unpublish();
      return ['success' => true];
  }

}