<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEPI Merch</title>
    <style> @import './src/CSS/stylesheet.css';</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php include 'merchItem.php'; ?>
    
    <?php
    // Handle buy action
    if (isset($_POST['action']) && $_POST['action'] == 'buy') {
        $itemId = $_POST['item_id'];
        $sizeIndex = $_POST['size_index'];
        if ($merchItems[$itemId]->buy($sizeIndex)) {
            echo "<script>alert('Purchase successful!');</script>";
        } else {
            echo "<script>alert('Item out of stock!');</script>";
        }
    }
    
    // Handle review action
    if (isset($_POST['action']) && $_POST['action'] == 'review') {
        $itemId = $_POST['item_id'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];
        $merchItems[$itemId]->addReview($rating, $comment);
        echo "<script>alert('Review submitted!');</script>";
    }
    ?>
    
    <div class="header">
        <img src="src/images/Logo.png" alt="AEPI Logo" width="20%" height="15%" id="logo">
        <nav class="navbar">
            <a href="index.html" class="navbar_item">Home</a>
            <a href="About.html" class="navbar_item">About Us</a>
            <a href="Contact.html" class="navbar_item">Contact</a>
            <a href="Merch.php" class="navbar_item">Merch</a>
            <a href="Philanthropy.html" class="navbar_item">Philanthropy</a>
            <a href="Alumni.html" class="navbar_item">Alumni</a>
        </nav>
    </div>
    <div class="content">
        <h1>AEPI Merchandise</h1>
        <div class="main-content">
            <div class="left-column">
                <div class="eboard-grid">
                    <div class="eboard-member merch-item" data-id="rush-shirt">
                        <img src="<?php echo $merchItems['rush-shirt']->image; ?>" alt="<?php echo $merchItems['rush-shirt']->name; ?>">
                        <h3><?php echo $merchItems['rush-shirt']->name; ?></h3>
                        <p>$<?php echo $merchItems['rush-shirt']->price; ?></p>
                        <?php echo $merchItems['rush-shirt']->showRatingStars(); ?>
                    </div>
                    <div class="eboard-member merch-item" data-id="classic-hoodie">
                        <img src="<?php echo $merchItems['classic-hoodie']->image; ?>" alt="<?php echo $merchItems['classic-hoodie']->name; ?>">
                        <h3><?php echo $merchItems['classic-hoodie']->name; ?></h3>
                        <p>$<?php echo $merchItems['classic-hoodie']->price; ?></p>
                        <?php echo $merchItems['classic-hoodie']->showRatingStars(); ?>
                    </div>
                    <div class="eboard-member merch-item" data-id="baseball-cap">
                        <img src="<?php echo $merchItems['baseball-cap']->image; ?>" alt="<?php echo $merchItems['baseball-cap']->name; ?>">
                        <h3><?php echo $merchItems['baseball-cap']->name; ?></h3>
                        <p>$<?php echo $merchItems['baseball-cap']->price; ?></p>
                        <?php echo $merchItems['baseball-cap']->showRatingStars(); ?>
                    </div>
                    <div class="eboard-member merch-item" data-id="crew-socks">
                        <img src="<?php echo $merchItems['crew-socks']->image; ?>" alt="<?php echo $merchItems['crew-socks']->name; ?>">
                        <h3><?php echo $merchItems['crew-socks']->name; ?></h3>
                        <p>$<?php echo $merchItems['crew-socks']->price; ?></p>
                        <?php echo $merchItems['crew-socks']->showRatingStars(); ?>
                    </div>
                </div>
            </div>
            <div class="right-column">
                <div class="merch" id="merch-details">
                    <h2>Select a Merch Item</h2>
                    <p>Click on a merchandise item to see more details.</p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // had to include script here to avoid issues with PHP
    document.addEventListener('DOMContentLoaded', () => {
        // Get all merch items and details container
        const merchItems = document.querySelectorAll('.merch-item');
        const merchDetails = document.getElementById('merch-details');
        
        // PHP data to JavaScript
        const merchData = {
            'rush-shirt': {
                title: "<?php echo addslashes($merchItems['rush-shirt']->name); ?>",
                description: "<?php echo addslashes($merchItems['rush-shirt']->description); ?>",
                image: "<?php echo $merchItems['rush-shirt']->image; ?>",
                price: <?php echo $merchItems['rush-shirt']->price; ?>,
                sizes: <?php echo json_encode($merchItems['rush-shirt']->sizes); ?>,
                details: "<?php echo addslashes($merchItems['rush-shirt']->details); ?>",
                quantity: <?php echo json_encode($merchItems['rush-shirt']->quantity_per_size); ?>
            },
            'classic-hoodie': {
                title: "<?php echo addslashes($merchItems['classic-hoodie']->name); ?>",
                description: "<?php echo addslashes($merchItems['classic-hoodie']->description); ?>",
                image: "<?php echo $merchItems['classic-hoodie']->image; ?>",
                price: <?php echo $merchItems['classic-hoodie']->price; ?>,
                sizes: <?php echo json_encode($merchItems['classic-hoodie']->sizes); ?>,
                details: "<?php echo addslashes($merchItems['classic-hoodie']->details); ?>",
                quantity: <?php echo json_encode($merchItems['classic-hoodie']->quantity_per_size); ?>
            },
            'baseball-cap': {
                title: "<?php echo addslashes($merchItems['baseball-cap']->name); ?>",
                description: "<?php echo addslashes($merchItems['baseball-cap']->description); ?>",
                image: "<?php echo $merchItems['baseball-cap']->image; ?>",
                price: <?php echo $merchItems['baseball-cap']->price; ?>,
                sizes: <?php echo json_encode($merchItems['baseball-cap']->sizes); ?>,
                details: "<?php echo addslashes($merchItems['baseball-cap']->details); ?>",
                quantity: <?php echo json_encode($merchItems['baseball-cap']->quantity_per_size); ?>
            },
            'crew-socks': {
                title: "<?php echo addslashes($merchItems['crew-socks']->name); ?>",
                description: "<?php echo addslashes($merchItems['crew-socks']->description); ?>",
                image: "<?php echo $merchItems['crew-socks']->image; ?>",
                price: <?php echo $merchItems['crew-socks']->price; ?>,
                sizes: <?php echo json_encode($merchItems['crew-socks']->sizes); ?>,
                details: "<?php echo addslashes($merchItems['crew-socks']->details); ?>",
                quantity: <?php echo json_encode($merchItems['crew-socks']->quantity_per_size); ?>
            }
        };
        
        // Add click event listeners to all merch items
        merchItems.forEach(item => {
            item.addEventListener('click', function() {
                // Get the item ID from data attribute
                const itemId = this.getAttribute('data-id');
                
                // Get the item data
                const details = merchData[itemId];
                
                // Create size options for the dropdown
                let sizeOptions = '';
                for (let i = 0; i < details.sizes.length; i++) {
                    sizeOptions += `<option value="${i}">${details.sizes[i]} (${details.quantity[i]} available)</option>`;
                }
                
                // Update the details section
                merchDetails.innerHTML = `
                    <h2>${details.title}</h2>
                    <img src="${details.image}" alt="${details.title}" class="content-img">
                    <p>${details.description}</p>
                    <div class="merch-specs">
                        <p><strong>Price:</strong> $${details.price.toFixed(2)}</p>
                        <p><strong>Details:</strong> ${details.details}</p>
                    </div>
                    
                    <form action="Merch.php" method="post">
                        <input type="hidden" name="action" value="buy">
                        <input type="hidden" name="item_id" value="${itemId}">
                        <div class="form-group">
                            <label for="size_index">Size:</label>
                            <select name="size_index" id="size_index">
                                ${sizeOptions}
                            </select>
                        </div>
                        <button type="submit" id="buy_button">Add to Cart</button>
                    </form>
                    
                    <h3>Leave a Review</h3>
                    <form action="Merch.php" method="post">
                        <input type="hidden" name="action" value="review">
                        <input type="hidden" name="item_id" value="${itemId}">
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <select name="rating" id="rating">
                                <option value="5">5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea name="comment" id="comment" rows="3"></textarea>
                        </div>
                        <button type="submit">Submit Review</button>
                    </form>
                `;
            });
        });
    });
    </script>
  </body>
</html>