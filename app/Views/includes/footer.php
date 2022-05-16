<!-- s-extra
    ================================================== -->
<section class="s-extra">

    <div class="row">

        <div class="col-seven md-six tab-full popular">
            <h3>Popular Posts</h3>
            <?php
            $db = \Config\Database::connect();
            $query = $db->query("SELECT * FROM posts where show_home = 1")->getResult();
            foreach ($query as $p) {
                echo '<li><a href="' . base_url() . '/dashboard/category/' . $p->id . '">' . $p->name . '</a></li>';

            ?>
                <div class="block-1-2 block-m-full popular__posts">
                    <article class="col-block popular__post">
                        <a href="<?= base_url() ?>/dashboard/post/<?= $p->slug . '/' . $p->id ?>" class="popular__thumb">
                            <img src="<?= base_url() ?>/uploads/<?= $p->banner ?>" alt="">
                        </a>
                        <h5><?= $p->title ?></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="<?= $p->created_at ?>"><?= date('d/m/Y', $p->created_at) ?></time></span>
                        </section>
                    </article>
                <?php } ?>
                </div> <!-- end popular_posts -->
        </div> <!-- end popular -->

        <div class="col-four md-six tab-full end">
            <div class="row">
                <div class="col-six md-six mob-full categories">
                    <h3>Categories</h3>
                    <ul class="linklist">
                        <?php
                        $db = \Config\Database::connect();
                        $query = $db->query("SELECT * FROM categories")->getResult();
                        foreach ($query as $r) {
                            echo '<li><a href="' . base_url() . '/dashboard/category/' . $r->id . '">' . $r->name . '</a></li>';
                        ?>
                        <?php } ?>
                    </ul>
                </div> <!-- end categories -->

                <div class="col-six md-six mob-full sitelinks">
                    <h3>Site Links</h3>

                    <ul class="linklist">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li><a href="<?= base_url() ?>/dashboard/blog">Blog</a></li>
                    </ul>
                </div> <!-- end sitelinks -->
            </div>
        </div>
    </div> <!-- end row -->

</section> <!-- end s-extra -->


<!-- s-footer
    ================================================== -->
<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-six tab-full s-footer__about">

                <h4>About Wordsmith</h4>

                <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut occaecati placeat at.
                    Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia consequatur.
                    Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa error
                    temporibus magnam est voluptatem.</p>

            </div> <!-- end s-footer__about -->

            <div class="col-six tab-full s-footer__subscribe">

                <h4>Our Newsletter</h4>

                <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                <div class="subscribe-form">
                    <form  method="post" id="newsletter-form" class="group" novalidate="true">

                        <input type="email" value="" name="email" class="email" id="newsletter-input" placeholder="Email Address" required="">

                        <div class="btn" id="sendNewsletter">Send</div>

                        <label style="color: white;" for="mc-email" class="subscribe-message"></label>

                    </form>
                </div>

            </div> <!-- end s-footer__subscribe -->

        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">

            <div class="col-six">
                <ul class="footer-social">
                    <li>
                        <a href="#0"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-six">
                <div class="s-footer__copyright">
                    <span>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>

        </div>
    </div> <!-- end s-footer__bottom -->

    <div class="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top"></a>
    </div>

</footer> <!-- end s-footer -->

<!-- Java Script
    ================================================== -->
<?php if ($view == "uploadPost") { ?>
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<?php } else { ?>
    <script src="<?= base_url() ?>/assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins.js"></script>
    <script src="<?= base_url() ?>/assets/js/main.js"></script>
<?php } ?>

<script type="text/javaScript">
    $("#sendNewsletter").click(function(){
        console.log("Se ha enviado");
        var inputemail = $("#newsletter-input").val();
        $.post("<?= base_url() ?>/dashboard/add_newsletter",{email:inputemail}).done(function(data) {
            console.log("Enviado Posts");
            console.log(data);
            $(".subscribe-message").html(data);
        });
    });
</script>

</body>

</html>