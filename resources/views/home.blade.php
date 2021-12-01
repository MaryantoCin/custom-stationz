@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body m-auto">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">

                            @forelse ($mice as $mouse)
                                @if ($loop->even % 2 == 0)
                                    <div class="row">
                                @endif
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ $mouse->image }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $mouse->name }}</h5>
                                            <p class="card-text">{{ $mouse->description }}</p>
                                            <a href="#" class="btn btn-primary">View</a>
                                        </div>
                                    </div>
                                </div>
                                @if ($loop->iteration % 2 == 0)
                        </div>
                        @endif
                    @empty
                        Empty
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
