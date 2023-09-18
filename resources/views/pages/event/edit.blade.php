@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Event</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Event</li>
        </ol>
        <form action="{{route('dashboard.event.update',["id"=>$event->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description"><h4>Description</h4></label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$event->description}}">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="address"><h4>Address</h4></label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$event->address}}">
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="eventDate"><h4>Date & Time</h4></label>
                    <input type="datetime-local" class="form-control" id="eventDate" name="eventDate" value="{{$event->eventDate}}">
                    @error('eventDate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>



            <div class="form-group col-md-4 mt-3">
                <h3>Image Event</h3>
                <label for="image">Recomended Size: 770 X 450</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($event->image >0)
                <img style="height: 30vh" src="{{asset('images/'.$event->image)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image" id="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Image Cover</h3>
                <label for="image">Recomended Size: 1920 X 650</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($event->image_cover >0)
                <img style="height: 30vh" src="{{asset('images/'.$event->image_cover)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image_cover" id="image_cover">
                @error('image_cover')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
