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
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Add new group</div>
                <div class="card-body">
                    <div class="group-new">
                        <form action="{{ route('groups.store') }}" method="post" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label for="group_name"><b>Name your group</b></label>
                                <input type="text" name="name" id="group_name" placeholder="A-TEAM" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="group_description"><b>Describe your group</b> (optional)</label>
                                <input type="text" name="description" id="group_description" maxlength="255" placeholder="Shared netflix login" class="form-control" />
                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Groups</div>
                <div class="card-body">
                    <ul class="list-group">
                    @foreach($groups as $group)
                        <li class="list-group-item">
                            <a href="{{ route('groups.show', $group->id) }}">
                                {{ $group->name }}
                            </a>
                            <p class="m-0">{{ $group->description }}</p>
                            <form action="{{ route('groups.destroy', $group->id) }}" method="post" accept-charset="UTF-8">
                                @method('DELETE')
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                                <span>Vault creation date: <i>{{ $group->created_at->diffForhumans() }}</i> Members: <i>{{ count($group->users()->get()) }}</i></span>
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
