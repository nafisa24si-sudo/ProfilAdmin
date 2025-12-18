<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary-color: #4e73df;
        --primary-dark: #375ac1;
        --text-color: #333;
        --light-gray: #f8f9fa;
        --border-color: #e0e0e0;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #4e73df, #1cc88a);
        color: var(--text-color);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    /* Jika ingin menggunakan foto sebagai background full-screen, letakkan file di public/images/custom_bg.jpg */
    body.auth-bg {
        background: url('{{ asset('images/custom_bg.jpg') }}') no-repeat center center fixed;
        background-size: cover;
    }

    /* Dark overlay to improve contrast for the login card */
    body.auth-bg::before {
        content: '';
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.35);
        pointer-events: none;
        z-index: 0;
    }

    .login-container {
        display: flex;
        max-width: 1100px;
        width: 100%;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .login-left {
        flex: 1;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .login-right {
        flex: 1;
        background-color: white;
        padding: 50px 40px;
    }

    /* Layout untuk tampilan seperti contoh — kartu login di tengah atas background foto */
    body.auth-bg .login-container {
        max-width: 820px;
        width: 820px;
        border-radius: 12px;
        overflow: visible;
        background: transparent;
        box-shadow: none;
        display: block;
    }

    body.auth-bg .login-left { display: none; }

    body.auth-bg .login-right {
        margin: 60px auto;
        width: 520px;
        border-radius: 8px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.45);
        padding: 36px;
        background: rgba(255,255,255,0.9);
        position: relative;
        z-index: 1;
        backdrop-filter: blur(6px);
    }

    /* Logo Styles */
    .logo-container {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo {
        max-width: 120px;
        height: auto;
        margin-bottom: 15px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .brand-name {
        font-size: 1.8rem;
        font-weight: 700;
        color: white;
        margin-bottom: 5px;
    }

    .brand-tagline {
        font-size: 0.9rem;
        opacity: 0.9;
        font-style: italic;
    }

    /* Image Styles */
    .feature-image {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 20px 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .welcome-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 15px;
        text-align: center;
    }

    .welcome-text {
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 25px;
        opacity: 0.9;
        text-align: center;
    }

    .signin-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 40px;
        color: var(--text-color);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .signin-title i {
        background-color: var(--primary-color);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }

    .form-control {
        padding: 12px 15px;
        border-radius: 10px;
        border: 1px solid var(--border-color);
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .password-container {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #6c757d;
        cursor: pointer;
    }

    .form-check-label {
        color: #495057;
    }

    .btn-login {
        background-color: var(--primary-color);
        border: none;
        color: white;
        padding: 12px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
        width: 100%;
        margin-top: 10px;
        font-size: 1rem;
    }

    .btn-login:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .forgot-password {
        color: var(--primary-color);
        text-decoration: none;
        font-size: 0.9rem;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .create-account {
        text-align: center;
        margin-top: 30px;
        color: #6c757d;
    }

    .create-account a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
    }

    .create-account a:hover {
        text-decoration: underline;
    }

    /* Features List */
    .features-list {
        margin-top: 25px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        padding: 8px 0;
    }

    .feature-item i {
        background: rgba(255, 255, 255, 0.2);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        font-size: 0.9rem;
    }

    /* Notifikasi Styles */
    .alert {
        border-radius: 10px;
        border: none;
    }

    .alert-success {
        background-color: #d1edff;
        color: #0c5460;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    .alert ul {
        margin-bottom: 0;
    }

    /* Loading spinner */
    .spinner-border {
        width: 1rem;
        height: 1rem;
    }

    /* WhatsApp Floating Button Styles */
    .whatsapp-float {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 1000;
    }

    .whatsapp-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: #25D366;
        color: white;
        border-radius: 50%;
        text-align: center;
        box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        animation: pulse 2s infinite;
    }

    .whatsapp-link:hover {
        background: #128C7E;
        transform: scale(1.1);
        box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
    }

    .whatsapp-link i {
        font-size: 32px;
    }

    .whatsapp-tooltip {
        position: absolute;
        bottom: 70px;
        right: 0;
        background: #333;
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 12px;
        white-space: nowrap;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
        pointer-events: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .whatsapp-tooltip::after {
        content: '';
        position: absolute;
        top: 100%;
        right: 20px;
        border-width: 5px;
        border-style: solid;
        border-color: #333 transparent transparent transparent;
    }

    .whatsapp-float:hover .whatsapp-tooltip {
        opacity: 1;
        transform: translateY(0);
    }

    /* Pulse Animation */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
        }

        70% {
            box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
            max-width: 450px;
        }

        .login-left,
        .login-right {
            padding: 40px 30px;
        }

        .welcome-title {
            font-size: 1.8rem;
        }

        .signin-title {
            font-size: 1.6rem;
        }

        .brand-name {
            font-size: 1.5rem;
        }

        .whatsapp-float {
            bottom: 20px;
            right: 20px;
        }

        .whatsapp-link {
            width: 55px;
            height: 55px;
        }

        .whatsapp-link i {
            font-size: 28px;
        }
    }

    @media (max-width: 576px) {

        .login-left,
        .login-right {
            padding: 30px 20px;
        }

        .welcome-title {
            font-size: 1.6rem;
        }

        .signin-title {
            font-size: 1.4rem;
        }
    }
</style>
