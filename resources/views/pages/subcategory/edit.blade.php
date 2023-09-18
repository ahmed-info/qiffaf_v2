@extends('dashboard.layouts.layout')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit of Sub Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Sub Category</li>
            </ol>
            <form action="{{ route('dashboard.subcategories.update', ['id' => $subCategory->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group">
                        <h6>Select Category</h6>
                        <select class="form-control select2" name="category_id" style="..." id="category_id">
                            <option value="0" selected="selected">@lang('words.Main Category')</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($category->id == $subCategory->category_id) selected="selected" @endif>
                                    {{ $category->{'title_' . app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-3">
                            <label for="title_en">
                                <h4>Sub Category EN</h4>
                            </label>
                            <input type="text" class="form-control" id="title_en" name="title_en"
                                value="{{ $subCategory->title_en }}">
                            @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-3">
                            <label for="title_ar">
                                <h4>Sub Category AR</h4>
                            </label>
                            <input type="text" class="form-control" id="title_ar" name="title_ar"
                                value="{{ $subCategory->title_ar }}">
                            @error('title_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-4 mt-3">
                        <h3>Background Image</h3>
                        <label for="img">Recomended Size: 900 X 675</label>
                        <!-- asset('assets/img/header-bg.jpg') -->
                        @if ($subCategory->image > 0)
                            <img style="height: 30vh" src="{{ asset('images/' . $subCategory->image) }}" class="img-thumbnail"
                                alt="">
                        @else
                            <img style="height: 30vh" src="{{ asset('images/default.jpg') }}" class="img-thumbnail"
                                alt="">
                        @endif
                        <input type="file" class="mt-3" name="image" id="image">
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <h3>Image Cover Sub Category</h3>
                        <!-- asset('assets/img/header-bg.jpg') -->
                        <label for="img">Recomended Size: 1920 X 480</label>

                        @if ($subCategory->image_cover > 0)
                            <img style="height: 30vh" src="{{ asset('images/' . $subCategory->image_cover) }}" class="img-thumbnail"
                                alt="">
                        @else
                            <img style="height: 30vh" src="{{ asset('images/default.jpg') }}" class="img-thumbnail"
                                alt="">
                        @endif
                        <input type="file" class="mt-3" name="image_cover" id="image_cover">
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-1">
            </form>
        </div>
    </main>
@endsection
