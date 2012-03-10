<?php 

echo js('swfobject/swfobject.js','piecemaker');

echo '
<script type="text/javascript">
  var flashvars = {};
  flashvars.cssSource = "'.css_path('piecemaker.css','piecemaker').'"
  flashvars.xmlSource = "'.site_url().'/piecemaker/get_images/'.$id_object.'";
	
  var params = {};
  params.play = "true";
  params.menu = "false";
  params.scale = "showall";
  params.wmode = "transparent";
  params.allowfullscreen = "true";
  params.allowscriptaccess = "always";
  params.allownetworking = "all";
  
  swfobject.embedSWF("'.js_path("piecemaker.swf","piecemaker").'", "piecemaker_'.$id_object.'", "960", "450", "10", null, flashvars, params, null);

</script> ';

echo '	
<div id="piecemaker-container">
    <div id="piecemaker_'.$id_object.'">
      <p>Put your alternative Non Flash content here.</p>
    </div>
  </div>
';	
		
?>		
	