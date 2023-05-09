<?php
    require_once "Product.php";

    class CDCabinet extends Product {
        protected $capacity;
        protected $model;

        function __construct() {
        }

        public function setCapacity($capacity) {
            $this->capacity = $capacity;
        }

        public function getCapacity() {
            return $this->capacity;
        }
        
        public function setModel($model) {
            $this->model = $model;
        }

        public function getModel() {
            return $this->model;
        }

        public function getNameCDCabinet() {
            return parent::getName();
        }

        public function getPriceCDCabinet() {
            return parent::getPrice() + (0.15 * parent::getPrice());
        }

        public function getDiscountCDCabinet() {
            //nothing to do
            return parent::getDiscount();
        }
    }
?>