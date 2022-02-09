<?php

namespace App\Http\Controllers\Eventee;

use App\AccessSpecifiers;
use App\Http\Controllers\Controller;

use App\Booth;
use App\Image;
use App\Link;
use App\Page;
use App\sessionRooms;
use Illuminate\Http\Request;
use App\Event;
use App\Modal;
use App\Treasure;
use Carbon\Carbon;
use App\Http\Requests\PageFormRequest;
use PDO;

class PageController extends Controller
{
    public function index($id)
    {
        $pages = Page::where('event_id',$id)->with((['images','links']))->get();
        // $pages = Event::where('id',$id)->with(["pages"])->get()->pluck('product');
        // $pages->load(['images','links']);
        return view("eventee.pages.list")->with(compact("pages","id"));
    }

    public function create($id)
    {
        return view("eventee.pages.createForm")->with(compact('id'));
    }

    public function store(PageFormRequest $request,$id)
    {
        // dd($request->all());
        // if(empty($request->name)){
        //     flash("Name Field Cannot Be Left Blank")->error();
        //     return redirect()->back();
        // }
        $name = str_replace(" ","_",$request->name);
        $page = new Page([
            "name" => $name,
            'event_id'=>$id,
            'chat_name'=>$request->chat_name,
            // "bg_type" =>$request->bg_type,
        ]);
     
        $page->save();

        foreach(USER_TYPES as $user_type){
            AccessSpecifiers::create([
                "page_id"=>$page->id,
                "user_type"=>$user_type,
                "event_id"=>$id
            ]);
        }


        if($request->has("url") && $request->url != null)
        {
            $page->images()->create([
                "url"=>$request->url,
                "link"=>"",
                "title"=>$page->name,
                'event_id' => $id,
            ]);
        }
        if($request->has("video_url")  && $request->video_url != null){
    
            $page->videoBg()->create([
                "url"=>$request->video_url,
                "title"=>$page->name,
                "event_id"=>$id,
            ]);
        }
        // $pages = Page::with(["images", "links.background"])->get();
        // return view("pages.list")->with(compact("pages"));
        return redirect()->to(route("eventee.pages.index",['id'=>$id]));
        // return redirect()->to(route("eventee.pages.edit", ["page" => $page->id, "id"=>$id,]));
    }


    public function edit(Page $page,$id){
        // dd($id);
       $modals =  Modal::where("event_id",$id)->get();



        $pages = Page::where('event_id',$id)->get();

        $booths = Booth::where('event_id',$id)->get();

        $session_rooms = sessionRooms::where('event_id',$id)->get();

        $pag =  Page::where('event_id',$id)->first();

        $page->load(["images","links.flyin","videoBg"]);
        // return $page;
        return view("eventee.pages.edit")->with(compact(["modals","page","session_rooms","pages","booths","id","pag"]));
    }
    public function duplicate($object,$type){
        switch($type){
            case "page":
                $new_page = Page::where("id",$object)->first()->replicateWR();
                return redirect(route("eventee.pages.index",$new_page->event_id));
                break;
            case "booth":
                $new_booth = Booth::where("id",$object)->first()->replicateWR();
                return redirect(route("eventee.booth",$new_booth->event_id));
                break;
            case "session_room":
                $new_booth = sessionRooms::where("id",$object)->first()->replicateWR();
                return redirect(route("eventee.sessionrooms.index",$new_booth->event_id));
                break;
            }
            // $object->replicateWR();
            // dd($object);
    }

    public function lobby($id){
        $ids = $id;
        // dd($id);

        $pages = Page::where('event_id',$ids)->get();

        $booths = Booth::where('event_id',$ids)->get();
        
        $pag =  Page::where('event_id',$id)->first();
        //todo link session rooms to event_id 

        $session_rooms = sessionRooms::where("event_id",$ids)->get();
        $page_name = "lobby_".$ids;

        $links = Link::where(["page"=>$page_name])->get()->load("background");
        // dd($links);
        $treasures = Treasure::where(["owner"=>$page_name])->get();
        $page = (object) [
            "id"=>$id,
            "name"=>$page_name,
            "links"=>$links,
            "event_id"=>$id,
            "treasures"=>$treasures
        ];
        // dd($id);


        return view("eventee.pages.lobby")->with(compact(["page","session_rooms","pages","booths","id","pag"]));
    }

    
    public function update(Request $request, Page $page,$id){
        // dd($request->all());
        // dd(uniqid());
        $request->validate(["name","url"]);
        $pag =  Page::where('event_id',$id)->first();
        $event_id = $id;
        $page->name = $request->name;
        $page->chat_name =  $request->chat_name;
        $page->save();

        $page->treasures()->delete();
        if($request->has("treasures")){
            foreach($request->treasures as $index => $treasure_item){
                $page->treasures()->create([
                    "url"=>$treasure_item,
                    "event_id"=> $id,
                    "top"=> $request->ttop[$index],
                    "left"=> $request->tleft[$index],
                    "width"=> $request->twidth[$index],
                    "height"=> $request->theight[$index],
                ]);
            }
        }

        $page->links()->delete();
        if($request->has("linknames")){
            foreach($request->linknames as $id => $linkname){

                $to = "";
                $url = "";
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
                    case "lobby":
                        $to = "lobby";
                        break;
                    case "faq":
                        $to = "FAQ";
                        break;
                    case "photobooth":
                        $to = $request->capture_link[$id];
                        $url = $request->gallery_link[$id];
                        break;
                    case "videosdk":
                        $to = uniqid();
                        break;
                    case "modal":
                        $to = $request->modals[$id];
                        break;
                    case "lounge":
                        $to = "lounge";
                        break;
                }
                $link = Link::create([
                    "page"=>$page->id,
                    "name"=> $linkname,
                    "type"=>$request->type[$id],
                    "to"=> $to,
                    "url"=> $url,
                    "top"=> $request->top[$id],
                    "left"=> $request->left[$id],
                    "width"=> $request->width[$id],
                    "height"=> $request->height[$id],
                    "perspective"=>isset($request->perspective[$id])?$request->perspective[$id]:'',
                    "rotationtype"=>isset($request->rotationtype[$id])?$request->rotationtype[$id]:'',
                    "rotation"=>isset($request->rotation[$id])?$request->rotation[$id]:'',
               
                ]);
                if($request->has("bgimages") && isset($request->bgimages[$id]) ){
                    if(count($request->bgimages[$id])>0 ){
                      foreach($request->bgimages[$id] as $bgimage){
                        if($bgimage){ //check if not null
                          $link->background()->create([
                            "owner"=>$link->id,
                            "url" => $bgimage,
                            "title" => "link",
                            "event_id" => $id,
                          ]);
                        }
        
                      }
                    }
                }
                if($request->has("flyin") && isset($request->flyin[$id])){
                    $link->flyin()->create([
                        "url"=>$request->flyin[$id],
                        "title"=>$link->name
                    ]);
                }

            }
        }


        if($request->has("url") && $request->url != null)
        {
            $page->images()->delete();
            $page->images()->create([
                "url"=>$request->url,
                "link"=>"",
                "title"=>$page->name,
                "event_id" => $id,
            ]);
        }
        $page->videoBg()->delete();
        if($request->has("video_url") && $request->video_url != null)
        {
            $page->videoBg()->create([
                "url"=>$request->video_url,
                "title"=>$page->name,
                "event_id" =>$id
            ]);
        }

        
        $pages = Page::where("event_id",$event_id)->get();

        $booths = Booth::where("event_id",$event_id)->get();

        $session_rooms = sessionRooms::where("event_id",$event_id)->get();
        $page->load(["images","links.background"]);
        $id = $event_id;
       $modals =  Modal::where("event_id",$id)->get();

        return view("eventee.pages.edit")->with(compact(["modals","page","session_rooms","pages","booths",'id','pag']));
    }
    public function Lobbyupdate(Request $request,$id){
        // $request->validate(["name","url"]);
        $event_id = $id;
        Link::where(["page"=>"lobby_".$id])->delete();
        Treasure::where(["owner"=>"lobby_".$id])->delete();
        if($request->has("treasures")){
            foreach($request->treasures as $index => $treasure_item){
                Treasure::create([
                    "owner"=>"lobby_".$id,
                    "url"=>$treasure_item,
                    "event_id"=> $id,
                    "top"=> $request->ttop[$index],
                    "left"=> $request->tleft[$index],
                    "width"=> $request->twidth[$index],
                    "height"=> $request->theight[$index],
                ]);
            }
        }

        if($request->has("linknames")){
            foreach($request->linknames as $id => $linkname){
                $to = "";
                $url="";
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
                    case "custom_page":
                        $to = $request->custom_page[$id];
                        break;
                    case "faq":
                        $to = "FAQ";
                        break;
                    case "photobooth":
                        $to = $request->capture_link[$id];
                        $url = $request->gallery_link[$id];
                        break;
                    case "lounge":
                        $to = "lounge";
                        break;
                }
                $link = Link::create([
                    "page"=>"lobby_". ($event_id),
                    "name"=> $linkname,
                    "type"=>$request->type[$id],
                    "to"=> $to,
                    "url"=>$url,
                    "top"=> $request->top[$id],
                    "left"=> $request->left[$id],
                    "width"=> $request->width[$id],
                    "height"=> $request->height[$id],
                    "perspective"=>isset($request->perspective[$id])?$request->perspective[$id]:'',
                    "rotationtype"=>isset($request->rotationtype[$id])?$request->rotationtype[$id]:'',
                    "rotation"=>isset($request->rotation[$id])?$request->rotation[$id]:'',
               
                ]);
                
                if($request->has("bgimages") && isset($request->bgimages[$id]) ){
                    if(count($request->bgimages[$id])>0 ){
                      foreach($request->bgimages[$id] as $bgimage){
                        if($bgimage){ //check if not null
                            // dd($bgimage);
                          $link->background()->create([
                            "owner"=>$link->id,
                            "url" => $bgimage,
                            "title" => "link",
                            "event_id" => $id,
                          ]);
                        }
        
                      }
                    }
                }

                if($request->has("flyin") && isset($request->flyin[$id])){
                    $link->flyin()->create([
                        "url"=>$request->flyin[$id],
                        "title"=>$link->name
                    ]);
                }
            }
        }

        // dd($id);
        return redirect()->to(route('elobby',['id'=>$event_id]));

        // return view("eventee.pages.lobby")->with(compact(["page","session_rooms","pages","booths","id"]));
    }


    public function destroy(Page $page)
    {
        // dd($page);
        $page->delete();
        return ["success"=>true];
    }

    public function BulkDelete(Request $req){
        $ids = $req->ids;
        $totalcount = 0;
        for($i = 0 ; $i < count($ids); $i++){
            $page = Page::findOrFail($ids[$i]);
            $page->delete();
            $pageCount = Page::where('id',$ids[$i])->count();
            if($pageCount > 0){
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

    public function DeleteAll(Request $req){
        $pages = Page::where('event_id',$req->id)->get();
        foreach($pages as $page){
            $page->delete();
        }
        return response()->json(['code'=>200,"Message"=>"Deleted SuccessFully"]);
    }
}
