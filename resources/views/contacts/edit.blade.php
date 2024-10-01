@extends('layouts.app')

@section('content')
    <h1>Edit Contact</h1>

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
        </div>

        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="{{ old('lastName', $contact->lastName) }}" required>
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}" required>
        </div>

        <button type="submit">Update Contact</button>
    </form>

    <a href="{{ route('contacts.index') }}">Back to Contacts</a>
@endsection
