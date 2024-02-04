@extends('layout.app')
@include('partials.navbar')
@section('content')
<div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-lg-8">
                <h1>Statement of Account</h1>
                <div class="card">
                  <div class="table-responsive">
                    <table
                      class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Date Time</th>
                          <th>Amount</th>
                          <th>Type</th>
                          <th>Details</th>
                          <th>Balance</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>@if ($transaction->type == 'transfer')
                                        Transfer to {{ $transaction->recipient_email }}
                                    @else
                                        {{ $transaction->type }}
                                    @endif</td>
                                <td> {{ $transaction->user_balance_at_transaction }} </td>
                            </tr>
                        @endforeach
                        </tr>
                      </tbody>
                    </table>
                    {{ $transactions->links() }}
                  </div>
                </div>
                </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
@endsection