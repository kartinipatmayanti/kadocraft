@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Category</h2>
            <p class="dashboard-subtitle">
                List of Categories
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{  route('category.create') }}" class="btn btn-primary mb-3">
                                + Tambah Kategori Baru
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Slug</th>
                                        <th>Aksi</th>
                                    </tr>
                                    
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                        
                                        <tr>
                                            <th>{{ $item['id'] }}</th>
                                            <th>{{ $item['name'] }}</th>
                                            <th><img src="{{ asset('storage/'. $item['photo'] ) }}" width="70" alt="" srcset=""></th>
                                            <th>{{ $item['slug'] }}</th>
                                            <th>
                                                <div class="btn-group">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                                        type="button" id="action' .  $item->id . '"
                                                            data-toggle="dropdown" 
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Aksi
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                                        <form action="{{ route('category.destroy',$item->id) }}" method="Post">
                                                        <a class="dropdown-item" href="{{ route('category.edit',$item->id) }}">Edit</a>
                                                            @csrf
                                                                @method('DELETE')                                        
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                Hapus
                                                                </button>
                                                        </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('addon-script')
    <script>
        $('#crudTable').DataTable()
    </script>
@endpush
