@extends('layouts.asset')

@section('main-content')
<div class="pagetitle">
    <h1>Data About</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item active">About</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">About</h5>
                    <table class="table table-borderless datatable col-lg-12">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Desc</th>
                                <th scope="col">About 1</th>
                                <th scope="col">About 2</th>
                                <th scope="col">About 3</th>
                                <th scope="col">About 4</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($about as $data)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->desc}}</td>
                                <td>{{$data->about_1}}</td>
                                <td>{{$data->about_2}}</td>
                                <td>{{$data->about_3}}</td>
                                <td>{{$data->about_4}}</td>
                                <td>
                                    <div class="d-sm-flex align-items-center justify-content-center">
                                        <a href="{{ route('administrator.about.edit', Crypt::encrypt($data->id)) }}" class="btn btn-sm btn-primary" style="margin-right: 10px;">
                                            <i class="bi bi-pencil"></i>
                                        </a>
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