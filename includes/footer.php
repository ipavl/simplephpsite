<div id="footer-copyright">Copyright &copy; 2015
  <?php
    include('includes/config.php');
    echo (isset($config['pageDir']) ? $config['titleText'] : "SimplePHPSite");
  ?>.

  <!-- You can add to this, however the following must remain intact. -->
  <br/>Powered by <a href="https://github.com/ipavl/simplephpsite" target="_blank">SimplePHPSite</a>
  and <a href="index.php?<?php echo $pageParam ?>=site-credits">other technologies</a>.
</div>
