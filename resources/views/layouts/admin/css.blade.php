<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Summernote (WYSIWYG Editor) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

<style>
    :root {
        --primary: #4f46e5;
        --primary-light: #818cf8;
        --secondary: #7c3aed;
        --bg-light: #f9fafb;
        --text-dark: #1e293b;
        --text-muted: #64748b;
        --border: #e2e8f0;
    }

    body {
        background-color: var(--bg-light);
        font-family: 'Inter', system-ui, sans-serif;
        overflow-x: hidden;
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
        background: linear-gradient(180deg, var(--primary), var(--secondary));
        width: 270px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        padding: 2rem 1.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.3s ease;
        box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .sidebar.hide {
        transform: translateX(-100%);
    }

    .sidebar-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 3rem;
        text-decoration: none;
    }

    .sidebar-brand-icon {
        background: white;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--primary);
        font-size: 1.4rem;
    }

    .sidebar-brand-text {
        color: #fff;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.85);
        padding: 0.8rem 1rem;
        border-radius: 10px;
        margin-bottom: 0.4rem;
        transition: all 0.25s ease;
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        transform: translateX(5px);
    }

    .nav-link.active {
        background: white;
        color: var(--primary);
        font-weight: 600;
    }

    .sidebar-section-title {
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        margin: 1.2rem 0 0.4rem 0.6rem;
    }

    .btn-logout {
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        border: none;
        padding: 0.9rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-logout:hover {
        background: #ef4444;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    }

    /* ===== TOP NAVBAR ===== */
    .top-navbar {
        margin-left: 270px;
        background: #fff;
        border-bottom: 1px solid var(--border);
        padding: 1rem 2rem;
        position: sticky;
        top: 0;
        z-index: 999;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .top-navbar .page-title {
        font-weight: 700;
        color: var(--text-dark);
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-light), var(--secondary));
        border-radius: 50%;
        color: white;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ===== MAIN CONTENT ===== */
    .main-content {
        margin-left: 270px;
        padding: 2rem;
    }

    /* ===== FOOTER ===== */
    footer {
        margin-left: 270px;
        background: white;
        border-top: 1px solid var(--border);
        padding: 1.5rem 2rem;
        text-align: center;
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    /* ===== SUMMERNOTE CUSTOM ===== */
    .note-editor.note-frame {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
    }

    .note-toolbar {
        background-color: #f8f9fa !important;
        border-bottom: 1px solid #dee2e6 !important;
    }

    /* ===== MOBILE VIEW ===== */
    .mobile-toggle {
        display: none;
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: var(--primary);
        border: none;
        color: white;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        font-size: 1.6rem;
        z-index: 1100;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
    }

    @media (max-width: 992px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .top-navbar,
        .main-content,
        footer {
            margin-left: 0 !important;
        }

        .mobile-toggle {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }
</style>
