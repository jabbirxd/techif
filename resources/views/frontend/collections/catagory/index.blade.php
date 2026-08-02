@extends('layouts.app')

@section('title', 'All Catagories')

@section('content')
<div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                @forelse($catagories as $catagoryItem)


                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{url('/collections/'.$catagoryItem->slug)}}">
                            <div class="category-card-img">
                                @if($catagoryItem->image)
                                    <img src="{{asset('uploads/catagory/' . $catagoryItem->image)}}" class="w-100" height="300px" alt="{{$catagoryItem->name}}">
                                @else
                                    <img src="{{asset('assets/images/placeholder.png')}}" class="w-100" height="300px" alt="{{$catagoryItem->name}}">
                                @endif
                            </div>
                            <div class="category-card-body">
                                <h5>{{$catagoryItem->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                 @empty
                 <div class="col-md-12">
                    <h5>No Catagories Available</h5>
                 </div>

                @endforelse

            </div>
        </div>
    </div>


@endsection
