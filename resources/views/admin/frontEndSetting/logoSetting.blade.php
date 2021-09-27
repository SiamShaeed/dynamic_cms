@extends('admin.master');

@section('title')
    Logo Setting
@endsection

@section('body')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="jumbotron">
                {{-- Category Insert message --}}
                <h4 class="text-center">{{ Session::get('message') }}</h4>
                <h3 class="text-center mb-lg-5">Logo Setting</h3>
                <form action="{{ route('new_blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Add Logo Title</label>
                        <div class="col-md-9">
                            <input type="text" name="blog_title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Choose Logo Image</label>
                        <div class="col-md-9">
                            <input type="file" name="blog_img" accept="image/*">
                        </div>
                    </div>
                    <div class="form-grou mt-5">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-success btn-block" value="Save Blog Info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

@endsection
