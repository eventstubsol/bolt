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
use App\Event;
use App\Image;

use App\Video;
use App\Page;
use App\Link;
use App\Modal;
use App\sessionRooms;
use App\Http\Requests\BoothFormRequest;
use App\Resource;
use Illuminate\Support\Facades\Http;

class BoothController extends Controller
{
    //
    public function index($id)
  {
    $booths = Booth::with(["room", "admins"])->where('event_id',$id)->get(["id", "name", "url","type","boothurl","room_id"]);

    return view("eventee.booth.list")
      ->with(compact(["booths","id"]));
  }


  //booth create form
  public function create($id)
  {
    $rooms = Room::where('event_id',$id)->get()->load("booths");
    $users = User::where("type", "exhibiter")->where('event_id',$id)->get();
    return view("eventee.booth.create")
      ->with(compact(["rooms", "users","id"]));
  }

  //Create new booth instance
  public function store(BoothFormRequest $request,$id)
  {
      // dd($request->all());
      if(empty($request->name)){
        flash("Name Field cannot be left blank")->error();
        return redirect()->back();
      }
      elseif(empty($request->userids)){
        flash("Please Select A Exibitor First")->error();
        return redirect()->back();
      }
      $booth = new Booth;
      if($request->has("name")){
        $booth->name = $request->get("name");
        // $booth->bg_type = $request->bg_type;
      }
      else{
         return false;
      }
      if($request->has("boothurl") && $request->boothurl != null){
        $booth->boothurl = $request->get("boothurl");
      }
      $booth->event_id = $id;
  
      if($request->has("calendly_link")){
        $booth->calendly_link=$request->calendly_link;
      }
      else{
        $booth->calendly_link=null;
      }
      if($request->has("video_url")  && $request->video_url != null){
        $booth->vidbg_url = $request->video_url;
      }
     
      $booth->save();
      // if($booth->save()){
        // Http::withHeaders([
        //   "apiKey" => env("COMET_CHAT_API_KEY"),
        //     "appId" => env("COMET_CHAT_APP_ID")
        //   ])
        //     ->post(env('COMET_CHAT_BASE_URL') . "/v2.0/groups", [
        //       "type" => strtolower(env("COMET_CHAT_GROUP_TYPE")),
        //       "guid" => $booth->id,
        //       "name" => $booth->name
        //     ]);
      
          $user_ids = $request->get("userids");
          foreach ($user_ids as $user_id) {
            BoothAdmin::create([
              "user_id" => $user_id,
              "booth_id" => $booth->id,
            ]);
          }
      
          // create group admin
          // Http::withHeaders([
          //   "apiKey" => env("COMET_CHAT_API_KEY"),
          //   "appId" => env("COMET_CHAT_APP_ID"),
          //   "Accept-Encoding"=> "deflate, gzip",
          //   "Content-Encoding"=> "gzip"
          //   ])
          //   ->post(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id . "/members", ["admins" => $user_ids]);
            flash("Booth Created Successfully")->success();
            return redirect()->to(route("eventee.booth",$id)); 
            // }
            // create group in comet chat
            
    
  }

  //Show edit form
  public function edit($id,$booth_id)
  {
    $rooms = Room::where('event_id',$id)->get();
    $booth = Booth::findOrFail($booth_id);
    $booth->load(["admins", "room"]);
    $users = User::where("type", "exhibiter")->where('event_id',$id)->get();
    return view("eventee.booth.edit")
      ->with(compact(["booth", "rooms", "users","id"]));
  }

  //Update booth Instance
  public function update(Request $request,$id,  $booth){
    // dd($request->all());
    $request->validate(['name' => 'required',
    'userids' => 'required',
  ]);
  $booth = Booth::findOrFail($booth);
      $booth->update([
        "name" => $request->get("name"),
        "boothurl"=>$request->get("boothurl"),
        "calendly_link"=>$request->get("calendly_link"),
        "vidbg_url" => $request->get("video_url")
        
      ]);
      $booth->save();
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
    // dd($booth);
    // Http::withHeaders([
    //   "apiKey" => env("COMET_CHAT_API_KEY"),
    //   "appId" => env("COMET_CHAT_APP_ID"),
    //   "Accept-Encoding"=> "deflate, gzip",
    //   "Content-Encoding"=> "gzip"
    // ])
    //   ->delete(env('COMET_CHAT_BASE_URL') . "/v2.0/groups/" . $booth->id);

    $booth->delete();
    return true;
  }

  public function exhibiterhome($subdomain){
    // dd($subdomain);
    $id = Event::where("slug",$subdomain)->first()->id;
    $event_name = Event::where("slug",$subdomain)->first()->slug;
    return view("dashboard.exhibiter")->with(compact("id","event_name"));

  }
  public function adminEdit(Request $req, Booth $booth,$id)
  {
  
    $pages = Page::where("event_id",$booth->event_id)->get();

    $booths = Booth::where("event_id",$booth->event_id)->get();
    $modals = Modal::where("event_id",$booth->event_id)->get();

    $session_rooms = sessionRooms::where("event_id",$booth->event_id)->get();

    $booth->load(["images", "videos", "resources","links.background"]);
    $links = Link::where(["page"=>$booth->id])->with(["background"])->get();
  
      $booth->load(["images", "videos", "resources"]);
      // dd("test");
      // $id=null;
      // dd(isset($id));
    return view("exhibitor.edit")->with(compact("booth","pages","booths","session_rooms","id","modals"));
  }

  public function adminUpdate(Request $request, Booth $booth,$id)
  {
    $event_id = $id;
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
                case "modal":
                    $to = $request->modal[$id];
                    break;
            }
            // dd(isset($request->rotationtype[$id])?$request->rotationtype[$id]:'');
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
          // dd($link);
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
        if(empty(trim($request->resourcetitles[$id]))){
          flash("Please Fill The Title Of Resources")->error();
          return redirect()->back();
        }
        elseif (!in_array($requrl, $oldResourceurls)) {
          if (!empty(trim($requrl)) && !empty(trim($request->resourcetitles[$id]))) {
            Resource::create([
              "booth_id" => $booth->id,
              "url" => $requrl,
              "title" => $request->resourcetitles[$id],
            ]);
          }
        } elseif (!in_array($requrl, $deletedResources)  && !empty(trim($request->resourcetitles[$id]))) {
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
     
    $id = $event_id;
    return redirect()->to(route("exhibiter.update", ["booth" => $booth->id,"id"=>$id]));}

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

  public function deleteVideo(Request $req){
    try{
      $id = $req->id;
      $video = Video::findOrFail($id);
      if($video->delete()){
        return response()->json(["code"=>200,"message"=>"Video Deleted"]);
      }
      else{
        return response()->json(["code"=>500,"message"=>"Something Went Wrong"]);
      }
    }
    catch(\Exception $e){
      Log::error($e->getMessage());
    }
   
  }

  public function BulkDelete(Request $req){
    $ids = $req->ids;
    $totalcount = 0;
    for($i = 0 ; $i < count($ids); $i++){
        $booth = Booth::findOrFail($ids[$i]);
        $booth->delete();
        $boothCount = Booth::where('id',$ids[$i])->count();
        if($boothCount > 0){
          $totalcount++;
        }

    }
    if(($totalcount)>0){
      return response()->json(['code'=>500,"Message"=>"Something Went Wrong"]);
    }
    else{
      return response()->json(['code'=>200,"Message"=>"Deleted SuccessFully"]);
    }
  }

}
