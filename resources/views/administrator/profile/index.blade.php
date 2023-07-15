@extends('layouts.asset')

@section('main-content')
<div class="pagetitle">
    <h1>Data Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <table class="table table-borderless datatable col-lg-12">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">Postal Code</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($profile as $data)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->city}}</td>
                                <td>{{$data->country}}</td>
                                <td>{{$data->postal_code}}</td>
                                <td>{{$data->phone}}</td>
                                <td>
                                    <div class="d-sm-flex align-items-center justify-content-center">
                                        <a href="{{ route('administrator.profile.edit', Crypt::encrypt($data->id)) }}" class="btn btn-sm btn-primary" style="margin-right: 10px;">
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