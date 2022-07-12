<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionStoreRequest;
use App\Http\Resources\PositionResource;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PositionResource::collection(Position::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionStoreRequest $request
     * @return PositionResource
     */
//    public function store(Request $request)
    public function store(PositionStoreRequest $request)
    {
        $position = Position::create($request->validated());
        return new PositionResource($position);
    }

    /**
     * Display the specified resource.
     *
     * @param Position $position
     * @return PositionResource
     */
    public function show(Position $position)
    {
        return new PositionResource($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionStoreRequest $request
     * @param Position $position
     * @return PositionResource
     */
    public function update(PositionStoreRequest $request, Position $position)
    {
        $position->update($request->validated());
        return new PositionResource($position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return \response()->noContent();
    }
}
