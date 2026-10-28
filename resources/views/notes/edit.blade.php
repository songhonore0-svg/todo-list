@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="text-dark-emphasis m-0 mb-1">Modifier la note</h2>
                        <p class="text-muted m-0">Modifier les details de ta note</p>
                    </div>
                    <a href="{{ route('notes.index') }}" class="btn btn-warning">Retour à l'acceuil</a>
                </div>

                

                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('notes.update', $note->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $note->title) }}"
                                    placeholder="Entrer le Titre"
                                    autofocus>
                                    @error('title')
                                    <span class="invalid-feedback">{{ 'Entrez au moins 3 caractère' }}</span>
                                    @enderror
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label">Contenu</label>
                                <textarea type="text" name="content" id="content" 
                                class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Ecris ta note ici" autofocus rows="8">{{ old('content', $note->content) }}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback">{{ 'Entrez au moins 10 caractère' }}</span>
                                    @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-info" type="submit">
                                    Enrégistrer la modification
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection