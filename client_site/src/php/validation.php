<?php
function validateTextLength($text, $min, $max) {
    $length = strlen(trim($text));
    return ($length >= $min && $length <= $max);
}

function validateNumberRange($number, $min, $max) {
    if (!is_numeric($number)) {
        return false;
    }
    return ($number >= $min && $number <= $max);
}

function validateOption($option, $validOptions) {
    return in_array($option, $validOptions);
}
// Initialize form data
$formData = [
    'name' => '',
    'phone' => '',
    'email' => '',
    'contact-method' => ''
];

// Initialize errors
$errors = [
    'name' => '',
    'phone' => '',
    'email' => '',
    'contact-method' => ''
];

$message = '';

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $formData['name'] = $_POST['name'] ?? '';
    $formData['phone'] = $_POST['phone'] ?? '';
    $formData['email'] = $_POST['email'] ?? '';
    $formData['contact-method'] = $_POST['contact-method'] ?? '';
    
    // Validate name
    if (!validateTextLength($formData['name'], 2, 50)) {
        $errors['name'] = 'Name must be between 2-50 characters.';
    }
    
    // Validate phone
    if (!preg_match('/^\d{10}$/', preg_replace('/[^0-9]/', '', $formData['phone']))) {
        $errors['phone'] = 'Enter a valid 10-digit phone number.';
    }
    
    // Validate email if provided
    if (!empty($formData['email']) && !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email.';
    }
    
    // Validate contact method
    $validMethods = ['email', 'phone'];
    if (!validateOption($formData['contact-method'], $validMethods)) {
        $errors['contact-method'] = 'Select a valid contact method.';
    }
    
    // If email selected but not provided
    if ($formData['contact-method'] == 'email' && empty($formData['email'])) {
        $errors['email'] = 'Email required when email contact is selected.';
    }
    
    // Check if any errors
    $errorString = implode('', $errors);
    if (!empty($errorString)) {
        $message = 'Please fix the errors below.';
    } else {
        $message = 'Form submitted successfully!';
        // Process form data here
    }
}

?>