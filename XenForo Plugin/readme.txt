=================================================
Installation Instruction
=================================================

Step 1. Copy the contents of the upload directory to the root of your XenForo installation.
Step 2. Go the Admin Control Panel and click Install Add-on
Step 3. Upload the addon-SEOClerks.xml file
Step 4. Next, go to Appearance->Templates
Step 5. Edit the 'message' Template
Step 6. Look for


"<xen:if is="{$visitor.content_show_signature} && {$message.signature}">
			<div class="baseHtml signature ugc{xen:if $message.isIgnored, ' ignored'}"><aside>{xen:raw $message.signatureHtml}</aside></div>
</xen:if>"

in the template and replace with 

"<xen:if is="{$visitor.content_show_signature} && {$message.signature}">
			<div class="baseHtml signature ugc{xen:if $message.isIgnored, ' ignored'}"><aside>{xen:raw $message.signatureHtml}</aside></div>
	<xen:else />
<xen:hook name="signature" />	
</xen:if>"


(Copy the content within the quotes)

Now, the plugin will display the ads in place of empty signatures.

=================================================
Options
=================================================

Step 1. Go the Admin Control Panel
Step 2. Navigate to Options->SEOClerks API Settings
Step 3. Fill in your details

Found a bug? Email me on aayush.ranaut@gmail.com