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

class PageController extends Controller
{
    public function index($id)
    {
        $pages = Page::where('event_id',decrypt($id))->with((['images','links']))->get();
        // $pages = Event::where('id',decrypt($id))->with(["pages"])->get()->pluck('product');
        // $pages->load(['images','links']);
        return view("eventee.pages.list")->with(compact("pages","id"));
    }

    public function create($id)
    {
        return view("eventee.pages.createForm")->with(compact('id'));
    }

    public function store(Request $request,$id)
    {
        $name = str_replace(" ","_",$request->name);
        $page = new Page([
            "name" => $name,
            'event_id'=>decrypt($id)
        ]);

        $page->save();

        if($request->has("url"))
        {
            $page->images()->create([
                "url"=>$request->url,
                "link"=>"",
                "title"=>$page->name
            ]);
        }
        // $pages = Page::with(["images", "links"])->get();
        // return view("pages.list")->with(compact("pages"));
        return redirect()->to(route("eventee.pages.index",['id'=>$id]));
    }


    public function edit(Page $page,$id){
        // dd("test");


        $pages = Page::where('event_id',decrypt($id))->get();

        $booths = Booth::all();

        $session_rooms = sessionRooms::all();

        $page->load(["images","links"]);
        // return $page;
        return view("eventee.pages.edit")->with(compact(["page","session_rooms","pages","booths","id"]));
    }

    public function lobby($id){
        $ids = decrypt($id);
        // dd($id);

        $pages = Page::where('event_id',$ids)->get();

        $booths = Booth::where('event_id',$ids)->get();

        //todo link session rooms to event_id 

        $session_rooms = sessionRooms::where("event_id",$ids)->get();
        $page_name = "lobby_".$ids;

        $links = Link::where(["page"=>$page_name])->get();
        $page = (object) [
            "id"=>$id,
            "name"=>$page_name,
            "links"=>$links,
            "event_id"=>$id
        ];
        // dd($id);


        return view("eventee.pages.lobby")->with(compact(["page","session_rooms","pages","booths","id"]));
    }

    
    public function update(Request $request, Page $page,$id){
        $request->validate(["name","url"]);
        // dd($id);
        $event_id = $id;
        $page->name = $request->name;
        $page->save();

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
                }
                Link::create([
                    "page"=>$page->id,
                    "name"=> $linkname,
                    "type"=>$request->type[$id],
                    "to"=> $to,
                    "top"=> $request->top[$id],
                    "left"=> $request->left[$id],
                    "width"=> $request->width[$id],
                    "height"=> $request->height[$id],
                ]);
            }
        }


        if($request->has("url"))
        {
            $page->images()->delete();
            $page->images()->create([
                "url"=>$request->url,
                "link"=>"",
                "title"=>$page->name
            ]);
        }

        
        $pages = Page::all();

        $booths = Booth::all();

        $session_rooms = sessionRooms::all();
        $page->load(["images","links"]);
        $id = $event_id;
        return view("eventee.pages.edit")->with(compact(["page","session_rooms","pages","booths",'id']));
    }
    public function Lobbyupdate(Request $request,$id){
        // $request->validate(["name","url"]);
        $event_id = $id;
        
        Link::where(["page"=>"lobby_".decrypt($id)])->delete();
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
                }
                Link::create([
                    "page"=>"lobby_".decrypt($event_id),
                    "name"=> $linkname,
                    "type"=>$request->type[$id],
                    "to"=> $to,
                    "top"=> $request->top[$id],
                    "left"=> $request->left[$id],
                    "width"=> $request->width[$id],
                    "height"=> $request->height[$id],
                ]);
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
        return redirect()->to(route("page.index"));
    }
}
