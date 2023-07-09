<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;

class TopicShow extends Component
{
    public $choosesubject, $topic_name, $subject_id, $topic_id;

    protected function rules()
    {
        return [
            'topic_name' => ['required', 'string',
            (new Unique('topics'))->ignore($this->topic_id, 'id')],
            'subject_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'topic_name.unique' => 'The topic name is already been registered in database'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function storeTopic()
    {
        $validateData = $this->validate();

        Topic::create($validateData);
        session()->flash('success', 'New topic is added successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

    }

    public function updateTopic(int $topicid)
    {
        $this->topic_id = $topicid;
        $topicdetails = Topic::find($this->topic_id);
        if($topicdetails)
        {
            $this->topic_name = $topicdetails->topic_name;
            $this->subject_id = $topicdetails->subject_id;

        }else{
            return redirect('/retrievetopic');
        }
    }

    public function editTopic()
    {
        $validatedData = $this->validate();

        Topic::where('id', $this->topic_id)->update([
            'topic_name' => $validatedData['topic_name'],
            'subject_id' => $validatedData['subject_id'],
        ]);
        session()->flash('success', 'Topic updated successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteTopic(int $topicid)
    {
        $this->topic_id = $topicid;
    }

    public function destroyTopic()
    {
        Topic::find($this->topic_id)->delete();
        session()->flash('success', 'Topic deleted successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function closeModal()
    {
        return $this->resetInput();
    }

    public function resetInput()
    {
        $this->topic_id ="";
        $this->topic_name = "";
        $this->subject_id = "";
        $this->choosesubject = "";
    }

    public function render()
    {
        $this->choosesubject = Subject::orderBy('id', 'Desc')->get();
        $topic = Topic::with('subject')->orderByDesc('id')->get();

        return view('livewire.topic-show', ['topics'=>$topic]);
    }
}
