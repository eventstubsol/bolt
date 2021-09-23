<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api;
use Illuminate\Support\Facades\Log;

class RecatchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $apis = Api::where('type','captcha')->orderBy('id','asc')->get();
            return view('analytic.recaptcha',compact('apis'));
        }
        catch (\Exception $e) {
            Log::error($e->getMessage());
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'title'=>'required',
            'site_key'=> 'required',
            'secret_key' => 'required',
        ]);
        $data = $request->all();
        $key = PHP_EOL.'RECAPTCHA_SITE_KEY';
        $value = $request->site_key;
        $key2 = 'RECAPTCHA_SECRET_KEY';
        $value2 = $request->secret_key;
        Api::create($data);
        return redirect()->back();      
        
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

    public function updateCatcha(Request $req){
        try{
           $api = Api::findOrFail($req->id);
            $api->title = $req->title;
            $api->site_key = $req->site_key;
            $api->secret_key = $req->secret_key;
            if($api->save()){
                return redirect()->back();
            }
            else{
                return "something went wrong";
            } 
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function Comet(){
        $apis = Api::where('type','comet')->get();
        return view('analytic.comet',compact('apis'));
    }
    public function CometSave(Request $request){
        $request->validate([
            'title' => 'required',
            'appid' => 'required',
            'region'=> 'required',
            'auth'=> 'required',
            'appkey'=> 'required',
            'gtype'=> 'required',
            'base'=> 'required',

        ]);

        $title = $request->title;
        $appID = $request->appid;
        $region = $request->region;
        $auth = $request->auth;
        $ApiKey = $request->appkey;
        $gtype  = $request->gtype;
        $base = $request->base;
        $key = PHP_EOL.'COMET_CHAT_APP_ID';
        API::create(['title'=>$title,'type'=>$request->type,'appkey'=>$request->appkey]);

        return redirect()->back();   
        

    }

    public function Zoom(){
        $apis = Api::where('type','zoom')->get();
        return view('analytic.zoom',compact('apis'));
    }

    public function ZoomSave(Request $request){
        $request->validate([
            'title' => 'required',
            'appkey'=> 'required',
            'secret_key'=> 'required',

        ]);
        $key = PHP_EOL.'ZOOM_API_KEY';
       
        $data = $request->all();
        Api::create($data);
        return redirect()->back();
    }
}
