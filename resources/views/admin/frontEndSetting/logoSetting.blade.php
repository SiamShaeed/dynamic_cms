@extends('admin.master')

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
                <form action="{{ route('logo_save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Add Logo Title</label>
                        <div class="col-md-9">
                            <input type="text" name="logo_title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Choose Logo Image</label>
                        <div class="col-md-9">
                            <input type="file" name="logo_image" accept="image/*">
                        </div>
                    </div>
                    <div class="form-grou mt-5">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-success btn-block" value="Published Logo">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

@endsection
