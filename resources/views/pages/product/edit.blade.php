@extends('dashboard.layouts.layout')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Product</li>
            </ol>
            <form action="{{ route('dashboard.product.update', ['id' => $product->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group">
                        <h6>Select Company</h6>
                        <select class="form-control select2" name="company_id" style="..." id="company_id">
                            <option value="0" selected="selected">Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}"
                                    @if ($company->id == $product->company_id) selected="selected" @endif>
                                    {!! $company->title !!}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <div class="form-group mb-3">
                            <label for="title">
                                <h4>Product</h4>
                            </label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $product->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <h3>Image Product</h3>
                        <label for="image">Recomended Size: 370 X 370</label>
                        <!-- asset('assets/img/header-bg.jpg') -->
                        @if ($product->image >0)
                        <img style="height: 30vh" src="{{asset('images/'.$product->image)}}" class="img-thumbnail" alt="">
                        @else
                        <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                        @endif
                        <input type="file" class="mt-3" name="image" id="image">
                    </div>

                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-1">
            </form>
        </div>
    </main>
@endsection
