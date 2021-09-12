@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">
        <div class="col-md-8">
          <div class="card">
                <div class="card-header"><h3>{{ ($user->name) }}'s Profile</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
                <div class="card-body">
                   <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="submit" class="pull-right btn btn-sm btn-primary"/>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection
