<?php

namespace App\Http\Controllers\API\v1;

use App\Helpers\Admin\CheckHead;
use App\Helpers\Admin\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\PositionUpdateRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeStoreRequest $request
     * @return EmployeeResource
     */
    public function store(EmployeeStoreRequest $request)
    {
        $result = $request->validated();
        if ( !CheckHead::check($request->head) ){
            return response()->json([
                'message' => 'An employee cannot have subordinates',
            ], 422);
        }
        $result = UploadFileHelper::uploadFile($request, $result);
        $employee = Employee::create($result + ['admin_created_id'=> Auth::id(), 'admin_updated_id' => Auth::id()]);
        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return EmployeeResource
     */
    public function show( Employee $employee )
    {
        return new EmployeeResource( $employee );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionUpdateRequest $request
     * @param Employee $employee
     * @return EmployeeResource
     */
    public function update(PositionUpdateRequest $request, Employee $employee)
    {
        $result = $request->validated();
        if ( !CheckHead::check($request->head) ){
            return response()->json([
                'message' => 'An employee cannot have subordinates',
            ], 422);
        }
        $result = UploadFileHelper::uploadFile($request, $result);
        $employee->update( $result + ['admin_updated_id' => Auth::id()]);
        return new EmployeeResource( $employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return \response()->noContent();
    }
}
