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
                    <div class="card-header">Create group credentials</div>
                    <div class="card-body">
                        <form action="{{ route('group-credentials.store', ['group_id' => request()->group]) }}" method="post" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label for="credential_title"><b>Title</b></label>
                                <input type="text" name="title" id="credential_title" placeholder="Shared Netflix account" class="form-control" />
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
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Group vault</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($groupCredentials as $vaultItem)
                                <li class="list-group-item">
                                    <a href="{{ route('group-credentials.show', $vaultItem->id) }}">
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
                                    <form action="{{ route('group-credentials.destroy', $vaultItem->id) }}" method="post" accept-charset="UTF-8">
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
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Update Group</div>
                    <div class="card-body">
                        <form action="{{ route('groups.update', $group->id) }}" method="post" accept-charset="UTF-8">
                            @method('PATCH')
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label for="group_name"><b>Name your group</b></label>
                                <input type="text" name="name" id="group_name" placeholder="Example: Password Vault for A-TEAM" value="{{ $group->name }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="group_description"><b>Describe your group</b> (optional)</label>
                                <input type="text" name="description" id="group_description" maxlength="255" placeholder="Example: Password vault to share with my new colleagues" value="{{ $group->description }}" class="form-control" />
                            </div>
                            <button class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Add member</div>
                    <div class="card-body">
                        <div class="group-new">
                            <form action="{{ route('users.store', ['group' => $group->id]) }}" method="post" accept-charset="UTF-8">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="form-group">
                                    <label for="group_name"><b>Email</b></label>
                                    <input type="email" name="email" id="group_name" placeholder="example@motivo.nl" class="form-control" />
                                </div>
                                <button class="btn btn-primary">Add member</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Members</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($group->users()->get() as $user)
                                <li class="list-group-item">
                                    <a href="{{ route('users.show', $user->id) }}">
                                        {{ $user->name }}
                                    </a>
                                    <p class="m-0">{{ $user->email }}</p>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post" accept-charset="UTF-8">
                                        @method('DELETE')
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        <input name="group" type="hidden" value="{{ $group->id }}"/>
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
