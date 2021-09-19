@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron ">
                <h5 class="text-center">Edit Blog Info</h5>
                {{-- Category Insert message --}}
                <h4 class="text-center">{{ Session::get('message') }}</h4>
                <form action="{{ route('update_blog') }}" method="post" name="editBlogForm" enctype="multipart/form-data">
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
                            <input type="text" name="blog_title" class="form-control" value="{{ $blog->blog_title }}">
                            <input type="hidden" name="id" class="form-control" value="{{ $blog->id }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Blog Short Description</label>
                        <div class="col-md-9">
                            <textarea name="blog_short_desc" cols="89" rows="3">{{ $blog->blog_short_desc }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Blog Long Description</label>
                        <div class="col-md-9">
                            <textarea name="blog_long_desc" id="editor" cols="89"
                                rows="3">{{ $blog->blog_long_desc }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-9">
                            <input type="file" name="blog_img" accept="image/*">
                            <br> <br>
                            <img src="{{ asset($blog->blog_image) }}" alt="blog-image" height="100" width="100">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publications Status</label>
                        <div class="col-md-9">
                            <label><input type="radio" {{ $blog->publication_status == 1 ? 'Checked' : '' }}
                                    name="publication_status" value="1"> Published</label>
                            <label><input type="radio" {{ $blog->publication_status == 0 ? 'Checked' : '' }}
                                    name="publication_status" value="0"> Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-success btn-block" value="Update Blog">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- For edit blog page show own category name --}}
    <script>
        document.forms['editBlogForm'].elements['category_id'].value = '{{ $blog->category_id }}';
    </script>
@endsection
