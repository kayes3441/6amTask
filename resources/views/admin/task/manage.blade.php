@extends('master.admin.master')
@section('add-css')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')





<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manage Product Datatable</h4>
                <h6 class="text-success text-center">{{Session::get('message')}}</h6>
                <table class="table table-nowrap dataTable no-footer" id="datatable" role="grid" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Task Name</th>
                        <th>Assign By</th>
                        <th>Assign To</th>
                        <th>Project Name</th>
                        <th>Start Date </th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $task->name}}</td>
                            <td>{{ $task->assign_by}}</td>
                            <td>{{ $task->user->name}}</td>
                            <td>{{ $task->project->project_name}}</td>

                            <td>{{ Carbon\Carbon::parse($task->start_date)->format('d-m-y')}}</td>
                            <td>{{ Carbon\Carbon::parse($task->end_date)->format('d-m-y')}}</td>

                            <td>
                                @if ($task->status ==0)
                                    <span class="badge badge-danger">Todo</span>
                                @endif
                                @if ($task->status ==1)
                                    <span class="badge badge-warning">In-progress</span>
                                @endif
                                @if ($task->status ==2)
                                    <span class="badge badge-primary">Completed</span>
                                @endif

                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="{{ route('task.status.update',['id'=>$task->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" name="status" value="0" style="width: 100%">
                                                <span  class="dropdown-item" >Todo</span>
                                            </button>

                                        </form>
                                        <form action="{{ route('task.status.update',['id'=>$task->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-warning"  name="status" value="1" style="width: 100%">
                                            <span type="submit" class="dropdown-item">In-progress</span>
                                            </button>
                                        </form>
                                        <form action="{{ route('task.status.update',['id'=>$task->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" name="status" value="2" style="width: 100%">
                                                <span type="submit" class="dropdown-item" >Completed</span>
                                            </button>
                                        </form>


                                    </div>
                                    <a href="{{route('task.delete',['id'=>$task->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this..');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection

@section('js')
    @include('admin.task.script')
@endsection

