<?php

namespace App\Http\Controllers;

use App\Models\Userrequest;
use App\Http\Requests\User_Request\StoreUserrequestRequest;
use App\Http\Requests\User_Request\UpdateUserrequestRequest;
use App\Http\Resources\UserrequestResource;
use App\Models\Cvrequest;
use App\Models\Jobposition;
use App\Models\UserJobposition;
use Exception;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserrequestController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        try
        {
            $this->middleware(['role:admin5','permission:create userrequests|edit userrequests|delete userrequests'],
            ['except' => ['store', 'update','destroy' ]]);
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
        $user_requests = QueryBuilder::for(Userrequest::class)
        ->with('user_jobposition.jobposition.companyspecialization.company.city','user_jobposition.jobposition.companyspecialization.specialization','user_jobposition.user')
        ->allowedFilters([
            AllowedFilter::exact('jobposition_id','user_jobposition.jobposition.id'),
            AllowedFilter::exact('user_id','user_jobposition.user.id'),
        ])
        ->get();

        $cvrequests = QueryBuilder::for(Cvrequest::class)
        ->with('user_jobposition.jobposition','user_jobposition.user')
        ->allowedFilters([
            AllowedFilter::exact('jobposition_id','user_jobposition.jobposition.id'),
            AllowedFilter::exact('user_id','user_jobposition.user.id'),
        ])
        ->get();

        $user_requests = UserrequestResource::collection($user_requests);

        return $this->apiResponse([$user_requests,$cvrequests],'تم استرجاع البيانات بنجاح',200);
    }

    public function create()
    {

    }

    public function store(StoreUserrequestRequest $request)
    {

        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        $user_request = Userrequest::create($request->validated());


        $user_jobposition=UserJobposition::create([
            'user_id'        =>$request->user_id,
            'jobposition_id' =>$request->jobposition_id,
            'userrequest_id' =>$user_request->id,
        ]);

        if($user_request)
        {
            return $this->apiResponse(UserrequestResource::make($user_request),'THE USER_REQUEST SAVE',201);
        }

            return $this->apiResponse(null,'THE USER_REQUEST NOT SAVE',400);
    }


    public function show(Jobposition $job_position)
    {

    }


    public function edit(Userrequest $userrequest)
    {
        //
    }

    public function update(UpdateUserrequestRequest $request, Userrequest $userrequest)
    {
        $userrequest->update(array_filter($request->validated(), fn ($value) => !is_null($value)));

        if($userrequest)
        {
            return $this->apiResponse(UserrequestResource::make($userrequest),'THE USER_REQUEST UPDATE',201);
        }

            return $this->apiResponse(null,'THE USER_REQUEST NOT FOUND',404);
    }

    public function destroy(Userrequest $userrequest)
    {
        $userrequest->delete();

        return  $this->apiResponse(UserrequestResource::make($userrequest),'THE USER_REQUEST DELETED',200);
    }
}
