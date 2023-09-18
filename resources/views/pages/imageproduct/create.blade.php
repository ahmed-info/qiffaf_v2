@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.imageproduct.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="product_id">
                    <h6>Select Product</h6>
                </label>

                <select name="product_id" id="product_id" class="form-control">
                    <option value="">Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {!! $product->title !!}
                        </option>
                    @endforeach
                </select>

                @error('product_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="row">

            <div class="form-group col-md-3 mt-3">
                <h3>Image Product</h3>
                <label for="image">Recomended Size: 370 X 370</label>
                        <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
