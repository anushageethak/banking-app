@extends('layout.app')
@include('partials.navbar')
@section('content')
<div class="page page-center">
      <div class="container container-tight py-4">
        <form class="card " action="{{route('withdraw.save') }}" method="post" autocomplete="off" novalidate>
            @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Withdraw Money</h2>
            <div class="mb-3">
              <label class="form-label">Amount</label>
              <input type="number" name="balance" class="form-control" placeholder="Enter a amount to withdraw">
            </div>
            @error('balance')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
           
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Deposit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
@endsection