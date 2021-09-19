@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                {{-- Category Insert message --}}
                <h4 class="text-center">{{ Session::get('message') }}</h4>
                <form action="{{ route('update_category') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" name="category_name" value="{{ $categories->category_name }}"
                                class="form-control">
                            <input type="hidden" name="id" value="{{ $categories->id }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Description</label>
                        <div class="col-md-9">
                            <textarea name="category_description" cols="89"
                                rows="3">{{ $categories->category_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publications Status</label>
                        <div class="col-md-9">
                            <label>
                                <input type="radio" name="publication_status" value="1"
                                    {{ $categories->publication_status == 1 ? 'Checked' : ' ' }}> Published
                            </label>
                            <label><input type="radio" name="publication_status" value="0"
                                    {{ $categories->publication_status == 0 ? 'Checked' : ' ' }}> Unpublished
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-success btn-block" value="Update category info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
