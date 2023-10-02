<?php
/**
 * Template Name: New Template - 2020
 * Story template without sidebar
 */
get_header('new2019'); ?>

    <!-- main body container -->
    <div id="hdr-bg-title" class="grid-container full">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell text-center">
          <h1>Bernie Sanders in Phoenix</h1>
          <h4>Live Analysis</h4>
        </div>
      </div>
    </div>

    <!-- main body container -->
    <div id="main_container" class="grid-container liveblog">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">
        <div class="large-12 medium-12 small-12 cell story-content">

          <?php
            $args = array(
              'post_type' => 'post'
            );

// Custom query.
$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        ?>
                <article>
                  <div class="pub_date">
                    <time datetime="2015-05-16 19:00"><wbr>Jan. 7, 2020</wbr> &ndash; <strong>4:29 p.m. MT</strong></time>
                    <span>Copy Link <i class="fas fa-plus-square"></i></span>
                  </div>
                  <h3 class="single-story-hdr">The Colorado River is overcommitted – here’s how that happened</h3>

                  <!-- story photo/video/slideshow -->
                  <div id="story-photo" class="story-photos">
                    <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2019/01/LakeMead-800.jpg" width="800" alt="" title="" />
                    <div class="asset-caption">The Metropolitan Water District of Southern California, which has already signed a drought contingency plan, started to withdraw its allocation of water from Lake Mead in January, and is storing the water in Southern California reservoirs. Hoover Dam, as seen from the Mike O’Callaghan-Pat Tillman Memorial Bridge, forms Lake Mead, the largest reservoir in the nation. (Photo by Jordan Evans/Cronkite News)</div>
                  </div>

                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis mauris. Maecenas ac erat sed libero tempus pulvinar. Suspendisse sodales velit vitae metus maximus, vel tincidunt lacus facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam sit amet lobortis tortor. In sagittis nec risus ut sagittis. Aliquam eu interdum nulla. Suspendisse pulvinar velit at lobortis sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris quam nisi, tincidunt ut cursus ut, sollicitudin ut erat. Duis luctus mauris imperdiet, congue nisl sed, tincidunt magna. Integer eu odio laoreet, hendrerit est non, fermentum ligula. Nunc dignissim velit quis arcu egestas, scelerisque feugiat risus iaculis. Nam semper purus lacus, ut rhoncus velit pharetra in. Nam molestie laoreet dui vulputate vulputate. Proin hendrerit convallis neque, eu porta lectus elementum et.</p>

                  <p>Donec commodo, nibh id congue scelerisque, sapien orci accumsan arcu, eget auctor erat nisi vel mauris. Curabitur placerat ut arcu vitae posuere. Donec in porttitor erat. Vestibulum mollis nisl dictum diam eleifend, ut convallis ligula maximus. Maecenas ultricies nisl tristique nisi mollis, non mattis nibh feugiat. Vivamus luctus neque et lectus vestibulum consectetur. Phasellus quis ligula sed orci tristique rhoncus non sit amet nulla. Suspendisse sagittis egestas quam, quis cursus quam semper eu.</p>

                  <p>Proin aliquet, ligula a finibus convallis, nunc ligula consequat odio, id lobortis ipsum lacus ut sapien. Sed mattis purus ultrices, semper purus tempus, egestas quam. Maecenas volutpat pharetra quam, eget egestas ligula placerat sed. Donec lobortis tellus id tincidunt ultricies. Praesent aliquam et elit et interdum. Nam congue orci nec est tincidunt, eget condimentum tortor maximus. Cras cursus sollicitudin luctus. Aliquam consequat eget arcu non ullamcorper. Nam congue id leo ut placerat.</p>

                  <!-- byline and date -->
                  <div class="byline">
                    <span class="author_name">&mdash; <a href="#">Dylan Simard</a>, Cronkite News</span>
                  </div>
                </article>
                    <?php
    }
}
/* Restore original Post Data */
wp_reset_postdata();
?>

        </div>

      </div>
    </div>

<?php get_footer('new2020'); ?>
