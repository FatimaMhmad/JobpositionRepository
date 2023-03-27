<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\CompanySpecialization;
use Exception;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CompanyController extends Controller
{

    use ApiResponseTrait;

    public function __construct()
    {
        try
        {
            $this->middleware(['role:admin1','permission:create companies|edit companies|delete companies']
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

        $companies = QueryBuilder::for(Company::class)
        ->allowedFilters([
        AllowedFilter::exact('city_id'),
        'name',
        ])
        ->allowedSorts('name','address')
        ->with('city')
        ->get();

        $companies = CompanyResource::collection($companies);

        return $this->apiResponse($companies,'تم استرجاع البيانات بنجاح',200);

    }


    public function create()
    {
        //
    }


    public function store(StoreCompanyRequest $request)
    {


        $company = Company::create($request->validated());

        $specializations_added_to_company = $request->specialization_id;

        if ($specializations_added_to_company != null)
        {

            $company->specializations()->attach($specializations_added_to_company);
        }

        if($company)
        {
            return $this->apiResponse(CompanyResource::make($company),'THE  COMPANY SAVE',201);
        }

            return $this->apiResponse(null,'THE COMPANY NOT SAVE',400);
    }


    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company)
    {
        //
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update(array_filter($request->validated(), fn ($value) => !is_null($value)));


        $company->specializations()->sync($request->specialization_id);

        if($company)
        {
            return $this->apiResponse(CompanyResource::make($company),'THE COMPANY UPDATE',201);
        }

            return $this->apiResponse(null,'THE COMPANY NOT FOUND',404);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return  $this->apiResponse(CompanyResource::make($company),'THE COMPANY DELETED',200);
    }
}
