    </div><!--Content-->

    <section id="footer" style="height: 150px;">

        <div class="container">

            <div class="copy pull-left">&copy; <?php echo date("Y"); ?> MDI Ventures</div>

            <div class="ln pull-right"><a href="https://www.linkedin.com/company/mdi-indigo-ventures" target="_blank"><img src="<?php echo base_url(); ?>assets/images/Linkedin.png" alt="Linkedin" /></a></div>

        </div>

    </secton>

    <script language="javascript">



        $(function() {

            $('a.page-scroll').bind('click', function(event) {

                var $anchor = $(this);

                $('html, body').stop().animate({

                    scrollTop: ($($anchor.attr('href')).offset().top - 120)

                }, 1500, 'easeInOutExpo');

                event.preventDefault();

            });

        });



        // Closes the Responsive Menu on Menu Item Click

        $('.navbar-collapse ul li a').click(function() {

            $('.navbar-toggle:visible').click();

        });

    </script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.min.js"></script>

    <script>

        $(document).ready(function() {

            $("html").niceScroll();

        });

    </script>

</body>

</html>