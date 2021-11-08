<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = Menu::where('parent_id', '0')->where('type', 'nav')->orderby('position', 'asc')->get();
        return view('menus.menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $menu = Menu::findOrFail($request->id);
        return response()->json($menu);
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
        foreach ($request->position as $positions) {
            $id = $positions[1];
            $position = $positions[0];
            \DB::update('UPDATE menus set position = ? where id = ? and  event_id = ?', [$position, $id,$request->event_id]);
        }
        return response()->json(['message' => 'success']);
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
}
