<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Livewire\Component;

class StudentsComponent extends Component
{
    public $name = '', $phone = '', $student_id = '' ,$email = '',$student_edit_id ='';
    public function storeNewStudent()
    {

        $credential = $this->validate([
            'student_id' => 'required|numeric',
            'phone' => 'required',
            'name' => 'required|string|',
            'email' => 'required|email',
        ]);
        $this->reset();
        Student::create($credential);
        $this->dispatchBrowserEvent('close-modal');
        Session()->flash('message', 'This Student Created Correctlly');
    }
    public function editStudent($id)
    {
        // dd($a) ;
        $student = Student::where('id',$id)->first();
        // $this->student_id = $student->student_id ;
        // dd($student);

        $this->student_edit_id = $student['id'];
        $this->student_id = $student['student_id'];
        $this->name = $student['name'];
        $this->email = $student['email'];
        $this->phone = $student['phone'];


        $this->dispatchBrowserEvent('edit-student-show-modal');
    }

    public function editStudentData()
    {

        $credential = $this->validate([
            'student_id' => 'required|numeric|unique:students,student_id,'.$this->student_edit_id . '',
            'phone' => 'required',
            'name' => 'required|string|',
            'email' => 'required|email',
        ]);
        $student = Student::where('id',$this->student_edit_id)->first();
        // dd($this->student_id);
        $student->student_id = $this->student_id ;
        $student->phone = $this->phone ;
        $student->email = $this->email ;
        $student->name = $this->name ;
        $student->save();
        $this->dispatchBrowserEvent('close-edit-modal');
        session()->flash('message','This Student has been updated');
    }



    // $student->update($credential);

    // dd($student);



    public function render()
    {
        $students = Student::query()->latest()->paginate();

        return view('livewire.student', ['students' => $students])->layout('livewire.layouts.base');
    }
}
