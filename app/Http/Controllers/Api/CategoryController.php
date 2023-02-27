<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;


class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return $this->sendResponse(CategoryResource::collection($category),'Category Retrieved');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'name'           =>'required',

        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }
        $category = Category::create($request->all());
        return $this->sendResponse(new CategoryResource($category),'Category Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Category::find($id);
        if (is_null($category)){
            return $this->sendError('Category Not found');
        }
        return $this->sendResponse(new CategoryResource($category),'Category Is Found');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(),[
            'name'           =>'required',

        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }
        $category->update($request->all());
        return $this->sendResponse(new CategoryResource($category),'Category Is Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->sendResponse(new CategoryResource($category),'Category Is Deleted');
    }
}
