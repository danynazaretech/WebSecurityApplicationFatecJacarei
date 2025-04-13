<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XX - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --red-primary:  #660000;
            --red-dark: #b30000;
            --red-light: #ff5c5c;
            --gray-light: #f5f5f5;
            --gray-medium: #e0e0e0;
            --gray-dark: #757575;
            --text-dark: #212121;
        }
        

        body {
            font-family: 'Roboto', sans-serif;
            background-color: white;
            color: var(--text-dark);
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .nu-gradient-bg {
            background: linear-gradient(135deg, var(--red-primary), var(--red-dark));
        }
        
        .nu-logo {
            font-size: 2rem;
            font-weight: 800;
            color: white;
            background-color: var(--red-primary);
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }
        
        .login-container {
            max-width: 400px;
            width: 100%;
        }
        
        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid var(--gray-medium);
            padding: 0.5rem 1rem;
        }
        
        .form-control:focus {
            border-color: var(--red-light);
            box-shadow: 0 0 0 0.25rem rgba(130, 10, 209, 0.25);
        }
        
        .btn-nu {
            background-color: var(--red-primary);
            color: white;
            border: none;
            border-radius: 8px;
            height: 50px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-nu:hover {
            background-color: var(--red-dark);
            color: white;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray-dark);
        }
        
        .footer-link {
            color: var(--red-primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .footer-link:hover {
            color: var(--red-dark);
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center py-4">
    <div class="login-container px-3">
        <!-- Cabeçalho com logo -->
        <header class="text-center mb-5">
            <div class="nu-logo mx-auto">XX</div>
            <h1 class="h3 mb-3 fw-normal">Olá, seja bem-vindo!</h1>
            <p class="text-muted">Acesse sua conta para continuar</p>
        </header>
        
        <!-- Formulário de login -->
        <main>
            <form  action="processa_login.php" method="GET">
                <!-- Campo CPF -->
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>

                    <input 
                        type="text" 
                        class="form-control" 
                        id="cpf" 
                        placeholder="000.000.000-00" 
                        name='cpf'
                        required
                        
                    >

                 

                </div>
                
                <!-- Campo Senha -->
                <div class="mb-4 position-relative">
                    <label for="password" class="form-label">Senha</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password"  
                        placeholder="Digite sua senha olha"
                        name="password" 
                        required
                    >
                    <i class="password-toggle fas fa-eye" id="togglePassword"></i>
                </div>
                
                <!-- Botão de login -->
                <button class="w-100 btn btn-nu mb-4" type="submit">
                    Entrar
                </button>
                
                <!-- Links adicionais -->
                <div class="d-flex justify-content-between">
                    <a href="esqueciSenha.html" class="footer-link">Esqueci minha senha</a>
                    <a href="ajuda.php" class="footer-link">Ajuda</a>
                </div>
            </form>
            
            <!-- Divisor -->
            <div class="d-flex align-items-center my-4">
                <hr class="flex-grow-1">
                <span class="px-3 text-muted">ou</span>
                <hr class="flex-grow-1">
            </div>
            
            <!-- Cadastro -->
            <div class="text-center">
                <p class="text-muted">Ainda não tem uma conta?</p>
                <a href="cadastro.php" class="btn btn-outline-danger w-100">
                    Abra sua conta gratuita
                </a>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts customizados -->
    <script>

         // Máscara para CPF
         document.getElementById('cpf').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 3) {
                value = value.substring(0, 3) + '.' + value.substring(3);
            }
            if (value.length > 7) {
                value = value.substring(0, 7) + '.' + value.substring(7);
            }
            if (value.length > 11) {
                value = value.substring(0, 11) + '-' + value.substring(11);
            }
            
            e.target.value = value.substring(0, 14);
        });

       
        

        // Toggle para mostrar/esconder senha
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Alternar ícone
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
        
        // Validação do formulário
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validação simples (em um projeto real, faria mais validações)
            const cpf = document.getElementById('cpf').value;
            const password = document.getElementById('password').value;
            
            if (cpf.length < 14) {
                alert('Por favor, insira um CPF válido');
                return;
            }
            
            if (password.length < 6) {
                alert('A senha deve ter pelo menos 6 caracteres');
                return;
            }
            
            // Simulação de login bem-sucedido
            alert('Login realizado com sucesso! Redirecionando...');
            // window.location.href = 'dashboard.html'; // Descomente em um projeto real
        });
    </script>
</body>
</html>