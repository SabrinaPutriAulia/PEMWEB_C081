<?php
    class Product {
        protected static $name;
        protected static $price;
        protected static $discount;

        function __construct() {
        }

        public function setPrice($price) {
            self::$price = $price;
        }
        
        public function getPrice() {
            return self::$price;
        }
        
        public function setName($name) {
            self::$name = $name;
        }
        
        public function getName() {
            return self::$name;
        }

        public function setDiscount($discount) {
            self::$discount = $discount;
        }

        public function getDiscount() {
            return self::$discount;
        }
    }
?>