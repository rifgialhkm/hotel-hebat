@extends('layouts.app')

@section('title', 'Admins')

@section('content')
        <div class="section-header">
            <h1>Admins</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item active">Admins</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Admin Data</h2>
            @if(session()->has('edit success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <p>{{ session('edit success') }}</p>
                    </div>
                </div>
            @endif
            @if(session()->has('delete success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <p>{{ session('delete success') }}</p>
                    </div>
                </div>
            @endif
            @if(session()->has('add success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <p>{{ session('add success') }}</p>
                    </div>
                </div>
            @endif
            <div class="row">
              <div class="card-body">
                <a href="{{ route('adminAccounts.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Add</a>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                      <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-12">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @if(count($admins)>0)
                                                        @foreach ($admins as $admin)
                                                            <tr>
                                                                <td>{{ ++$i }}</td>
                                                                <td>{{ $admin->name }}</td>
                                                                <td>{{ $admin->email }}</td>
                                                                <td>
                                                                <form action="{{ route('adminAccounts.destroy', $admin->id) }}" method="POST">
                                                                    <a href="{{ route('adminAccounts.edit', $admin->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>

                                                                    @method('delete')
                                                                    @csrf

                                                                    <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                                                </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr><td colspan="6" align="center">NO RECORDS FOUND</td></tr>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <nav class="d-inline-block">
                                                <ul class="pagination mb-0">
                                                    {!! $admins->links() !!}
                                                </ul>
                                            </nav>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            </div>
          </div>
@endsection