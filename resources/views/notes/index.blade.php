@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-xl-10">
        @include('partials.success-message')

        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <h2 class="fw-bold mb-2">Notes</h2>
                <p class="text-muted mb-0">Gérez toutes vos notes au même endroit</p>
            </div>
            <a href="{{ route('notes.create') }}" class="btn btn-info">Créer une nouvelle note</a>
        </div>

        <table class="table table-striped table-hover table-bordered border border-info-subtle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notes as $note)
                    <tr>
                        <th scope="row">{{ $note->id }}</th>
                        <td>{{ $note->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($note->content, 30) }}</td>
                        <td class="d-flex">
                            <a href="{{ route('notes.show', $note->id) }}" class="btn btn-primary me-2">Voir</a>
                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning me-2">Modifier</a>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this note?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No note found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-4">
            {{ $notes->links() }}
        </div>
    </div>
</div>
@endsection
