<aside role="complimentary">
      </aside>
      
      <?php
    if(is_active_sidebar("footer-3-sidebar")){
        dynamic_sidebar("footer-3-sidebar");
      }
      else{
        echo "<p> No sidebar widgets. </p>";
      }
   
    ?>
    </div>