<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use Validator;
use Auth;
use Carbon\Carbon;
class TaskController extends BaseController
{
    public function index(){
        return view('admin.task.index',[
            "users"     =>User::all(),
            "projects"  =>Project::all(),
        ]);
    }
    public function create(Request $request){

       // return $request->all();
        $validator = Validator::make($request->all(),[
            'name'            =>'required',
            'project_id'      =>'required',
            'description'     =>'required',
            // user_id means  assign the task whom ..
            'assign_to'         =>'required|numeric',
            'start_date'      =>'required',
            'end_date'        =>'required',
            'end_date'        =>'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }


        $task                       = new Task();
        $task->name                 = $request->name;
        if ($request->project_id   == 'new'){
            $project                = new Project();
            $project->project_name  = $request->project_name;
            $project->save();
            $task->project_id       = $project->id;
        }
        else {

            $task->project_id       = $request->project_id;
        }
        $task->description          = $request->description;
        $task->assign_to            = $request->assign_to;
        $task->start_date           = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $task->end_date             = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $task->assign_by            = $request->assign_by;
        $task->save();

        return 'success';

    }

    public function manage(){

        if(Auth::user()->id == 1){
            $task = Task::orderBy('id','desc')->with('project','user')->get();
        }

        else{
            $task = Task::where('assign_to',Auth::user()->id)->with('project','user')->get();
        }
        return view('admin.task.manage',[
            'tasks'=>$task
        ]);
    }

    public function status_update(Request $request ,$id){

       // return $request->status;
       $task         = Task::find($id);
       $task->status = $request->status;
       $task->save();
       return redirect()->back()->with('message','Status Updated');
    }

    public function delete($id){
        $task = Task::find($id)->delete();
        return redirect()->back()->with('message','Deleted Task');
    }
}
