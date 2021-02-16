@extends('layouts.app')

@section('content')
    <livewire:piers.pier-component :title="$title"/>
@endsection

@section('extraCss')
    <style type="text/css">
        /*page-specific css*/
        .piers-slots-container {
            margin: 0 -15px 0 -15px;
            border: 1px solid #e1e1e1;
            border-right: 0px;
            border-bottom: 0px;
            position: relative;
        }
        .pier-box {
            height: 100px;
            position: relative;
            border-right: 1px solid #e1e1e1;
            border-bottom: 1px solid #e1e1e1;
            position: relative;
            cursor: pointer;
        }
        .pier-box:hover {
            background: rgb(0 0 0 / .03);
        }

        .pier-box {transition: all 0.1s ease-in-out;}
        .pier-box:active {transform: scale(1.05) !important;}

        .pier-box .number {
            opacity: .3;
            font-weight: 600;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }

        .pier-box.occupied {
            background: #607d8b;
            border-right: 1px solid #6b8896;
            border-bottom: 1px solid #6b8896;
        }
        .pier-box.occupied:hover {
            background: #607d8bcc;
        }
        .pier-box.occupied .number {
            color: white;
            opacity: .9;
        }

        @media (min-width: 576px) {
            .pier-box {
                height: 100px;
            }
        }
        @media (min-width: 992px) {
            .pier-box {
                height: 80px;
            }
        }
        #content.pier-table .table-meta-bottom {
            border-top: 1px solid #e1e1e1;
            margin-top: -1px;
        }

        .pier-box .lineup {
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translate(-50%, 0);
            width: 100%;
            text-align: center;
        }
        .pier-box .lineup .icon {
            background: white;
            opacity: .3;
            width: 8px;
            height: 8px;
            display: inline-block;
            border-radius: 100px;
            margin-right: 3px;
        }
        .pier-box .lineup .icon:last-child {
            margin-right: 0px;
        }

    </style>
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

        })
    </script>
@endsection
