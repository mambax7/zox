<?php
if( ! defined( 'ZOX_BLOCK_INCLUDED' ) ) {

define( 'ZOX_BLOCK_INCLUDED' , 1 ) ;

function b_zox_first_block_show($options) {
    global $xoopsDB , $xoopsConfig ;
    $mydirname = $options[0] ;

    $block = array();
    $retval='';
    $retval .= '<script type="text/javascript" src="' . XOOPS_URL . '/modules/' . $mydirname . '/jquery-1.3.2.js"></script>'."\n";
    $get_css = file_get_contents(XOOPS_URL . '/modules/' . $mydirname . '/blocks/zox_blocks.css');
    if($get_css){
      $retval .= '<style type="text/css"><!--' . "\n" . $get_css . "\n" . '--></style>'."\n";
    }

    $block['content']=$retval;
    return $block;
}
function b_zox_block_show($options) {
    global $xoopsDB , $xoopsConfig ;

    $mydirname = $options[0] ;
    $zox_block = $options[1] ;

    $block = array();

    $querystring = $_SERVER['QUERY_STRING'];

    $retval = '';
    $retval .= '<div id="' . $mydirname . $zox_block . 'Container">Please wait...</div>';
    $retval .= '<script type="text/javascript">'."\n";
    $retval .= '
             $(function(){
                $("#' . $mydirname . $zox_block .'Container").load("' . XOOPS_URL . '/modules/' . $mydirname . '/jquery_blocks.php?zox_block=' . $zox_block . '&' . $querystring . '  div#' . $mydirname . $zox_block . 'Content"
                                   , null
                                   , function(text, status) {
                                       $("#' . $mydirname . $zox_block .'").show();
                                       if(status == "error"){
                                         alert("status: " + status + "\ntext: " + text); 
                                       }
                                     }
                                  );
              });
               ';
    $retval .= '</script><noscript>Sorry, this block is using JavaScript.</noscript>';

    $block['content']=$retval;
    return $block;
}

}

?>
