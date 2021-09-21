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
                    @php($i = 1)
                    @foreach ($blogs as $blog)
                        <tbody>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $blog->category_name }}</td>
                                <td>{{ $blog->blog_title }}</td>
                                <td><img src="{{ asset($blog->blog_image) }}" alt="" height="100" width="150"></td>
                                <td>{{ $blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    {{-- Edit Blog --}}
                                    <a href="{{ route('edit_blog', ['id' => $blog->id]) }}">Edit</a> |

                                    {{-- Delete --}}
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('deleteBlogForm').submit();">Delete</a>
                                    <form id="deleteBlogForm" action="{{ route('delete_blog') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $blog->id }}" name="id">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
