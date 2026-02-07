<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $qualification = htmlspecialchars($_POST['qualification']);
    $course = htmlspecialchars($_POST['course']);
    $trainingMode = htmlspecialchars($_POST['trainingMode']);
    $batchPreference = htmlspecialchars($_POST['batchPreference']);
    $experience = htmlspecialchars($_POST['experience']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email configuration
    $to = "medhainfostarsolutions@gmail.com";
    $subject = "New Enrollment: " . $firstName . " " . $lastName . " - " . $course;
    
    // Email body
    $emailBody = "New Enrollment Request from Medha Infostar Solutions Website\n\n";
    $emailBody .= "Personal Information:\n";
    $emailBody .= "- Name: " . $firstName . " " . $lastName . "\n";
    $emailBody .= "- Email: " . $email . "\n";
    $emailBody .= "- Phone: " . $phone . "\n\n";
    $emailBody .= "Course Details:\n";
    $emailBody .= "- Qualification: " . $qualification . "\n";
    $emailBody .= "- Course Interested: " . $course . "\n";
    $emailBody .= "- Training Mode: " . $trainingMode . "\n";
    $emailBody .= "- Batch Preference: " . $batchPreference . "\n";
    $emailBody .= "- Work Experience: " . ($experience ? $experience : 'Not specified') . "\n\n";
    $emailBody .= "Additional Message:\n";
    $emailBody .= ($message ? $message : 'No additional message') . "\n\n";
    $emailBody .= "---\n";
    $emailBody .= "This form was submitted from the Medha Infostar Solutions website.\n";
    $emailBody .= "Date: " . date('Y-m-d H:i:s');
    
    // Email headers
    $headers = "From: noreply@medhainfostar.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Send email
    if (mail($to, $subject, $emailBody, $headers)) {
        // Redirect to success page
        header("Location: index.html?success=1");
        exit();
    } else {
        // Redirect to error page
        header("Location: index.html?error=1");
        exit();
    }
} else {
    // If accessed directly, redirect to home page
    header("Location: index.html");
    exit();
}
?>
