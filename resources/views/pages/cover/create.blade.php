@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Cover</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.cover.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
               


            <div class="form-group col-md-4 mt-3">
                <h3>Cover Aboutus</h3>
                <label for="cover_about">Recomended Size: 1920 X 650</label>
                        <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="cover_about">
                @error('cover_about')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Cover Department</h3>
                <label for="cover_department">Recomended Size: 1920 X 650</label>
                        <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="cover_department">
                @error('cover_department')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Cover Company</h3>
                <label for="cover_company">Recomended Size: 1920 X 650</label>
                        <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="cover_company">
                @error('cover_company')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Cover Event</h3>
                <label for="cover_event">Recomended Size: 1920 X 300</label>
                        <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="cover_event">
                @error('cover_event')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Cover ContactUS</h3>
                <label for="cover_contact">Recomended Size: 1920 X 650</label>
                        <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="cover_contact">
                @error('cover_contact')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
