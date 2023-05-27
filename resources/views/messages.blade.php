@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact Messages</h1>

        @if (count($message) > 0)
            <ul class="list-group">
                @foreach ($message as $message)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Name:</strong> <span class="text-primary">{{ $message->name }}</span><br>
                                <strong>Email:</strong> <span class="text-success">{{ $message->email }}</span><br>
                                <strong>Message:</strong> <span class="text-info">{{ $message->message }}</span><br>
                            </div>
                            <div class="row">
                                <form action="{{ route('messages.delete', ['id' => $message->id]) }}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <a href="{{ url('messages/reply', ['id' => $message->id]) }}" class="btn btn-success">Reply</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                
                                
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4">
             
            </div>
        @else
            <div class="alert alert-info" role="alert">
                No contact messages found.
            </div>
        @endif
    </div>
@endsection
