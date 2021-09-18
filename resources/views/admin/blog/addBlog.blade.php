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
                <form action="{{ route('new_blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Blog Title</label>
                        <div class="col-md-9">
                            <input type="text" name="blog_title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Blog Short Description</label>
                        <div class="col-md-9">
                            <textarea name="blog_short_desc" cols="89" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Blog Long Description</label>
                        <div class="col-md-9">
                            <textarea name="blog_long_desc" id="editor" cols="89" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-9">
                            <input type="file" name="blog_img" accept="image/*">
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
                            <input type="submit" class="btn btn-success btn-block" value="Save Blog Info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
