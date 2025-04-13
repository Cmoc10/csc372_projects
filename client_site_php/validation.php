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

$formSubmitted = false;
$hasErrors = false;
$success = false;

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formSubmitted = true;
    
    // Get form data
    $formData['name'] = $_POST['name'] ?? '';
    $formData['phone'] = $_POST['phone'] ?? '';
    $formData['email'] = $_POST['email'] ?? '';
    $formData['contact-method'] = $_POST['contact-method'] ?? '';
   
    // Validate name
    if (!validateTextLength($formData['name'], 2, 50)) {
        $errors['name'] = 'Name must be between 2-50 characters.';
        $hasErrors = true;
    }
   
    // Validate phone
    if (!preg_match('/^\d{10}$/', preg_replace('/[^0-9]/', '', $formData['phone']))) {
        $errors['phone'] = 'Enter a valid 10-digit phone number.';
        $hasErrors = true;
    }
   
    // Validate email if provided
    if (!empty($formData['email']) && !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email.';
        $hasErrors = true;
    }
   
    // Validate contact method
    $validMethods = ['email', 'phone'];
    if (!validateOption($formData['contact-method'], $validMethods)) {
        $errors['contact-method'] = 'Select a valid contact method.';
        $hasErrors = true;
    }
   
    // If email selected but not provided
    if ($formData['contact-method'] == 'email' && empty($formData['email'])) {
        $errors['email'] = 'Email required when email contact is selected.';
        $hasErrors = true;
    }
    
    // If form has no errors, process the submission
    if (!$hasErrors) {
        $success = true;
        if ($success) {
            $formData = [
                'name' => '',
                'phone' => '',
                'email' => '',
                'contact-method' => ''
            ];
            setcookie('formData', json_encode($formData), time() + (86400 * 30), "/");
        }
    }
}
?>