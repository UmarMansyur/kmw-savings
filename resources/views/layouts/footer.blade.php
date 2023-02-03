<script src="{{ url('/js/jquery.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('/js/main.js') }}"></script>
<script src="{{ url('/js/metismenu.min.js') }}"></script>
<script src="{{ url('/js/waves.js') }}"></script>
<script src="{{ url('/js/feather.min.js') }}"></script>
<script src="{{ url('/js/simplebar.min.js') }}"></script>
<script src="{{ url('/js/moment.js') }}"></script>
<!-- <script src="{{ url('/apex-charts/apexcharts.min.js') }}"></script>
<script src="{{ url('/apex-charts/irregular-data-series.js') }}"></script>
<script src="{{ url('/apex-charts/ohlc.js') }}"></script> -->
<!-- <script src="{{ url('/pages/jquery.apexcharts.init.js') }}"></script> -->
<script src="{{ url('/js/app.js') }}"></script>
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ url('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('plugins/datatables/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ url('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ url('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ url('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ url('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ url('plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ url('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ url('plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ url('/pages/jquery.form-upload.init.js') }}"></script>
<script>
    $(document).ready(function() {
        if ($(location).attr('pathname') == '/admin/setting/karyawan' || $(location).attr('pathname') == '/admin/setting/jamaah' || 
        $(location).attr('pathname') == '/admin/setting/categories') {
            $('#datatable').DataTable({
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    lengthMenu: "Tampilkan _MENU_ data",
                    search: "Cari:",
                },
            });
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBFE3bMCvOX5Ny5PrSqFF1t5Nn0y2cMNH8">
</script>
<script>
    if ($(location).attr('pathname') == '/admin/setting/add-karyawan' || $(location).attr('pathname') == '/admin/setting/add-jamaah') {
        const address = document.getElementById('address');
        const autoComplete = new google.maps.places.Autocomplete((address), {
            types: ['geocode'],
            componentRestrictions: {
                country: "ID"
            }
        });
        google.maps.event.addListener(autoComplete, 'place_changed', function() {
            const place = autoComplete.getPlace();
        })
        document.getElementById('role').addEventListener('change', function() {
            if (this.value != '1') {
                document.getElementById('password').setAttribute('disabled', 'disabled');
                document.getElementById('password').value = '';
                document.getElementById('password_confirmation').setAttribute('disabled', 'disabled');
            } else {
                document.getElementById('password').removeAttribute('disabled');
                document.getElementById('password_confirmation').removeAttribute('disabled');
            }
        });

    }
</script>
@notifyJs