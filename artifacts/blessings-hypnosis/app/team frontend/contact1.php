<?php
// ─── DB Connection ────────────────────────────────────────────────────────────
$conn = new mysqli("localhost", "root", "", "astropradeepkumar");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ─── OTP Config ───────────────────────────────────────────────────────────────
// Using Fast2SMS free tier (replace with your API key)
define('FAST2SMS_API_KEY', 'YOUR_FAST2SMS_API_KEY');

// ─── Email Config ─────────────────────────────────────────────────────────────
// Uses PHPMailer or PHP mail(). Fill in your SMTP details.
define('SMTP_HOST',     'smtp.gmail.com');
define('SMTP_USER',     'careastropradeepkumar@gmail.com');
define('SMTP_PASS',     'YOUR_APP_PASSWORD');   // Gmail App Password
define('SMTP_PORT',     587);
define('ADMIN_EMAIL',   'careastropradeepkumar@gmail.com');

// ─── Helpers ──────────────────────────────────────────────────────────────────
session_start();

function sendOTP(string $mobile): array {
    $otp = rand(100000, 999999);
    $_SESSION['otp']           = $otp;
    $_SESSION['otp_mobile']    = $mobile;
    $_SESSION['otp_expires']   = time() + 300; // 5 min

    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=" . FAST2SMS_API_KEY
         . "&route=otp&variables_values={$otp}&flash=0&numbers={$mobile}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    $res = json_decode($response, true);
    if (!empty($res['return']) && $res['return'] === true) {
        return ['success' => true];
    }
    // Fallback: for local dev just return success so you can test
    return ['success' => true, 'dev_otp' => $otp];
}

function verifyOTP(string $mobile, string $otp): bool {
    if (
        isset($_SESSION['otp'], $_SESSION['otp_mobile'], $_SESSION['otp_expires']) &&
        $_SESSION['otp_mobile'] === $mobile &&
        (string)$_SESSION['otp'] === (string)$otp &&
        time() < $_SESSION['otp_expires']
    ) {
        unset($_SESSION['otp'], $_SESSION['otp_mobile'], $_SESSION['otp_expires']);
        return true;
    }
    return false;
}

function sendEmails(array $data): void {
    // ── Auto-reply to user ─────────────────────────────────────────────────
    $userSubject = "✨ Query Received | Astro Pradeep Kumar";
    $userBody = "
    <div style='font-family:Georgia,serif;max-width:600px;margin:auto;border:1px solid #d4af37;border-radius:8px;overflow:hidden'>
      <div style='background:linear-gradient(135deg,#1a1a2e,#16213e);padding:30px;text-align:center'>
        <h2 style='color:#d4af37;margin:0;font-size:24px'>🔯 Astro Pradeep Kumar</h2>
        <p style='color:#ccc;margin:5px 0 0'>Vedic Astrology & Spiritual Guidance</p>
      </div>
      <div style='background:#fff8e1;padding:30px'>
        <p style='color:#555'>Namaste <strong>{$data['name']}</strong>,</p>
        <p style='color:#555'>We have received your query and our astrologer will get back to you within <strong>24 hours</strong>.</p>
        <table style='width:100%;border-collapse:collapse;margin:20px 0'>
          <tr style='background:#f5e6c8'><td style='padding:8px 12px;font-weight:bold;color:#8b6914'>Name</td><td style='padding:8px 12px;color:#444'>{$data['name']}</td></tr>
          <tr><td style='padding:8px 12px;font-weight:bold;color:#8b6914'>Mobile</td><td style='padding:8px 12px;color:#444'>{$data['mobile']}</td></tr>
          <tr style='background:#f5e6c8'><td style='padding:8px 12px;font-weight:bold;color:#8b6914'>Date of Birth</td><td style='padding:8px 12px;color:#444'>{$data['dob']}</td></tr>
          <tr><td style='padding:8px 12px;font-weight:bold;color:#8b6914'>Birth Time</td><td style='padding:8px 12px;color:#444'>{$data['birth_time']}</td></tr>
          <tr style='background:#f5e6c8'><td style='padding:8px 12px;font-weight:bold;color:#8b6914'>Birth Place</td><td style='padding:8px 12px;color:#444'>{$data['birth_place']}</td></tr>
          <tr><td style='padding:8px 12px;font-weight:bold;color:#8b6914'>Question</td><td style='padding:8px 12px;color:#444'>{$data['message']}</td></tr>
        </table>
        <p style='color:#555'>For urgent queries, chat with us on <a href='https://wa.me/919096161750' style='color:#25d366;font-weight:bold'>WhatsApp</a>.</p>
        <p style='color:#999;font-size:12px;margin-top:20px'>© 2026 Astro Pradeep Kumar | Blessings School of Astro</p>
      </div>
    </div>";

    // ── Notification to admin ──────────────────────────────────────────────
    $adminSubject = "🔔 New Contact Query — {$data['name']} ({$data['mobile']})";
    $adminBody = "
    <div style='font-family:Arial,sans-serif;max-width:600px;margin:auto'>
      <h2 style='color:#d4af37'>New Query Received</h2>
      <table style='width:100%;border-collapse:collapse'>
        <tr style='background:#f9f9f9'><th style='padding:8px;text-align:left'>Field</th><th style='padding:8px;text-align:left'>Value</th></tr>
        <tr><td style='padding:8px;border:1px solid #ddd'>Name</td><td style='padding:8px;border:1px solid #ddd'>{$data['name']}</td></tr>
        <tr><td style='padding:8px;border:1px solid #ddd'>Mobile</td><td style='padding:8px;border:1px solid #ddd'>{$data['mobile']}</td></tr>
        <tr><td style='padding:8px;border:1px solid #ddd'>Email</td><td style='padding:8px;border:1px solid #ddd'>{$data['email']}</td></tr>
        <tr><td style='padding:8px;border:1px solid #ddd'>DOB</td><td style='padding:8px;border:1px solid #ddd'>{$data['dob']}</td></tr>
        <tr><td style='padding:8px;border:1px solid #ddd'>Birth Time</td><td style='padding:8px;border:1px solid #ddd'>{$data['birth_time']}</td></tr>
        <tr><td style='padding:8px;border:1px solid #ddd'>Birth Place</td><td style='padding:8px;border:1px solid #ddd'>{$data['birth_place']}</td></tr>
        <tr><td style='padding:8px;border:1px solid #ddd'>Message</td><td style='padding:8px;border:1px solid #ddd'>{$data['message']}</td></tr>
        <tr><td style='padding:8px;border:1px solid #ddd'>Submitted At</td><td style='padding:8px;border:1px solid #ddd'>" . date('d M Y, h:i A') . "</td></tr>
      </table>
    </div>";

    $headers = "MIME-Version: 1.0\r\nContent-type:text/html;charset=UTF-8\r\nFrom: Astro Pradeep Kumar <" . SMTP_USER . ">\r\n";

    if (!empty($data['email'])) {
        mail($data['email'], $userSubject, $userBody, $headers);
    }
    mail(ADMIN_EMAIL, $adminSubject, $adminBody, $headers);
}

// ─── AJAX: Send OTP ────────────────────────────────────────────────────────────
if (isset($_POST['action']) && $_POST['action'] === 'send_otp') {
    header('Content-Type: application/json');
    $mobile = preg_replace('/\D/', '', $_POST['mobile'] ?? '');
    if (strlen($mobile) !== 10) {
        echo json_encode(['success' => false, 'message' => 'Invalid mobile number']);
        exit;
    }
    $result = sendOTP($mobile);
    echo json_encode($result);
    exit;
}

// ─── AJAX: Verify OTP ─────────────────────────────────────────────────────────
if (isset($_POST['action']) && $_POST['action'] === 'verify_otp') {
    header('Content-Type: application/json');
    $mobile = preg_replace('/\D/', '', $_POST['mobile'] ?? '');
    $otp    = trim($_POST['otp'] ?? '');
    if (verifyOTP($mobile, $otp)) {
        $_SESSION['mobile_verified'] = $mobile;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP']);
    }
    exit;
}

// ─── Form Submission ──────────────────────────────────────────────────────────
$successMsg = '';
$errorMsg   = '';

if (isset($_POST['submit'])) {
    $mobile = preg_replace('/\D/', '', $_POST['mobile'] ?? '');

    // Verify mobile was OTP-confirmed this session
    if (!isset($_SESSION['mobile_verified']) || $_SESSION['mobile_verified'] !== $mobile) {
        $errorMsg = 'Please verify your mobile number with OTP before submitting.';
    } else {
        $name        = trim($_POST['name']        ?? '');
        $email       = trim($_POST['email']       ?? '');
        $dob         = trim($_POST['dob']         ?? '');
        $birth_time  = trim($_POST['birth_time']  ?? '');
        $birth_place = trim($_POST['birth_place'] ?? '');
        $message     = trim($_POST['message']     ?? '');

        // ── Prepared statement (SQL injection safe) ──
        $stmt = $conn->prepare(
            "INSERT INTO contact_queries (name, mobile, email, dob, birth_time, birth_place, message)
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param('sssssss', $name, $mobile, $email, $dob, $birth_time, $birth_place, $message);

        if ($stmt->execute()) {
            $successMsg = 'Your query has been submitted successfully! We will contact you within 24 hours.';
            $data = compact('name','mobile','email','dob','birth_time','birth_place','message');
            sendEmails($data);
            unset($_SESSION['mobile_verified']); // reset for next submission
        } else {
            $errorMsg = 'Something went wrong. Please try again.';
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Astro Pradeep</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
    /* ── OTP Modal ─────────────────────────────────────── */
    .otp-overlay {
        display: none;
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.65);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(4px);
    }
    .otp-overlay.active { display: flex; }

    .otp-box {
        background: linear-gradient(135deg, #fff9e6, #fff3c4);
        border: 2px solid #d4af37;
        border-radius: 16px;
        padding: 36px 32px;
        width: 360px;
        max-width: 95vw;
        text-align: center;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        animation: slideUp .35s cubic-bezier(.34,1.56,.64,1);
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(40px) scale(.95); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }
    .otp-box .otp-icon {
        font-size: 46px; margin-bottom: 12px; display: block;
    }
    .otp-box h4 { font-family:'Cinzel',serif; color:#8b6914; margin-bottom:6px; }
    .otp-box p  { font-size:13px; color:#666; margin-bottom:20px; }

    .otp-inputs {
        display: flex; gap: 10px; justify-content: center; margin-bottom: 20px;
    }
    .otp-inputs input {
        width: 44px; height: 52px;
        text-align: center; font-size: 22px; font-weight: 700;
        border: 2px solid #d4af37; border-radius: 10px;
        background: #fff; color: #333;
        outline: none; transition: border-color .2s, box-shadow .2s;
    }
    .otp-inputs input:focus {
        border-color: #b8860b;
        box-shadow: 0 0 0 3px rgba(212,175,55,0.25);
    }
    .otp-inputs input.filled { background: #fff8dc; }

    .btn-verify-otp {
        background: linear-gradient(135deg,#d4af37,#b8860b);
        color: #fff; border: none; border-radius: 30px;
        padding: 11px 32px; font-weight: 600; font-size: 15px;
        cursor: pointer; width: 100%; transition: .3s;
    }
    .btn-verify-otp:hover { background: linear-gradient(135deg,#e8c94a,#c89b20); }
    .btn-verify-otp:disabled { opacity: .6; cursor: not-allowed; }

    .otp-resend {
        font-size: 13px; color: #888; margin-top: 14px;
    }
    .otp-resend a {
        color: #d4af37; font-weight: 600; cursor: pointer;
        text-decoration: none;
    }
    .otp-timer { color: #e53935; font-weight: 600; }

    /* ── Field States ────────────────────────────────────── */
    .form-control.is-valid   { border-color: #28a745; }
    .form-control.is-invalid { border-color: #dc3545; }

    .field-hint {
        font-size: 11.5px; margin-top: 4px; min-height: 16px;
        transition: all .2s;
    }
    .field-hint.ok  { color: #28a745; }
    .field-hint.err { color: #dc3545; }

    /* ── Mobile OTP row ──────────────────────────────────── */
    .mobile-row { position: relative; }
    .mobile-row .form-control { padding-right: 130px; }

    .btn-send-otp {
        position: absolute; right: 8px; top: 50%; transform: translateY(-50%);
        background: #d4af37; color: #fff; border: none;
        border-radius: 20px; padding: 5px 16px; font-size: 13px;
        font-weight: 600; cursor: pointer; transition: .25s; white-space: nowrap;
    }
    .btn-send-otp:hover { background: #b8860b; }
    .btn-send-otp.verified {
        background: #28a745; pointer-events: none;
    }
    .btn-send-otp:disabled { opacity: .65; pointer-events: none; }

    /* ── Progress Bar ────────────────────────────────────── */
    .form-progress {
        display: flex; gap: 6px; margin-bottom: 22px;
    }
    .form-progress .step {
        height: 4px; flex: 1; border-radius: 4px;
        background: #e0e0e0; transition: background .4s;
    }
    .form-progress .step.done { background: #d4af37; }

    /* ── Character Counter ───────────────────────────────── */
    .char-counter {
        font-size: 11px; color: #aaa; text-align: right; margin-top: 3px;
    }
    .char-counter.warn { color: #e67e22; }
    .char-counter.full { color: #e53935; }

    /* ── WhatsApp Fill Button ────────────────────────────── */
    .btn-whatsapp-fill {
        display: inline-flex; align-items: center; gap: 8px;
        background: #25D366; color: #fff;
        padding: 11px 22px; border-radius: 30px;
        font-weight: 600; font-size: 14px; border: none;
        cursor: pointer; transition: .3s; text-decoration: none;
        width: 100%; justify-content: center; margin-top: 10px;
    }
    .btn-whatsapp-fill:hover { background: #1ebe5b; color: #fff; }

    /* ── Success / Error banners ─────────────────────────── */
    .alert-astro {
        border-radius: 12px; padding: 16px 20px;
        display: flex; align-items: flex-start; gap: 14px;
        animation: fadeIn .4s ease;
    }
    @keyframes fadeIn {
        from { opacity:0; transform:translateY(-10px); }
        to   { opacity:1; transform:translateY(0); }
    }
    .alert-astro.success {
        background: #e8f5e9; border-left: 4px solid #28a745;
    }
    .alert-astro.error {
        background: #fdecea; border-left: 4px solid #e53935;
    }
    .alert-astro .icon { font-size: 24px; }
    .alert-astro .text p { margin: 0; font-size: 14px; color: #444; }
    .alert-astro .text strong { font-size: 15px; color: #222; }

    /* ── Contact Card ────────────────────────────────────── */
    .astro-contact-card {
        background: linear-gradient(135deg,#fff7d6,#f3d88f);
        border: 1px solid rgba(212,175,55,0.4);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
    .astro-contact-card h3 { font-weight:600; }
    .astro-contact-card p  { font-size:16px; margin-bottom:15px; }

    .btn-whatsapp {
        background:#25D366; color:#fff;
        padding:12px 28px; border-radius:30px;
        font-weight:600; transition:.3s; border:none;
        display: inline-flex; align-items: center; gap: 8px;
    }
    .btn-whatsapp:hover { background:#1ebe5b; color:#fff; }

    /* ── Floating label placeholder trick ───────────────── */
    .submit-wrapper { position: relative; }
    .btn-premium-submit {
        width: 100%; padding: 13px;
        font-size: 16px; font-weight: 600; letter-spacing: .5px;
        border-radius: 30px; border: none; cursor: pointer;
        background: linear-gradient(135deg,#d4af37,#b8860b);
        color: #fff; transition: .3s; position: relative; overflow: hidden;
    }
    .btn-premium-submit:hover {
        background: linear-gradient(135deg,#e8c94a,#c89b20);
        box-shadow: 0 8px 24px rgba(212,175,55,0.45);
        transform: translateY(-1px);
    }
    .btn-premium-submit:disabled {
        opacity: .65; cursor: not-allowed; transform: none;
    }

    /* spinner inside button */
    .btn-spinner {
        display: inline-block; width: 16px; height: 16px;
        border: 2px solid rgba(255,255,255,.5);
        border-top-color: #fff; border-radius: 50%;
        animation: spin .7s linear infinite;
        margin-right: 8px; vertical-align: middle;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
    </style>
</head>
<body>

<!-- ── OTP Modal ──────────────────────────────────────────────────────────── -->
<div class="otp-overlay" id="otpOverlay">
    <div class="otp-box">
        <span class="otp-icon">📱</span>
        <h4>Verify Your Mobile</h4>
        <p id="otpSentTo">Enter the 6-digit OTP sent to your number</p>

        <div class="otp-inputs" id="otpInputs">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
        </div>

        <div id="otpError" style="color:#e53935;font-size:13px;margin-bottom:10px;min-height:18px"></div>

        <button class="btn-verify-otp" id="btnVerifyOtp" onclick="submitOTP()">
            Verify OTP
        </button>

        <p class="otp-resend" id="otpResendRow">
            Resend OTP in <span class="otp-timer" id="otpTimer">4:59</span>
        </p>
        <p class="otp-resend" id="otpResendLink" style="display:none">
            Didn't receive? <a onclick="resendOTP()">Resend OTP</a>
        </p>

        <p style="margin-top:14px">
            <a href="#" style="font-size:13px;color:#aaa" onclick="closeOtpModal();return false">
                Cancel
            </a>
        </p>
    </div>
</div>

<!-- ── Navbar ─────────────────────────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="website-logo/1.png" alt="Astro Pradeep Kumar" width="150px">
        </a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'active'; ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Horoscope</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Daily Horoscope</a></li>
                        <li><a class="dropdown-item" href="#">Weekly Horoscope</a></li>
                        <li><a class="dropdown-item" href="#">Monthly Horoscope</a></li>
                        <li><a class="dropdown-item" href="#">Yearly Horoscope 2026</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Astrology</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Kundli</a></li>
                        <li><a class="dropdown-item" href="#">Match Making</a></li>
                        <li><a class="dropdown-item" href="#">Numerology</a></li>
                        <li><a class="dropdown-item" href="#">Palmistry</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="book-session.php">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="Panchang.php">Panchang</a></li>
                <li class="nav-item"><a class="nav-link" href="Festivals.php">Festivals</a></li>
                <li class="nav-item"><a class="nav-link" href="Calculator.php">Calculator</a></li>
                <li class="nav-item"><a class="nav-link" href="vedic-wisdom.php">Vedic Wisdom</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ── Hero ───────────────────────────────────────────────────────────────── -->
<section class="hero-unified text-center py-100">
    <div class="container">
        <h1 class="hero-title">Contact <span>Us</span></h1>
        <p class="lead opacity-75">We are here to guide you on your spiritual journey</p>
    </div>
</section>

<!-- ── Contact Section ────────────────────────────────────────────────────── -->
<section class="py-100 bg-white">
    <div class="container">
        <div class="row g-5">

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="p-4 shadow rounded">
                    <h3 class="cinzel mb-2">Send Your Query</h3>

                    <!-- Progress bar (5 groups of fields) -->
                    <div class="form-progress mb-4" id="formProgress">
                        <div class="step" id="step1"></div>
                        <div class="step" id="step2"></div>
                        <div class="step" id="step3"></div>
                        <div class="step" id="step4"></div>
                        <div class="step" id="step5"></div>
                    </div>

                    <!-- Success / Error banner -->
                    <?php if ($successMsg): ?>
                    <div class="alert-astro success mb-4">
                        <span class="icon">✅</span>
                        <div class="text">
                            <strong>Query Submitted!</strong>
                            <p><?= htmlspecialchars($successMsg) ?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($errorMsg): ?>
                    <div class="alert-astro error mb-4">
                        <span class="icon">⚠️</span>
                        <div class="text">
                            <strong>Submission Failed</strong>
                            <p><?= htmlspecialchars($errorMsg) ?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <form action="contact.php" method="POST" id="contactForm" novalidate>

                        <div class="row">

                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="fieldName"
                                       class="form-control" placeholder="e.g. Pradeep Kumar"
                                       autocomplete="name" required>
                                <div class="field-hint" id="hintName"></div>
                            </div>

                            <!-- Mobile + OTP -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                <div class="mobile-row">
                                    <input type="tel" name="mobile" id="fieldMobile"
                                           class="form-control" placeholder="10-digit mobile"
                                           maxlength="10" inputmode="numeric" required>
                                    <button type="button" class="btn-send-otp" id="btnSendOtp"
                                            onclick="initiateSendOTP()">
                                        Get OTP
                                    </button>
                                </div>
                                <div class="field-hint" id="hintMobile"></div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="fieldEmail"
                                       class="form-control" placeholder="your@email.com"
                                       autocomplete="email">
                                <div class="field-hint" id="hintEmail"></div>
                            </div>

                            <!-- DOB -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="fieldDob" class="form-control">
                                <div class="field-hint" id="hintDob"></div>
                            </div>

                            <!-- Birth Time -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Birth Time</label>
                                <input type="time" name="birth_time" id="fieldBirthTime" class="form-control">
                            </div>

                            <!-- Birth Place -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Birth Place</label>
                                <input type="text" name="birth_place" id="fieldBirthPlace"
                                       class="form-control" placeholder="City, State">
                                <div class="field-hint" id="hintBirthPlace"></div>
                            </div>

                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label class="form-label">Your Question <span class="text-danger">*</span></label>
                            <textarea name="message" id="fieldMessage" class="form-control"
                                      rows="4" placeholder="Describe your query in detail..."
                                      maxlength="500" required></textarea>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="field-hint" id="hintMessage"></div>
                                <div class="char-counter" id="charCount">0 / 500</div>
                            </div>
                        </div>

                        <!-- Hidden: mobile verified flag for JS to read -->
                        <input type="hidden" id="mobileVerifiedFlag"
                               value="<?= isset($_SESSION['mobile_verified']) ? '1' : '0' ?>">

                        <button type="submit" name="submit" class="btn-premium-submit" id="btnSubmit" disabled>
                            <i class="fa-solid fa-paper-plane me-2"></i> Send Query
                        </button>
                        <div class="field-hint err mt-2" id="hintSubmit"></div>

                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-5">
                <div class="astro-contact-card p-4 rounded shadow">
                    <h3 class="cinzel mb-4">Contact Information</h3>

                    <p><strong>Phone:</strong><br>+91 XXXXXXXXXX</p>
                    <p><strong>Email:</strong><br>careastropradeepkumar@gmail.com</p>
                    <p>
                        <strong>Address:</strong><br>
                        Astro Pradeep Kumar<br>
                        Vedic Astrology & Spiritual Guidance<br>
                        India
                    </p>

                    <hr>

                    <h5 class="cinzel mb-2">Book Direct on WhatsApp</h5>
                    <p class="small text-muted mb-2">
                        Click below to open a pre-filled WhatsApp message with your form details.
                    </p>

                    <button class="btn-whatsapp-fill" id="btnWhatsApp" onclick="openWhatsApp()">
                        <i class="fab fa-whatsapp fa-lg"></i>
                        Chat on WhatsApp with My Details
                    </button>
                    <p class="small text-muted mt-2" style="font-size:11px">
                        <i class="fa-solid fa-circle-info me-1"></i>
                        Fill the form first to auto-populate your query in WhatsApp.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ── Map ────────────────────────────────────────────────────────────────── -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h3 class="cinzel mb-4">Our Location</h3>
        <iframe
            src="https://maps.google.com/maps?q=Nagpur&t=&z=13&ie=UTF8&iwloc=&output=embed"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>
</section>

<!-- ── Footer ─────────────────────────────────────────────────────────────── -->
<footer class="footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <h2 class="cinzel text-white mb-4">ASTRO <span class="text-gold">PRADEEP</span></h2>
                <p class="opacity-75 mb-4">A legacy of 25+ years, serving over 1 million souls globally. We don't just predict the future; we help you create it.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <h5 class="text-white mb-4">Quick Links</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">About Astro</a></li>
                    <li><a href="#">Consultation</a></li>
                    <li><a href="#">Vedic Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-white mb-4">Our Services</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">Janam Kundli</a></li>
                    <li><a href="#">Vastu Audit</a></li>
                    <li><a href="#">Hypnotherapy</a></li>
                    <li><a href="#">Gemstone Analysis</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p class="small opacity-75">Subscribe for weekly cosmic insights.</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email">
                    <button class="btn btn-gold-solid">Join</button>
                </div>
            </div>
        </div>
        <div class="footer-bottom mt-5 pt-4 text-center border-top border-secondary">
            <p class="mb-0 opacity-50">&copy; 2026 Astro Pradeep Kumar | Blessings School of Astro</p>
        </div>
    </div>
</footer>

<!-- WhatsApp Float -->
<a href="https://wa.me/919096161750" class="whatsapp-float" target="_blank"
   style="position:fixed;bottom:20px;right:20px;background:#25d366;color:#FFF;
          border-radius:50px;text-align:center;padding:10px 20px;font-weight:bold;
          text-decoration:none;z-index:100;box-shadow:2px 2px 10px rgba(0,0,0,.2);
          display:flex;align-items:center;gap:8px">
    <i class="fab fa-whatsapp fa-2x"></i><span>Chat Now</span>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* ══════════════════════════════════════════════════════════════════
   ASTRO PRADEEP — Contact Page JS
   Features: real-time validation, OTP flow, WhatsApp pre-fill,
             progress bar, char counter, submit gate
══════════════════════════════════════════════════════════════════ */

// ── State ──────────────────────────────────────────────────────────────────
let mobileVerified = document.getElementById('mobileVerifiedFlag').value === '1';
let otpTimerInterval = null;

// ── DOM refs ───────────────────────────────────────────────────────────────
const fieldName       = document.getElementById('fieldName');
const fieldMobile     = document.getElementById('fieldMobile');
const fieldEmail      = document.getElementById('fieldEmail');
const fieldDob        = document.getElementById('fieldDob');
const fieldBirthPlace = document.getElementById('fieldBirthPlace');
const fieldMessage    = document.getElementById('fieldMessage');
const btnSendOtp      = document.getElementById('btnSendOtp');
const btnSubmit       = document.getElementById('btnSubmit');
const charCount       = document.getElementById('charCount');

// ══ Validation helpers ══════════════════════════════════════════════════════

function setHint(id, msg, type) {
    const el = document.getElementById('hint' + id);
    if (!el) return;
    el.textContent  = msg;
    el.className    = 'field-hint ' + (type || '');
}

function setFieldState(field, valid) {
    field.classList.remove('is-valid','is-invalid');
    if (valid === true)  field.classList.add('is-valid');
    if (valid === false) field.classList.add('is-invalid');
}

function validateName() {
    const v = fieldName.value.trim();
    if (!v)               { setFieldState(fieldName,false); setHint('Name','Full name is required','err'); return false; }
    if (v.length < 3)     { setFieldState(fieldName,false); setHint('Name','Name must be at least 3 characters','err'); return false; }
    if (!/^[a-zA-Z\s]+$/.test(v)) { setFieldState(fieldName,false); setHint('Name','Only letters and spaces allowed','err'); return false; }
    setFieldState(fieldName,true); setHint('Name','✓ Looks good','ok'); return true;
}

function validateMobile() {
    const v = fieldMobile.value.trim();
    if (!v)              { setFieldState(fieldMobile,false); setHint('Mobile','Mobile number is required','err'); return false; }
    if (!/^[6-9]\d{9}$/.test(v)) { setFieldState(fieldMobile,false); setHint('Mobile','Enter a valid 10-digit Indian mobile number','err'); return false; }
    if (!mobileVerified) { setFieldState(fieldMobile,false); setHint('Mobile','Please verify mobile with OTP','err'); return false; }
    setFieldState(fieldMobile,true); setHint('Mobile','✓ Mobile verified','ok'); return true;
}

function validateEmail() {
    const v = fieldEmail.value.trim();
    if (!v) { setFieldState(fieldEmail,null); setHint('Email','',''); return true; } // optional
    const ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
    setFieldState(fieldEmail, ok);
    setHint('Email', ok ? '✓ Valid email' : 'Enter a valid email address', ok ? 'ok' : 'err');
    return ok;
}

function validateDob() {
    const v = fieldDob.value;
    if (!v) { setHint('Dob','',''); return true; } // optional
    const dob  = new Date(v);
    const now  = new Date();
    const age  = (now - dob) / (365.25*24*3600*1000);
    if (age < 1 || age > 120) { setFieldState(fieldDob,false); setHint('Dob','Enter a valid date of birth','err'); return false; }
    setFieldState(fieldDob,true); setHint('Dob','',''); return true;
}

function validateMessage() {
    const v = fieldMessage.value.trim();
    if (!v)          { setFieldState(fieldMessage,false); setHint('Message','Please describe your query','err'); return false; }
    if (v.length < 10){ setFieldState(fieldMessage,false); setHint('Message','Please write at least 10 characters','err'); return false; }
    setFieldState(fieldMessage,true); setHint('Message','','ok'); return true;
}

// ── Progress bar ────────────────────────────────────────────────────────────
function updateProgress() {
    const filled = [
        fieldName.value.trim().length >= 3 && /^[a-zA-Z\s]+$/.test(fieldName.value.trim()),
        mobileVerified,
        fieldEmail.value.trim() !== '' || true, // optional — always counts
        fieldDob.value !== '' || true,
        fieldMessage.value.trim().length >= 10
    ];
    filled.forEach((done, i) => {
        document.getElementById('step' + (i+1)).classList.toggle('done', done);
    });
}

// ── Submit gate ─────────────────────────────────────────────────────────────
function checkSubmitReady() {
    const ready = validateName() && mobileVerified && validateEmail() && validateDob() && validateMessage();
    btnSubmit.disabled = !ready;
    updateProgress();
    return ready;
}

// ── Char counter ────────────────────────────────────────────────────────────
fieldMessage.addEventListener('input', () => {
    const len = fieldMessage.value.length;
    charCount.textContent = len + ' / 500';
    charCount.className   = 'char-counter' + (len > 450 ? ' full' : len > 350 ? ' warn' : '');
    validateMessage();
    checkSubmitReady();
});

// ── Live validation listeners ────────────────────────────────────────────────
fieldName.addEventListener('input',   () => { validateName();    checkSubmitReady(); });
fieldMobile.addEventListener('input', () => {
    // Reset verification if mobile changes
    if (mobileVerified) {
        mobileVerified = false;
        btnSendOtp.textContent = 'Get OTP';
        btnSendOtp.classList.remove('verified');
    }
    // Only allow digits
    fieldMobile.value = fieldMobile.value.replace(/\D/g,'').slice(0,10);
    const v = fieldMobile.value;
    if (/^[6-9]\d{9}$/.test(v)) {
        btnSendOtp.disabled = false;
        setHint('Mobile','','');
    } else {
        btnSendOtp.disabled = true;
    }
    checkSubmitReady();
});
fieldEmail.addEventListener('input',     () => { validateEmail(); checkSubmitReady(); });
fieldDob.addEventListener('change',      () => { validateDob();   checkSubmitReady(); });
fieldBirthPlace.addEventListener('input',() => updateProgress());

// ══ OTP Flow ════════════════════════════════════════════════════════════════

function initiateSendOTP() {
    if (!fieldMobile.value || !/^[6-9]\d{9}$/.test(fieldMobile.value)) {
        setHint('Mobile','Enter a valid 10-digit mobile first','err');
        return;
    }
    btnSendOtp.disabled   = true;
    btnSendOtp.textContent = 'Sending…';

    fetch('contact.php', {
        method : 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body   : 'action=send_otp&mobile=' + encodeURIComponent(fieldMobile.value)
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            btnSendOtp.textContent = 'Resend';
            openOtpModal();
        } else {
            setHint('Mobile', data.message || 'Could not send OTP. Try again.', 'err');
            btnSendOtp.disabled   = false;
            btnSendOtp.textContent = 'Get OTP';
        }
    })
    .catch(() => {
        setHint('Mobile','Network error. Please try again.','err');
        btnSendOtp.disabled   = false;
        btnSendOtp.textContent = 'Get OTP';
    });
}

function openOtpModal() {
    document.getElementById('otpSentTo').textContent =
        'Enter the 6-digit OTP sent to +91 ' + fieldMobile.value;
    document.getElementById('otpError').textContent = '';
    document.getElementById('otpOverlay').classList.add('active');
    clearOtpInputs();
    document.querySelector('#otpInputs input').focus();
    startOtpTimer(299); // 4 min 59 sec
}

function closeOtpModal() {
    document.getElementById('otpOverlay').classList.remove('active');
    clearInterval(otpTimerInterval);
}

function clearOtpInputs() {
    document.querySelectorAll('#otpInputs input').forEach(i => {
        i.value = ''; i.classList.remove('filled');
    });
}

// ── OTP digit navigation ─────────────────────────────────────────────────────
document.querySelectorAll('#otpInputs input').forEach((input, idx, arr) => {
    input.addEventListener('keydown', e => {
        if (e.key === 'Backspace' && !input.value && idx > 0) arr[idx-1].focus();
    });
    input.addEventListener('input', e => {
        input.value = input.value.replace(/\D/g,'').slice(-1);
        input.classList.toggle('filled', !!input.value);
        if (input.value && idx < arr.length - 1) arr[idx+1].focus();
        if (idx === arr.length - 1 && input.value) submitOTP(); // auto-submit on last digit
    });
    input.addEventListener('paste', e => {
        const text = (e.clipboardData || window.clipboardData).getData('text').replace(/\D/g,'');
        arr.forEach((inp, i) => { if (text[i]) { inp.value = text[i]; inp.classList.add('filled'); } });
        e.preventDefault();
        if (text.length >= 6) submitOTP();
    });
});

function getOTPValue() {
    return [...document.querySelectorAll('#otpInputs input')].map(i => i.value).join('');
}

function submitOTP() {
    const otp = getOTPValue();
    if (otp.length < 6) { document.getElementById('otpError').textContent = 'Please enter all 6 digits'; return; }

    const btn = document.getElementById('btnVerifyOtp');
    btn.disabled     = true;
    btn.innerHTML    = '<span class="btn-spinner"></span> Verifying…';

    fetch('contact.php', {
        method : 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body   : 'action=verify_otp&mobile=' + encodeURIComponent(fieldMobile.value) + '&otp=' + otp
    })
    .then(r => r.json())
    .then(data => {
        btn.disabled  = false;
        btn.innerHTML = 'Verify OTP';
        if (data.success) {
            mobileVerified = true;
            closeOtpModal();
            btnSendOtp.textContent = '✓ Verified';
            btnSendOtp.classList.add('verified');
            setFieldState(fieldMobile, true);
            setHint('Mobile','✓ Mobile number verified','ok');
            checkSubmitReady();
        } else {
            document.getElementById('otpError').textContent = data.message || 'Invalid OTP. Try again.';
            clearOtpInputs();
            document.querySelector('#otpInputs input').focus();
        }
    })
    .catch(() => {
        btn.disabled  = false;
        btn.innerHTML = 'Verify OTP';
        document.getElementById('otpError').textContent = 'Network error. Please try again.';
    });
}

// ── OTP Countdown timer ──────────────────────────────────────────────────────
function startOtpTimer(seconds) {
    clearInterval(otpTimerInterval);
    const timerEl      = document.getElementById('otpTimer');
    const resendRow    = document.getElementById('otpResendRow');
    const resendLink   = document.getElementById('otpResendLink');
    resendRow.style.display  = '';
    resendLink.style.display = 'none';

    let remaining = seconds;
    otpTimerInterval = setInterval(() => {
        remaining--;
        const m = String(Math.floor(remaining / 60)).padStart(1,'0');
        const s = String(remaining % 60).padStart(2,'0');
        timerEl.textContent = m + ':' + s;
        if (remaining <= 0) {
            clearInterval(otpTimerInterval);
            resendRow.style.display  = 'none';
            resendLink.style.display = '';
            btnSendOtp.disabled      = false;
        }
    }, 1000);
}

function resendOTP() {
    closeOtpModal();
    initiateSendOTP();
}

// ══ WhatsApp Pre-fill ════════════════════════════════════════════════════════
function openWhatsApp() {
    const name    = fieldName.value.trim()        || '(not filled)';
    const mobile  = fieldMobile.value.trim()      || '(not filled)';
    const email   = fieldEmail.value.trim()       || '(not filled)';
    const dob     = fieldDob.value                || '(not filled)';
    const time    = fieldBirthTime ? document.getElementById('fieldBirthTime').value || '(not filled)' : '(not filled)';
    const place   = fieldBirthPlace.value.trim()  || '(not filled)';
    const msg     = fieldMessage.value.trim()     || '(not filled)';

    const text =
`🙏 Namaste Astro Pradeep Kumar Ji,

I would like to book a consultation. Here are my details:

👤 *Name:* ${name}
📱 *Mobile:* ${mobile}
📧 *Email:* ${email}
🎂 *Date of Birth:* ${dob}
⏰ *Birth Time:* ${time}
📍 *Birth Place:* ${place}

❓ *My Query:*
${msg}

Please guide me at your earliest convenience. 🙏`;

    const encoded = encodeURIComponent(text);
    window.open('https://wa.me/919096161750?text=' + encoded, '_blank');
}

// ── Form submission loading state ────────────────────────────────────────────
document.getElementById('contactForm').addEventListener('submit', function(e) {
    if (!checkSubmitReady()) {
        e.preventDefault();
        document.getElementById('hintSubmit').textContent =
            'Please fix the errors above before submitting.';
        return;
    }
    btnSubmit.disabled   = true;
    btnSubmit.innerHTML  = '<span class="btn-spinner"></span> Submitting…';
});

// ── Init ─────────────────────────────────────────────────────────────────────
(function init() {
    btnSendOtp.disabled = true; // disabled until valid mobile typed
    if (mobileVerified) {
        btnSendOtp.textContent = '✓ Verified';
        btnSendOtp.classList.add('verified');
    }
    updateProgress();
    checkSubmitReady();
})();
</script>
</body>
</html>