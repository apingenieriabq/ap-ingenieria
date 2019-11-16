<?php

class Encriptacion {

    public static function encriptar( $llave, $frase, $cipher="aes256" ) {
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($frase, $cipher, $llave, $options=OPENSSL_RAW_DATA, $iv);
        return ( base64_encode( $iv.$ciphertext_raw ) );
    }

    public static function desencriptar(  $llave, $encriptacion, $cipher="aes256" ) {
        $c = base64_decode(  ( $encriptacion ) );
        $ivlen = openssl_cipher_iv_length( $cipher );
        $iv = substr($c, 0, $ivlen);
        $ciphertext_raw = substr($c, $ivlen);
        return $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $llave, $options=OPENSSL_RAW_DATA, $iv);
    }

    public static function hash($clave, $algoritmo = 'sha512') {
        return hash($algoritmo, $clave);
    }

    public static function hashConLLave($clave, $Llave, $algoritmo = 'sha512') {
        return hash($algoritmo, $Llave . $clave);
    }

    public static function verificarHash($clave, $hash) {
        return ($hash == self::hash($clave));
    }

}