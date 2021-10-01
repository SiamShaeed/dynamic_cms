@extends('admin.master')

@section('title')
    Add Blog
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron ">
                {{-- Category Insert message --}}
                <h4 class="text-center">{{ Session::get('message') }}</h4>
                <form action="{{ route('new_header') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Header Title</label>
                        <div class="col-md-9">
                            <input type="text" name="header_title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Header Description</label>
                        <div class="col-md-9">
                            <textarea name="header_content" cols="89" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Header Image</label>
                        <div class="col-md-9">
                            <input type="file" name="header_image" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publications Status</label>
                        <div class="col-md-9">
                            <label><input type="radio" name="publication_status" value="1"> Published</label>
                            <label><input type="radio" name="publication_status" value="0"> Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-success btn-block" value="Save Header Info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
