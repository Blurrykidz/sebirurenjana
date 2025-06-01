@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset-back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset-back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset-back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('asset-back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset-back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-back/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('asset-back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-back/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('asset-back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-back/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('asset-back/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('asset-back/plugins/pdfmake/vfs_fonts.js') }}"></script>
@endpush
