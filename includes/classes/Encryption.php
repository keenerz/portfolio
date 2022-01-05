<?php

    class Encryption {

        public static function encrypt($data, $key) {
            $encryption_key = base64_decode($key);
            $initialization_vector = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
            $encrypted_data = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $initialization_vector);
            return base64_encode($encrypted_data . '::' . $initialization_vector);
        }

        public static function decrypt($data, $key) {
            $encryption_key = base64_decode($key);
            list($encrypted_data, $initialization_vector) = array_pad(explode("::", base64_decode($data), 2), 2, null);
            return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $initialization_vector);
        }

    }

?>