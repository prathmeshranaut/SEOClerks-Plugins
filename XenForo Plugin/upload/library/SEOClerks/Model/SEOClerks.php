<?php
/*
 * Super awesome SEOCLerks Plugins Model which handles all the data it is passed to it and returns stuff to controller or helper. But going to return none of them this time
 * cause it's time to listen to the Listener! 
 */
	class SEOClerks_Model_SEOClerks extends XenForo_Model
	{
		/*
		 * This function generates the url and returns back the formedd URL
		 */
		
		public function makeURL()
		{
			/*
			 * Get the options from the AdminCP
			 * This option_id I can use here are
			 * affiliate_id
			 * seller_username
			 * search_term
			 * user_level
			 * category
			 * guaranteed_only
			 * subscription_only
			 * on_sale_only
			 * staff_certified_only
			 * max_price
			 */
			
			$options = XenForo_Application::get('options');
			
			$url = "http://localhost:8888/unserilaize.php?";
			
			// Appending the Seller username to the main url
			$url .= "by=". $options->seller_username;
			
			// Appending the Affiliate ID to the main url
			// Tempted to check if the option is set to 0 and if it then replace it with my user_id ;)
			// But I guess this will have to wait till the next update ;) 
			$url .= "&aff=". $options->affiliate_id;
			
			// Appending the Search Term to the main url
			$url .= "&s=". $options->search_term;
			
			// Appending the Max Price to the main url
			$url .= "&p=". $options->max_price;
			
			// Appending the Category ID to the main url
			$url .= "&c=". $options->category;
			
			// Appending the User Level to the main url
			$url .= "&ul=". $options->user_level;
			
			// Appending the Amount to the main url
			$url .= "&am=1";
			
			// Appending the guarenteed only selection to the main url
			$url .= "&g=". $options->guaranteed_only;
			
			// Appending the Subscription Only selection to the main url
			$url .= "&sub=". $options->subscription_only;
			
			// Appending the On Sale Only selection to the main url
			$url .= "&os=". $options->on_sale_only;
			
			// Appending the On Staff Certified selection to the main url
			$url .= "&sp=". $options->staff_certified_only;
			
			// Appending the custom data that I need to handle
			$url .= "&oby=&oh=&f=serialized";
			
			return $url;
		}
		
	}
?>