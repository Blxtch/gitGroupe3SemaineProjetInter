<?php
$ldap_connection = ldap_connect("delivisim.lan");
$username = "julien.magnier@delivisim.lan"; 
$password = "Test123*";
$ldaprdn = 'PROJET' . "\\" . $username;
echo $ldaprdn;
echo $password;
ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0);
$bind = ldap_bind($ldap_connection, $ldaprdn, $password);
if ($bind) {
    $filter="(sAMAccountName=$username)";
    $result = ldap_search($ldap_connection,"dc=projet,dc=lan",$filter);
    $info = ldap_get_entries($ldap_connection, $result);
    for ($i=0; $i<$info["count"]; $i++)
    {
        if($info['count'] > 1)
            break;
        echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[0]["dn"] .")</p>\n";
        echo '<pre>';
        
        echo '</pre>';
        $recup_dn = $info[$i]["distinguishedname"][0];
        
        $recup_dn = explode(",",$recup_dn);
        
        $recup_dn = explode("=",$recup_dn[1]);
        $UO=$recup_dn[1];
        echo $UO;
        $userDn = $info[$i]["distinguishedname"][0]; 
    }
    @ldap_close($ldap_connection);
} else {
    $msg = "Invalid email address / password";
    echo $msg;
}
?>


