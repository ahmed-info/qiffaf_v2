@extends('dashboard.layouts.layout')
@section('body')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Create of photo gallery</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <form action="{{ route('dashboard.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group col-md-4">
                        <input type="radio" id="isSelectSubcategory" name="isSelect">
                        <label for="subcategory_id">
                            <h6>Select Sub Category</h6>
                        </label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control" disabled>
                            <option value="">Sub Category</option>
                            @foreach ($subcategories as $subCategory)
                                <option value="{{ $subCategory->id }}"
                                    {{ old('subcategory_id') == $subCategory->id ? 'selected' : '' }}>
                                    {{ $subCategory->{'title_' . app()->getLocale()} }}
                                </option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group col-md-4">
                        <input type="radio" id="isSelectProduct" name="isSelect">
                        <label for="product_id">
                            <h6>Select product Accessories</h6>
                        </label>
                        <select name="product_id" id="product_id" class="form-control" disabled>
                            <option value="">Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->{'title_' . app()->getLocale()} }}
                                </option>
                            @endforeach
                        </select>

                        @error('product_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">

                        <div class="form-group col-md-3 mt-3">
                            <h3>@lang('words.Image Category')</h3>
                            <!-- asset('assets/img/header-bg.jpg') -->
                            <img style="height: 30vh" src="{{ asset('images/default.jpg') }}" class="img-thumbnail"
                                alt="">
                            <input type="file" class="mt-3" name="image" id="image">
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
@section('scripts')
    <script>
        $('input[name="isSelect"]').change(function() {
            var SelectSubcategory = $('#isSelectSubcategory').is(':checked');
            if (SelectSubcategory) {
                $("#subcategory_id").prop("disabled", false);
                $("#product_id").prop("disabled", true);
            } else {
                $("#subcategory_id").prop("disabled", true);
                $("#product_id").prop("disabled", false);
            }

        });
    </script>
@endsection
