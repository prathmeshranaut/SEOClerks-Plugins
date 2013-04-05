<?php
/*
 * SEOClerks Ads 1.0
 * Description : Adds SEOClerks ads in signature
 * Website : http://www.seoclerks.com/
 * Author Name : Aayush Ranaut
 * Author Website: http://liquidserve.com/
*/

if(!defined("IN_MYBB"))
{
    die("You Cannot Access This File Directly");
}

function seoclerks_info()
{
	return array(
        "name"  		=> "SEOClerks Ads",
        "description"	=> "Displays SEOClerks ads in signature",
        "website"       => "http://seoclerks.com/",
        "author"        => "Aayush Ranaut",
        "authorsite"    => "http://liquidserve.com/",
        "version"       => "1.0",
        "guid"          => "*",
        "compatibility" => ""
    );
}
//Called when the plugin is activated
//Have to insert DB in this function and setup the plugin for use by MyBB
function seoclerks_activate()
{
	global $db, $mybb;
	$seoclerks_group = array(
		'gid'    => 'NULL',
        'name'  => 'seoclerks',
        'title'      => 'SEOClerks Ads',
        'description'    => 'Settings For SEOClerks Plugin',
        'disporder'    => "1",
        'isdefault'  => 'no',
	);
	$db->insert_query('settinggroups', $seoclerks_group);
	$gid = $db->insert_id();
	
	//Enable/Disable Plugin
	$seoclerks_settings = array(
        'name'        	=> 'enabled_seoclerks',
        'title'         => 'Do you want to enable SEOClerks Ads',
        'description'   => 'Yes = Enable, No = Disable',
        'optionscode'   => 'yesno',
        'value'        	=> '1',
        'disporder'     => 1,
        'gid'           => intval($gid),
	);
	$db->insert_query('settings', $seoclerks_settings);
	
	//Affiliate Id
	$seoclerks_settings = array(
		'name'			=> 'ls_affiliate_id',
		'title'			=> 'Affiliate ID',
		'description'	=> '[Optional] Your affiliate ID',
		'optionscode'	=> 'text', 
		'value'			=> '', 
		'disporder'		=> '2', 
		'gid'			=> intval($gid)
	);
	$db->insert_query('settings', $seoclerks_settings);
	
	//Search Term
	$seoclerks_settings = array(
		'name'			=> 'ls_search',
		'title'			=> 'Search Term',
		'description'	=> '[Optional] Enter a specific term to search for. Will cause the API to search service titles for this term only ',
		'optionscode'	=> 'text', 
		'value'			=> '', 
		'disporder'		=> '3', 
		'gid'			=> intval($gid)
	);
	$db->insert_query('settings', $seoclerks_settings);
	
	//Seller Username
	$seoclerks_settings = array(
		'name'			=> 'ls_username',
		'title'			=> 'Seller Username',
		'description'	=> '[Optional] Enter a specific seller username, only services by this seller will be selected',
		'optionscode'	=> 'text', 
		'value'			=> '', 
		'disporder'		=> '4', 
		'gid'			=> intval($gid)
	);
	$db->insert_query('settings', $seoclerks_settings);
	
	//Maximum Price
	$seoclerks_settings = array(
		'name'			=> 'ls_price',
		'title'			=> 'Maximum Price',
		'description'	=> '[Optional] The maximum price a service can be listed for, must be a whole number',
		'optionscode'	=> 'text', 
		'value'			=> '', 
		'disporder'		=> '5', 
		'gid'			=> intval($gid)
	);
	$db->insert_query('settings', $seoclerks_settings);
	
	//Category
	$seoclerks_settings = array(
		'name'			=> 'ls_category',
		'title'			=> 'Category',
		'description'	=> 'Select a specific category if you want services from one specific category only',
		'optionscode'	=> 'select
0=Any Category
15=Article Translating
16=Article Writing
66=Audio & Music
18=Blackhat/Bulk Links
47=Blog Comments
50=Link Pyramids
33=Link Wheel
57=Lists
38=SEnuke X
49=Wiki Links
70=XRumer
20=Blogs
59=Body Ads
51=Data Entry
42=Design
19=Forums
36=Forum Posts
31=Signature Links
64=Graphics
17=Link Building
30=Site Link Sales
21=Other
63=Gaming
67=Press Release
29=Programming
35=Proxies
68=Question/Answer
69=Yahoo Answers
62=Reports & Whitepapers
24=Servers
23=Social Networks
39=Facebook Fans/Likes
40=Google +1
55=Instagram
44=Pinterest
56=Reverbnation
48=Social Bookmarks
54=SoundCloud
34=Twitter Followers
53=Youtube
37=Traffic
46=Video
22=Web 2.0
61=Hubpage
60=Squidoo
25=Webhosting
52=Cloud Hosting
27=Dedicated
26=VPS', // Phew, huge list of options :)
		'value'			=> '0', // This will be the value of the selectbox
		'disporder'		=> '6', // The order that the settings are displayed in the group
		'gid'			=> intval($gid)
	);
	$db->insert_query('settings', $seoclerks_settings);
	
	//User Level
	$seoclerks_settings = array(
		'name'			=> 'ls_user_level',
		'title'			=> 'User Level',
		'description'	=> 'Select the minimum User Level a seller must have in order to be selected',
		'optionscode'	=> 'select
1=1
2=2
3=3
4=X
',
		'value'			=> '1', // This will be the value of the selectbox
		'disporder'		=> '7', // The order that the settings are displayed in the group
		'gid'			=> intval($gid)
	);
	$db->insert_query('settings', $seoclerks_settings);
	
	//Guaranteed Only
	$seoclerks_settings = array(
		'name'			=> 'ls_guaranteed',
		'title'			=> 'Guaranteed Only',
		'description'	=> 'Only select services that are guaranteed',
		'optionscode'	=> 'yesno', 
		'value'			=> '0', 
		'disporder'		=> '8', 
		'gid'			=> intval($gid)
	);
	
	$db->insert_query('settings', $seoclerks_settings);
	
	//Subscription Only
	$seoclerks_settings = array(
		'name'			=> 'ls_subscription',
		'title'			=> 'Subscription Only',
		'description'	=> 'Only select services that are subscription services',
		'optionscode'	=> 'yesno', 
		'value'			=> '0', 
		'disporder'		=> '9', 
		'gid'			=> intval($gid)
	);
	
	$db->insert_query('settings', $seoclerks_settings);
	
	//On Sale Only
	$seoclerks_settings = array(
		'name'			=> 'ls_on_sale',
		'title'			=> 'On Sale Only',
		'description'	=> 'Only select services that are currently on sale',
		'optionscode'	=> 'yesno',
		'value'			=> '0', 
		'disporder'		=> '10', 
		'gid'			=> intval($gid)
	);
	
	$db->insert_query('settings', $seoclerks_settings);
	
	//Staff Certified Only
	$seoclerks_settings = array(
		'name'			=> 'ls_staff',
		'title'			=> 'Staff Certified Only',
		'description'	=> 'Only select services that are staff certified',
		'optionscode'	=> 'yesno',
		'value'			=> '0', 
		'disporder'		=> '11', 
		'gid'			=> intval($gid)
	);
	
	$db->insert_query('settings', $seoclerks_settings);
	
	//This will update the settings file
	rebuild_settings();
	
	
	$bb_template = array(
        "title"		=> 'postbit_seoclerks_ad',
        "template"	=> $db->escape_string('<hr size="1" width="25%"  align="left" />
        <div id=\'ad_{$post[\'pid\']}\'></div>
		<script type="application/javascript">
		(function($) {
		var url = \'{$ls_url}\';
		jQuery.noConflict();
		jQuery.get(url, function(data) {
		jQuery(\'#ad_{$post[\'pid\']}\').html(data);
		});	
		})( jQuery );
		</script>'),
        "sid"	    => "-2",
        "version"	=> "*",
        "dateline"	=> TIME_NOW
    );
    $db->insert_query('templates', $bb_template);
    
    require_once MYBB_ROOT."/inc/adminfunctions_templates.php";
    find_replace_templatesets("postbit", "#".preg_quote('{$post[\'signature\']}')."#i",'{$post[\'signature\']}{$post[\'seoclerks_ads\']}');
}
//This function gets called when someone deactivated the plugin, so we are removeng everything we installed!
function seoclerks_deactivate()
{
	global $db, $mybb;
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name IN ('enabled_seoclerks')");
    $db->query("DELETE FROM ".TABLE_PREFIX."settinggroups WHERE name='seoclerks'");
    rebuild_settings();
    require_once MYBB_ROOT."/inc/adminfunctions_templates.php";
    find_replace_templatesets("postbit", "#".preg_quote('{$post[\'seoclerks_ads\']}')."#i", '', 0);
    $db->query("DELETE FROM ".TABLE_PREFIX."templates WHERE title = 'postbit_seoclerks_ad'");    
} 
//Adding a hook
$plugins->add_hook('postbit','ads_in_signature');

//Main function which display ads in the signature
function ads_in_signature(&$post)
{
	global $db, $mybb, $templates, $theme;
	//print_r($post);
	if ($mybb->settings['enabled_seoclerks'] == 1 ){
		//Check if the signature is absent and then insert the ad
		if($post['signature'] == "")
		{	
			$ls_url = $mybb->settings['board_url']."inc/load_data.php?s=". $mybb->settings['ls_search']. "&aff=".$mybb->settings['ls_affiliate_id']."&by=".$mybb->settings['ls_username']."&p=". $mybb->settings['ls_price']."&c=".$mybb->settings['ls_category'] ."&ul=" .$mybb->settings['ls_user_level']. "&g=" .$mybb->settings['ls_guaranteed']."&sub=" .$mybb->settings['ls_subscription']."&os=" .$mybb->settings['ls_on_sale']."&sp=" .$mybb->settings['ls_staff'];
			eval("\$post['seoclerks_ads'] = \"".$templates->get("postbit_seoclerks_ad")."\";");
		}
	}
}

?>