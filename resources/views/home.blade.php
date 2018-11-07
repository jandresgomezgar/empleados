@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a class="btn btn-sucess" href="">Create new</a>
                    <table dd="table-employees" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Job Title</td>
                                <td>Location</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Employees as $key => $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->job_title }}</td>
                                <td>{{ $value->location }}</td>

                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('employees/' . $value->id . '') }}">Edit</a>

                                    {{ Form::open(array('url' => 'employees/' . $value->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                    {{ Form::close() }}

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <center>
                    {{ $Employees->links() }}
                    </center>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <center>
                @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif  

            </center>
        </div>  
    </div>

</div>
@endsection
