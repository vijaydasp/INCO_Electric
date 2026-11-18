<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="fast2sms" content="zDPCGBoToyi3fHtaTHTwmg3xEooVZuIB">
    <title>Contact Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Edu+AU+VIC+WA+NT+Guides:wght@400..700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            background-color: #d32f2f;
            color: black;
            padding: 10px 15px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .contact-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .delete-account-section {
            margin-top: 30px;
            padding: 20px;
            background-color: #ffe5e5;
            border: 1px solid #d32f2f;
            border-radius: 8px;
        }

        .contact-icon {
            font-size: 1.2rem;
            color: #d32f2f;
            margin-right: 10px;
        }

        .logo {
            width: 100px;
        }

        .btn-danger {
            background-color: #d32f2f;
            border: none;
        }
        .merriweather-bold-italic {
  font-family: "Merriweather", serif;
  font-weight: 700;
  font-style: italic;
}
h2 {
    font-family: 'Merriweather', serif; /* Applying Merriweather font */
    font-weight: 700; /* Bold weight */
    font-style: italic; /* Italic style */
    color: #d32f2f; /* Optional: Text color */
    font-size: 2rem; /* Adjust font size if needed */
}
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header px-5">Delete</div>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Contact Card -->
        <div class="contact-card text-center">
            <!-- Logo and Title -->

            <img src='{{ asset("uploads/ic_launcher.png") }}' alt="Logo" class="logo mb-3">
            <h2 class="text-danger">INDU COMPONENTS</h2>
            <p>Plot No: 20, SIDCO Industrial Park, <br> Muchukunnu, Koyilandi, Kerala - 673307</p>
            <hr>

            <!-- Contact Information -->
            <p>You can keep in touch with us through the below contacts. Our team will reach out to you at the earliest.</p>
            <div class="text-start">
                <p><i class="contact-icon bi bi-telephone"></i>+91 9207193005, +91 9656193005</p>
                <p><i class="contact-icon bi bi-telephone"></i>0496 2690033</p>
                <p><i class="contact-icon bi bi-envelope"></i>inducomponentsinco@gmail.com</p>
            </div>
        </div>

        <!-- Delete Account Section -->
        <div class="delete-account-section text-center mt-4 mb-5">
            <h3 class="text-danger">Want to Delete Your Account?</h3>
            <p>If you would like to delete your account, please send us an email request by clicking the button below.</p>
            <!-- <a href="mailto:inducomponentsinco@gmail.com?subject=Account Deletion Request&body=Please delete my account. My details are as follows:" class="btn btn-danger"> -->
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=inducomponentsinco@gmail.com&su=Account+Deletion+Request&body=Please+delete+my+account.+My+details+are+as+follows:" 
       target="_blank" 
       class="btn btn-danger">
        Send Email via Gmail

            </a>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>