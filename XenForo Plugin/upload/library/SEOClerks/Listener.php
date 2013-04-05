<?php
	/*
	 * Starting point of the plugin, 
	 * this class listens to all the things that can ever happen to a plugin!
	 * Coded By : Aayush Ranaut exclusively for SEOClerks
	 * Email 	: aayush.ranaut@gmail.com or aayushranaut@liquidserve.com
	 * Website 	: http://www.liquidserve.com/
	 */
	class SEOClerks_Listener
	{
		/*
		 * This function create the template and stores it in cache, some XenForo issue!
		 */
		public static function template_create($templateName, array &$params, XenForo_Template_Abstract $template)
		{
			if($templateName == 'message')
			{
				//Preloading the template into the XenForo system
				$template->preloadTemplate('ls_seoclerks_signature');
			}
		}
		
		/*
		 * Checks if the hook is loaded
		 * The hook name is 'ls_seoclerks_sig' so that I don't forget later
		 */
		public static function template_hook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
		{
			if($hookName == "signature")
			{
					static $i = 1;
					//Creates the template ls_seoclerks_signature and gets all the params
					//Just like I wanted it to be
					$ourTemplate = $template->create('ls_seoclerks_signature', $template->getParams());
					
					//Getting the API Link directly from this page, so that we save us some time in coding a separate helper
					//$preciousData = XenForo_Model::create('SEOClerks_Model_SEOClerks')->getData();
					$url = XenForo_Model::create('SEOClerks_Model_SEOClerks')->makeURL();
					//Setting the template params explicitly
					$template->setParam('adLink', $i);
					$template->setParam('url', $url);
					$rendered = $ourTemplate->render();
					
					//Finally set the contents to our rendered data cause dude, we 0WN the hook name ;) 
					$contents .= $rendered;
					$i += 1;
			}
		}
		
		
	}
?>