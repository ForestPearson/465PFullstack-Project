@extends('includes.header')

@section('body')

<div class="container">
    <div class="row">
        <div class="col-8 d-flex flex-wrap justify-content-center">
            @if(count($allUsers))
                @foreach($allUsers as $account)
                    @if($account->id != $user->id)
                    <div class="card m-2 accountCard border border-white rounded border-2">
                        <div class="card-body">
                            <p class="card-text">Name: {{ $account->first_name }} {{ $account->last_name }}</p>
                            <hr>
                            <p class="card-text">Email: {{ $account->email }}</p>
                            <hr>
                            @if($account->is_admin)
                                <a href="{{ route('revokeAdmin', ['id' => $account->id]) }}" class="btn btn-warning">Revoke Admin</a>
                            @else
                                <a href="{{ route('makeAdmin', ['id' => $account->id]) }}" class="btn btn-success">Make Admin</a>
                            @endif
                            <a href="{{ route('deleteAccount', ['id' => $account->id]) }}" class="btn btn-danger float-end"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
        
        <div class="col-2 py-2 ">
            <div class="border border-warning rounded border-2 d-flex justify-content-center p-2">
                <button onclick="window.location='{{ route("sync") }}'" class="btn btn-primary col mx-1">Sync Database</button>
            </div>
        </div>
    </div>
</div>







@endsection