<?php

$ldapServer = '192.168.110.1'; 
$ldapPort = 389; 
$ldapUser = 'julien.magnier@delivisim.lan'; 
$ldapPassword = 'Test123*'; 


$ldapConn = ldap_connect($ldapServer, $ldapPort) or die("Error");

if ($ldapConn) {
  
    ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);

   
    $bind = ldap_bind($ldapConn, $ldapUser, $ldapPassword);

    if ($bind) {
        echo 'YOUHOUUUUUUUU';
        ldap_close($ldapConn);
    } else {
      
        echo 'Échec de l\'authentification LDAP';
    }
} else {
    echo 'Échec de la connexion LDAP';
}




