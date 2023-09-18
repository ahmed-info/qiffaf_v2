@extends('dashboard.layouts.layout')
@section('body')
    <main>
        <div class="container-fluid px-4">
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('status') }}
                </div>
            @endif
            <h1 class="mt-4">List of Sub Categories</h1>
            <ol class="breadcrumb mb-4">
                <a href="{{ route('dashboard.subcategories.create') }}">
                    <div class="btn btn-primary p-2 bd-highlight">
                        add new sub category
                    </div>
                </a>
            </ol>

            <table class="table table-bordered" id="myDataTable">
                <thead>
                    <tr>
                        <th class="">#</th>

                        <th class="">Category</th>
                        <th class="">Sub Category En</th>
                        <th class="">Sub Category Ar</th>
                        <th class="">Image</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($subcategories) > 0)
                        @foreach ($subcategories as $index => $subCategory)
                            <tr>
                                <th scope="">{{ $index + 1 }}</th>
                                <td>{{ $subCategory->category->{'title_' . app()->getLocale()} }}</td>
                                <td>{{ $subCategory->title_en }}</td>
                                <td>{{ $subCategory->title_ar }}</td>
                                <td><img src={{ asset('images') . '/' . $subCategory->image }} style="width: 100px"
                                        class="img-thumbnail" alt=""></td>
                                <td>

                                    <div class="">
                                        <div class="col-sm-6">
                                            <a href="{{ route('dashboard.subcategories.edit', ['id' => $subCategory->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                        <form action="{{route('dashboard.subcategories.destroy',["id"=>$subCategory->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                    </div> --}}
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
