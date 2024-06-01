<aside role="complimentary">
      </aside>
      
      <?php
    if(is_active_sidebar("second-sidebar")){
        dynamic_sidebar("second-sidebar");
      }
      else{
        echo "<p> No sidebar widgets. </p>";
      }
   
    ?>
    </div>