@extends('layouts.app')

@section('content')
    <h1>Create New Contact</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" required>
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>

        <button type="submit">Create Contact</button>
    </form>

    <a href="{{ route('contacts.index') }}">Back to Contacts</a>
@endsection
