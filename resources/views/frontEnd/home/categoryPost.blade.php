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
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                        <a class="text-decoration-none link-dark stretched-link" href="#!"><div class="h5 card-title mb-3">{{$blog->blog_title}}</div></a>
                        <p class="card-text mb-0">{{$blog->blog_short_desc}}</p>
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                <div class="small">
                                    <div class="fw-bold">Kelly Rowan</div>
                                    <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
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
