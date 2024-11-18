<?php

namespace App\Http\Controllers;

use App\Models\myTask;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            "name"=>"required|string",
            "content"=>"required|string"
        ]);
    

    myTask::create( $validated );
    return back()->with(key:"sucess", value:'Task Created!');
}

    // public function edit($id){
        
    //     $myTask = myTask::find($id);

    //     dd($myTask);
    // }

    
    // public function edit(myTask $myTask){

    //     dd($myTask);
    // }

     public function edit($name){
        // get() to pull all records
        // first() to pull the first record that matches ur search condition
        // firstOrFail() to pull the first record that matches ur search condition or throw an error if its not found
        $myTask = myTask::where('name',$name)->firstOrFail();
      
        return view('edit', compact('myTask'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
             "name"=>"required|string",
            "content"=>"required|string"
            ]);

       $task = myTask::where("id",$id)->first();

       if (!$task) {
        return back()->with("error","Task Not Found");
       }

        $task->update($validated);

        return redirect()->route('home')->with(key:"success", value:"Task Updated");
    }

    public function delete($id)
    {
        $task = myTask::where("id",$id)->firstOrFail();
        $task->delete();
        return redirect()->route("home")->with("success", "Task Deleted");
    }
}
