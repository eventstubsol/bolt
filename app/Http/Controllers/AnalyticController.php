<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api;
use Illuminate\Support\Facades\Log;

class AnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $apis = Api::where('type', 'analytic')->orderBy('id', 'asc')->get();
        return view('analytic.index', compact('apis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        $api = Api::findOrFail($req->id);
        return response()->json($api);
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
        try {
            $request->validate([
                'title' => 'required',
                'view_id' => 'required',
                'file' => 'required',
            ]);
            $view_id = $request->view_id;
            $track_id = $request->tracking_id;
            $key1 = PHP_EOL . 'GA_TRACKING_ID';
            $key2 = 'GA_VIEW_ID';
            if (env('GA_TRACKING_ID')) {
                return "Something Went Wrong";
            } else {
                UpdateEnv($key1, $track_id);
                UpdateEnv($key2, $view_id);
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $name = $file->getClientOriginalName();
                    $file_location = public_path('third_party');
                    $total = $file_location . '/' . $name;
                    $file->move($file_location, $name);
                    $api = new Api;
                    $api->title = $request->title;
                    $api->type = $request->type;
                    $api->view_id = $request->view_id;
                    $api->file_location = $total;
                    if ($api->save()) {
                        return redirect()->back();
                    } else {
                        return "Something Went Wrong";
                    }
                }

                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
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

    public function GetDetails(Request $request)
    {
        $api = Api::findOrFail($request->id);
        return response()->json($api);
    }
    public function updateData(Request $request)
    {
        // $request->validate([
        //     'title'=> 'required',
        //     'description' => 'required',
        //     'view_id' => 'required',
        //     'file' => 'required',
        // ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file_location = public_path('third_party');
            $total = $file_location . '/' . $name;
            $file->move($file_location, $name);
            $api = Api::findOrFail($request->id);
            $api->title = $request->title;
            $api->type = $request->type;
            $api->description = $request->description;
            $api->view_id = $request->view_id;
            $api->file_location = $total;
            if ($api->save()) {
                return redirect()->back();
            } else {
                return "Something Went Wrong";
            }
        } else {
            $api = Api::findOrFail($request->id);
            $api->title = $request->title;
            $api->type = $request->type;
            $api->description = $request->description;
            $api->view_id = $request->view_id;
            if ($api->save()) {
                return redirect()->back();
            } else {
                return "Something Went Wrong";
            }
        }

        return redirect()->back();
    }


    public function DeleteData(Request $req)
    {
        $api = Api::findOrFail($req->id);
        if ($api->delete()) {
            return redirect()->back();
        } else {
            return "Something Went Wrong";
        }
    }
}
