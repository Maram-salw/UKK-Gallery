@extends('uploads.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-film mr-2 full-left"></i>
            </a>
            <div class="pull-left">
                <h2>Upload</h2>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link nav-link-1 active" aria-current="page" href="{{asset('master/index.html')}}">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="{{ route('login') }}">Upload</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link nav-link-4" href="{{ route('registration') }}">Registration</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link nav-link-2" href="{{ route('home') }}">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
            <!-- <div class="pull-left">
                <h2>Upload</h2>
            </div> -->
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('uploads.create') }}">Your photo</a>
            </div>
            <hr>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($uploads as $upload)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $upload->image }}" width="100px"></td>
            <td>{{ $upload->name }}</td>
            <td>{{ $upload->detail }}</td>
            <td>
                <form action="{{ route('uploads.destroy',$upload->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('uploads.show',$upload->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('uploads.edit',$upload->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin, ingin menghapus {{$upload->name}}?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $uploads->links() !!}
        
@endsection