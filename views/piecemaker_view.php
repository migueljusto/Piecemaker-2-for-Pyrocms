

<?php 

        

echo '
<script type="text/javascript">
  var flashvars = {};
  flashvars.cssSource = "'.$piecemaker_css_path.'"
  flashvars.xmlSource = "'.site_url().'piecemaker/get_images/'.$id.'";
	
  var params = {};
  params.play = "true";
  params.menu = "false";
  params.scale = "showall";
  params.wmode = "transparent";
  params.allowfullscreen = "true";
  params.allowscriptaccess = "always";
  params.allownetworking = "all";
  
  swfobject.embedSWF("'.$piecemaker_swf_path.'", "piecemaker_'.$id.'", "'.$width.'", "'.$height.'", "10", null, flashvars, params, null);

</script> ';

echo '	
    <div id="piecemaker_'.$id.'">
      <p>Put your alternative Non Flash content here.</p>
    </div>
';	

//<div id="piecemaker-container">
 //</div>		
?>		
	