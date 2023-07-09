<?php

namespace App\Http\Livewire;

use App\Models\Subject as ModelsSubject;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;


class Subject extends Component
{

    public $subjectname, $std, $subject_id;
    public $subjects;
    public int $no = 1;


    protected function rules()
    {
        return [
            'subjectname' => [
                'required',
                'string',
                (new Unique('subjects'))->ignore($this->subject_id, 'id'),
            ],
            'std' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'subjectname.unique' => 'The subject name is already exists.',
        ];
    }

    //update
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    //store the data to the database
    public function storeSubject()
    {
        $validatedData = $this->validate();

        ModelsSubject::create($validatedData);
        session()->flash('success', 'Subject is added successfully!');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    //edit subject data
    public function updateSubject()
    {
        $validatedData = $this->validate();
        ModelsSubject::where('id',  $this->subject_id)->update([
            'subjectname' => $validatedData['subjectname'],
            'std' => $validatedData['std'],
        ]);
        session()->flash('success', 'Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    //call the data to the modal
    public function editSubject(int $subject_id)
    {
        $this->subject_id = $subject_id;

        $subject = ModelsSubject::find($subject_id);

        if ($subject) {
            $this->subjectname = $subject->subjectname;
            $this->std = $subject->std;
        } else {
            return redirect()->to('/retrievesubject');
        }
    }

    //delete data
    public function deleteSubject(int $subject_id)
    {
        $this->subject_id = $subject_id;
    }

    //destroy student
    public function destroySubject()
    {
        $delete = ModelsSubject::find($this->subject_id);
        $delete->topic()->delete();
        $delete->delete();
        session()->flash('success', 'Deleted Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    //close Modal
    public function closeModal()
    {
        return $this->resetInput();
    }

    //reset Input
    public function resetInput()
    {
        $this->subjectname = "";
        $this->std = "";
    }

    public function render()
    {
        $this->subjects = ModelsSubject::orderByDesc('id')->get();

        return view('livewire.subject', ['subjects' => $this->subjects, 'no' => $this->no]);
    }
}
