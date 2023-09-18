@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of About us</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.aboutus.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new About Us
                </div>
            </a>
        </ol>

        <table class="table table-bordered" id="myDataTable">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Title</th>
                <th class="">Our mission</th>
                <th class="">Our Vision</th>
                <th class="">Image</th>
                <th class="">Image Cover</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
               @if(count($aboutuses) > 0)
                    @foreach ($aboutuses as $index=> $aboutus)
                          <tr>
                            <th scope="">{{$index +1}}</th>

                            <td>{{$aboutus->title}}</td>
                            <td>{{$aboutus->ourMission}}</td>
                            <td>{{$aboutus->ourVision}}</td>

                            <td><img src={{  asset('images' ).'/'.$aboutus->image}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td><img src={{  asset('images' ).'/'.$aboutus->image_cover}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.aboutus.edit',["id"=>$aboutus->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.aboutus.destroy',["id"=>$aboutus->id])}}" method="POST">
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
