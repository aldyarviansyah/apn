<div id="document-footer">
    <!-- bootstrap -->
    <script src="{{ asset('bootstrap/cdn/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/cdn/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/cdn/bootstrap.min.js') }}"></script>

    <!-- feathericons -->
    <script src="{{ asset('vendors/feathericons/feathericons.js') }}"></script>

    <!-- custom scripts -->
    <script src="{{ asset('js/functions.js?v=21') }}"></script>

    <!-- Scripts for ALL pages -->
    <script type="text/javascript">
        $(document).ready(function() {

            // general scripts
            hmsAll();

            // feather icons
            feather.replace();

        });
    </script>
</div>
