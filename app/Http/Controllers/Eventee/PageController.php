<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;

use App\Booth;
use App\Image;
use App\Link;
use App\Page;
use App\sessionRooms;
use Illuminate\Http\Request;
use App\Event;
use App\Treasure;

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

    public function store(Request $request,$id)
    {
        // dd($request->all());
        $name = str_replace(" ","_",$request->name);
        $page = new Page([
            "name" => $name,
            'event_id'=>$id,
            // "bg_type" =>$request->bg_type,
        ]);

        $page->save();

        if($request->has("url") && $request->url != null)
        {
            $page->images()->create([
                "url"=>$request->url,
                "link"=>"",
                "title"=>$page->name
            ]);
        }
        if($request->has("video_url")  && $request->video_url != null){
    
            $page->videoBg()->create([
                "url"=>$request->video_url,
                "title"=>$page->name
            ]);
        }
        // $pages = Page::with(["images", "links.background"])->get();
        // return view("pages.list")->with(compact("pages"));
        return redirect()->to(route("eventee.pages.index",['id'=>$id]));
    }


    public function edit(Page $page,$id){
        // dd($id);


        $pages = Page::where('event_id',$id)->get();

        $booths = Booth::where('event_id',$id)->get();

        $session_rooms = sessionRooms::where('event_id',$id)->get();

        $pag =  Page::where('event_id',$id)->first();

        $page->load(["images","links.flyin","videoBg"]);
        // return $page;
        return view("eventee.pages.edit")->with(compact(["page","session_rooms","pages","booths","id","pag"]));
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
        $request->validate(["name","url"]);
        $pag =  Page::where('event_id',$id)->first();
        $event_id = $id;
        $page->name = $request->name;
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
                    case "faq":
                        $to = "FAQ";
                }
                $link = Link::create([
                    "page"=>$page->id,
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
                "title"=>$page->name
            ]);
        }
        $page->videoBg()->delete();
        if($request->has("video_url") && $request->video_url != null)
        {
            $page->videoBg()->create([
                "url"=>$request->video_url,
                "title"=>$page->name
            ]);
        }

        
        $pages = Page::where("event_id",$event_id)->get();

        $booths = Booth::where("event_id",$event_id)->get();

        $session_rooms = sessionRooms::where("event_id",$event_id)->get();
        $page->load(["images","links.background"]);
        $id = $event_id;
        return view("eventee.pages.edit")->with(compact(["page","session_rooms","pages","booths",'id','pag']));
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
                }
                $link = Link::create([
                    "page"=>"lobby_". ($event_id),
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
}
