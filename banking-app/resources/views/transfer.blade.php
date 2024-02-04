@extends('layout.app')
@include('partials.navbar')
@section('content')
<div class="page page-center">
      <div class="container container-tight py-4">
        <form class="card card-md" action="{{ route('transfer.save') }}" method="post" autocomplete="off" novalidate>
            @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Transfer Money</h2>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="recipient_email" value="{{ old('email') }}" class="form-control" placeholder="Enter email">
            </div>
            @error('recipient_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
              <label class="form-label">Amount</label>
              <input type="number" name="amount" class="form-control" placeholder="Enter a amount to transfer">
            </div>
            @error('amount')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
           
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Transfer</button>
            </div>
          </div>
        </form>
       
      </div>
    </div>
@endsection