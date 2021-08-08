<?php
    function encrypt ($plainText, $cryptKey = '7R7zX2Urc7qvjhkr') {
        $length   = 8;
        $cstrong  = true;
        $cipher   = 'aes-128-cbc';

        if (in_array($cipher, openssl_get_cipher_methods()))
        {
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt(
            $plainText, $cipher, $cryptKey, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $cryptKey, $as_binary=true);
        $encodedText = base64_encode( $iv.$hmac.$ciphertext_raw );
        }
        return $encodedText;
    }
    function decrypt ($encodedText, $cryptKey = '7R7zX2Urc7qvjhkr') {

        $c = base64_decode($encodedText);
        $cipher   = 'aes-128-cbc';

        if (in_array($cipher, openssl_get_cipher_methods()))
        {
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ivlenSha2len = $ivlen+$sha2len;
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $plainText = openssl_decrypt(
            $ciphertext_raw, $cipher, $cryptKey, $options=OPENSSL_RAW_DATA, $iv);
        }
        return $plainText;
    }  
?>