<?php 
Asset::js('piecemaker::swfobject/swfobject.js');       
echo Asset::render_js();


echo '
<script type="text/javascript">
  var flashvars = {};
  flashvars.cssSource = "{{ asset:css_url file="piecemaker::piecemaker.css" }}"
  flashvars.xmlSource = "'.site_url().'piecemaker/get_images/'.$id.'";
	
  var params = {};
  params.play = "true";
  params.menu = "false";
  params.scale = "showall";
  params.wmode = "transparent";
  params.allowfullscreen = "true";
  params.allowscriptaccess = "always";
  params.allownetworking = "all";
  
  swfobject.embedSWF("{{ asset:js_url file="piecemaker::piecemaker.swf" }}", "piecemaker_'.$id.'", "'.$width.'", "'.$height.'", "10", null, flashvars, params, null);

</script> ';

echo '	
    <div id="piecemaker_'.$id.'">
      <p>Put your alternative Non Flash content here.</p>
    </div>
';	

//<div id="piecemaker-container">
 //</div>		
?>		
	