@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of About us</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit About Us</li>
        </ol>
        <form action="{{route('dashboard.aboutus.update',["id"=>$aboutus->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="form-group col-md-12 mt-3">
                <div class="form-group mb-3">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$aboutus->title}}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-12 mt-3">
                <div class="form-group mb-3">
                    <label for="ourMission"><h4>Our Mission</h4></label>
                    <input type="text" class="form-control" id="ourMission" name="ourMission" value="{{$aboutus->ourMission}}">
                    @error('ourMission')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-12 mt-3">
                <div class="form-group mb-3">
                    <label for="ourVision"><h4>Our Vision</h4></label>
                    <input type="text" class="form-control" id="ourVision" name="ourVision" value="{{$aboutus->ourVision}}">
                    @error('ourVision')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>



            <div class="form-group col-md-4 mt-3">
                <h3>Image home page</h3>
                <label for="image">Recomended Size: 542 X 446</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($aboutus->image >0)
                <img style="height: 30vh" src="{{asset('images/'.$aboutus->image)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image" id="image">
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Image Cover</h3>
                <label for="image">Recomended Size: 1920 X 650</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($aboutus->image_cover >0)
                <img style="height: 30vh" src="{{asset('images/'.$aboutus->image_cover)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image_cover" id="image_cover">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
