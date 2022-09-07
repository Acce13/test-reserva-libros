@extends('layouts.app') @section('title', 'Home') @section('content')
<!-- Componente user box -->
<x-user-box reservationTotal="{{ count($reserves) }}" />
<div class="col-lg-7 col-xl-8 col-xxl-8">
    <main class="content u-radius-1 my-3 shadow p-4">
        <section>
            <h2 class="text-muted mb-4">My reserves</h2>
            <div class="row gy-4">
                <div class="col-12">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                @foreach($reserves as $reserve)
                <div class='col-6 col-sm-4'>
                    <a href="{{ route('home.destroy', $reserve) }}" onclick="return confirm('Are you sure you want to delete {{ $reserve->book->title }}?')">
                        <img src="storage/{{ $reserve->book->imageUrl }}" alt="{{ $reserve->book->title }}" class="book img-fluid rounded-3 shadow" />
                    </a>
                </div>
                @endforeach
            </div>
        </section>
        <!-- Fab Button -->
        <form action="{{ route('logout') }}" method="post" class="btn-group-fap">
            @csrf
            <a href="{{ route('book-list.index') }}" class="btn btn-primary btn-fab rounded-circle p-3 d-flex" data-bs-toggle="tooltip" data-bs-placement="left" title="Search Book">
                <i class="material-icons">search</i>
            </a>
            <button type="submit" class="btn btn-danger btn-fab rounded-circle p-3 d-flex" data-bs-toggle="tooltip" data-bs-placement="left" title="Logout">
                <i class="material-icons">logout</i>
            </button>
        </form>
    </main>
</div>
@endsection