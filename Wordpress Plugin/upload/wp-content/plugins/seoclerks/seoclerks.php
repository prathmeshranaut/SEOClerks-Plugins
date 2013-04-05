<?php
/*
Plugin name: SEOClerks Ads
Plugin URI: http://seoclerks.com/
Description: A plugin which insert ads in the posts and in the widgets
Author: Aayush Ranaut
Author URI: http://liquidserve.com/
Version: 1.0
*/

/****************
	Global
****************/
$seoclerks_options = get_option('seoclerkssettings');

wp_enqueue_script('jquery');

//Admin Page
function wp_seoclerks_admin_page()
{
	global $seoclerks_options;
	ob_start();?>
	
	<div class="wrap">
		<form action="options.php" method="post">
			<?php settings_fields('seoclerksgroup'); ?>
			<h2>SEOClerks Ads Plugin</h2>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th><label>Affiliate ID</label></th>
						<td><input type="text" id="affiliate_id" name="seoclerkssettings[affiliate_id]>" value="<?php echo $seoclerks_options['affiliate_id']; ?>" class="regular-text" />
						<p class="description">[Optional] Your affiliate ID</p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>Seller Username</label></th>
						<td><input type="text" id="username" name="seoclerkssettings[username]>" value="<?php echo $seoclerks_options['username']; ?>" class="regular-text" />
						<p class="description">[Optional] Enter a specific seller username, only services by this seller will be selected </p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>Search Term</label></th>
						<td><input type="text" id="search" name="seoclerkssettings[search]>" value="<?php echo $seoclerks_options['search']; ?>" class="regular-text" />
						<p class="description">[Optional] Enter a specific term to search for. Will cause the API to search service titles for this term only</p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>Maximum Price</label></th>
						<td><input type="text" id="price" name="seoclerkssettings[price]>" value="<?php echo $seoclerks_options['price']; ?>" class="regular-text" />
						<p class="description">[Optional] The maximum price a service can be listed for, must be a whole number</p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>Category</label></th>
						<td>
						<select id="category" name="seoclerkssettings[category]">
							<option value="0" <?php if($seoclerks_options[category] == 1) { echo "selected=\"selected\"";} ?>>Any Category</option>
							<option value="15" <?php if($seoclerks_options[category] == 15) { echo "selected=\"selected\"";} ?>>Article Translating</option>
							<option value="16" <?php if($seoclerks_options[category] == 16) { echo "selected=\"selected\"";} ?>>Article Writing</option>
							<option value="66" <?php if($seoclerks_options[category] == 66) { echo "selected=\"selected\"";} ?>>Audio &amp; Music</option>
							<option value="18" <?php if($seoclerks_options[category] == 18) { echo "selected=\"selected\"";} ?>>Blackhat/Bulk Links</option>
							<option value="47" <?php if($seoclerks_options[category] == 47) { echo "selected=\"selected\"";} ?>>Blog Comments</option>
							<option value="50" <?php if($seoclerks_options[category] == 50) { echo "selected=\"selected\"";} ?>>Link Pyramids</option>
							<option value="33" <?php if($seoclerks_options[category] == 33) { echo "selected=\"selected\"";} ?>>Link Wheel</option>
							<option value="57" <?php if($seoclerks_options[category] == 57) { echo "selected=\"selected\"";} ?>>Lists</option>
							<option value="38" <?php if($seoclerks_options[category] == 38) { echo "selected=\"selected\"";} ?>>SEnuke X</option>
							<option value="49" <?php if($seoclerks_options[category] == 49) { echo "selected=\"selected\"";} ?>>Wiki Links</option>
							<option value="70" <?php if($seoclerks_options[category] == 70) { echo "selected=\"selected\"";} ?>>XRumer</option>
							<option value="20" <?php if($seoclerks_options[category] == 20) { echo "selected=\"selected\"";} ?>>Blogs</option>
							<option value="59" <?php if($seoclerks_options[category] == 59) { echo "selected=\"selected\"";} ?>>Body Ads</option>
							<option value="51" <?php if($seoclerks_options[category] == 51) { echo "selected=\"selected\"";} ?>>Data Entry</option>
							<option value="42" <?php if($seoclerks_options[category] == 42) { echo "selected=\"selected\"";} ?>>Design</option>
							<option value="19" <?php if($seoclerks_options[category] == 19) { echo "selected=\"selected\"";} ?>>Forums</option>
							<option value="36" <?php if($seoclerks_options[category] == 36) { echo "selected=\"selected\"";} ?>>Forum Posts</option>
							<option value="31" <?php if($seoclerks_options[category] == 31) { echo "selected=\"selected\"";} ?>>Signature Links</option>
							<option value="64" <?php if($seoclerks_options[category] == 64) { echo "selected=\"selected\"";} ?>>Graphics</option>
							<option value="17" <?php if($seoclerks_options[category] == 17) { echo "selected=\"selected\"";} ?>>Link Building</option>
							<option value="30" <?php if($seoclerks_options[category] == 30) { echo "selected=\"selected\"";} ?>>Site Link Sales</option>
							<option value="21" <?php if($seoclerks_options[category] == 21) { echo "selected=\"selected\"";} ?>>Other</option>
							<option value="63" <?php if($seoclerks_options[category] == 63) { echo "selected=\"selected\"";} ?>>Gaming</option>
							<option value="67" <?php if($seoclerks_options[category] == 67) { echo "selected=\"selected\"";} ?>>Press Release</option>
							<option value="29" <?php if($seoclerks_options[category] == 29) { echo "selected=\"selected\"";} ?>>Programming</option>
							<option value="35" <?php if($seoclerks_options[category] == 35) { echo "selected=\"selected\"";} ?>>Proxies</option>
							<option value="68" <?php if($seoclerks_options[category] == 68) { echo "selected=\"selected\"";} ?>>Question/Answer</option>
							<option value="69" <?php if($seoclerks_options[category] == 69) { echo "selected=\"selected\"";} ?>>Yahoo Answers</option>
							<option value="62" <?php if($seoclerks_options[category] == 62) { echo "selected=\"selected\"";} ?>>Reports &amp; Whitepapers</option>
							<option value="24" <?php if($seoclerks_options[category] == 24) { echo "selected=\"selected\"";} ?>>Servers</option>
							<option value="23" <?php if($seoclerks_options[category] == 23) { echo "selected=\"selected\"";} ?>>Social Networks</option>
							<option value="39" <?php if($seoclerks_options[category] == 39) { echo "selected=\"selected\"";} ?>>Facebook Fans/Likes</option>
							<option value="40" <?php if($seoclerks_options[category] == 40) { echo "selected=\"selected\"";} ?>>Google +1</option>
							<option value="55" <?php if($seoclerks_options[category] == 55) { echo "selected=\"selected\"";} ?>>Instagram</option>
							<option value="44" <?php if($seoclerks_options[category] == 44) { echo "selected=\"selected\"";} ?>>Pinterest</option>
							<option value="56" <?php if($seoclerks_options[category] == 56) { echo "selected=\"selected\"";} ?>>Reverbnation</option>
							<option value="48" <?php if($seoclerks_options[category] == 48) { echo "selected=\"selected\"";} ?>>Social Bookmarks</option>
							<option value="54" <?php if($seoclerks_options[category] == 54) { echo "selected=\"selected\"";} ?>>SoundCloud</option>
							<option value="34" <?php if($seoclerks_options[category] == 34) { echo "selected=\"selected\"";} ?>>Twitter Followers</option>
							<option value="53" <?php if($seoclerks_options[category] == 53) { echo "selected=\"selected\"";} ?>>Youtube</option>
							<option value="37" <?php if($seoclerks_options[category] == 37) { echo "selected=\"selected\"";} ?>>Traffic</option>
							<option value="46" <?php if($seoclerks_options[category] == 46) { echo "selected=\"selected\"";} ?>>Video</option>
							<option value="22" <?php if($seoclerks_options[category] == 22) { echo "selected=\"selected\"";} ?>>Web 2.0</option>
							<option value="61" <?php if($seoclerks_options[category] == 61) { echo "selected=\"selected\"";} ?>>Hubpage</option>
							<option value="60" <?php if($seoclerks_options[category] == 60) { echo "selected=\"selected\"";} ?>>Squidoo</option>
							<option value="25" <?php if($seoclerks_options[category] == 25) { echo "selected=\"selected\"";} ?>>Webhosting</option>
							<option value="52" <?php if($seoclerks_options[category] == 52) { echo "selected=\"selected\"";} ?>>Cloud Hosting</option>
							<option value="27" <?php if($seoclerks_options[category] == 27) { echo "selected=\"selected\"";} ?>>Dedicated</option>
							<option value="26" <?php if($seoclerks_options[category] == 26) { echo "selected=\"selected\"";} ?>>VPS</option>
						</select>
						<p class="description">The maximum price a service can be listed for, must be a whole number</p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>User Level</label></th>
						<td>
						<select id="user_level" name="seoclerkssettings[user_level]">
							<option value="1" <?php if($seoclerks_options[user_level] == 1) { echo "selected=\"selected\"";} ?>>1</option>
							<option value="2" <?php if($seoclerks_options[user_level] == 2) { echo "selected=\"selected\"";} ?>>2</option>
							<option value="3" <?php if($seoclerks_options[user_level] == 3) { echo "selected=\"selected\"";} ?>>3</option>
							<option value="4" <?php if($$seoclerks_options[user_level] == 4) { echo "selected=\"selected\"";} ?>>X</option>
						</select>
						<p class="description">Select the minimum User Level a seller must have in order to be selected</p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>Guaranteed Only</label></th>
						<td>
						<select id="dropdown_3" name="seoclerkssettings[guaranteed]">
							<option value="0" <?php if($seoclerks_options[guaranteed] == 0) { echo "selected=\"selected\"";} ?>>No</option>
							<option value="1" <?php if($seoclerks_options[guaranteed] == 1) { echo "selected=\"selected\"";} ?>>Yes</option>
						</select>
						<p class="description">Only select services that are guaranteed</p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>Subscription Only</label></th>
						<td>
						<select id="dropdown_4" name="seoclerkssettings[subscription]">
							<option value="0" <?php if($$seoclerks_options[subscription] == 0) { echo "selected=\"selected\"";} ?>>No</option>
							<option value="1" <?php if($seoclerks_options[subscription] == 1) { echo "selected=\"selected\"";} ?>>Yes</option>
						</select>
						<p class="description">Only select services that are subscription services</p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>On Sale Only</label></th>
						<td>
						<select id="dropdown_5" name="seoclerkssettings[on_sale]">
							<option value="0" <?php if($$seoclerks_options[on_sale] == 0) { echo "selected=\"selected\"";} ?>>No</option>
							<option value="1" <?php if($seoclerks_options[on_sale] == 1) { echo "selected=\"selected\"";} ?>>Yes</option>
						</select>
						<p class="description">Only select services that are currently on sale</p>
						</td>
					</tr>
					<tr valign="top">
						<th><label>Staff Certified Only</label></th>
						<td>
						<select id="dropdown_5" name="seoclerkssettings[staff]">
							<option value="0" <?php if($$seoclerks_options[staff] == 0) { echo "selected=\"selected\"";} ?>>No</option>
							<option value="1" <?php if($seoclerks_options[staff] == 1) { echo "selected=\"selected\"";} ?>>Yes</option>
						</select>
						<p class="description">Only select services that are staff certified</p>
						</td>
					</tr>
				</tbody>
			</table>
			<h2>Ad Location</h2>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th><label>Locations to display the ads</label></th>
						<td><label>Ad Above Post</label><input type="checkbox" id="post_top" name="seoclerkssettings[post_top]>" <?php if($seoclerks_options['post_top']){ echo "checked=\"checked\""; } ?> />
						<br>
						<label>Ad Below Post</label><input type="checkbox" id="post_bottom" name="seoclerkssettings[post_bottom]>" <?php if($seoclerks_options['post_bottom']){ echo "checked=\"checked\""; } ?> /></td>
					</tr>
				</tbody>
			</table>
			<p class="submit"><input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit"></p>
		</form>
	</div>
	<?php
	echo ob_get_clean();
}
//Function to place the ad before the post
function ad_before_post($content)
{
	//Check if the loaded page is single and is not a feed
	if (!is_feed() && is_single())
	{	
		global $seoclerks_options;
		$ad = "<div id='ad_1'></div>
		<script type=\"application/javascript\">
		(function($) {
		var url = '". plugins_url( 'load_data.php', __FILE__ )."?s=". $seoclerks_options['search']."&aff=".$seoclerks_options['affiliate_id']."&by=".$seoclerks_options['username']."&p=". $seoclerks_options['price']."&c=".$seoclerks_options['category'] ."&ul=" .$seoclerks_options['user_level']. "&g=" .$seoclerks_options['guaranteed']."&sub=" .$seoclerks_options['subscription']."&os=" .$seoclerks_options['on_sale']."&sp=" .$seoclerks_options['staff']."';
		jQuery.noConflict();
		jQuery.get(url, function(data) {
		jQuery('#ad_1').html(data);
		});	
		})( jQuery );
		</script>";
		$content = $ad.$content;
		return $content;
	}
}
//Function to place the ad after the post
function ad_after_post($content)
{
	
	//Check if the loaded page is single and is not a feed
	if (!is_feed() && is_single())
	{
		global $seoclerks_options;
		//Script and div
		$ad = "<div id='ad_3'></div>
		<script type=\"application/javascript\">
		(function($) {
		var url = '". plugins_url( 'load_data.php', __FILE__ )."?s=". $seoclerks_options['search']."&aff=".$seoclerks_options['affiliate_id']."&by=".$seoclerks_options['username']."&p=". $seoclerks_options['price']."&c=".$seoclerks_options['category'] ."&ul=" .$seoclerks_options['user_level']. "&g=" .$seoclerks_options['guaranteed']."&sub=" .$seoclerks_options['subscription']."&os=" .$seoclerks_options['on_sale']."&sp=" .$seoclerks_options['staff']."';
		jQuery.noConflict();
		jQuery.get(url, function(data) {
		jQuery('#ad_3').html(data);
		});	
		})( jQuery );
		</script>";
		return $content.$ad;
	}
}

//Generate the ad filters
	function gen_filter()
	{
		global $seoclerks_options;
		if(!empty($seoclerks_options['post_top']))
		{
			add_filter('the_content', 'ad_before_post');
		}
		if(!empty($seoclerks_options['post_bottom']))
		{
			add_filter('the_content', 'ad_after_post');
		}
	}

//Admin Tab
function seoclerks_tab()
{
	add_options_page('SEOClerks Settings', 'SEOClerks', 'manage_options', 'seoclerks', 'wp_seoclerks_admin_page');
}

add_action('admin_menu', 'seoclerks_tab');

//Register Settings

function wp_seoclerks_settings()
{
	register_setting('seoclerksgroup','seoclerkssettings');
}
add_action('admin_init', 'wp_seoclerks_settings');

add_action( 'after_setup_theme', 'gen_filter' );

//Registering the widget
add_action( 'widgets_init', 'seoclerks_widget' );


function seoclerks_widget() {
	register_widget( 'SEOClerks_widget' );
}

class SEOClerks_widget extends WP_Widget {

	function SEOClerks_widget() {
		$widget_ops = array( 'classname' => 'seoclerks', 'description' => 'SEOClerks widget to display text ads in sidebar');
		
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'seoclerks-widget' );
		
		$this->WP_Widget( 'seoclerks-widget', 'SEOClerks Ads' , $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$ads_num = apply_filters('widget_title', $instance['ads'] );
		
		echo $before_widget;

		// Display the widget title 
		if ( $title )
		{
			echo $before_title . $title . $after_title;
		}
		
		$seoclerks_options = get_option('seoclerkssettings');
		//Script and div
		for($i = 1; $i <= $ads_num ;$i++)
		{
			$ad = "<div id='ad_widget_".$i."'></div>
			<script type=\"application/javascript\">
			(function($) {
			var url = '". plugins_url( 'load_data.php', __FILE__ )."?s=". $seoclerks_options['search']."&aff=".$seoclerks_options['affiliate_id']."&by=".$seoclerks_options['username']."&p=". $seoclerks_options['price']."&c=".$seoclerks_options['category'] ."&ul=" .$seoclerks_options['user_level']. "&g=" .$seoclerks_options['guaranteed']."&sub=" .$seoclerks_options['subscription']."&os=" .$seoclerks_options['on_sale']."&sp=" .$seoclerks_options['staff']."';
			jQuery.noConflict();
			jQuery.get(url, function(data) {
			jQuery('#ad_widget_".$i."').html(data);
			});	
			})( jQuery );
			</script>";
			echo "<p>". $ad ."</p>";
		}
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ads'] = strip_tags( $new_instance['ads'] );
		return $instance;
	}

	//Generates the form for customization of title in the widget control area
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array(  'title' => 'SEOClerks Ads',
						   	'ads'	=> '1'
						);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title'; ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'ads' ); ?>"><?php echo 'Number of Ads to display'; ?></label>
			<input id="<?php echo $this->get_field_id( 'ads' ); ?>" name="<?php echo $this->get_field_name( 'ads' ); ?>" type="text" size="3" value="<?php echo $instance['ads']; ?>" />
		</p>
	<?php
	}
}

?>