<?php
/**
 * Created by PhpStorm.
 * User: karwalkar
 * Date: 5/14/2016
 * Time: 6:02 PM
 */
class Utilities {

    public static function CreateUniqueId($prefix) {
        return uniqid ($prefix,true);
    }
    public static function EncryptPassword($password) {
        $key="quizengine";
        $iv = mcrypt_create_iv(
            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_192, MCRYPT_MODE_CBC),
            MCRYPT_DEV_URANDOM
        );
        return $encrypted = base64_encode(
            $iv .
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_192,
                hash('sha256', $key, true),
                $password,
                MCRYPT_MODE_CBC,
                $iv
            )
        );
    }

    public static function DecryptPassword($EncryptedPassword) {
        $key="quizengine";
        $data = base64_decode($EncryptedPassword);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_192, MCRYPT_MODE_CBC));

        return $decrypted = rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_192,
                hash('sha256', $key, true),
                substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_192, MCRYPT_MODE_CBC)),
                MCRYPT_MODE_CBC,
                $iv
            ),
            "\0"
        );
    }
}


?>