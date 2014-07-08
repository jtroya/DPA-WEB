<?php
    $profesores=get_users(array('role' => 'profesor', 'orderby' => 'display_name', 'order' => 'asc'));
?>

<div class="my_meta_control"> 
    <p>
        <label style="padding-top:7px;">Profesores Miembros</label>
        <select name="_my_meta[miembros_ud]" id="miembros_ud" multiple>            
            <?php
             foreach ($profesores as $p => $profesor) { ?>
                   <option class="theme-option" value="<?php echo $profesor->ID; ?>"  
                        <?php if ($meta['miembros_ud'] == $profesor->ID) { echo "selected"; } ?> > 
                        <?php echo $profesor->user_firstname; ?> 
                        <?php echo $profesor->user_lastname;  ?>
                   </option> 
            <?php } ?>
        </select>
        <br>
        <?php                     
            logConsole('Array', $meta, true);
        ?>
    </p>

</div>