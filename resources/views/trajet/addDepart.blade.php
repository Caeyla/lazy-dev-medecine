@extends('blank')
@section('title')
    Depart
@endsection

@section('content')
    <div class="row">

        <div class="col1 col-lg-4 col-md-0">

            <!-- Jumbotron -->
            <div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
                style="background-image: url('https://img.lovepik.com/photo/40064/5566.jpg_wh860.jpg'); height: 100%;">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <span class="text-white mb-0">
                            <h5>EVENT </h5>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->

        </div>

        <div class="col2 col-lg-8 col-md-12">
            <h2>Depart</h2>
            <x-form.simple-form :data="$data">
                <x-slot name='top_additional_content'>
                    @error('message')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group ">
                        <label class="form-label" for="vehicule">Vehicule </label>
                        <select name="vehicule_id" class="form-control" id="vehicule">
                            @foreach ($vehicules as $vehicule)
                                <option value="{{ $vehicule->id }}">{{ $vehicule->matricule }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="lieudepart">Lieu de depart</label>
                        <select name="lieudepart_id" class="form-control" id="lieudepart">
                            @foreach ($lieux as $lieu)
                                <option value="{{ $lieu->id }}">{{ $lieu->designation }}</option>
                            @endforeach
                        </select>
                    </div>
                </x-slot>
            </x-form.simple-form>
        </div>
    </div>
@endsection
