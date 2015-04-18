<?php
$opt_name=array("btt_effect"=>"btt_effect","btt_css"=>"btt_css","btt_hover_css"=>"btt_hover_css");
$opt_value=array("btt_effect_value"=>get_option($opt_name['btt_effect']),"btt_css_value"=>get_option($opt_name['btt_css']),"btt_hover_css_value"=>get_option($opt_name['btt_hover_css']));
if(isset($_POST['btt_setting_submit'])){
	$opt_value=array("btt_effect_value"=>$_POST[$opt_name['btt_effect']],"btt_css_value"=>$_POST[$opt_name['btt_css']],"btt_hover_css_value"=>$_POST[$opt_name['btt_hover_css']]);
	update_option($opt_name['btt_effect'],$opt_value['btt_effect_value']);
	update_option($opt_name['btt_css'],$opt_value['btt_css_value']);
		update_option($opt_name['btt_hover_css'],$opt_value['btt_hover_css_value']);
	?>
     <div id="message" class="updated fade">
				<p><strong>
						<?php _e('Settings Saved. :)'); ?>
					</strong></p>
			</div>
    <?php
}
	?>
<div class="wrap">
			<h2><?php _e('Back To Top Settings');?></h2>
            <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
 
    <table class="wp-list-table widefat plugins" cellspacing="2">
    <tr ><th colspan="2" class="manage-column column-cbd">Choose An Effect: </th></tr>
    <tr><th colspan="2">
    <select name="<?php echo $opt_name['btt_effect'];?>">
    <option value="fade" <?php if($opt_value['btt_effect_value']=='fade'){
		echo "selected='selected'";}?>>FadeIn/FadeOut</option>
    <option value="slide" <?php if($opt_value['btt_effect_value']=='slide'){
		echo "selected='selected'";}?>>SlideDown/SlideUp</option>
    <option value="hide" <?php if($opt_value['btt_effect_value']=='hide'){
		echo "selected='selected'";}?>>Hide/Show</option>
    </select>
    </th></tr>
    <tr ><th  class="manage-column column-cbd">Edit Css: </th><th colspan="2" class="manage-column column-cbd">Edit Hover Css: </th></tr>
    <tr><th>
    <textarea rows="8" cols="30" name="<?php echo $opt_name['btt_css'];?>">
	<?php  if($opt_value['btt_css_value']!=""){
		echo $opt_value['btt_css_value'];
	}
		else{	
echo 
"position:fixed;
bottom:4px;
right:10px;
cursor:pointer;
opacity:0.8;
z-index:99999";
		} ?></textarea>
        </th><th>
    <textarea rows="8" cols="30" name="<?php echo $opt_name['btt_hover_css'];?>"><?php  if($opt_value['btt_hover_css_value']!=""){
		echo $opt_value['btt_hover_css_value'];
	}
		else{			
echo 
"position:fixed;
bottom:4px;
right:10px;
cursor:pointer;
opacity:1.0;
z-index:99999";
		} ?></textarea>
        </th></tr>
    </table>
    
    <p class="submit">
    <input id="submit" class="button button-primary" type="submit" value="Save Settings" name="btt_setting_submit">
    </p>
    
</form>


</div>            