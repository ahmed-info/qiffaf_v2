@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of models</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.modeel.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new Model
                </div>
            </a>
        </ol>

        <table class="table table-bordered" id="myDataTable">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Product</th>
                <th class="">Title</th>
                <th class="">Description</th>
                <th class="">Text</th>
                <th class="">Image</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
               @if(count($modeels) > 0)
                    @foreach ($modeels as $index=> $modeel)
                          <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$modeel->product->title}}</td>
                            <td>{{$modeel->title}}</td>
                            <td>{{$modeel->description}}</td>
                            <td>{{$modeel->text}}</td>

                            <td><img src={{  asset('images' ).'/'.$modeel->image}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.modeel.edit',["id"=>$modeel->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.modeel.destroy',["id"=>$modeel->id])}}" method="POST">
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
