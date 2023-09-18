@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Model</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Model</li>
        </ol>
        <form action="{{route('dashboard.modeel.update',["id"=>$modeel->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <h6>Select Product</h6>
            <select class="form-control select2" name="product_id" style="..." id="product_id">
                <option value="0" selected="selected">Main Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        @if ($product->id == $modeel->product_id) selected="selected" @endif>
                        {!! $product->title !!}</option>
                @endforeach
            </select>
            @error('product_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_ar"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$modeel->title}}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description"><h4>Description</h4></label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$modeel->description}}">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="text"><h4>Text</h4></label>
                    <input type="text" class="form-control" id="text" name="text" value="{{$modeel->text}}">
                    @error('text')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="linkVideo"><h4>Link Video</h4></label>
                    <input type="text" class="form-control" id="linkVideo" name="linkVideo" value="{{$modeel->linkVideo}}">
                    @error('linkVideo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>




            <div class="form-group col-md-4 mt-3">
                <h3>Image Model</h3>
                <label for="image">Recomended Size: 370 X 370</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($modeel->image >0)
                <img style="height: 30vh" src="{{asset('images/'.$modeel->image)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image" id="image">
            </div>

            <div class="form-group col-md-3 mt-3">
                <a href="{{ url('pdf/'.$modeel->filePDF) }}">myyy pdf</a>
                <h3>PDF Model</h3>
                <label for="filePDF">Recomended PDF</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($modeel->filePDF >0)

                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                @endif
                <input type="file" class="mt-3" name="filePDF" id="filePDF">
            </div>

        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
