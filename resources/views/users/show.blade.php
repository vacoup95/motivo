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
                    <div class="card-header">New vault item</div>
                    <div class="card-body">
                        <div class="group-new">
                            <form action="{{ route('credentials.store', ['user_id' => Auth()->user()->id]) }}" method="post" accept-charset="UTF-8">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="form-group">
                                    <label for="credential_title"><b>Title</b></label>
                                    <input type="text" name="title" id="credential_title" placeholder="Personal Netflix account" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="credential_username"><b>Username</b> (optional)</label>
                                    <input type="text" name="username" id="credential_username" maxlength="255" placeholder="Username or email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="credential_password"><b>Password</b></label>
                                    <input type="password" name="password" id="credential_password" maxlength="255" placeholder="Password" class="form-control" />
                                </div>
                                <button class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Vault</div>
                    <div class="card-body">
                        <ul class="list-group">
                        @foreach($vault as $vaultItem)
                            <li class="list-group-item">
                                <a href="{{ route('credentials.show', $vaultItem->id) }}">
                                    Manage {{ $vaultItem->title }}
                                </a>
                                @if($vaultItem->username !== null)
                                    <p class="m-0">{{ $vaultItem->username }}</p>
                                @endif
                                <div class="form-inline">
                                    <div class="form-group mb-2">
                                        <input type="password" readonly class="form-control mr-2" id="show_password__{{ $vaultItem->id }}" value="{{ $vaultItem->password }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2 show-password" data-id="{{ $vaultItem->id }}">Show password</button>
                                </div>
                                <form action="{{ route('credentials.destroy', $vaultItem->id) }}" method="post" accept-charset="UTF-8">
                                    @method('DELETE')
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
