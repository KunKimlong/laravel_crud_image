<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = student::select('*')->get();    
        // echo $result;
        return view('Admin.view',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','string','max:50'],
            'gender'=>['required','string','max:7','min:4'],
            'acrivity'=>['required','numeric'],
            'attendent'=>['required','numeric'],
            'exam'=>['required','numeric'],
            'photo'=>['required'],
        ]);
        $name     = $request->input('name');
        $gender   = $request->input('gender');
        $act      = $request->acrivity;
        $att      = $request->attendent;
        $exam     = $request->exam;
        $photo    = $request->file('photo');
        if($photo){
            $path = 'assets/image';
            $image = time().'_'.$photo->getClientOriginalName();
            $photo->move($path,$image);
        }

        $total = $act + $att + $exam;
        $average = $total / 3;
        if($average>=90){
            $grade = 'A';
        }
        else if($average>=80){
            $grade = 'B';
        }
        else if($average>=80){
            $grade = 'C';
        }
        else if($average>=80){
            $grade = 'D';
        }
        else if($average>=80){
            $grade = 'E';
        }
        else{
            $grade = 'F';
        }

        student::create([
            'name'=>$name,
            'gender'=>$gender,
            'activites'=>$act,
            'attendet'=>$att,
            'exam'=>$exam,
            'total'=>$total,
            'average'=>$average,
            'grade'=>$grade,
            'profile'=>$image,
        ]);

       return redirect()->route('addstudent');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student,$id)
    {
        // echo $id;
        $result = student::select('*')->where('id',$id)->first();

        return view('Admin.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student,$id)
    {

        $update = student::select('*')->where('id',$id)->first();
        
        $this->validate($request,[
            'name'=>['required','string','max:50'],
            'gender'=>['required','string','max:7','min:4'],
            'acrivity'=>['required','numeric'],
            'attendent'=>['required','numeric'],
            'exam'=>['required','numeric'],
        ]);
        $name     = $request->input('name');
        $gender   = $request->input('gender');
        $act      = $request->acrivity;
        $att      = $request->attendent;
        $exam     = $request->exam;
        $photo    = $request->file('photo');
        // !empty photo
        if($photo){
            $path = 'assets/image';
            $image = time().'_'.$photo->getClientOriginalName();
            $photo->move($path,$image);
        }
        else{
            $image = $request->old_image;
        }

        $total = $act + $att + $exam;
        $average = $total / 3;
        if($average>=90){
            $grade = 'A';
        }
        else if($average>=80){
            $grade = 'B';
        }
        else if($average>=80){
            $grade = 'C';
        }
        else if($average>=80){
            $grade = 'D';
        }
        else if($average>=80){
            $grade = 'E';
        }
        else{
            $grade = 'F';
        }

        $update->update([
            'name'=>$name,
            'gender'=>$gender,
            'activites'=>$act,
            'attendet'=>$att,
            'exam'=>$exam,
            'total'=>$total,
            'average'=>$average,
            'grade'=>$grade,
            'profile'=>$image,
        ]);

        return redirect()->route('view');
    
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
