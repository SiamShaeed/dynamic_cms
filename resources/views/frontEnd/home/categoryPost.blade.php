@extends('frontEnd.master')

@section('body')
<section class="py-5">
    <div class="container px-5">
        <h2 class="fw-bolder fs-5 mb-4">Category Blog</h2>
        <div class="row gx-5">
            <div class="col-lg-4 mb-5">
                @foreach ($blogs as $blog)
                <div class="card h-100 shadow border-0">
                    <img class="card-img-top" src="{{asset($blog->blog_image)}}" alt="..."  height="200"/>
                    <div class="card-body p-4">
                        <a class="text-decoration-none link-dark"><div class="h5 card-title mb-3">{{$blog->blog_title}}</div></a>
                        <p class="card-text mb-0">{{$blog->blog_short_desc}}</p>
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="">
                            <div class="">
                                <div class="">
                                    <a href="{{ route('blogDetails',['id' => $blog->id ]) }}" class="btn btn-success">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-end mb-5 mb-xl-0">
            <a class="text-decoration-none" href="#!">
                More stories
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection
