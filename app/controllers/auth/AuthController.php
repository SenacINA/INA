<?php

class AuthController {
    public function requestEmailReset() {
      require __DIR__ . 'geral/redefinir_email_1.php';
    }
    public function confirmEmailReset() {
      require __DIR__ . 'geral/redefinir_email_2.php';
    }
    public function requestPasswordReset() {
      require __DIR__ . 'geral/redefinir_senha_1.php';
    }
    public function confirmPasswordReset() {
      require __DIR__ . 'geral/redefinir_senha_2.php';
    }
  }
  
  