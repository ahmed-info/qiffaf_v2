@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of Departments</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.department.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new Department
                </div>
            </a>
        </ol>

        <table class="table table-bordered" id="myDataTable">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Departments</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
               @if(count($departments) > 0)
                    @foreach ($departments as $index=> $department)
                          <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$department->title}}</td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.department.edit',["id"=>$department->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.department.destroy',["id"=>$department->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

    </div>
</main>
@endsection
