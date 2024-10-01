@extends('layouts.app')

@section('content')
    <h1>Contacts</h1>
<a href="{{ route('contacts.create') }}">Create New Contact</a>

		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

		@if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
        		{{ session('success') }}
        		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    		</div>
        @endif


<form action="{{ route('contacts.importXML') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="xml_file" required>
    <button type="submit">Import Contacts from XML</button>
</form>

<table class="table">
  <thead class="thead-dark">

        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->lastName }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete();">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <div class="d-flex justify-content-center">
        {{ $contacts->links() }}
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this contact?');
        }
    </script>


@endsection
