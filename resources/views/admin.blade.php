@extends('includes.header')

@section('body')

<div class="container d-flex justify-content-center row">
    <div class="col-8">
        @if(count($allUsers))
            @foreach($allUsers as $account)
                @if($account->id != $user->id)
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{ $account->first_name }}</p>
                        <p class="card-text">{{ $account->last_name }}</p>
                        <p class="card-text">{{ $account->email }}</p>
                        @if($account->is_admin)
                            <a href="{{ route('revokeAdmin', ['id' => $account->id]) }}" class="btn btn-success">Revoke Admin</a>
                        @else
                            <a href="{{ route('makeAdmin', ['id' => $account->id]) }}" class="btn btn-success">Make Admin</a>
                        @endif
                        <a href="{{ route('deleteAccount', ['id' => $account->id]) }}" class="btn btn-danger">Delete</a>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <div class="col-4">
        <button onclick="window.location='{{ route("sync") }}'" class="btn btn-primary col mx-1">Sync Database</button>
    </div>
</div>







@endsection