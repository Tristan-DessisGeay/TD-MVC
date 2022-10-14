<?php
    class Security {

        private static $seed = 'DhuRXYdEkJ';

        static public function getSeed() {
            return self::$seed;
        }
        
        public static function chiffrer($texte_en_clair) {
            $texte_chiffre = hash('sha256', self::$seed.$texte_en_clair);
            return $texte_chiffre;
        }

        function generateRandomHex() {
            $numbytes = 16;
            $bytes = openssl_random_pseudo_bytes($numbytes);
            $hex = bin2hex($bytes);
            return $hex;
        }
        
    }
?>