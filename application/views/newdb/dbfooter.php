    <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li>
                            <a href="https://www.literator.me" target="_blank">Literator</a>
                        </li>
                        <li>
                            <a href="http://blog.literator.me/" target="_blank">Blog Literator</a>
                        </li>
                        <li>
                            <a href="https://instagram.com/literator.me" target="_blank">Instagram</a>
                        </li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="fa fa-heart heart"></i> by Khoerul Umam as CEO Literator
                    </span>
                </div>
            </div>
        </div>
    </footer>

    </div>
    </div>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/newdashboard/js/core/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/newdashboard/js/core/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/newdashboard/js/core/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/newdashboard/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/summernote/dist/summernote.js'); ?>"></script>


    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/newdashboard/js/plugins/chartjs.min.js'); ?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/newdashboard/js/plugins/bootstrap-notify.js'); ?>"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url('assets/newdashboard/js/paper-dashboard.min.js?v=2.0.0'); ?>" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: "Tulis artikel di sini",
                // tabsize: 1,
                // height: 200,
                // followingToolbar: false 
            });

        });
    </script>

    <script>
        $('#headerimage').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
    </body>

    </html>