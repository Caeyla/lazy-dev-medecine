@extends('blank')
@section('title')
    {{ strtoupper($model) }}
@endsection

@section('content')
    <div class="row">

        <div class="col1 col-lg-4 col-md-0">
            <x-searchComponent :modeling="$modeling" :model="$model" />
        </div>

        <div class="col2 col-lg-8 col-md-12">

            <div>
                <a href="/initForm/{{ $model }}"> <button type="button" class="btn btn-primary">Ajouter
                        {{ $model }}</button></a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            @foreach ($modeling->listHeader as $header)
                               <th> {{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            <tr>
                                @foreach ($modeling->listCall as $call)
                                @if (in_array($call, $modeling->img))
                                    {{-- <td>
                                        <img src="<?php echo "data:image/jpeg;base64"+$item[$call] ?>" alt="" width="50px">
                                    </td> --}}
                                @else
                                <td>
                                        <p class="fw-normal mb-1">
                                            @if (method_exists($item, $call))
                                                {{ call_user_func([$item, $call]) }}
                                            @else
                                                {{ $item[$call] }}
                                            @endif

                                        </p>
                                    </td>
                                @endif
                                @endforeach
                                <td>
                                    <a href="/initEdit/{{$model}}/{{$item->id}}">
                                        <span class="badge badge-success rounded-pill d-inline">modifier</span>
                                    </a>
                                    <a href="/delete/{{$model}}/{{$item->id}}">
                                        <span class="badge badge-danger rounded-pill d-inline">Supprimer</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-block mt-3 ">
                {{$data->links('layouts.pagination')}}
            </div>
        </div>
    </div>
@endsection
