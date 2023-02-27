@extends('master.admin.master')
@section('add-css')
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@section('body')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body" id="addForm">
            <h5 class="card-title text-primary mb-3">Create Task</h5>
            <form  action="{{ route('task.create') }}" method="POST" id="formSubmit">
                @csrf
{{--                    <input type="hidden" name="_token" value="">--}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"style="width: 110px">Task Name</span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Task Name">
                                <span class="text-danger" id="name_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Project Name</span>
                                </div>
                                <select class="form-control" name="project_id" id="project_id" style="border-radius:4px" required>
                                    <option value="">--Select Project--</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
                                    <option value="new">New Project</option>
                                </select>
                                <input type="text" name="project_name" class="form-control" style="display: none" id="newProjectName" placeholder="Project Name" aria-label="Project Name">
                            </div>
                            <span class="text-danger" id="project_id_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >Task Description</span>
                                </div>
                                <textarea  min="0" step="0.01" name="description" value="" class="form-control" placeholder="Task Description" ></textarea>
                            </div>
                            <span class="text-danger" id="description_error"></span>
                        </div>
                    </div>



                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"style="width: 110px">Start Date</span>
                                </div>
                                <input type="date" name="start_date"  min="0" class="form-control" >

                            </div>
                            <span class="text-danger" id="start_date_error"></span>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"style="width: 110px">End Date</span>
                                </div>
                                <input type="date" name="end_date"  min="0" class="form-control" >
                            </div>
                            <span class="text-danger" id="end_date_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"style="width: 110px">Assign By</span>
                                </div>
                                <input type="text" name="assign_by" value="{{ Auth::user()->name }}" class="form-control" readonly placeholder="If any  . . .">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"style="width: 110px">Assign To</span>
                                </div>
                                <select class="form-control" name="assign_to" id="assign_to" style="border-radius:4px" required>
                                    <option value="" selected disabled>--Select Project--</option>
                                  @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endforeach
                                </select>
                                <span class="text-danger" id="assign_to_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Create Task</button>
{{--                                <button type="reset" class="btn btn-warning"><i class="fa fa-times-circle"></i> Reset</button>--}}
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @include('admin.task.script')
@endsection

