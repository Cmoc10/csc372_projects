<?php
/**
 * Fetch all E-board members from the database with contact information
 * 
 * @param PDO $pdo PDO database connection
 * @return array Array of E-board members with contact info
 */
function fetchEboardMembers($pdo) {
    // Modified SQL to join with contact_information
    $sql = "SELECT em.*, ci.email, ci.phone 
            FROM eboard_members em
            LEFT JOIN contact_information ci ON em.id = ci.position_id
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
 * Generate HTML for E-board members grid
 * 
 * @param array $members Array of E-board members from database
 * @return string HTML for E-board grid
 */
function generateEboardGrid($members) {
    $html = '<div class="eboard-grid">';
    
    foreach ($members as $member) {
        $html .= '<div class="eboard-member">';
        $html .= '<img src="' . htmlspecialchars($member['photo_path']) . '" alt="' . htmlspecialchars($member['position_name']) . '" class="eboard-photo">';
        $html .= '<p>' . htmlspecialchars($member['full_name']) . ' - ' . htmlspecialchars($member['position_name']) . '</p>';
        $html .= '<p class="eboard_description">' . htmlspecialchars($member['description']) . '</p>';
        
        // Add email if available
        if (!empty($member['email'])) {
            $html .= '<p class="eboard_email"><a href="mailto:' . htmlspecialchars($member['email']) . '">' . 
                    htmlspecialchars($member['email']) . '</a></p>';
        }
        
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}