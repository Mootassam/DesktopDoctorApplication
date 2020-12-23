@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary border-0 mb-0">

          <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
          <small>Connectez-vous avec vos identifiants</small>
          </div>
<form method="POST" action="{{ route('login') }}">
    @csrf
  <div class="form-group mb-3">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
      </div>
      <input placeholder="Email Utilisateur" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>
  <div class="form-group">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
      </div>
      <input placeholder="Password Utilisateur" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
      @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary my-4">Se connecter</button>
  </div>
</form>
</div>
</div>
<div class="row mt-3">
    <div class="col-6">
      <a href="#" class="text-light"></a>
    </div>
    <div class="col-6 text-right">
      <a href="{{url('/register')}}" class="text-light"><small>Créer un nouveau compte</small></a>
    </div>
  </div>
</div>
</div>
@endsection
