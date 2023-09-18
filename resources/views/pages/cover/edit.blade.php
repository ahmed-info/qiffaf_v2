@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Cover</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Cover</li>
        </ol>
        <form action="{{route('dashboard.cover.update',["id"=>$cover->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">


            <div class="form-group col-md-4 mt-3">
                <h3>Cover About</h3>
                <label for="image">Recomended Size: 1920 X 650</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($cover->cover_about >0)
                <img style="height: 30vh" src="{{asset('images/'.$cover->cover_about)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="cover_about" id="cover_about">
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Cover Department</h3>
                <label for="image">Recomended Size: 1920 X 650</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($cover->cover_department >0)
                <img style="height: 30vh" src="{{asset('images/'.$cover->cover_department)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="cover_department" id="cover_department">
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Cover Company</h3>
                <label for="image">Recomended Size: 1920 X 650</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($cover->cover_company >0)
                <img style="height: 30vh" src="{{asset('images/'.$cover->cover_company)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="cover_company" id="cover_company">
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Cover Event</h3>
                <label for="image">Recomended Size: 1920 X 300</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($cover->cover_event >0)
                <img style="height: 30vh" src="{{asset('images/'.$cover->cover_event)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="cover_event" id="cover_event">
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Cover Contact</h3>
                <label for="image">Recomended Size: 1920 X 650</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($cover->cover_contact >0)
                <img style="height: 30vh" src="{{asset('images/'.$cover->cover_contact)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="cover_contact" id="cover_contact">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
