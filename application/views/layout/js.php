<script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/js/main.js"></script>
<script src="<?php echo base_url()?>assets/plugins/sweetalerts/sweetalert2.all.min.js"></script>

<script src="<?php echo base_url()?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/js/dashboard.js"></script>
<script src="<?php echo base_url()?>assets/assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/js/widgets.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
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
<?php if($this->session->flashdata('msg')=='success-login'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Terimakasih',
                  text: 'Selamat Datang <?php echo $this->session->userdata('nama');?>.',
                  type: 'success'
              });
        </script>
    <?php else:?>

    <?php endif;?>

<script>
    $('.tombol-logout').on('click', function (e) {

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
            if(result.value == true) {
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
