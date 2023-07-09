<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\PlanScheme;
use App\Models\SchemeDetails;
use App\Models\User;
use App\Models\UserHasSubject;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class storeDataController extends Controller
{
    //store Scheme Period
    public function createSchemePeriod(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'from_date' => 'required|date|after_or_equal:today',
            'to_date' => 'required|date|after_or_equal:today',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        SchemeDetails::create([
            'scheme_id' => $request->scheme_id,
            'topic_id' => $request->topic_id,
            'to_date' => $request->to_date,
            'from_date' => $request->from_date,
        ]);

        return back()->with('success', 'Scheme created successfully');
    }

    public function createTeacher(UserRequest $request)
    {

        $request->validated($request->all());
        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ])->assignRole('Teacher');


        $subjectIds = $request->input('subject_id', []);

        if (!is_array($subjectIds)) {
            $subjectIds = [$subjectIds];
        }

        foreach ($subjectIds as $subjectId) {
            UserHasSubject::create([
                'user_id' => $user->id,
                'subject_id' => $subjectId,
            ]);
        }
        return back()->with('success', 'New teacher created successfully');
    }

    //STORE academic master
    public function createAcademicMaster(UserRequest $request)
    {

        $request->validated($request->all());
        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        if($request->rolename == 'Academic-Master'){
            $user->assignRole('Academic-Master');
        }else{
            $user->assignRole('Super-Admin');
        }

        return back()->with('success', 'New user created successfully');
    }

    //STORE academic master
    public function createSuperAdmin(UserRequest $request)
    {

        $request->validated($request->all());
        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ])->assignRole('Super-Admin');

        return back()->with('success', 'New super admin created successfully');
    }


    //add plan
    public function addPlan(Request $request)
    {
        PlanScheme::create([
            'topic_id' => $request->topicid,
            'plandate' => $request->plandate,
            'toolused' => $request->toolused,
            'knowledgeacquired' => $request->knowledgeacquired,
        ]);
        return back()->with('success', 'New plan created successfully');

    }
}
