<?php

    class Encryption {

        public static function encrypt($input_data) {
            $encryption_key = base64_decode(ENCRYPTION_KEY);
            $initialization_vector = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
            $encrypted_data = openssl_encrypt($input_data, 'aes-256-cbc', $encryption_key, 0, $initialization_vector);
            return base64_encode($encrypted_data . '::' . $initialization_vector);
        }

        public static function decrypt($input_data) {
            $encryption_key = base64_decode(ENCRYPTION_KEY);
            list($encrypted_data, $initialization_vector) = array_pad(explode("::", base64_decode($input_data), 2), 2, null);
            $decrypted_text = openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $initialization_vector);
            return ($decrypted_text) ? $decrypted_text : $input_data;
        }

    }

?>
