@extends('layouts.app') @section('title', 'Book List') @section('content')
<div class="col-lg-7 col-xl-8 col-xxl-8 mx-auto">
    <main class="content u-radius-1 my-3 shadow p-4">
        <section>
            <h2 class="text-muted mb-4">Book List</h2>
            <div class="mb-3">
                <h6 class="text-muted">Genders</h6>
                <select name="gender_id" id="bookGender" class="form-control">
                    <option value="">--Select a gender--</option>
                    @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row gy-4" id="bookList"></div>
            <div class="spinner-border text-primary mt-4" role="status" id="bookLoading">
                <span class="visually-hidden">Loading...</span>
            </div>
        </section>
        <!-- Fab Button -->
        <form action="{{ route('logout') }}" method="post" class="btn-group-fap">
            @csrf
            <a href="{{ url('/') }}" class="btn btn-primary btn-fab rounded-circle p-3 d-flex" data-bs-toggle="tooltip" data-bs-placement="left" title="Go Back">
                <i class="material-icons">arrow_back</i>
            </a>
            <button type="submit" class="btn btn-danger btn-fab rounded-circle p-3 d-flex" data-bs-toggle="tooltip" data-bs-placement="left" title="Logout">
                <i class="material-icons">logout</i>
            </button>
        </form>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="bookId">
                    <img src="{{ asset('img/noImage.jpg') }}" alt="Not Title" class="img-fluid rounded-3 shadow mb-3 d-block mx-auto" id="bookImageUrl">
                    <h6 class="text-muted">Author: <span id="bookAuthor"></span></h6>
                    <h6 class="text-muted">Description: </h6>
                    <p class="text-muted" id="bookDescription"></p>
                    <div class="mb-3">
                        <label for="inputDays" class="form-label">Days</label>
                        <input type="number" class="form-control" name="days" id="bookDays" placeholder="Days">
                    </div>
                    <div class="alert alert-warning" id="bookError">Days not empty</div>
                    <div class="alert alert-success" id="bookSuccess">Booked successfully!</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="bookReserve">Reserve</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/book.js') }}"></script>
@endpush