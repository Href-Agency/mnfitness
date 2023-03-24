      </main>

      <?php
        $logo = get_field('logo_dark', 'option');
      ?>
      
      <footer class="site-footer">
        <div class="site-container">
          <img class="logo" src="<?php echo $logo['url']; ?>" alt="">
        </div>
      </footer>
    </div>

    <?php wp_footer(); ?>
  </body>
</html>
