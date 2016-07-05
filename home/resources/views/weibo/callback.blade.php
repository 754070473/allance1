@include( 'weibo.config' )
@include( 'weibo.saetv2' )
<?php
session_start();
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken( 'code', $keys ) ;
	} catch (OAuthException $e) {
	}
}
if ($token) {
    $identifier = $token['uid'];
    $identifier_type = 0;
    echo "<script>window.location.href='bound?identifier=$identifier&identifier_type=$identifier_type'</script>";
} else {
?>
授权失败。
<?php
}
?>
