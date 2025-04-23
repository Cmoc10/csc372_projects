<?php
/**
 * Fetch all Rush Chairs from the database with contact information
 *
 * @param PDO $pdo PDO database connection
 * @return array Array of Rush Chairs with contact info
 */
function fetchRushChairs($pdo) {
    // Modified SQL to join with contact_information and filter by specific IDs
    $sql = "SELECT em.*, ci.email, ci.phone 
            FROM eboard_members em
            LEFT JOIN contact_information ci ON em.id = ci.position_id
            WHERE em.id IN (8, 9)
            ORDER BY em.position_order";
    try {
        $statement = pdo($pdo, $sql);
        return $statement->fetchAll();
    } catch (PDOException $e) {
        // Log error and return empty array
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}

/**
 * Generate HTML for Rush Chairs display
 *
 * @param array $rushChairs Array of Rush Chairs from database
 * @return string HTML for Rush Chairs display
 */
function generateRushChairsDisplay($rushChairs) {
    $html = '';
    
    if (empty($rushChairs)) {
        return '<p>No rush chairs information available at this time.</p>';
    }
    
    foreach ($rushChairs as $chair) {
        $html .= '<div class="rush_chair">';
        $html .= '<img src="' . htmlspecialchars($chair['photo_path']) . '" alt="' . htmlspecialchars($chair['position_name']) . '" width="45%" height="50%">';
        $html .= '<p>' . htmlspecialchars($chair['full_name']) . '</p>';
        
        // Add phone if available
        if (!empty($chair['phone'])) {
            $html .= '<p>Phone: ' . htmlspecialchars($chair['phone']) . '</p>';
        }
        
        // Add email if available
        if (!empty($chair['email'])) {
            $html .= '<p>Email: <a href="mailto:' . htmlspecialchars($chair['email']) . '">' . 
                     htmlspecialchars($chair['email']) . '</a></p>';
        }
        
        $html .= '</div>';
    }
    
    return $html;
}
?>