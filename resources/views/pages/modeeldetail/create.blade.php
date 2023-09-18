@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">

        <h1 class="mt-4">Create of Modeel Detail</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.modeeldetail.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="modeel_id">
                    <h6>Select Model</h6>
                </label>

                <select name="modeel_id" id="modeel_id" class="form-control">
                    <option value="">Model</option>
                    @foreach ($modeels as $modeel)
                        <option value="{{ $modeel->id }}"
                            {{ old('modeel_id') == $modeel->id ? 'selected' : '' }}>
                            {!! $modeel->title !!}
                        </option>
                    @endforeach
                </select>

                @error('modeel_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="row">
                <div class="form-group col-md-6 mt-3">
                    <div class="form-group mb-5">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Title model detail">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group col-md-6 mt-3">
                    <div class="form-group mb-5">
                        <label for="title"><h4>Description</h4></label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Enter description model detail">
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>


        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
