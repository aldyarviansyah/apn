@extends('layouts.app')

@section('content')
    <livewire:access-requests.access-request-component :title="$title"/>
@endsection

@section('extraJs')
    <script type="text/javascript">
        $(document).ready(function() {

            // page specific scripts
            $('body').on('click', '.open-view-pending', function () {

                var loc1 = '.data-info-pending';
                var loc2 = $(loc1);

                loc2.addClass('loading');
                openTray(loc1);
            });

            $('body').on('click', '.open-activities', function () {
                var loc1 = '.data-activities';
                var loc2 = $(loc1);
                loc2.addClass('loading');
                openTray(loc1);
            });

        })
    </script>
@endsection
