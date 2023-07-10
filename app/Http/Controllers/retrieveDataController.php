<?php

namespace App\Http\Controllers;

use App\Models\LessonScheme;
use App\Models\PlanScheme;
use App\Models\SchemeDetails;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\User;
use App\Models\UserHasSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class retrieveDataController extends Controller
{
    public function dashboard()
    {
        return view('empty');
    }

    public function Profile()
    {
        return view('profile');
    }

    // retrieve  subject
    public function retrieveSubject()
    {
        if (!Auth::user()->hasAnyRole(['Super-Admin', 'Academic-Master'])) {
            return back()->with('error', 'You are not authorized to open this page');
        }
        return view('subjectView');
    }

    //retrieve topics
    public function retrieveTopic()
    {
        if (!Auth::user()->hasAnyRole(['Super-Admin', 'Academic-Master'])) {
            return back()->with('error', 'You are not authorized to open this page');
        }
        return view('topic');
    }

    //retrieve working
    public function workingScheme()
    {
        return view('workingscheme');
    }

    //retrieve scheme details
    public function schemeDetails($id)
    {

        $scheme = LessonScheme::findOrFail($id);
        $subject = Subject::with('topic')->find($scheme->subject_id);
        $schemeDetails = SchemeDetails::get();
        return view('schemeDetails', ['scheme' => $scheme, 'subjects' => $subject, 'schemeDetails' => $schemeDetails]);
    }

    //retrieve teacher
    public function retrieveTeacher()
    {
        if (!Auth::user()->hasRole(['Super-Admin', 'Academic-Master'])) {
            return back()->with('error', 'You are not authorized to open this page');
        }
        $teachers = User::with('HasUser.SubjectHas')->role('Teacher')->latest()->get();
        $subject = Subject::whereDoesntHave('userHasSubject')->latest()->get();
        $allsubject = Subject::get();
        return view('teacher', ['subjects' => $subject, 'teachers' => $teachers, 'userTeachers' => $teachers, 'allsubject' => $allsubject]);
    }

    //retrieve academic master and super-admin
    public function retrieveAcademicMaster()
    {
        if (!Auth::user()->hasRole(['Super-Admin'])) {
            return back()->with('error', 'You are not authorized to open this page');
        }
        $academimaster = User::role(['Academic-Master', 'Super-Admin'])->latest()->get();
        return view('academimaster', ['academicmasters' => $academimaster]);
    }


    //retrieve Lesson Plan
    public function lessonPlan()
    {
        $userid = Auth::user()->id;
        UserHasSubject::where('user_id', $userid)
            ->whereNotIn('subject_id', function ($query) {
                $query->select('subject_id')
                    ->from('lesson_schemes');
            })
            ->with('SubjectHas')->latest()->get();

        if (Auth::user()->hasAnyRole(['Super-Admin', 'Academic-Master'])) {
            $scheme = LessonScheme::with(['subject'])->latest()->get();
        } else {
            $scheme = LessonScheme::where('user_id', $userid)->with(['subject'])->latest()->get();
        }

        return view('lessonPlan', ['schemes' => $scheme]);
    }

    //retrieve scheme details
    public function planDetails($id)
    {
        $scheme = LessonScheme::findOrFail($id);
        $subject = Subject::with('topic')->find($scheme->subject_id);
        $schemeDetails = SchemeDetails::get();
        //dd($subject->topic);
        foreach($subject->topic as $topic){
            $plans = PlanScheme::where('topic_id', $topic->id)->with('topic')->latest()->get();
           // dd($topic->id);
        }


        return view('planDetails', [
            'scheme' => $scheme,
            'subjects' => $subject,
            'plans' => $plans,
            'schemeDetails' => $schemeDetails,
        ]);
    }
}
