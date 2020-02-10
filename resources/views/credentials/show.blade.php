@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="col-md-8 mb-4">
                    <div class="alert alert-danger mb-0 pb-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit credentials</div>
                    <div class="card-body">
                        <form action="{{ route('credentials.update', $credential->id) }}" method="post" accept-charset="UTF-8">
                            @method('PATCH')
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label for="title"><b>Title</b></label>
                                <input type="text" name="title" id="title" value="{{ $credential->title }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="username"><b>Username</b></label>
                                <input type="text" name="username" id="username" value="{{ $credential->username }}" class="form-control" />
                            </div>
                            <div class="form-inline">
                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control mr-2" id="show_password__{{ $credential->id }}" value="{{ $credential->password }}">
                                </div>
                                <button type="submit" class="btn btn-primary mb-3 show-password" data-id="{{ $credential->id }}">Show password</button>
                            </div>
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
