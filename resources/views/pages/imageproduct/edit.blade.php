@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Image product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Image product</li>
        </ol>
        <form action="{{route('dashboard.imageproduct.update',["id"=>$imageproduct->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <h6>Select Product</h6>
            <select class="form-control select2" name="product_id" style="..." id="product_id">
                <option value="0" selected="selected">Main Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        @if ($product->id == $imageproduct->product_id) selected="selected" @endif>
                        {!! $product->title !!}</option>
                @endforeach
            </select>
            @error('product_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="row">

            <div class="form-group col-md-4 mt-3">
                <h3>Image company</h3>
                <label for="image">Recomended Size: 370 X 370</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($imageproduct->image >0)
                <img style="height: 30vh" src="{{asset('images/'.$imageproduct->image)}}" class="img-thumbnail" alt="">
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
