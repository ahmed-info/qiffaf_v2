@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Model Detail</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Model Detail</li>
        </ol>
        <form action="{{route('dashboard.modeeldetail.update',["id"=>$modeeldetail->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <h6>Select Model</h6>
            <select class="form-control select2" name="modeel_id" style="..." id="modeel_id">
                <option value="0" selected="selected">Select Model</option>
                @foreach ($modeels as $modeel)
                    <option value="{{ $modeel->id }}"
                        @if ($modeel->id == $modeeldetail->modeel_id) selected="selected" @endif>
                        {!! $modeel->title !!}</option>
                @endforeach
            </select>
            @error('modeel_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$modeeldetail->title}}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title"><h4>Description</h4></label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$modeeldetail->description}}">
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
