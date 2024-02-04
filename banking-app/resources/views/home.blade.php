@extends('layout.app')
@include('partials.navbar')
@section('content')
@if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
              @if (session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                    </div>
              @endif
       <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-lg-8">
                <div class="card">
                  <div class="table-responsive">
                    <table
                      class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Your ID</th>
                          <th>Your Balance</th>
                          
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td >{{ auth()->user()->name }}</td>
                          <td class="text-muted" >
                          {{ auth()->user()->balance }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
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