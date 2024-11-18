@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="text-center">
      <h1>Kuesioner Cek Gejala Telah Selesai !</h1>
      <p>Skor Anda adalah</p>
      <p><strong>Skor Anda:</strong> {{ $percentageScore }}%</p>
      <p>*Jika skor diatas 60%, anda harus konsultasi.</p>
    </div>
  
    {{-- <div class="image-container">
      <img src="https://via.placeholder.com/600x400" alt="Keluarga Bahagia" class="img-fluid">
    </div> --}}
  
    <div class="recommendation text-center">
      <h3>Rekomendasi untuk Anda</h3>
      <p>Rekomendasi yang tepat untuk cek gejala depresi. Jangan ragu untuk membaca rekomendasi di bawah ini.</p>
    </div>
  
    <div class="recommendation-list">
        @foreach ($answers as $index => $answer)
        <div class="d-flex">
            <div class="me-3">
              <span class="badge bg-primary rounded-circle p-3">{{$index + 1}}</span>
            </div>
            <div>
              <h5>{{$answer->question->question}}</h5>
              @foreach($solutions as $solution)
              @if($solution->question_id === $answer->question_id)
                  <p>Solusi: {{ $solution->solution }}</p>
              @endif
          @endforeach
            </div>
          </div>
        @endforeach

  
  </div>
@endsection
