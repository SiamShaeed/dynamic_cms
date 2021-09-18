@extends('admin.master')

@section('title')
    Manage Blog
@endsection

@section('body')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Blog List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <h4 class="text-center">{{ Session::get('message') }}</h4>
                        <tr>
                            <th>SL NO</th>
                            <th>Category Name</th>
                            <th>Blog Title</th>
                            <th>Blog Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{-- Blow Show --}}

                    @foreach ($categories as $category)
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                {{-- <td>
                                    <a href="{{ route('edit_category', ['id' => $category->id]) }}">Edit</a> |
                                    <a href="#" id="{{ $category->id }}" class="delete-btn">Delete</a>
                                    <form id="deleteCategoryForm{{ $category->id }}"
                                        action="{{ route('delete_category') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $category->id }}" name="id">
                                    </form>
                                </td> --}}
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
