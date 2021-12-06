<?php

namespace App\Http\Controllers;

use App\AccessSpecifiers;
use App\Event;
use App\Page;
use App\sessionRooms;
use App\User;
use App\UserSubtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user){
            return redirect(route('Eventee.login'));
            return view("landing");
        }
        if($user->type === "eventee"){
            return redirect(route('event.index'));

        }
        if(view()->exists("dashboard.".$user->type)){
            if($user->type === 'admin'){
                return redirect(route('reports.dashboard'));
            }
            return redirect("/home");
        }
        return redirect('event');
    }

    public function accessControl($id){
        $access_all = AccessSpecifiers::where("event_id",$id)->get()->groupBy("user_type");
        foreach($access_all as $user_type => $user_access){
            $access_new = [];
            foreach($user_access as $j => $acc){
                array_push($access_new, $acc->page_id);
            }
            $access_all[$user_type] = $access_new;
        }
        $user_type = USER_TYPES;
        $user_subtype =   $subtypes = UserSubtype::where('event_id',$id)->get();;
        $user_types = [];
        foreach($user_type as $type){
            if($type!==null && $type!=="admin" && $type!=="cms_manager"){
                array_push($user_types,$type);
            }
        }
        foreach($user_subtype as $type){
            if($type->name!==null ){
                array_push($user_types,$type->name);
            }
        }
        // dd($user_subtype);
        $pages = Page::where("event_id",$id)->get();
        $session_rooms = sessionRooms::where("event_id",$id)->get();

        return view("dashboard.access")->with(compact("id","user_types","pages","session_rooms","access_all"));
    }

    public function updateAccess(Request $request,$id){
        AccessSpecifiers::where("event_id",$id)->delete();
        // dd($request->all());
        foreach($request->all() as $room=>$access_ids){
            if(strpos($room, 'pages-')!==false || strpos($room, 'rooms-')!==false ){
                $user_type = str_replace("pages-", '',$room);
                $user_type = str_replace("rooms-", '',$user_type);
                $user_type = str_replace("_"," ",$user_type);

                foreach($access_ids as $access_id){
                    AccessSpecifiers::create([
                        "page_id"=>$access_id,
                        "user_type"=>$user_type,
                        "event_id"=>$id
                    ]);
                }

            }
        }

        return redirect(route('access.index',$id));

    }




    public function dashboard(){
        $user = Auth::user();
        if(view()->exists("dashboard.".$user->type)){
            return view("dashboard.".$user->type);
        }
        return redirect('event');
    }

    public function faqs($subdomain){
        // dd($subdomain);
        $event_id = Event::where("slug",$subdomain)->first()->id;
        $FAQs = \App\FAQ::where("event_id",$event_id);
        return view("event.faq")->with(compact("FAQs"));
    }

    public function privacyPolicy(){
        return view("event.tos");
    }

    public function confirmLogin(){
        return [
            "loggedIn" => (bool) Auth::user()
        ];
    }

    public function logout(){
        if(Auth::check()){
            $user = User::findOrFail(Auth::id());
            $user->online_status = 0;
            $user->save();
            if(Auth::user()->type == 'admin'){
                Auth::logout();
                return redirect('/login');
            }
            elseif(Auth::user()->type == 'eventee'){
                Auth::logout();
                return redirect()->route('Eventee.login');
            }
        }
    }
}
