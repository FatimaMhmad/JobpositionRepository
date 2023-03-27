<?php

namespace App\Http\Controllers;

use App\Models\Jobposition;
use App\Http\Requests\Job_Position\StoreJobpositionRequest;
use App\Http\Requests\Job_Position\UpdateJobpositionRequest;
use App\Http\Resources\JobpositionResource;
use App\Http\Resources\UserrequestResource;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class JobpositionController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        try
        {
            $this->middleware(['role:admin4','permission:create job_positions|edit job_positions|delete job_positions'],
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

        $job_positions = QueryBuilder::for(Jobposition::class)
        ->with('companyspecialization.company.city','companyspecialization.specialization')
        ->allowedFilters([
            AllowedFilter::exact('company_id','companyspecialization.company.id'),
            AllowedFilter::exact('city_id','companyspecialization.company.city.id'),
            AllowedFilter::exact('specialization_id','companyspecialization.specialization.id'),
            AllowedFilter::scope('min_salary'),
            AllowedFilter::scope('max_salary'),
        ])
        ->allowedSorts('salary','date_of_publication')
        ->get();

        //$job_positions=Jobposition::get();
        $job_positions = JobpositionResource::collection($job_positions);

        return  $this->apiResponse($job_positions,'تم استرجاع البيانات بنجاح',200);

    }

    public function create()
    {
        //
    }

    public function store(StoreJobpositionRequest $request)
    {

        $jobposition = Jobposition::create($request->validated());


        if($jobposition)
        {
            return $this->apiResponse(JobpositionResource::make($jobposition),'THE  JOBPOSITION SAVE',201);
        }

            return $this->apiResponse(null,'THE JOBPOSITION NOT SAVE',400);
    }

    public function show(Jobposition $jobposition)
    {


    }

    public function edit(Jobposition $jobposition)
    {
        //
    }

    public function update(UpdateJobpositionRequest $request, Jobposition $jobposition)
    {
        $jobposition->update(array_filter($request->validated(), fn ($value) => !is_null($value)));


        if($jobposition)
        {
            return $this->apiResponse(JobpositionResource::make($jobposition),'THE JOBPOSITION UPDATE',201);
        }

            return $this->apiResponse(null,'THE JOBPOSITION NOT FOUND',404);
    }

    public function destroy(Jobposition $jobposition)
    {
        $jobposition->delete();

        return  $this->apiResponse(JobpositionResource::make($jobposition),'THE JOBPOSITION DELETED',200);
    }
}
