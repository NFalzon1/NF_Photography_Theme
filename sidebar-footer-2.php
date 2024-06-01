<aside role="complimentary">
      </aside>
      
      <?php
    if(is_active_sidebar("footer-2-sidebar")){
        dynamic_sidebar("footer-2-sidebar");
      }
      else{
        echo "<p> No sidebar widgets. </p>";
      }
   
    ?>
    </div>