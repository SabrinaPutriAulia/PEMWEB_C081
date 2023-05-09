<?php
    require_once "Product.php";

    class CDMusic extends Product {
        protected $artist;
        protected $genre;

        function __construct() {
        }

        public function setArtist($artist) {
            $this->artist = $artist;
        }

        public function getArtist() {
            return $this->artist;
        }
        
        public function setGenre($genre) {
            $this->genre = $genre;
        }

        public function getGenre() {
            return $this->genre;
        }

        public function getNameCDMusic() {
            return parent::getName();
        }

        public function getPriceCDMusic() {
            return parent::getPrice() + (0.1 * parent::getPrice());
        }

        public function getDiscountCDMusic() {
            return parent::getDiscount() + (0.05 * parent::getDiscount());
        }
    }
?>