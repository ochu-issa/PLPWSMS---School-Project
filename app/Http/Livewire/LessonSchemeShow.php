<?php

namespace App\Http\Livewire;

use App\Models\LessonScheme;
use App\Models\Subject;
use App\Models\UserHasSubject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LessonSchemeShow extends Component
{
    public $choosesubject, $subject_id, $description;
    // public $topics = [];

    protected function rules()
    {
        return [
            'subject_id' => 'required|unique:lesson_schemes',
            'description' => 'required|string|max:1000',
        ];
    }

    public function messages()
    {
        return ['subject_id.unique' => 'Scheme for this subject is already exists!',];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function storeLessonScheme()
    {
        $validatedData = $this->validate();

        $userId = Auth::user()->id;

        $validatedData['user_id'] = $userId;

        LessonScheme::create($validatedData);
        session()->flash('success', 'New scheme has been created successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    //load the  topic change on blade
    // public function loadTopic()
    // {
    //     if (!empty($this->subject_id)) {
    //         $subject = Subject::findOrFail($this->subject_id);
    //         $this->topics = $subject->topic;
    //     } else {
    //         $this->topics = [];
    //     }
    // }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->choosesubject = "";
        $this->subject_id = "";
        $this->description = "";
    }

    public function render()
    {

        // $this->choosesubject = Subject::latest()->get();
        $userid = Auth::user()->id;
        $this->choosesubject = UserHasSubject::where('user_id', $userid)
        ->whereNotIn('subject_id', function ($query) {
            $query->select('subject_id')
                ->from('lesson_schemes');
        })
        ->with('SubjectHas')->latest()->get();

        if(Auth::user()->hasAnyRole(['Super-Admin', 'Academic-Master'])){
            $scheme = LessonScheme::with(['subject'])->latest()->get();
        }else{
            $scheme = LessonScheme::where('user_id', $userid)->with(['subject'])->latest()->get();
        }


        return view('livewire.lesson-scheme-show', ['schemes' => $scheme]);
    }
}
