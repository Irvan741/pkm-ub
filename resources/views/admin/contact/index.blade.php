@extends('admin.layout')

@section('title', 'Contact Setting')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Contact Setting</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.contact.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" 
                           value="{{ old('phone', $contact->phone ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" 
                           value="{{ old('email', $contact->email ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control" 
                           value="{{ old('facebook', $contact->facebook ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" name="instagram" class="form-control" 
                           value="{{ old('instagram', $contact->instagram ?? '') }}">
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
