<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <p class="footer_h open_sans bold">Contact</p>
                <p class="footer_text open_sans">
                    Mauris non tempor quam.</br>
                    Mauris accumsan eros eget libero.</br>
                    Etiam elit elit, elementum sed varius.</br>
                    Sed nec felis pellentesque.
                </p>
                <p class="footer_email open_sans">
                    Email: <a href="#">secretariat@socialplus.eu</a>
                </p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="footer_h open_sans bold">Links</p>
                <ul class="links_nav">
                    <li><a href="">About us</a></li>
                    <li><a href="">Policy</a></li>
                    <li><a href="">Publications</a></li>
                    <li><a href="">Search</a></li>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-right">
                <p class="footer_h_right open_sans bold">Follow us</p>
                <ul class="follow_link">
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href=""><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="powered">
            <span>© 2019 Social plus | Privacy policy |  <a href="#">Terms of Use</a>  I  EU Transparency Register : 00012345678-90</span>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="js/slick.min.js"></script>

<script>
    $(document).on('ready', function(){
        $(".green_block").slick({
            dots: true,
            arrows:false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
        });

        $(".policies_carusel").slick({
            dots: false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            nextArrow: '.policies_next',
            prevArrow: '.policies_previous',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }

            ]
        });
    });
</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
