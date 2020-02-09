@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                <div class="card-header">Groups</div>
                <div class="card-body">
                    <div class="group-new">
                        <span class="lead"><b>Add new group</b></span>
                        <form action="{{ route('groups.store') }}" method="post" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label for="group_name"><b>Name your group</b></label>
                                <input type="text" name="name" id="group_name" placeholder="Example: Password Vault for A-TEAM" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="group_description"><b>Describe your group</b> (optional)</label>
                                <input type="text" name="description" id="group_description" maxlength="255" placeholder="Example: Password vault to share with my new colleagues" class="form-control" />
                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
