@extends('blank')
@section('title')
    DETAILS TRAJET
@endsection
{{-- <style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style> --}}
@section('content')
    <div class="row">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
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
            {!! $chart->container() !!}
            {{ $chart->script() }}
        </div>

    </div>
@endsection
{{-- <button class="no-print" onclick="window.print()">Print this page</button> --}}
