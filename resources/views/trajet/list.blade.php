@extends('blank')
@section('title')
    List des trajets
@endsection
@section('content')
    <div class="row">

        <div class="col2 col-lg-8 col-md-12">
            <h2>Liste des trajets </h2>
            <x-list.simple-list-table :data="$data" :metaData="$metaData">
                @slot('children_additional_header')
                    <th>Arrive</th>
                @endslot
                <x-slot name='children_additional_column'>
                    <table>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <a href="/trajet/addArrive/{{ $item->id }}" class="btn btn-primary">arrive</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-slot>
            </x-list.simple-list-table>
        </div>
    </div>
@endsection
