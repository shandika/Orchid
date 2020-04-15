<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/sweetalerts/sweetalert2.all.min.js"></script>

<script src="<?php echo base_url() ?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/widgets.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<!-- Include jQuery Validator plugin -->
<script src="<?php echo base_url() ?>assets/dist/js/validator.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<!-- Toast -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>

<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>

<?php if ($this->session->flashdata('msg') == 'success-hapus') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Data Berhasil Dihapus',
            type: 'success'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'success-finish') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Data Sudah Finish',
            type: 'success'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'success-reset') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Waktu Sudah Direset',
            type: 'success'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'validasi') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Perhatian !',
            text: 'Silahkan Isi Seluruh Form !',
            type: 'warning'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'error-reset') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Perhatian !',
            text: 'Anda Tidak Dapat Mereset Di Waktu Weekend',
            type: 'warning'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
        $.toast({
            heading: 'Success',
            text: "Data Berhasil disimpan ke database.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            position: 'bottom-right',
            bgColor: '#7EC857'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'success-login') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Selamat Datang <?php echo $this->session->userdata('nama'); ?>.',
            type: 'success'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'success-registration') : ?>
    <script type="text/javascript">
        swal.fire({
            title: "Terimakasih",
            text: "Data sudah tersimpan, silahkan login",
            type: "success"
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'error-register') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Perhatian !',
            text: 'Field Masih ada yang kosong, silahkan isi terlebih dahulu',
            type: 'warning'
        });
    </script>
<?php else : ?>

<?php endif; ?>

<script>
    $('.tombol-logout').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Anda yakin?',
            text: "Anda Akan Logout !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout!'
        }).then((result) => {
            if (result.value == true) {
                document.location.href = href;
            }
        })
    });
</script>
<script>
    const flashData = $('.flash-data').data('flashdata');
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    if (flashData) {
        Toast.fire({
            title: 'Peringatan',
            text: flashData,
            type: 'warning'
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {

        // Toolbar extra buttons
        var btnFinish = $('<button></button>').text('Finish')
            .addClass('btn btn-info')
            .on('click', function() {
                if (!$(this).hasClass('disabled')) {
                    var elmForm = $("#myForm");
                    if (elmForm) {
                        elmForm.validator('validate');
                        var elmErr = elmForm.find('.has-error');
                        if (elmErr && elmErr.length > 0) {
                            $.toast({
                                heading: 'Peringatan',
                                text: "Silahkan Isi Seluruh Form !",
                                showHideTransition: 'slide',
                                icon: 'error',
                                hideAfter: false,
                                position: 'bottom-right',
                                bgColor: '#FF4859'
                            });
                            return false;
                        } else {
                            alert('Great! we are ready to submit form');
                            elmForm.submit();
                            return false;
                        }
                    }
                }
            });
        var btnCancel = $('<button></button>').text('Cancel')
            .addClass('btn btn-danger')
            .on('click', function() {
                $('#smartwizard').smartWizard("reset");
                $('#myForm').find("input, textarea").val("");
            });



        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
            transitionEffect: 'fade',
            toolbarSettings: {
                toolbarPosition: 'bottom',
                toolbarExtraButtons: [btnFinish, btnCancel]
            },
            anchorSettings: {
                markDoneStep: true, // add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            }
        });

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if (stepDirection === 'forward' && elmForm) {
                elmForm.validator('validate');
                var elmErr = elmForm.children('.has-error');
                if (elmErr && elmErr.length > 0) {
                    // Form validation failed
                    return false;
                }
            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if (stepNumber == 3) {
                $('.btn-finish').removeClass('disabled');
            } else {
                $('.btn-finish').addClass('disabled');
            }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelpelanggan').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>