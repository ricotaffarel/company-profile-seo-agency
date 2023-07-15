@extends('layouts.asset')

@section('main-content')
<div class="pagetitle">
    <h1>Data Blog Category</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item active">Blog Category</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Blog Category</h5>
                    <a href="{{ route('administrator.blog-category.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus-circle fa-sm text-white mr-2"></i>Add Data</a>
                    <!-- Table with stripped rows -->
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Desc</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blog_category as $data)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($data->name, 10, '...') }}</td>
                                <td>{{ Str::limit($data->desc, 10, '...') }}</td>
                                <td>
                                    <div class="d-sm-flex align-items-center justify-content-center">
                                        <a href="{{ route('administrator.blog-category.edit', Crypt::encrypt($data->id)) }}" class="btn btn-sm btn-primary" style="margin-right: 10px;">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus"><i class="bi bi-trash"></i></button>
                                        <div class="modal fade" id="hapus" tabindex="-1">
                                            <form id="delete-form" action="{{ route('administrator.blog-category.destroy', Crypt::encrypt($data->id)) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Data Blog Category</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">Are you sure to delete this data ?</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr align="center">
                                <td colspan="5">Data Tidak Ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection