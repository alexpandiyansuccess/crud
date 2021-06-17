<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminPostRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Admin::paginate()
        );
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
    public function store(StoreAdminPostRequest $request)
    {
        // dd($request->all(),$request->validated());

        Admin::create($request->validated());

            return response()->json([
            'message' => 'created successfully !.'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $post = Admin::findOrFail($id);
        // return new AdminController($post);
        return $post;
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
        $post = Admin::findOrFail($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;


        if($post->save()){
            return response()->json([
                'message'=>"Updated Successfully"
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Admin::findOrFail($id);

        if($post->delete()){
            return response()->json([
            'message'=>"deleted successfully"
            ]);
        }
    }
}
