@extends('layouts.app')

@section('content')
    <livewire:users.users-component :title="$title"/>
@endsection

@section('extraCss')
    <style type="text/css">
        .permission-matrix .data-title {
            font-size: 16px;
        }
        .permission-matrix .item {
            margin-bottom: 10px;
            margin-left: -2px;
        }
        .permission-matrix .item label {
            border-radius: 10px;
            width: 100%;
            height: 100%;
            cursor: pointer;
            padding: 15px 15px 8px 15px;
            background: rgb(0 0 0 / .03);
        }
        .permission-matrix .item label:hover {
            background: rgb(0 0 0 / .05);
        }

        .permission-matrix .item label {transition: all 0.1s ease-in-out;}
        .permission-matrix .item label:active {transform: scale(1.05) !important;}

        .permission-matrix .item label input {
            position: relative;
            top: 2px;
            margin-right: 5px;
        }
        .tray-form-buttons {
            background: rgb(255 255 255 / 1);
            padding: 15px;
        }
    </style>
@endsection

@section('extraJs')
    <script type="text/javascript">
        $(document).ready(function() {

            // page specific scripts
            $('body').on('click', '.open-user-info', function () {

                var loc1 = '.data-info';
                var loc2 = $(loc1);

                loc2.addClass('loading');
                openTray(loc1);
            });

            // page specific scripts
            $('body').on('click', '.view-user-permissions', function () {

                var loc1 = '.user-data-permissions';
                var loc2 = $(loc1);

                loc2.addClass('loading');
                openTray(loc1);
            });

            $('body').on('click', '.role-select-item', function(e) {
                e.preventDefault();

                var loc1 = $(this);
                var loc2 = $('.role-select-item');

                if (!loc1.hasClass('active')) {
                    loc2.removeClass('active');
                    loc1.addClass('active');
                }
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
