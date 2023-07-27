<?php  
    class Hotel{
        public $id;
        public $name;
        public $address;
        public $phone;
        public $email;
        public $description;
        public $image;
        public $rating;
        public $price;
        public $location;
        public $amenities;
        public $rooms;

        public function __construct($id, $name, $address, $phone, $email, $description, $image, $rating, $price, $location, $amenities, $rooms){
            $this->id = $id;
            $this->name = $name;
            $this->address = $address;
            $this->phone = $phone;
            $this->email = $email;
            $this->description = $description;
            $this->image = $image;
            $this->rating = $rating;
            $this->price = $price;
            $this->location = $location;
            $this->amenities = $amenities;
            $this->rooms = $rooms;
        }
    }
?>