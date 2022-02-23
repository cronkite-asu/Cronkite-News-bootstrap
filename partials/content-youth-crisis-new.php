<!-- main body container -->
<div class="grid-container full main-video">
  <div class="grid-container video-content">
    <div id="intro" class="grid-x grid-padding-x">
      <div class="large-12 cell text-center">
        <div class="plyr__video-embed responsive-embed widescreen" id="youth-suicide-player">
          <iframe
              src="https://www.youtube.com/embed/V4uAKhB3AuI?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
              allowfullscreen
              allowtransparency
              allow="autoplay"
          ></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="grid-container main-content">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <?php echo get_field('overview'); ?>
        <p class="text-center"><a class="button hollow rounded" href="https://cronkitenews.azpbs.org/youth-suicide/about/">About the project &#8594;</a></p>
    </div>
  </div>
</div>

<div class="grid-container main-content">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell text-center">
      <h1>Stories</h1>
      <div class="separador"></div>
    </div>


    <?php if( have_rows('stories') ): ?>
        <?php while( have_rows('stories') ): the_row(); ?>
          <div class="large-3 medium-3 small-6 cell">
            <a href="<?php echo get_sub_field('story_link'); ?>">
              <img src="<?php echo get_sub_field('photo'); ?>" />
              <h3><?php echo get_sub_field('headline'); ?></h3>
              <p><?php echo get_sub_field('summary'); ?></p>
            </a>
          </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if( have_rows('videos') ): ?>
        <?php while( have_rows('videos') ): the_row(); ?>
          <div class="large-3 medium-3 small-6 cell">
            <a href="<?php echo get_sub_field('video_link'); ?>">
              <img src="<?php echo get_sub_field('photo'); ?>" />
              <h3><?php echo get_sub_field('headline'); ?></h3>
              <p><?php echo get_sub_field('summary'); ?></p>
            </a>
          </div>
        <?php endwhile; ?>
    <?php endif; ?>

  </div>
</div>


<div class="grid-container main-content">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell text-center">
           <h1>Additional Resources</h1>
           <div class="separador"></div>
    </div>

    <div class="large-4 cell">
      <strong>ASU Counseling Services</strong>
      <ul style="margin-top:6px;margin-bottom:30px;">
      <li><em><strong>Downtown Phoenix:</strong></em> 602-496-1155</li>
      <li><em><strong>Polytechnic:</strong></em> 480-727-1255</li>
      <li><em><strong>Tempe:</strong></em> 480-965-6146</li>
      <li><em><strong>West:</strong></em> 602-543-8125</li>
      </ul>

      <strong>American Foundation for Suicide Prevention</strong>
      <ul style="margin-top:6px;">
      <li>This group offers <a href="https://afsp.org/find-support/" rel="noopener noreferrer" target="_blank">support to those struggling</a> as well as <a href="https://afsp.org/take-action/" rel="noopener noreferrer" target="_blank">raises money and works with advocates</a> to advance suicide prevention efforts.More on <a href="https://afsp.org/our-work/advocacy/become-an-advocate/" rel="noopener noreferrer" target="_blank">how to become an advocate here.</a> More on <a href="https://afsp.org/chapter/afsp-arizona/" rel="noopener noreferrer" target="_blank">AFSP Arizona</a>, which was chartered in 2010.</li>
      </ul>
    </div>
    <div class="large-4 cell">
      <strong>AHCCCS Suicide and Crisis Hotlines</strong>
      <ul style="margin-top:6px;">
      <li><em><strong>Mercy Care: Maricopa County:</strong></em><br />1-800-631-1314 or 602-222-9444</li>
      <li><em><strong>Complete Care Plan: Cochise, Graham, Greenlee, La Paz, Pima, Pinal, Santa Cruz and Yuma counties:</strong></em><br />1-866-495-6735</li>
      <li><em><strong>Health Choice Arizona: Apache, Coconino, Gila, Mohave, Navajo and Yavapai counties:</strong></em><br />1-877-756-4090</li>
      <li><em><strong>Gila River and Ak-Chin Native American communities:</strong></em><br />1-800-259-3449</li>
      <li><em><strong>Salt River Pima Maricopa Indian Community:</strong></em><br />1-855-331-6432</li>
      </ul>
    </div>
    <div class="large-4 cell">
       <strong>Trans Lifeline</strong>
       <ul style="margin-top:6px;margin-bottom:30px;">
       <li><a href="https://www.translifeline.org/" rel="noopener noreferrer" target="_blank"><strong>Trans Lifeline</strong></a> is a nonprofit focused on the trans community: 877-565-8860</li>
       </ul>

       <strong>Veterans Affairs</strong>
       <ul style="margin-top:6px;">
       <li>Veterans are advised to <a href="https://www.va.gov/directory/guide/division.asp?dnum=1&isFlash=0" rel="noopener noreferrer" target="_blank">contact their local VA</a>.</li>
       <li><strong>Military Crisis Line:</strong> 1-800-273-8255 and press 1</li>
       <li><strong>Chat online:</strong> <a href="https://www.veteranscrisisline.net/get-help/chat" rel="noopener noreferrer" target="_blank">Helpline</a></li>
       <li><strong>Text:</strong> 838255</li>
       <li><strong>Support for deaf and hard of hearing:</strong> 1-800-799-4889</li>
       </ul>
    </div>

  </div>
</div>

<div class="grid-container partners-content">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell text-center">
      <h1>Partners</h1>
      <div class="separador"></div>
    </div>
    <div class="large-12 cell text-center">
      <a href="https://www.azfoundation.org/" target="_blank" style="margin-right:60px;"><img src="<?php bloginfo('template_directory');?>/assets/img/youth-crisis/azcommunityfoundation-logo.png" alt="Arizona Community Foundation" title="Arizona Community Foundation" /></a>
      <a href="https://azbroadcasters.org/" target="_blank"><img src="<?php bloginfo('template_directory');?>/assets/img/youth-crisis/aba-logo.jpg" alt="Arizona Broadcasters Association" title="Arizona Broadcasters Association" /></a>
    </div>
  </div>
</div>
