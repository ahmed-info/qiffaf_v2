@extends('dashboard.layouts.layout')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit of Gallery</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit photo gallery</li>
            </ol>
            <form action="{{ route('dashboard.gallery.update', ['id' => $gallery->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="radio" id="isSelectSubcategory" name="isSelect">
                        <label for="subcategory_id">
                            <h6>Select Sub Category</h6>
                        </label>
                        <select class="form-control select2" name="subcategory_id" style="..." id="subcategory_id">
                            <option value="0" selected="selected">Sub Category</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    @if ($subcategory->id == $gallery->subcategory_id) selected="selected" @endif>
                                    {{ $subcategory->{'title_' . app()->getLocale()} }}</option>
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
                        <select class="form-control select2" name="product_id" style="..." id="product_id">
                            <option value="0" selected="selected">produc Accessories</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    @if ($product->id == $gallery->product_id) selected="selected" @endif>
                                    {{ $product->{'title_' . app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-md-4 mt-3">
                        <h3>Background Image</h3>
                        <!-- asset('assets/img/header-bg.jpg') -->
                        @if ($gallery->image > 0)
                            <img style="height: 30vh" src="{{ asset('images/' . $gallery->image) }}" class="img-thumbnail"
                                alt="">
                        @else
                            <img style="height: 30vh" src="{{ asset('images/default.jpg') }}" class="img-thumbnail"
                                alt="">
                        @endif
                        <input type="file" class="mt-3" name="image" id="image">
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
