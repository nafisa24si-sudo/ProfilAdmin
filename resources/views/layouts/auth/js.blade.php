<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form submission untuk login
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            // Tampilkan loading spinner
            const loginButton = document.getElementById('loginButton');
            const loginText = document.getElementById('loginText');
            const loginSpinner = document.getElementById('loginSpinner');

            loginText.innerHTML = '<i class="fas fa-spinner me-2"></i>Memproses...';
            loginSpinner.classList.remove('d-none');
            loginButton.disabled = true;
        });

        // WhatsApp button click tracking
        document.getElementById('whatsappFloat').addEventListener('click', function() {
            console.log('WhatsApp button clicked from login page');
        });
    </script>
