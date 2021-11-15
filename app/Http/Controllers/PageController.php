<?php

namespace App\Http\Controllers;

use App\Booth;
use App\Image;
use App\Link;
use App\Page;
use App\sessionRooms;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with(["images", "links"])->get();
        return view("pages.list")->with(compact("pages"));
    }

    public function create()
    {

        return view("pages.createForm");
    }

    public function store(Request $request)
    {
        $name = str_replace(" ","_",$request->name);
        $page = new Page([
            "name" => $name
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
        return redirect()->to(route("page.index"));
    }


    public function edit(Page $page){

        $pages = Page::all();

        $booths = Booth::all();

        $session_rooms = sessionRooms::all();

        $page->load(["images","links"]);
        // return $page;
        return view("pages.edit")->with(compact(["page","session_rooms","pages","booths"]));
    }

    public function lobby(){

        $pages = Page::all();

        $booths = Booth::all();

        $session_rooms = sessionRooms::all();

        $links = Link::where(["page"=>"lobby"])->get();
        $page = (object) [
            "id"=>"lobby",
            "name"=>"lobby",
            "links"=>$links,
        ];



        return view("pages.lobby")->with(compact(["page","session_rooms","pages","booths"]));
    }

    
    public function update(Request $request, Page $page){
        $request->validate(["name","url"]);
        dd($request->all());
        $page->name = $request->name;
        $page->save();

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
                    case "photobooth":
                        $to = $request->capture_link[$id];
                        $url = $request->gallery_link[$id];
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
                    "url" => $url
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
        return view("pages.edit")->with(compact(["page","session_rooms","pages","booths"]));
    }
    public function Lobbyupdate(Request $request){
        // $request->validate(["name","url"]);
        // dd($request);
        
        Link::where(["page"=>"lobby"])->delete();
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
                    "page"=>"lobby",
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



        
        $pages = Page::all();

        $booths = Booth::all();

        $session_rooms = sessionRooms::all();

        $links = Link::where(["page"=>"lobby"])->get();
        $page = (object) [
            "id"=>"lobby",
            "name"=>"lobby",
            "links"=>$links,
        ];

        return view("pages.lobby")->with(compact(["page","session_rooms","pages","booths"]));
    }


    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->to(route("page.index"));
    }
}
