<?php

namespace App\Http\Controllers\Eventee;

use App\Booth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Page;
use App\sessionRooms;
use Error;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $menus = Menu::where('parent_id', '0')->where('type', 'nav')->where('event_id',$id)->orderby('position', 'asc')->get();
        // return $menus;
        return view('eventee.menu.menu', compact('menus','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $menu = Menu::findOrFail($request->id);
        return response()->json($menu);
    }
    public function createNav(Request $request,$id)
    {
        $event_id = $id;
        $pages = Page::where("event_id",$event_id)->get();

        $booths = Booth::where("event_id",$event_id)->get();

        $session_rooms = sessionRooms::where("event_id",$event_id)->get();
        return view("eventee.menu.createMenu")->with(compact(["id","pages","booths","session_rooms"]));
    }
    public function createFooter(Request $request,$id)
    {
        $event_id = $id;
        $pages = Page::where("event_id",$event_id)->get();

        $booths = Booth::where("event_id",$event_id)->get();

        $session_rooms = sessionRooms::where("event_id",$event_id)->get();
        return view("eventee.menu.footer.createMenu")->with(compact(["id","pages","booths","session_rooms"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        try{
            // //
            foreach ($request->position as $positions) {
                $id = $positions[1];
                $position = $positions[0];
                \DB::update('UPDATE menus set position = ? where id = ?', [$position, $id]);
            }
            return response()->json(['message' => 'success']);
        }catch(Error $err){
            dd($err);
        }
    }
    public function saveNav(Request $request,$id)
    {
        // dd($request->all());
        $to = '';
        switch($request->type){
            case "session_room": 
                $to = $request->rooms;
                break;
            case "page":
                $to = $request->pages;
                break;
            case "zoom":
                $to = $request->zoom;
                break;
            case "booth":
                $to = $request->booths;
                break;
            case "vimeo":
                $to = $request->vimeo;
                break;
            case "pdf":
                $to = $request->pdf;
                break;
            case "chat_user":
                $to = $request->chatuser;
                break;
            case "chat_group":
                $to = $request->chatgroup;
                break;
            case "custom_page":
                $to = $request->custom_page;
                break;
        }
        $positionArr = \DB::SELECT("SELECT MAX(position) as position From menus where type = 'nav' ");
       
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->link = $to;
        $menu->event_id = $id;
        $menu->type = "nav";
        $menu->parent_id = 0;
        $menu->position = $positionArr[0]->position ? $positionArr[0]->position : 0 ;
        $menu->link_type = $request->type;
        $menu->iClass = $request->icon;
        $menu->save();
        // dd($menu);
        return redirect(route("eventee.menu",$id));
    }
    public function saveFooter(Request $request,$id)
    {
        // dd($request->all());
        $to = '';
        switch($request->type){
            case "session_room": 
                $to = $request->rooms;
                break;
            case "page":
                $to = $request->pages;
                break;
            case "zoom":
                $to = $request->zoom;
                break;
            case "booth":
                $to = $request->booths;
                break;
            case "vimeo":
                $to = $request->vimeo;
                break;
            case "pdf":
                $to = $request->pdf;
                break;
            case "chat_user":
                $to = $request->chatuser;
                break;
            case "chat_group":
                $to = $request->chatgroup;
                break;
            case "custom_page":
                $to = $request->custom_page;
                break;
        }
        $positionArr = \DB::SELECT("SELECT MAX(position) as position From menus where type = 'nav' ");
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->link = $to;
        $menu->event_id = $id;
        $menu->type = "footer";
        $menu->position = $positionArr[0]->position ? $positionArr[0]->position : 0 ;
        if($request->has("isChild") && $request->isChild){
            $menu->parent_id = $request->parent_id ;
        }
        $menu->link_type = $request->type;
        $menu->iClass = $request->icon;
        $menu->save();
        // dd($menu);
        return redirect(route("eventee.menu.footer",$id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo $id;
    }
    public function editNav(Menu $menu,$id)
    {
        // dd($menu);
        $event_id = $id;
        $pages = Page::where("event_id",$event_id)->get();

        $booths = Booth::where("event_id",$event_id)->get();

        $session_rooms = sessionRooms::where("event_id",$event_id)->get();
        return view("eventee.menu.footer.editMenu")->with(compact(["id","pages","booths","session_rooms","menu"]));
    }
    public function editFooter(Menu $menu,$id)
    {
        // dd($menu);
        $event_id = $id;
        $pages = Page::where("event_id",$event_id)->get();

        $booths = Booth::where("event_id",$event_id)->get();

        $session_rooms = sessionRooms::where("event_id",$event_id)->get();
        return view("eventee.menu.footer.editMenu")->with(compact(["id","pages","booths","session_rooms","menu"]));
    }
    public function updateNav(Request $request,Menu $menu,$id)
    {
           // dd($request->all());
           $to = '';
           switch($request->type){
               case "session_room": 
                   $to = $request->rooms;
                   break;
               case "page":
                   $to = $request->pages;
                   break;
               case "zoom":
                   $to = $request->zoom;
                   break;
               case "booth":
                   $to = $request->booths;
                   break;
               case "vimeo":
                   $to = $request->vimeo;
                   break;
               case "pdf":
                   $to = $request->pdf;
                   break;
               case "chat_user":
                   $to = $request->chatuser;
                   break;
               case "chat_group":
                   $to = $request->chatgroup;
                   break;
               case "custom_page":
                   $to = $request->custom_page;
                   break;
           }
           $positionArr = \DB::SELECT("SELECT MAX(position) as position From menus where type = 'nav' ");
          
           $menu->name = $request->name;
           $menu->link = $to;
           $menu->link_type = $request->type;
           $menu->iClass = $request->icon;
           $menu->save();
           // dd($menu);
           return redirect(route("eventee.menu",$id));
    }
    public function updateFooter(Request $request,Menu $menu,$id)
    {
        //    dd($request->all());
           $to = '';
           switch($request->type){
               case "session_room": 
                   $to = $request->rooms;
                   break;
               case "page":
                   $to = $request->pages;
                   break;
               case "zoom":
                   $to = $request->zoom;
                   break;
               case "booth":
                   $to = $request->booths;
                   break;
               case "vimeo":
                   $to = $request->vimeo;
                   break;
               case "pdf":
                   $to = $request->pdf;
                   break;
               case "chat_user":
                   $to = $request->chatuser;
                   break;
               case "chat_group":
                   $to = $request->chatgroup;
                   break;
               case "custom_page":
                   $to = $request->custom_page;
                   break;
           }
           $positionArr = \DB::SELECT("SELECT MAX(position) as position From menus where type = 'nav' ");
          
           $menu->name = $request->name;
           $menu->link = $to;
           $menu->link_type = $request->type;
           $menu->iClass = $request->icon;
           $menu->save();
           // dd($menu);
           return redirect(route("eventee.menu.footer",$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function subMenu(Request $request)
    {
        // return $request->all();
        $parent = Menu::findOrFail($request->id);
        $child = Menu::where('parent_id', $parent->id);
        if ($child->count() > 0) {
            $child->delete();
        }
        if ($parent->delete()) {
            return redirect()->back();
        } else {
            return "Something Went Wrong";
        }
    }

    public function SavePosition(Request $request)
    {
        $child = Menu::where('parent_id', $request->id)->count();
        return response()->json($child);
    }

    public function setStatus(Request $request)
    {
        try {
            $status = $request->status;
            $id = $request->id;
            if ($status == 1) {
                $menu = Menu::findOrFail($id);
                $menu->status = 1;
                if ($menu->save()) {
                    if ($status == 1) {
                        return response()->json(['message' => "Menu is Active Now"]);
                    } else {
                        return response()->json(['message' => "Menu is de-Actived"]);
                    }
                } else {
                    return response()->json(['message' => "Something Went Wrong"]);
                }
            } else {
                $menu = Menu::findOrFail($id);
                $menu->status = 0;
                if ($menu->save()) {
                    if ($status == 1) {
                        return response()->json(['message' => "Menu is Active Now"]);
                    } else {
                        return response()->json(['message' => "Menu is de-Actived"]);
                    }
                } else {
                    return response()->json(['message' => "Something Went Wrong"]);
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function saveMenu(Request $request,$id){
        //
        // return $request->all();
        $positionArr = \DB::SELECT("SELECT MAX(position) as position From menus where type = '".$request->type."' ");
        $newPosition = 0;
        foreach ($positionArr as $pos) {
            $newPosition += (int)$pos->position + 1 ;
        }
        if($request->has('confirm')){
            $status = $request->confirm;
            if($status == 1){
                $menu = new Menu;
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->event_id = $id;
                $menu->type = $request->type;
                $menu->parent_id = $request->parent_id;
                $menu->position = $newPosition;
                if($request->has('icon')){
                    $menu->iClass = $request->icon;
                }
                $menu->sub = 0;
                if($menu->save()){
                    return redirect()->back();
                }
                else{
                    return "Something Went Wrong";
                }
            }
            else{
                $menu = new Menu;
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->type = $request->type;
                $menu->event_id = $id;
                $menu->parent_id = 0;
                $menu->position = $newPosition;
                $menu->sub = 0;
                if($menu->save()){
                    return redirect()->back();
                }
                else{
                    return "Something Went Wrong";
                }
            }
        }else{
            $menu = new Menu;
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->type = $request->type;
                $menu->parent_id = 0;
                $menu->event_id = $id;
                $menu->position = $newPosition;
                $menu->sub = 1;
                if($menu->save()){
                    return redirect()->back();
                }
                else{
                    return "Something Went Wrong";
                }
        }
        
    }
}
