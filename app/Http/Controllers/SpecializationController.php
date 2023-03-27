<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Http\Requests\Specialization\StoreSpecializationRequest;
use App\Http\Requests\Specialization\UpdateSpecializationRequest;
use App\Http\Resources\SpecializationResource;
use Exception;
use Spatie\QueryBuilder\QueryBuilder;

class SpecializationController extends Controller
{


    use ApiResponseTrait;

    public function __construct()
    {
        try
        {
            $this->middleware(['role:admin3','permission:create specializations|edit specializations|delete specializations']
        , ['except' => ['index' ]]);
        }
        catch(Exception $e)
        {
            $this->renderable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
                return response()->json([
                    'responseMessage' => 'You do not have the required authorization.',
                    'responseStatus'  => 403,
                ]);
            });
        }
    }

    public function index()
    {
        $specializations=QueryBuilder::for(Specialization::class)
        ->allowedFilters([
            'name',
            ])
        ->allowedSorts('name')
        ->get();

        $specializations = SpecializationResource::collection($specializations);

        return $this->apiResponse($specializations,'تم استرجاع البيانات بنجاح',200);

    }

    public function create()
    {

    }


    public function store(StoreSpecializationRequest $request)
    {
        $specialization = Specialization::create($request->validated());

        if($specialization)
        {
            return $this->apiResponse(SpecializationResource::make($specialization),'THE SPECIALIZATION SAVE',201);
        }

            return $this->apiResponse(null,'THE SPECIALIZATION NOT SAVE',400);
    }

    public function show(Specialization $specialization)
    {
        //
    }


    public function edit(Specialization $specialization)
    {
        //
    }


    public function update(UpdateSpecializationRequest $request, Specialization $specialization)
    {
        $specialization->update(array_filter($request->validated(), fn ($value) => !is_null($value)));

        if($specialization)
        {
            return $this->apiResponse(SpecializationResource::make($specialization),'THE SPECIALIZATION UPDATE',201);
        }

            return $this->apiResponse(null,'THE SPECIALIZATION NOT FOUND',404);
    }


    public function destroy(Specialization $specialization)
    {
        $specialization->delete();

        return  $this->apiResponse(SpecializationResource::make($specialization),'THE SPECIALIZATION DELETED',200);
    }
}
