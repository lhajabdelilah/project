@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reply to Message</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Message Details</h5>
                <p><strong>Name:</strong> {{ $message->name }}</p>
                <p><strong>Email:</strong> {{ $message->email }}</p>
                <p><strong>Message:</strong> {{ $message->message }}</p>
            </div>
        </div>

        <div class="mt-4">
            <h5>Compose Reply</h5>
            <form action="{{route('messages.sendReplay', ['id' => $message->id]) }}" method="get">
                @csrf
                <div class="form-group">
                    <label for="reply">Reply:</label>
                    <textarea class="form-control" id="reply" name="reply" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Reply</button>
            </form>
        </div>
    </div>
@endsection
