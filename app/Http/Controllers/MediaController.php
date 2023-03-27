<?php

namespace App\Http\Controllers;

use App\Models\Cvrequest;
use App\Models\User;
use App\Models\UserJobposition;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{

    public function store(Request $request,$jobposition_id)
    {
        $user_id=auth()->user()->id;

        $count_request=UserJobposition::query()->where('user_id',$user_id)
                                        ->where('jobposition_id',$jobposition_id)
                                        ->count('id');

        if($count_request == 0)
        {
            $cvrequest=Cvrequest::create();

            $cvrequest->addMedia($request->media)->toMediaCollection('user_jobposition');

            $user_jobposition = UserJobposition::create([
                'user_id'        =>$user_id,
                'jobposition_id' =>$jobposition_id,
                'cvrequest_id' =>$cvrequest->id
            ]);

        }
        else
        {
            throw new HttpResponseException(response()->json([

                'success'   => false,

                'message'   => 'Validation errors',

                'data'      => 'you already send cv to this jobPosition'

            ]));
        }

        return response('THE  CV SEND SUCSESSFUL',201);

    }

    public function update(Request $request,$jobposition_id)
    {
        $user_id=auth()->user()->id;
        
        $cvrequest_id=UserJobposition::query()->where('user_id',$user_id)
        ->where('jobposition_id',$jobposition_id)->pluck('cvrequest_id');

        $cvrequest=Cvrequest::query()->where('id',$cvrequest_id)->first();

        $cvrequest->addMedia($request->media)->toMediaCollection('user_jobposition');

        return response('THE  CV  UPDATE  SUCSESSFUL',201);

    }
}
