<?php
$opt_name=array("btt_radio"=>"btt_radio");
$opt_value=array("btt_radio_value"=>get_option($opt_name['btt_radio']));
if(isset($_POST['btt_radio_submit'])){
	$opt_value=array("btt_radio_value"=>$_POST[$opt_name['btt_radio']]);
	update_option($opt_name['btt_radio'],$opt_value['btt_radio_value']);
	
	
	
	?>
   <?php /*?> <div id="message" class="updated fade">
				<p><strong>
						<?php _e('Option Saved. :)'); ?>
					</strong></p>
			</div><?php */?>
    <?php
	}

?>


<div class="wrap">
			<h2><?php _e('Back To Top Options')?></h2>
            <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
 
    <table class="wp-list-table widefat plugins" cellspacing="2">
    <tr ><th class="manage-column column-cbd" colspan="2">Choose An Option: </th></tr>
    <tr><th><input type="radio" name="<?php echo $opt_name['btt_radio'];?>" value="given_image" <?php if($opt_value['btt_radio_value']=="given_image")
		   echo 'checked="checked"';
		    ?>></th><th>Choose An Image From The Given List</th></tr>
    <tr ><th colspan="2">Or </th></tr>
    <tr><th><input type="radio" name="<?php echo $opt_name['btt_radio'];?>" value="upload_image" <?php if($opt_value['btt_radio_value']=="upload_image")
		   echo 'checked="checked"';
		    ?>></th><th>Upload Your Back To Top Image</th></tr>
    <tr ><th colspan="2">Or </th></tr>
    <tr><th><input type="radio" name="<?php echo $opt_name['btt_radio'];?>" value="submit_text" <?php if($opt_value['btt_radio_value']=="submit_text")
		   echo 'checked="checked"';
		    ?>></th><th>Create A Back To Top Icon With Text</th></tr>
    </table>
    <p class="submit">
    <input id="submit" class="button button-primary" type="submit" value="Next . . ." name="btt_radio_submit">
    </p>
</form>
</div>


<!-- given image start here -->


<?php if($opt_value['btt_radio_value']=='given_image'){?>
<div class="wrap" id="given_image">

<?php
$opt_name=array("image_name"=>"image_name");
$opt_value=array("image_value"=>get_option($opt_name['image_name']));
if(isset($_POST['submit_given_image'])){
	$opt_value=array("image_value"=>$_POST[$opt_name['image_name']]);
	update_option($opt_name['image_name'],$opt_value['image_value']);
	?>
    <div id="message" class="updated fade">
				<p><strong>
						<?php _e(' Image From The Given List Has Been Saved. :)'); ?>
					</strong></p>
			</div>
    <?php
	}

?>


	 <form name="myform" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
           <p>
           
           <table cellpadding="2" cellspacing="2" border="1" class="wp-list-table widefat">
           <tr><th colspan="2"><label for="">Choose Any Image:</label></th></tr>
           <?php for($i=1;$i<=25;$i++):?>
     <tr><th><p class="button"> <?php echo $i; ?>:  </p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="<?php echo $opt_name['image_name'];?>" value="<?php echo $i; ?>" <?php if($opt_value['image_value']==$i)
		   echo 'checked="checked"';
		    ?>> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th><img  style="max-width:120px;max-height:80px;" src="<?php echo plugins_url(PLUGIN_DIR_NAME);?>/img/<?php echo $i;?>.png"/></th></tr>
            
            <?php endfor; ?>
            </table>
           </p>
           
           
           
           <p class="submit">
           <input type="submit" name="submit_given_image" id="submit" class="button button-primary" value="<?php _e("Save Changes");?>">
           </p>
           
           </form>
         
</div>
<?php } ?>
<!--given image end here-->



<!--upload image start here -->


<?php if($opt_value['btt_radio_value']=='upload_image'){?>
<?php
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_bloginfo( 'stylesheet_directory' ) . '/js/uploader.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
wp_enqueue_style('thickbox');

echo "<script type='text/javascript' language='javascript'>
jQuery(document).ready(function() {
    jQuery('.st_upload_button').live('click',function() {
         targetfield = jQuery(this).prev('.upload-url');
         tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
         return false;
    });
	 window.send_to_editor = function(html) {
         imgurl = jQuery('img',html).attr('src');
         jQuery(targetfield).val(imgurl);
         tb_remove();
    }
});
</script>";
?>
<?php
$opt_name=array("btt_upload_image_name"=>"btt_upload_image_name");
$opt_value=array("btt_upload_image_value"=>get_option($opt_name['btt_upload_image_name']));
if(isset($_POST['btt_upload_image_button'])){
	$opt_value=array("btt_upload_image_value"=>$_POST[$opt_name['btt_upload_image_name']]);
	update_option($opt_name['btt_upload_image_name'],$opt_value['btt_upload_image_value']);
	?>
    <div id="message" class="updated fade">
				<p><strong>
						<?php _e('Image Has Been Uploaded. :)'); ?>
					</strong></p>
			</div>
    <?php
	}

?>

<div class="wrap" id="given_image">
<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
<table cellpadding="2" cellspacing="2" border="1" class="wp-list-table widefat">
<tr><th colspan="2"><label for="">Upload Your Back To Top Image:</label></th></tr>
<tr><th ><input  id="image" class="upload-url" name="<?php echo $opt_name['btt_upload_image_name']; ?>" type="text" value="<?php echo $opt_value['btt_upload_image_value']; ?>" /><input class="st_upload_button new_wp" type="button" name="upload_button" value="Upload" /></th><th><img src="<?php echo $opt_value['btt_upload_image_value']; ?>" width="48px" height="48px" /></th></tr>
</table>
<p class="submit">
           <input type="submit" name="btt_upload_image_button" id="submit" class="button button-primary" value="<?php _e("Upload Back To Top Image");?>">
           </p>
</form>
                

</div>
<?php } ?>
<!--upload image end here -->


<!--Submit Text start here -->





<?php if($opt_value['btt_radio_value']=='submit_text'){?>


<?php
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'wp-color-picker-script', plugins_url('script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
?>
<script>
jQuery(document).ready(function($){
    $('.wp-color-picker-field').wpColorPicker();
});
</script>

<?php
$opt_name=array("btt_given_text_name"=>"btt_given_text_name","btt_given_text_background_name"=>"btt_given_text_background_name","btt_given_text_foreground_name"=>"btt_given_text_foreground_name");
$opt_value=array("btt_given_text_name_value"=>get_option($opt_name['btt_given_text_name']),"btt_given_text_background_name_value"=>get_option($opt_name['btt_given_text_background_name']),"btt_given_text_foreground_name_value"=>get_option($opt_name['btt_given_text_foreground_name']));

if(isset($_POST['btt_given_text_submit'])){
	$opt_value=array("btt_given_text_name_value"=>$_POST[$opt_name['btt_given_text_name']],"btt_given_text_background_name_value"=>$_POST[$opt_name['btt_given_text_background_name']],"btt_given_text_foreground_name_value"=>$_POST[$opt_name['btt_given_text_foreground_name']]);
	update_option($opt_name['btt_given_text_name'],$opt_value['btt_given_text_name_value']);
	update_option($opt_name['btt_given_text_background_name'],$opt_value['btt_given_text_background_name_value']);
	update_option($opt_name['btt_given_text_foreground_name'],$opt_value['btt_given_text_foreground_name_value']);
	?>
    <div id="message" class="updated fade">
				<p><strong>
						<?php _e('Text Has Been Added. :)'); ?>
					</strong></p>
			</div>
    <?php
	}

?>
<div class="wrap">
<form name="myform" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
           <p>
           
           <table cellpadding="2" cellspacing="2" border="1" class="wp-list-table widefat">
           <tr><th colspan="2"><label for="">Create Back To Top Using Your Own Text:</label></th></tr>
                <tr><td>Enter A Text:</td><td><input type="text" name="<?php echo $opt_name['btt_given_text_name'];?>" value="<?php if($opt_value['btt_given_text_name_value']!=""){ echo $opt_value['btt_given_text_name_value']; }else{ echo "Back To Top"; }?>" required  /></td></tr>
                  <tr><td>Enter A BackGround Color:</td><td><input name="<?php echo $opt_name['btt_given_text_background_name'];?>" type="text" value="<?php if($opt_value['btt_given_text_background_name_value']!=""){echo $opt_value['btt_given_text_background_name_value'];}else{ echo "#000000";}?>" class="wp-color-picker-field" data-default-color="#000000" /></td></tr>
                <tr><td>Enter A Foreground Color:</td><td><input type="text" name="<?php echo $opt_name['btt_given_text_foreground_name'];?>" value="<?php if($opt_value['btt_given_text_foreground_name_value']!=""){echo $opt_value['btt_given_text_foreground_name_value'];}else{ echo "#FFFFFF";} ?>" class="wp-color-picker-field" data-default-color="#FFFFFF" /></td></tr>
           
           
            </table>
            
           </p>
           
           
           
           <p class="submit">
           <input type="submit" name="btt_given_text_submit" id="submit" class="button button-primary" value="<?php _e("Save Changes");?>">
           </p>
           
           </form>

</div>
<?php } ?>
<!--submit text end here-->