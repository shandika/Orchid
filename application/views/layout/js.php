<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/sweetalerts/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/widgets.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<!-- Include jQuery Validator plugin -->
<script src="<?php echo base_url() ?>assets/dist/js/validator.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<!-- Data Tables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
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
<?php elseif ($this->session->flashdata('msg') == 'success-update') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Data Berhasil Di Update',
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
<?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
        $.toast({
            heading: 'Success',
            text: "Data Berhasil disimpan ke database.",
            showHideTransition: 'slide',
            icon: 'success',
            allowToastClose: false,
            hideAfter: 5000,
            position: 'top-right',
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
        $.toast({
            heading: 'Perhatian !',
            text: "Field Masih ada yang kosong, silahkan isi terlebih dahulu",
            showHideTransition: 'slide',
            icon: 'warning',
            allowToastClose: false,
            hideAfter: 5000,
            position: 'top-right',
            bgColor: 'orange'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'error-simpan') : ?>
    <script type="text/javascript">
        $.toast({
            heading: 'Perhatian !',
            text: "Gagal Menyimpan Data",
            showHideTransition: 'slide',
            icon: 'error',
            allowToastClose: false,
            hideAfter: 5000,
            position: 'top-right',
            bgColor: 'orange'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'success-add-data') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Data sudah tersimpan',
            type: 'success'
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

<script>
    $(document).ready(function() { // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='nama_angsuran'>Nama Angsuran</label>" +
                "<input type='text' class='form-control' name='nama_angsuran[]' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='angsuranke'>Angsuran Ke-</label>" +
                "<input type='text' class='form-control' name='angsuranke[]' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='nominal_angsuran_lain'>Nominal Angsuran Lain</label>" +
                "<input type='text' class='form-control' name='nominal_angsuran_lain[]'' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<br>");

            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });

        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function() {
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama").autocomplete({
            source: "<?php echo site_url('Marketing/get_autocomplete/?'); ?>",

            select: function(event, ui) {
                $('[name="nama"]').val(ui.item.label);
                $('[name="no_ktp"]').val(ui.item.no_ktp);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_pemohon_addendum").autocomplete({
            source: "<?php echo site_url('Marketing/get_autocomplete/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_pemohon_addendum"]').val(ui.item.label);
                $('[name="no_ktp_addendum"]').val(ui.item.no_ktp);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_angsuran").autocomplete({
            source: "<?php echo site_url('Keuangan/get_autocomplete/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_angsuran"]').val(ui.item.label);
                $('[name="no_ktp_angsuran"]').val(ui.item.no_ktp);
                $('[name="id_invoice"]').val(ui.item.id_invoice);
                $('[name="id_angsuran"]').val(ui.item.id_angsuran);
                $('[name="nominal_pembayaran"]').val(ui.item.nominal_pembayaran);
            }
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_gl").autocomplete({
            source: "<?php echo site_url('Keuangan/get_gl/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_gl"]').val(ui.item.label);
                $('[name="nomor_gl"]').val(ui.item.nomor);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_gl2").autocomplete({
            source: "<?php echo site_url('Keuangan/get_gl/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_gl2"]').val(ui.item.label);
                $('[name="nomor_gl2"]').val(ui.item.nomor);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)

        $("#project").change(function() { // Ketika user mengganti atau memilih data project
            $("#unit").hide(); // Sembunyikan dulu combobox unit nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("Marketing/get_unit"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_project: $("#project").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil

                    // set isi dari combobox unit
                    // lalu munculkan kembali combobox unit
                    $("#unit").html(response.list_unit).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#lama_angsuran_dp").change(function() {
            var dp = parseInt($("#dp").val());
            var l_a_d = parseInt($("#lama_angsuran_dp").val());

            if (l_a_d == 0) {
                $("#angsuran_dp").val(dp);
            } else {
                var total = (dp / l_a_d);
                var bagi = total / 1000;
                var dibulatkan = Math.floor(bagi);
                var hasilnya = dibulatkan * 1000;
                $("#angsuran_dp").val(hasilnya);
            }

        });

        $("#lama_injeksi").keyup(function() {
            var injeksi = parseInt($("#injeksi").val());
            var lama_injeksi = parseInt($("#lama_injeksi").val());
            var total = (injeksi * lama_injeksi);
            $("#total_injeksi").val(total);
        });


        $("#lama_angsuran_bulanan").change(function() {
            var harga = parseInt($("#harga").val());
            var l_a_b = parseInt($("#lama_angsuran_bulanan").val());
            var t_injek = parseInt($("#total_injeksi").val());
            var dp = parseInt($("#dp").val());
            var total = (harga - dp - t_injek) / l_a_b;
            var bagi = total / 1000;
            var dibulatkan = Math.floor(bagi);
            var hasilnya = dibulatkan * 1000;
            $("#angsuran_bulanan").val(hasilnya);

        });
    });
</script> <!-- Menghitung otomatis -->

<script>
    $(document).ready(function() {

        $("#type_bayar_angsuran").change(function() {
            var typenya = ($("#type_bayar_angsuran").val());

            switch (typenya) {
                case "cash":
                    document.getElementById('nama_bank_angsuran').setAttribute('readonly', true);
                    document.getElementById('nomor_bank_angsuran').setAttribute('readonly', true);
                    break;
                case "debit":
                    document.getElementById('nama_bank_angsuran').removeAttribute('readonly');
                    document.getElementById('nomor_bank_angsuran').removeAttribute('readonly');
                    break;
                default:
                    document.getElementById('nama_bank_angsuran').removeAttribute('readonly');
                    document.getElementById('nomor_bank_angsuran').removeAttribute('readonly');
                    break;
            }

        });



    });
</script>

<!-- Addendum optional -->
<script>
    $(document).ready(function() {

        $("#jenis_bayar_pr").change(function() {
            var typenya = ($("#jenis_bayar_pr").val());

            switch (typenya) {
                case "cash":
                    document.getElementById("lama_bayar_pr").disabled = true;
                    break;
                case "cicil":
                    document.getElementById("lama_bayar_pr").disabled = false;
                    break;
            }

        });



    });
</script>

<!-- Addendum optional -->
<script>
    $(document).ready(function() {

        $("#jenis_addendum").change(function() {
            var typenya = ($("#jenis_addendum").val());
            var no_ktp = $('#sisa_angsuran_sebelumnya_addendum').val();

            switch (typenya) {
                case "rubah_angsuran":
                    document.getElementById('form_rubah_angsuran').style.display = '';
                    document.getElementById('form_rubah_injek').style.display = 'none';
                    document.getElementById('form_rubah_unit').style.display = 'none';
                    document.getElementById('form_rubah_project').style.display = 'none';
                    document.getElementById('titlenya').style.display = '';
                    document.getElementById('titlenya').innerHTML = "PERUBAHAN DATA ANGSURAN";
                    break;
                case "rubah_injek":
                    document.getElementById('form_rubah_angsuran').style.display = 'none';
                    document.getElementById('form_rubah_injek').style.display = '';
                    document.getElementById('form_rubah_unit').style.display = 'none';
                    document.getElementById('form_rubah_project').style.display = 'none';
                    document.getElementById('titlenya').style.display = '';
                    document.getElementById('titlenya').innerHTML = "PERUBAHAN DATA INJEK";
                    break;
                case "rubah_unit":
                    document.getElementById('form_rubah_angsuran').style.display = 'none';
                    document.getElementById('form_rubah_injek').style.display = 'none';
                    document.getElementById('form_rubah_unit').style.display = '';
                    document.getElementById('form_rubah_project').style.display = 'none';
                    document.getElementById('titlenya').style.display = '';
                    document.getElementById('titlenya').innerHTML = "PERUBAHAN DATA UNIT";
                    break;
                case "rubah_project":
                    document.getElementById('form_rubah_angsuran').style.display = 'none';
                    document.getElementById('form_rubah_injek').style.display = 'none';
                    document.getElementById('form_rubah_unit').style.display = 'none';
                    document.getElementById('form_rubah_project').style.display = '';
                    document.getElementById('titlenya').style.display = '';
                    document.getElementById('titlenya').innerHTML = "PERUBAHAN DATA PROJECT";
                    break;
                default:
                    document.getElementById('form_rubah_angsuran').style.display = 'none';
                    document.getElementById('form_rubah_injek').style.display = 'none';
                    document.getElementById('form_rubah_unit').style.display = 'none';
                    document.getElementById('form_rubah_project').style.display = 'none';
                    document.getElementById('titlenya').style.display = 'none';
                    break;
            }

        });



    });
</script>

<!-- Details Pm Dashboard -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#detailProject', function() {
            let fotoProject = $(this).attr('data-foto');
            let namaProject = $(this).attr('data-nama');
            let jumlahUnit = $(this).attr('data-jmlunit');
            let unitIsi = $(this).attr('data-unitIsi');
            let unitKosong = $(this).attr('data-unitKosong');
            let alamat = $(this).attr('data-alamat');
            let deskripsi = $(this).attr('data-deskripsi');

            $('#foto').attr("src", "<?= base_url('assets/images/project/') ?>" + fotoProject);
            $('#nama').text(namaProject);
            $('#jmlUnit').text(jumlahUnit);
            $('#unitIsi').text(unitIsi);
            $('#unitKosong').text(unitKosong);
            $('#alamat').text(alamat);
            $('#deskripsi').text(deskripsi);
        });

    });
</script>

<script language="javascript" type="text/javascript">
    function removeSpaces(string) {
        return string.split(' ').join('');
    }
</script>

<script>
    // var debit = document.getElementById("debit_journal");
    // var kredit = document.getElementById("kredit_journal");
    // kredit.value = debit;
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelgl').DataTable({

        });
    });
</script>
<script type="text/javascript">
    function loadgl() {
        var project = $("#project_GL").val();

        if (project == "general_ledger") {
            $.ajax({
                url: "<?php echo base_url(); ?>Keuangan/sort_gl_utama",
                data: "project_GL=" + project,
                success: function(html) {
                    $("#tabelgl").html(html);
                }
            });
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>Keuangan/sort_gl",
                data: "project_GL=" + project,
                success: function(html) {
                    $("#tabelgl").html(html);
                }
            });
        }
    }
</script>

<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/sweetalerts/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/widgets.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<!-- Include jQuery Validator plugin -->
<script src="<?php echo base_url() ?>assets/dist/js/validator.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<!-- Data Tables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
<!-- Toast -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- Pusher -->
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
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
<?php elseif ($this->session->flashdata('msg') == 'success-update') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Data Berhasil Di Update',
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
<?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
        $.toast({
            heading: 'Success',
            text: "Data Berhasil disimpan ke database.",
            showHideTransition: 'slide',
            icon: 'success',
            allowToastClose : false,
            hideAfter : 5000,
            position: 'top-right',
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
        $.toast({
            heading: 'Perhatian !',
            text: "Field Masih ada yang kosong, silahkan isi terlebih dahulu",
            showHideTransition: 'slide',
            icon: 'warning',
            allowToastClose : false,
            hideAfter : 5000,
            position: 'top-right',
            bgColor: 'orange'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'error-simpan') : ?>
    <script type="text/javascript">
        $.toast({
            heading: 'Perhatian !',
            text: "Gagal Menyimpan Data",
            showHideTransition: 'slide',
            icon: 'error',
            allowToastClose : false,
            hideAfter : 5000,
            position: 'top-right',
            bgColor: 'orange'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'success-add-data') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Data sudah tersimpan',
            type: 'success'
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

<script>
    $(document).ready(function() { // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='nama_angsuran'>Nama Angsuran</label>" +
                "<input type='text' class='form-control' name='nama_angsuran[]' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='angsuranke'>Angsuran Ke-</label>" +
                "<input type='text' class='form-control' name='angsuranke[]' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='nominal_angsuran_lain'>Nominal Angsuran Lain</label>" +
                "<input type='text' class='form-control' name='nominal_angsuran_lain[]'' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<br>");

            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });

        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function() {
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama").autocomplete({
            source: "<?php echo site_url('Marketing/get_autocomplete/?'); ?>",

            select: function(event, ui) {
                $('[name="nama"]').val(ui.item.label);
                $('[name="no_ktp"]').val(ui.item.no_ktp);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        
        $("#nama_angsuran").autocomplete({
            source: "<?php echo site_url('Keuangan/get_autocomplete/?'); ?>",
            
            select: function(event, ui) {
                $('[name="nama_angsuran"]').val(ui.item.label);
                $('[name="no_ktp_angsuran"]').val(ui.item.no_ktp);
                $('[name="id_invoice"]').val(ui.item.id_invoice);
                $('[name="id_angsuran"]').val(ui.item.id_angsuran);
                $('[name="nominal_pembayaran"]').val(ui.item.nominal_pembayaran);
            }
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_gl").autocomplete({
            source: "<?php echo site_url('Keuangan/get_gl/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_gl"]').val(ui.item.label);
                $('[name="nomor_gl"]').val(ui.item.nomor);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_gl2").autocomplete({
            source: "<?php echo site_url('Keuangan/get_gl/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_gl2"]').val(ui.item.label);
                $('[name="nomor_gl2"]').val(ui.item.nomor);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)

        $("#project").change(function() { // Ketika user mengganti atau memilih data project
            $("#unit").hide(); // Sembunyikan dulu combobox unit nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("Marketing/get_unit"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_project: $("#project").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil

                    // set isi dari combobox unit
                    // lalu munculkan kembali combobox unit
                    $("#unit").html(response.list_unit).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#lama_angsuran_dp").change(function() {
            var dp = parseInt($("#dp").val());
            var l_a_d = parseInt($("#lama_angsuran_dp").val());

            if (l_a_d == 0) {
                $("#angsuran_dp").val(dp);
            } else {
                var total = (dp / l_a_d);
                var bagi = total / 1000;
                var dibulatkan = Math.floor(bagi);
                var hasilnya = dibulatkan * 1000;
                $("#angsuran_dp").val(hasilnya);
            }

        });

        $("#lama_injeksi").keyup(function() {
            var injeksi = parseInt($("#injeksi").val());
            var lama_injeksi = parseInt($("#lama_injeksi").val());
            var total = (injeksi * lama_injeksi);
            $("#total_injeksi").val(total);
        });


        $("#lama_angsuran_bulanan").change(function() {
            var harga = parseInt($("#harga").val());
            var l_a_b = parseInt($("#lama_angsuran_bulanan").val());
            var t_injek = parseInt($("#total_injeksi").val());
            var dp = parseInt($("#dp").val());
            var total = (harga - dp - t_injek) / l_a_b;
            var bagi = total / 1000;
            var dibulatkan = Math.floor(bagi);
            var hasilnya = dibulatkan * 1000;
            $("#angsuran_bulanan").val(hasilnya);

        });
    });
</script> <!-- Menghitung otomatis -->

<script>
    $(document).ready(function() {

        $("#type_bayar_angsuran").change(function() {
            var typenya = ($("#type_bayar_angsuran").val());

            switch (typenya) {
                case "cash":
                    document.getElementById('nama_bank_angsuran').setAttribute('readonly', true);
                    document.getElementById('nomor_bank_angsuran').setAttribute('readonly', true);
                    break;
                case "debit":
                    document.getElementById('nama_bank_angsuran').removeAttribute('readonly');
                    document.getElementById('nomor_bank_angsuran').removeAttribute('readonly');
                    break;
                default:
                    document.getElementById('nama_bank_angsuran').removeAttribute('readonly');
                    document.getElementById('nomor_bank_angsuran').removeAttribute('readonly');
                    break;
            }

        });



    });
</script>

<!-- Details Pm Dashboard -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#detailProject', function() {
            let fotoProject = $(this).attr('data-foto');
            let namaProject = $(this).attr('data-nama');
            let jumlahUnit = $(this).attr('data-jmlunit');
            let unitIsi = $(this).attr('data-unitIsi');
            let unitKosong = $(this).attr('data-unitKosong');
            let alamat = $(this).attr('data-alamat');
            let deskripsi = $(this).attr('data-deskripsi');

            $('#foto').attr("src", "<?= base_url('assets/images/project/') ?>" + fotoProject);
            $('#nama').text(namaProject);
            $('#jmlUnit').text(jumlahUnit);
            $('#unitIsi').text(unitIsi);
            $('#unitKosong').text(unitKosong);
            $('#alamat').text(alamat);
            $('#deskripsi').text(deskripsi);
        });

    });
</script>

<script language="javascript" type="text/javascript">
    function removeSpaces(string) {
        return string.split(' ').join('');
    }
</script>

<script>
    // var debit = document.getElementById("debit_journal");
    // var kredit = document.getElementById("kredit_journal");
    // kredit.value = debit;
</script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#tabelgl').DataTable({
            
        });
    });
</script> -->
<script type="text/javascript">
    function loadgl() {
        var project = $("#project_GL").val();

        if (project == "general_ledger") {
            $.ajax({
                url: "<?php echo base_url(); ?>Keuangan/sort_gl_utama",
                data: "project_GL=" + project,
                success: function(html) {
                    $("#tabelgl").html(html);
                }
            });
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>Keuangan/sort_gl",
                data: "project_GL=" + project,
                success: function(html) {
                    $("#tabelgl").html(html);
                }
            });
        }
    }
</script>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/sweetalerts/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/widgets.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<!-- Include jQuery Validator plugin -->
<script src="<?php echo base_url() ?>assets/dist/js/validator.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<!-- Data Tables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
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
<?php elseif ($this->session->flashdata('msg') == 'success-update') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Data Berhasil Di Update',
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
<?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
        $.toast({
            heading: 'Success',
            text: "Data Berhasil disimpan ke database.",
            showHideTransition: 'slide',
            icon: 'success',
            allowToastClose: false,
            hideAfter: 5000,
            position: 'top-right',
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
        $.toast({
            heading: 'Perhatian !',
            text: "Field Masih ada yang kosong, silahkan isi terlebih dahulu",
            showHideTransition: 'slide',
            icon: 'warning',
            allowToastClose: false,
            hideAfter: 5000,
            position: 'top-right',
            bgColor: 'orange'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'error-simpan') : ?>
    <script type="text/javascript">
        $.toast({
            heading: 'Perhatian !',
            text: "Gagal Menyimpan Data",
            showHideTransition: 'slide',
            icon: 'error',
            allowToastClose: false,
            hideAfter: 5000,
            position: 'top-right',
            bgColor: 'orange'
        });
    </script>
<?php elseif ($this->session->flashdata('msg') == 'success-add-data') : ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Terimakasih',
            text: 'Data sudah tersimpan',
            type: 'success'
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

<script>
    $(document).ready(function() { // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='nama_angsuran'>Nama Angsuran</label>" +
                "<input type='text' class='form-control' name='nama_angsuran[]' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='angsuranke'>Angsuran Ke-</label>" +
                "<input type='text' class='form-control' name='angsuranke[]' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div id='form-step-2' role='form' data-toggle='validator'>" +
                "<div class='form-group'>" +
                "<label for='nominal_angsuran_lain'>Nominal Angsuran Lain</label>" +
                "<input type='text' class='form-control' name='nominal_angsuran_lain[]'' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<br>");

            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });

        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function() {
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama").autocomplete({
            source: "<?php echo site_url('Marketing/get_autocomplete/?'); ?>",

            select: function(event, ui) {
                $('[name="nama"]').val(ui.item.label);
                $('[name="no_ktp"]').val(ui.item.no_ktp);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_pemohon_addendum").autocomplete({
            source: "<?php echo site_url('Marketing/get_autocomplete/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_pemohon_addendum"]').val(ui.item.label);
                $('[name="no_ktp_addendum"]').val(ui.item.no_ktp);
            }
        });    
    });
    function loadAddendum() {
        var addendum = $("#jenis_addendum").val();

        if (addendum == "rubah_angsuran") {
            $.ajax({
                url: "<?php echo base_url(); ?>Keuangan/rubah_angsuran",
                data: "jenis_addendum=" + addendum,
                success: function(html) {
                    $("#sisa").html(html);
                }
            });
        } else {
            alert("I am an alert box!");
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_angsuran").autocomplete({
            source: "<?php echo site_url('Keuangan/get_autocomplete/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_angsuran"]').val(ui.item.label);
                $('[name="no_ktp_angsuran"]').val(ui.item.no_ktp);
                $('[name="id_invoice"]').val(ui.item.id_invoice);
                $('[name="id_angsuran"]').val(ui.item.id_angsuran);
                $('[name="nominal_pembayaran"]').val(ui.item.nominal_pembayaran);
            }
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_gl").autocomplete({
            source: "<?php echo site_url('Keuangan/get_gl/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_gl"]').val(ui.item.label);
                $('[name="nomor_gl"]').val(ui.item.nomor);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_gl2").autocomplete({
            source: "<?php echo site_url('Keuangan/get_gl/?'); ?>",

            select: function(event, ui) {
                $('[name="nama_gl2"]').val(ui.item.label);
                $('[name="nomor_gl2"]').val(ui.item.nomor);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)

        $("#project").change(function() { // Ketika user mengganti atau memilih data project
            $("#unit").hide(); // Sembunyikan dulu combobox unit nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("Marketing/get_unit"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_project: $("#project").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil

                    // set isi dari combobox unit
                    // lalu munculkan kembali combobox unit
                    $("#unit").html(response.list_unit).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#lama_angsuran_dp").change(function() {
            var dp = parseInt($("#dp").val());
            var l_a_d = parseInt($("#lama_angsuran_dp").val());

            if (l_a_d == 0) {
                $("#angsuran_dp").val(dp);
            } else {
                var total = (dp / l_a_d);
                var bagi = total / 1000;
                var dibulatkan = Math.floor(bagi);
                var hasilnya = dibulatkan * 1000;
                $("#angsuran_dp").val(hasilnya);
            }

        });

        $("#lama_injeksi").keyup(function() {
            var injeksi = parseInt($("#injeksi").val());
            var lama_injeksi = parseInt($("#lama_injeksi").val());
            var total = (injeksi * lama_injeksi);
            $("#total_injeksi").val(total);
        });


        $("#lama_angsuran_bulanan").change(function() {
            var harga = parseInt($("#harga").val());
            var l_a_b = parseInt($("#lama_angsuran_bulanan").val());
            var t_injek = parseInt($("#total_injeksi").val());
            var dp = parseInt($("#dp").val());
            var total = (harga - dp - t_injek) / l_a_b;
            var bagi = total / 1000;
            var dibulatkan = Math.floor(bagi);
            var hasilnya = dibulatkan * 1000;
            $("#angsuran_bulanan").val(hasilnya);

        });
    });
</script> <!-- Menghitung otomatis -->

<script>
    $(document).ready(function() {

        $("#type_bayar_angsuran").change(function() {
            var typenya = ($("#type_bayar_angsuran").val());

            switch (typenya) {
                case "cash":
                    document.getElementById('nama_bank_angsuran').setAttribute('readonly', true);
                    document.getElementById('nomor_bank_angsuran').setAttribute('readonly', true);
                    break;
                case "debit":
                    document.getElementById('nama_bank_angsuran').removeAttribute('readonly');
                    document.getElementById('nomor_bank_angsuran').removeAttribute('readonly');
                    break;
                default:
                    document.getElementById('nama_bank_angsuran').removeAttribute('readonly');
                    document.getElementById('nomor_bank_angsuran').removeAttribute('readonly');
                    break;
            }

        });



    });
</script>

<!-- Addendum optional -->
<script>
    $(document).ready(function() {

        $("#jenis_addendum").change(function() {
            var typenya = ($("#jenis_addendum").val());
            var no_ktp = $('#sisa_angsuran_sebelumnya_addendum').val();

            switch (typenya) {
                case "rubah_angsuran":
                    document.getElementById('form_rubah_angsuran').style.display = '';
                    document.getElementById('form_rubah_injek').style.display = 'none';
                    document.getElementById('form_rubah_unit').style.display = 'none';
                    document.getElementById('form_rubah_project').style.display = 'none';
                    document.getElementById('titlenya').style.display = '';
                    document.getElementById('titlenya').innerHTML = "PERUBAHAN DATA ANGSURAN";
                    break;
                case "rubah_injek":
                    document.getElementById('form_rubah_angsuran').style.display = 'none';
                    document.getElementById('form_rubah_injek').style.display = '';
                    document.getElementById('form_rubah_unit').style.display = 'none';
                    document.getElementById('form_rubah_project').style.display = 'none';
                    document.getElementById('titlenya').style.display = '';
                    document.getElementById('titlenya').innerHTML = "PERUBAHAN DATA INJEK";
                    break;
                case "rubah_unit":
                    document.getElementById('form_rubah_angsuran').style.display = 'none';
                    document.getElementById('form_rubah_injek').style.display = 'none';
                    document.getElementById('form_rubah_unit').style.display = '';
                    document.getElementById('form_rubah_project').style.display = 'none';
                    document.getElementById('titlenya').style.display = '';
                    document.getElementById('titlenya').innerHTML = "PERUBAHAN DATA UNIT";
                    break;
                case "rubah_project":
                    document.getElementById('form_rubah_angsuran').style.display = 'none';
                    document.getElementById('form_rubah_injek').style.display = 'none';
                    document.getElementById('form_rubah_unit').style.display = 'none';
                    document.getElementById('form_rubah_project').style.display = '';
                    document.getElementById('titlenya').style.display = '';
                    document.getElementById('titlenya').innerHTML = "PERUBAHAN DATA PROJECT";
                    break;
                default:
                    document.getElementById('form_rubah_angsuran').style.display = 'none';
                    document.getElementById('form_rubah_injek').style.display = 'none';
                    document.getElementById('form_rubah_unit').style.display = 'none';
                    document.getElementById('form_rubah_project').style.display = 'none';
                    document.getElementById('titlenya').style.display = 'none';
                    break;
            }

        });



    });
</script>

<!-- Details Pm Dashboard -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#detailProject', function() {
            let fotoProject = $(this).attr('data-foto');
            let namaProject = $(this).attr('data-nama');
            let jumlahUnit = $(this).attr('data-jmlunit');
            let unitIsi = $(this).attr('data-unitIsi');
            let unitKosong = $(this).attr('data-unitKosong');
            let alamat = $(this).attr('data-alamat');
            let deskripsi = $(this).attr('data-deskripsi');

            $('#foto').attr("src", "<?= base_url('assets/images/project/') ?>" + fotoProject);
            $('#nama').text(namaProject);
            $('#jmlUnit').text(jumlahUnit);
            $('#unitIsi').text(unitIsi);
            $('#unitKosong').text(unitKosong);
            $('#alamat').text(alamat);
            $('#deskripsi').text(deskripsi);
        });

    });
</script>

<script language="javascript" type="text/javascript">
    function removeSpaces(string) {
        return string.split(' ').join('');
    }
</script>

<script>
    // var debit = document.getElementById("debit_journal");
    // var kredit = document.getElementById("kredit_journal");
    // kredit.value = debit;
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelgl').DataTable({

        });
    });
</script>
<script type="text/javascript">
    function loadgl() {
        var project = $("#project_GL").val();

        if (project == "general_ledger") {
            $.ajax({
                url: "<?php echo base_url(); ?>Keuangan/sort_gl_utama",
                data: "project_GL=" + project,
                success: function(html) {
                    $("#tabelgl").html(html);
                }
            });
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>Keuangan/sort_gl",
                data: "project_GL=" + project,
                success: function(html) {
                    $("#tabelgl").html(html);
                }
            });
        }
    }
</script>
<script>
    var rupiah = document.getElementById("nominal");
    rupiah.addEventListener("keyup", function(e) {
        rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>
<script>
    var rupiah = document.getElementById("debit_journal");
    rupiah.addEventListener("keyup", function(e) {
        rupiah.value = formatRupiah(this.value, "Rp. ");
        document.getElementById('kredit_journal').value = document.getElementById('debit_journal').value;
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('00b0001530772bb134d0', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        // alert(JSON.stringify(data));
        xhr = $.ajax({
              method : "POST",
              url : "<?= base_url('Pm/list_notifikasi')?>",
              success : function(response){
                $('.list-notifikasi').html(response);
              }
        });
    });
</script>
<!-- Addendum optional -->
<script>
    $(document).ready(function() {

        $("#jenis_bayar_pr").change(function() {
            var typenya = ($("#jenis_bayar_pr").val());

            switch (typenya) {
                case "cash":
                    document.getElementById("lama_bayar_pr").disabled = true;
                    break;
                case "cicil":
                    document.getElementById("lama_bayar_pr").disabled = false;
                    break;
            }

        });



    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-tambah-formUnit").click(function() {
            let idProjecet = $(this).attr('data-id');
            var jumlah = parseInt($("#jumlah-formUnit").val());
            var nextform = jumlah + 1;
            $("#insert-formUnit").append("<div class='col-sm-12 mb-3 ml-4'>" +
                "<b>Data ke " + nextform + ":</b>" +
                "</div>" +
                "<input type='hidden' class='form-control' id='idProject' name='idProject[]' value='" + idProjecet + "'>" +
                "<div class='col-sm-2 ml-4'>" +
                "<div class='form-group'>" +
                "<input type='text' class='form-control' id='nomor' name='nomor[]' data-toggle='validator' placeholder='Nomor Unit'> required" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div class='col-sm-2  ml-4'>" +
                "<div class='form-group'>" +
                "<input type='number' class='form-control' id='type' name='type[]' data-toggle='validator' placeholder='Type Unit'> required" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div class='col-sm-2  ml-4'>" +
                "<div class='form-group'>" +
                "<input type='number' class='form-control' id='luasBangunan' name='luasBangunan[]' data-toggle='validator' placeholder='Luas Bangunan'> required" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<div class='col-sm-2  ml-4'>" +
                "<div class='form-group'>" +
                "<input type='number' class='form-control' id='luasTanah' name='luasTanah[]' data-toggle='validator' placeholder='Luas Tanah'> required" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "</div>" +
                "<br>");

            $("#jumlah-formUnit").val(nextform);
        });

        $("#btn-reset-formUnit").click(function() {
            $("#insert-formUnit").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-formUnit").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
</script>
