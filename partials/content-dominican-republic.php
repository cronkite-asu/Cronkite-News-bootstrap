<div class="grid-container full">
  <div class="grid-x">
    <div class="large-12 cell">
      <section class="haiti-dr">
        <div class="scene1">
          <div class="intro-text">
            <h1>An Island Divided: Haiti & The Dominican Republic</h1>
            <p>For decades, residents of Haiti have sought work, peace, and stability in neighboring Dominican Republic.  This trend has increased as Haiti faces unprecedented political, economic, and environmental challenges. In response, the Dominican government is building a new border wall, cracking down on immigration, revoking the rights of some citizens, and deporting record numbers of people.  The government says it needs to control its borders and look after its own people, many of whom live in poverty. Meanwhile people of Haitian descent living in the Dominican Republic feel targeted, afraid, and exploited.  Our project covers the stories, hopes and dreams of the people who share an island home, but are divided by physical and philosophical borders.</p>
          </div>
        </div>
        <div class="scene2">
          <div class="map">
            <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2024/03/Haiti-DR-w-capitals.png" />
          </div>
        </div>

        <div class="scroll-down"></div>
      </section>
    </div>
  </div>
</div>

<?php
  // get dominican republic content
  if (have_rows('content')) {
    $counter = 0;
    while (have_rows('content')) {
        the_row();
        if (get_row_layout() == 'stories') {
          $columns = get_sub_field('columns');
          $sectionPhoto = get_sub_field('section-photo');
          // get stories
          $storyList = get_sub_field('story');

          // check column type
          if ($columns == 'one-col') {
            $columnType = 'large-12 medium-12';
          } else if ($columns == 'two-col') {
            $columnType = 'large-6 medium-6';
          } else if ($columns == 'three-col') {
            $columnType = 'large-4 medium-4';
          } else if ($columns == 'four-col') {
            $columnType = '';
          }

          if ($columns == 'one-col') {
            if ($counter == 0) {
              $class = 'first';
            } else {
              $class = '';
            }
?>
          <div class="grid-container dominican-republic-story <?php echo $class; ?>">
            <div class="grid-x">
            <?php
            if ($storyList) {
              foreach ($storyList as $story) {
                  $permalink = get_permalink($story->ID);
                  $title = get_the_title($story->ID);
                  $storyTease = get_field('story_tease', $story->ID);
                  $photo = get_the_post_thumbnail_url($story->ID);
                  $photoSmall = get_the_post_thumbnail($story->ID);
            ?>
              <div class="<?php echo $columnType; ?> small-12 cell">
                <?php if ($sectionPhoto != '') { ?>
                  <a href="<?php echo get_permalink($story->ID); ?>"><img src="<?php echo $sectionPhoto; ?>" alt="" title="" /></a>
                <?php } else { ?>
                  <a href="<?php echo get_permalink($story->ID); ?>"><img src="<?php echo $photo; ?>" alt="" title="" /></a>
                <?php } ?>
              </div>
            <?php
              }
            }
            ?>
            </div>
          </div>

<?php
          } else {
?>
          <div class="grid-container dominican-republic-story">
            <div class="grid-x grid-margin-x">
              <?php
              if ($storyList) {
                foreach ($storyList as $story) {
                    $permalink = get_permalink($story->ID);
                    $title = get_the_title($story->ID);
                    $storyTease = get_field('story_tease', $story->ID);
                    $photo = get_the_post_thumbnail_url($story->ID);
                    $photoSmall = get_the_post_thumbnail($story->ID);
              ?>
                <div class="<?php echo $columnType; ?> small-12 cell">
                  <?php if ($sectionPhoto != '') { ?>
                    <a href="<?php echo get_permalink($story->ID); ?>"><img src="<?php echo $sectionPhoto; ?>" alt="" title="" /></a>
                  <?php } else { ?>
                    <a href="<?php echo get_permalink($story->ID); ?>"><img src="<?php echo $photo; ?>" alt="" title="" /></a>
                  <?php } ?>
                </div>
              <?php
                }
              }
              ?>
              </div>
            </div>
<?php
          }
?>
          <div class="grid-container dominican-republic-story">
            <div class="grid-x grid-margin-x">
<?php
          if ($storyList) {
            foreach ($storyList as $story) {
                $permalink = get_permalink($story->ID);
                $title = get_the_title($story->ID);
                $storyTease = get_field('story_tease', $story->ID);
                $photo = get_the_post_thumbnail_url($story->ID);
                $photoSmall = get_the_post_thumbnail($story->ID);
              ?>
                <div class="<?php echo $columnType; ?> small-12 cell story-text split">
                  <h3><a href="<?php echo get_permalink($story->ID); ?>"><?php echo get_the_title($story->ID); ?></a></h3>
                  <p><?php echo get_field('story_tease', $story->ID); ?></p>
                </div>
          <?php
              }
            }
          ?>
          </div>
        </div>
<?php
        }
      }
      $counter++;
    }
?>

<script>
  if ($('.haiti-dr').length) {
    TweenMax.set(".haiti-dr .scene1", {autoAlpha:1});
    TweenMax.set(".haiti-dr .scroll-down", {autoAlpha:1});

    ScrollTrigger.create({
      trigger: ".haiti-dr",
      start: "top top",
      end: "+=1500px",
      pin: true
    });

    gsap.to(".haiti-dr .scene1", {
      scrollTrigger: {
        trigger: ".haiti-dr",
        start: "top top",
        end: "+=800",
        scrub: true
      },
      opacity: 0
    });
  }
</script>
