@extends('dashboard.layouts.layout')
@section('body')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Create of Company</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <form action="{{ route('dashboard.company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="supplier_id">
                        <h6>Select Department</h6>
                    </label>

                    <select name="department_id" id="department_id" class="form-control">
                        <option value="">Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                {!! $department->title !!}
                            </option>
                        @endforeach
                    </select>

                    @error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="row">
                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-5">
                            <label for="title">
                                <h4>Title</h4>
                            </label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}" placeholder="Enter Title company *">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>





                    <div class="form-group col-md-3 mt-3">
                        <h3>Image Company</h3>
                        <label for="image">Recomended Size: 370 X 370</label>
                        <img style="height: 30vh" src="{{ asset('images/default.jpg') }}" class="img-thumbnail"
                            alt="">
                        <input type="file" class="mt-3" name="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="form-group col-md-3 mt-3">
                        <h3>Image Cover</h3>
                        <label for="image_cover">Recomended Size: 1920 X 650</label>
                        <img style="height: 30vh" src="{{ asset('images/default.jpg') }}" class="img-thumbnail"
                            alt="">
                        <input type="file" class="mt-3" name="image_cover">
                        @error('image_cover')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-1">
            </form>
        </div>
    </main>
@endsection
