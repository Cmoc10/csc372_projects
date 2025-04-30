<?php
// Initialize variables
$formSubmitted = false;
$hasErrors = false;
$success = false;
$errors = [];
$formData = [
    'name' => '',
    'phone' => '',
    'email' => '',
    'contact-method' => 'phone'
];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formSubmitted = true;
    
    // Get form data
    $formData['name'] = $_POST['name'] ?? '';
    $formData['phone'] = $_POST['phone'] ?? '';
    $formData['email'] = $_POST['email'] ?? '';
    $formData['contact-method'] = $_POST['contact-method'] ?? '';
    
    // Validate name
    if (empty($formData['name'])) {
        $errors['name'] = 'Name is required';
        $hasErrors = true;
    }
    
    // Validate phone
    if (empty($formData['phone'])) {
        $errors['phone'] = 'Phone number is required';
        $hasErrors = true;
    } elseif (!preg_match('/^[0-9]{10}$/', preg_replace('/[^0-9]/', '', $formData['phone']))) {
        $errors['phone'] = 'Please enter a valid phone number';
        $hasErrors = true;
    }
    
    // Validate email if provided or if email is selected as contact method
    if (!empty($formData['email']) && !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
        $hasErrors = true;
    } elseif ($formData['contact-method'] === 'email' && empty($formData['email'])) {
        $errors['email'] = 'Email is required if email is your preferred contact method';
        $hasErrors = true;
    }
    
    // Validate contact method
    if (empty($formData['contact-method'])) {
        $errors['contact-method'] = 'Please select a preferred contact method';
        $hasErrors = true;
    }
    
    // If no errors, process the form
    if (!$hasErrors) {
        // Process form data (e.g., send email, save to database, etc.)
        $success = true;
        
        // Return form success message for AJAX request
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            echo '<p style="color: green; font-weight: bold;">Thank you for your submission! We\'ll contact you soon via your preferred method.</p>';
            exit;
        }
    } else if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        // Return form with errors for AJAX request
        include 'form_template.php';
        exit;
    }
}

// Only include this if it's not an AJAX request
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    // This code is included in the main page
}
?>