  <!-- s-content
    ================================================== -->
  <section class="s-content s-content--top-padding">

      <div class="row narrow">
          <div class="col-full s-content__header" data-aos="fade-up">
              <h1 class="display-1 display-1--with-line-sep">Category: <?= $category[0]['name'] ?></h1>
              <p class="lead">Dolor similique vitae. Exercitationem quidem occaecati iusto. Id non vitae enim quas error dolor maiores ut. Exercitationem earum ut repudiandae optio veritatis animi nulla qui dolores.</p>
          </div>
      </div>

      <div class="row entries-wrap add-top-padding wide">
          <div class="entries">

              <?php
                foreach ($posts as $p) :

                ?>

                  <article class="col-block">

                      <div class="item-entry" data-aos="zoom-in">
                          <div class="item-entry__thumb">
                              <a href="<?= base_url()?>/dashboard/post/<?= $p['slug'].'/'.$p['id']?>" class="item-entry__thumb-link">
                                  <img src="<?= base_url() ?>/uploads/<?= $p['banner'] ?>" alt="">
                              </a>
                          </div>

                          <div class="item-entry__text">
                              <div class="item-entry__cat">
                                  <a href="category.html"><?= $p['intro'] ?></a>
                              </div>

                              <h1 class="item-entry__title"><a href="<?= base_url()?>/dashboard/post/<?= $p['slug'].'/'.$p['id']?>"><?= $p['title'] ?></a></h1>

                              <div class="item-entry__date">
                                  <?php 
                                  $created = date("d/m/Y",strtotime($p['created_at']));
                                  ?>
                                  <a href="<?= base_url()?>/dashboard/post/<?= $p['slug'].'/'.$p['id']?>"><?= $created ?></a>
                              </div>
                          </div>
                      </div> <!-- item-entry -->

                  </article> <!-- end article -->

              <?php endforeach; ?>
          </div> <!-- end entries -->
      </div> <!-- end entries-wrap -->

      <div class="row pagination-wrap">
          <div class="col-full">
              <nav class="pgn" data-aos="fade-up">
                  <ul>
                      <li><a class="pgn__prev" href="#0">Prev</a></li>
                      <li><a class="pgn__num" href="#0">1</a></li>
                      <li><span class="pgn__num current">2</span></li>
                      <li><a class="pgn__num" href="#0">3</a></li>
                      <li><a class="pgn__num" href="#0">4</a></li>
                      <li><a class="pgn__num" href="#0">5</a></li>
                      <li><span class="pgn__num dots">???</span></li>
                      <li><a class="pgn__num" href="#0">8</a></li>
                      <li><a class="pgn__next" href="#0">Next</a></li>
                  </ul>
              </nav>
          </div>
      </div>

  </section> <!-- end s-content -->