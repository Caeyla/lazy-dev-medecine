@extends('blank')
@section('title')
    Update {{ strtoupper($model) }}
@endsection

@section('content')
    <div class="row">

        <div class="col1 col-lg-4 col-md-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            @foreach ($instance->listModeling->listHeader as $header)
                                <th> {{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                @foreach ($instance->listModeling->listCall as $call)
                                    <td>
                                        <p class="fw-normal mb-1">
                                            @if (method_exists($instance, $call))
                                                {{ call_user_func([$instance, $call]) }}
                                            @else
                                                {{ $instance[$call] }}
                                            @endif

                                        </p>
                                    </td>
                                @endforeach
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col2 col-lg-8 col-md-12">
            <h2>UPDATE {{ strtoupper($model) }}</h2>
            <x-formUpdateComponent :instance="$instance" :model="$model"  />
        </div>

    </div>
@endsection
