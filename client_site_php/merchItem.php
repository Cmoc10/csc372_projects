<?php
    class MerchItem {
        public $name;
        public $description;
        public $image;
        public $price;
        public $sizes;
        public $details;
        public $quantity_per_size;
        public $reviews;
        
        public function __construct($name, $description, $image, $price, $sizes, $details, $quantity_per_size) {
            $this->name = $name;
            $this->description = $description;
            $this->image = $image;
            $this->price = $price;
            $this->sizes = $sizes;
            $this->details = $details;
            $this->quantity_per_size = $quantity_per_size;
            $this->reviews = [];
        }
        
        public function buy($sizeIndex) {
            if ($this->quantity_per_size[$sizeIndex] > 0) {
                $this->quantity_per_size[$sizeIndex]--;
                return true;
            }
            return false;
        }
        
        public function addReview($rating, $comment) {
            $this->reviews[] = ["rating" => $rating, "comment" => $comment];
            return true;
        }
        
        public function getAverageRating() {
            if (count($this->reviews) == 0) {
                return 0;
            }
            
            $total = 0;
            foreach ($this->reviews as $review) {
                $total += $review["rating"];
            }
            return $total / count($this->reviews);
        }
        
        public function showRatingStars() {
            $rating = $this->getAverageRating();
            $output = "";
            
            for ($i = 1; $i <= $rating; $i++) {
                $output .= "<span class='fa fa-star checked'></span>";
            }
            for ($i = 1; $i <= 5 - $rating; $i++) {
                $output .= "<span class='fa fa-star'></span>";
            }
            
            return $output;
        }
    }
    
    // Initialize merch items
    $rushShirt = new MerchItem(
        "Spring '25 Rush Shirt", 
        "Limited edition rush shirt featuring our chapter's latest design. Soft cotton blend, comfortable fit.", 
        "src/images/rush_s25_shirt.jpg", 
        25.00, 
        ["S", "M", "L", "XL"], 
        "Screen-printed AEPI logo, 100% cotton", 
        [10, 15, 20, 10]
    );
    
    $classicHoodie = new MerchItem(
        "Classic AEPI Hoodie", 
        "Warm and cozy hoodie with embroidered chapter logo. Perfect for chilly nights.", 
        "src/images/hoodie.jpg", 
        45.00, 
        ["S", "M", "L", "XL", "XXL"], 
        "Heavyweight fleece, front pouch pocket", 
        [5, 10, 15, 10, 5]
    );
    
    $baseballCap = new MerchItem(
        "Baseball Cap", 
        "Adjustable baseball cap with our chapter's emblem. Great for sunny days.", 
        "src/images/baseballcap.jpg", 
        20.00, 
        ["One Size Fits All"], 
        "Embroidered logo, cotton twill fabric", 
        [30]
    );
    
    $crewSocks = new MerchItem(
        "Beanie", 
        "Comfortable beanie with subtle AEPI branding. Adds style to any outfit.", 
        "src/images/beanie.jpg", 
        25.00, 
        ["One Size Fits Most"], 
        "Breathable material", 
        [25]
    );
    
    $merchItems = [
        'rush-shirt' => $rushShirt,
        'classic-hoodie' => $classicHoodie,
        'baseball-cap' => $baseballCap,
        'crew-socks' => $crewSocks
    ];
?>