@extends('layouts.app')

@section('content')
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
              <h2 class="text-center mb-4">Tertarik untuk mencari tahu?</h2>
              <p class="text-center mb-4">Mulai dengan isi biodata.</p>
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
              <form action="{{route('guest.store')}}" method="POST" id="guestForm">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="age" class="form-label">Usia</label>
                    <input type="number" class="form-control" id="age" placeholder="Usia" name="age" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="gender" name="gender" required>
                      <option selected disabled>Pilih...</option>
                      <option value="male">Laki-laki</option>
                      <option value="female">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="provinces" class="form-label">Asal Provinsi</label>
                  <select class="form-select" id="provinces" name="province" required>
                    <option selected disabled>Pilih Provinsi...</option>
                    @foreach ($province as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                    <!-- Tambahkan opsi sesuai kebutuhan -->
                  </select>
                </div>
                <div class="mb-3">
                  <label for="regency" class="form-label">Asal Kota / Kabupaten</label>
                  <select class="form-select" id="regency" name="regency" required>
                    <option selected disabled>Pilih Kota / Kabupaten...</option>
                    <!-- Tambahkan opsi sesuai kebutuhan -->
                  </select>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-warning btn-block">Mulai</button>
                </div>
              </form>
            </div>
          </div>
@endsection