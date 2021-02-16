@extends('layouts.app')

@section('content')
    <livewire:companies.companies-component :title="$title"/>
@endsection

@section('extraJs')
    <script type="text/javascript">
        $(document).ready(function() {

            // page specific scripts
            $('body').on('click', '.open-view', function () {

                var loc1 = '.data-info';
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
