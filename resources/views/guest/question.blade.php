@extends('layouts.app')
 @section('content')
 <div class="container mt-5">
    <div class="text-center mb-4">
      <h1>Silahkan jawab semua pertanyaan dibawah sesuai dengan kondisi anda.</h1>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('question.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $guest->id }}">
        @foreach($questions as $question)
            <div class="form-group my-4">
                <p>{{ $question->question }}</p>
                <select name="answers[{{ $question->id }}]" class="form-control" required>
                    <option selected disabled>Pilih...</option>
                    <option value=1>Ya</option>
                    <option value=0>Tidak</option>
                </select>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary mb-4">Kirim</button>
    </form>


  </div>
 @endsection
