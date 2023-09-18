@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of Model detail</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.modeeldetail.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new Model Detail
                </div>
            </a>
        </ol>

        <table class="table table-bordered" id="myDataTable">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Model</th>
                <th class="">Title</th>
                <th class="">Description</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
               @if(count($modeeldetails) > 0)
                    @foreach ($modeeldetails as $index=> $modeeldetail)
                          <tr>
                            <th scope="">{{$index +1}}</th>

                            <td>{{$modeeldetail->modeel->title}}</td>
                            <td>{{$modeeldetail->title}}</td>
                            <td>{{$modeeldetail->description}}</td>

                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.modeeldetail.edit',["id"=>$modeeldetail->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.modeeldetail.destroy',["id"=>$modeeldetail->id])}}" method="POST">
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
