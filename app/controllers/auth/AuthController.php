<?php

class AuthController extends RenderView {
    public function requestEmailReset() {
      $this->loadview('geral/redefinir_email_1', []);
    }
    public function confirmEmailReset() {
      $this->loadview('geral/redefinir_email_2', []);
    }
    public function requestPasswordReset() {
      $this->loadview('geral/redefinir_senha_1', []);
    }
    public function confirmPasswordReset() {
      $this->loadview('geral/redefinir_senha_2', []);
    }
  }
  
  