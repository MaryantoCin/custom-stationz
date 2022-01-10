@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>

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
                                            <p class="card-text">
                                                Rp.{{ number_format($mouse->mouse_variants->first()->price, 2, ',', '.') }}
                                            </p>
                                            <p class="card-text">
                                                @foreach ($mouse->mouse_variants as $mouse)
                                                    <a href="{{ route('view_mouse_detail', $mouse->id) }}"
                                                        class="btn btn-primary">{{ $mouse->color }}</a>
                                                @endforeach
                                            </p>

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
