<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
@extends('layouts.admin.app')
@section('content')
    {{-- start main content --}}
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data User</h1>
                <p class="mb-0">List data seluruh User</p>
            </div>
            <div>
                <a href="{{ route('user.create') }}" class="btn btn-success text-white"><i
                        class="far fa-question-circle me-1"></i> Tambah User</a>
            </div>
        </div>
    </div>
    {{-- info tambah data --}}
    @if (session('create'))
        <div class="alert alert-info">
            {!! session('create') !!}
        </div>
    @endif
    {{-- info edit data --}}
    @if (session('update'))
        <div class="alert alert-info">
            {!! session('update') !!}
        </div>
    @endif
    {{-- info delete data --}}
    @if (session('delete'))
        <div class="alert alert-info">
            {!! session('delete') !!}
        </div>
    @endif
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                                    value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                                <button type="submit" class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <table id="table-User" class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0">Foto Profil</th>
                                    <th class="border-0">Nama Lengkap</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>
                            {{-- PROFIL --}}
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            @if ($user->photo)
                                                <img src="{{ asset('storage/' . $user->photo) }}"
                                                    alt="Foto {{ $user->name }}" width="50" height="50"
                                                    class="rounded-circle object-fit-cover">
                                            @else
                                                <img src="https://i.pravatar.cc/150?u={{ $user->email }}"
                                                    alt="Default Avatar" width="50" height="50"
                                                    class="rounded-circle object-fit-cover">
                                            @endif
                                        </td>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end main content --}}
@endsection
