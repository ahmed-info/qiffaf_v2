@extends('dashboard.layouts.layout')
@section('body')
    <main>
        <div class="container-fluid px-4">
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('status') }}
                </div>
            @endif
            <h1 class="mt-4">List of Gallery</h1>
            <ol class="breadcrumb mb-4">
                <a href="{{ route('dashboard.gallery.create') }}">
                    <div class="btn btn-primary p-2 bd-highlight">
                        add new photo gallery
                    </div>
                </a>
            </ol>

            <table class="table table-bordered" id="myDataTable">
                <thead>
                    <tr>
                        <th class="">#</th>

                        <th class="">Subcategory</th>
                        <th class="">Product</th>
                        <th class="">Image</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($galleries) > 0)
                        @foreach ($galleries as $index => $gallery)
                            <tr>
                                <th scope="">{{ $index + 1 }}</th>
                                @if ($gallery->subcategory == null)
                                    <td>---</td>
                                @else
                                    <td>{{ $gallery->subcategory->{'title_' . app()->getLocale()} }}</td>
                                @endif

                                @if ($gallery->product_id == null)
                                    <td>---</td>
                                @else
                                    <td>{{ $gallery->product->{'title_' . app()->getLocale()} }}</td>
                                @endif

                                <td><img src={{ asset('images') . '/' . $gallery->image }} style="width: 100px"
                                        class="img-thumbnail" alt=""></td>
                                <td>

                                    <div class="">
                                        <div class="col-sm-6">
                                            <a href="{{ route('dashboard.gallery.edit', ['id' => $gallery->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <form action="{{ route('dashboard.gallery.destroy', ['id' => $gallery->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>
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
