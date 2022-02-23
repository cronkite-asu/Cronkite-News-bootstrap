<?php
/**
 * Template Name: Fullscreen Wildfire - Photo/Video Gallery
 * Story template without sidebar
 */
get_header('photogallery'); ?>

  <section id="gallery">
    <div id="phoenix-protest" class="photo-gallery">
      <div class="slide image-1">
        <div class="bg-text-gradient">
          <div class="summary first-slide">
            <h5><img src="<?php bloginfo('template_directory');?>/assets/img/eye-icon.svg" class="visual-story-icon" alt="Visual Story" title="Visual Story" />Visual Story</h5>
            <h1><?php echo get_the_title(); ?></h1>
            <?php echo $content = apply_filters('the_content', get_the_content()); ?>
            <p class="byline">By Caitlynn McDaniel/Cronkite News | June 18, 2020</p>
            <a href="https://twitter.com/intent/tweet?url=https://cronkitenews.azpbs.org/2020/06/02/visual-story-protesters-phoenix/&text=Protesters%20take%20to%20the%20streets%20of%20downtown%20Phoenix.%20Watch%20how%20the%20demonstrations%20unfolded%20each%20day." target="_blank"><i class="fab fa-twitter"></i></a><a href="https://www.facebook.com/sharer/sharer.php?u=https://cronkitenews.azpbs.org/2020/06/02/visual-story-protesters-phoenix/" target="_blank"><i class="fab fa-facebook-f"></i></a><a href="https://www.instagram.com/cronkitenews/" target="_blank"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="slide image-2">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">Bush Fire</h5>
            <p>The blaze has burned 114,941 acres in the Tonto National Forest near Punkin Center. Personnel on-site has increased to 609, according to InciWeb, the U.S. Forest Service’s incident system.</p>
            <p>Fire spokesman Dee Hines said the flames are moving northeast through tall grass, chaparral and brush, prompting pre-evacuation notices Thursday for Rye, Gisela, Deer Creek and the Bar-T-Bar Ranch.</p>
            <p>The blaze was expected to grow Thursday, he said, but fire crews may catch a break.</p>
            <p>“I don't think we're going to see quite the same fire behavior that we saw in the last few days because of the wind,” Hines said.</p>
            <p>With expected low winds of 15 mph Thursday, officials expect firefighters to make progress on containment.</p>
          </div>
        </div>
      </div>
      <div class="slide image-2"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-3"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-4"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-5"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-6">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">Mangum Fire</h5>
            <p>The blaze on the North Rim of the Grand Canyon has scorched 54,845 acres and is expected to keep growing this week. Thursday’s forecast predicts gusts from the southwest up to 25 mph, InciWeb reports.</p>
            <p>Three residences were evacuated Wednesday afternoon as the fire shifted to House Rock Road north of U.S. 89A.</p>
          </div>
        </div>
      </div>
      <div class="slide image-6"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-7"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-8">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">Bighorn Fire</h5>
            <p>Stiff winds helped the <strong>blaze</strong> on the flanks of the Santa Catalina Mountains <strong>grow by more than</strong> 7,000 acres Wednesday. <strong>More than 800 firefighters are on-site</strong>, <a href="https://inciweb.nwcg.gov/incident/article/6741/52071/" target="_blank">according to InciWeb</a>. The fire which has burned more than <strong>31,000 acres and is 40% contained</strong>.</p>
            <p>As of Thursday morning, the Willow Canyon area on Mount Lemmon was being evacuated, according to a notice by the <a href="https://www.facebook.com/pimasheriff/posts/3290058764385061" target="_blank">Pima County Sheriff's Department</a>. Fire managers anticipate the fire will move toward Charouleau Gap, and high levels of smoke are expected as flames on Oracle Ridge and in Stratton Canyon join together.</p>
          </div>
        </div>
      </div>
      <div class="slide image-8"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-9"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-10"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-11"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-12"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-13"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-14"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-15">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">Blue River Fire</h5>
            <p>This wildfire, which started <strong>June 5</strong>, has burned <strong>30,400 acres</strong> northeast of San Carlos and is <strong>85% contained</strong>. Control of operations was returned to local fire crews Thursday, InciWeb reported.</p>
          </div>
        </div>
      </div>
      <div class="slide image-15"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-16"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-17"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
    </div>
  </section>

<?php get_footer('photogallery'); ?>
