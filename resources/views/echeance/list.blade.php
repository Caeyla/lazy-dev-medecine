@extends('blank')
@section('title')
    List des echeances
@endsection
@section('content')
    <div class="row">
        <div class="col2 col-lg-8 col-md-12">
            <h2>Liste des trajets </h2>
            <x-list.simple-list-table :data="$data" :metaData="$metaData">
                <x-slot name="children_additional_header">
                    <th>Jour restant</th>
                </x-slot>
                <x-slot name="children_additional_column">
                    <table>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <p class="fw-normal mb-1" style="background-color:{{ $item->getStyleForDayLeft() }}">
                                            dans {{ $item->getDayLeft() }} jour(s)
                                        </p>
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
