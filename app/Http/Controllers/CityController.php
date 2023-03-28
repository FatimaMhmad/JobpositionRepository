<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\Http\Resources\CityResource;
use Exception;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\QueryBuilder\QueryBuilder;

class CityController extends Controller
{

    use ApiResponseTrait;

    public function __construct()
    {
        try
        {
            $this->middleware(['role:admin2','permission:create cities|edit cities|delete cities'],
            ['except' => ['index' ]]);
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
        //index
        $cities = QueryBuilder::for(City::class)
        ->allowedFilters([
            'name',
            ])
        ->allowedSorts('name')
       // ->withCount('companies')
        ->get();

        $cities = CityResource::collection($cities);

        return $this->apiResponse($cities,'تم استرجاع البيانات بنجاح',200);
    }


    public function create()
    {
        //
    }


    public function store(StoreCityRequest $request)
    {
        $city = City::create($request->validated());

        if($city)
        {
            return $this->apiResponse(CityResource::make($city),'THE CITY SAVE',201);
        }

            return $this->apiResponse(null,'THE CITY NOT SAVE',400);

    }


    public function show(City $city)
    {
        //
    }


    public function edit(City $city)
    {
        //
    }


    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update(array_filter($request->validated(), fn ($value) => !is_null($value)));

        if($city)
        {
            return $this->apiResponse(CityResource::make($city),'THE CITY UPDATE',201);
        }

            return $this->apiResponse(null,'THE CITY NOT FOUND',404);
    }


    public function destroy(City $city)
    {
            $city->delete();

            return  $this->apiResponse(CityResource::make($city),'THE CITY DELETED',200);
    }
}
