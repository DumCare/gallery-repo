@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Photos</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{$gallery->description}}</p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($photos as $photo)
                            <div class="col-md-3">
                                <a href="{{route('photoShow', $photo->id)}}">
                                    <img src="{{asset('public/galleries/photos/'.$photo->photo)}}" alt="" width="150px" height="150px">
                                 </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{$gallery->title}}</div>
                <div class="card-body text-center">
                    <img src="{{asset('public/galleries/'.$gallery->cover)}}" alt="cover" width="100px">
                    <br><br>
                    <a href="{{route('photoCreate', $gallery->id)}}" class="btn btn-success btn-block">Upload Photo</a>
                    <br>
                    <a href="{{route('galleryEdit', $gallery->id)}}" class="btn btn-success btn-block">Edit Gallery</a>
                    <br>
                    <a href="{{route('galleryDelete', $gallery->id)}}" class="btn btn-danger btn-block">Delete Gallery</a>
                </div>
            </div>
        </div>
    </div>
@endsection