<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XX - Abra sua conta</title>
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
            --error-color: #e53935;
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
            margin-bottom: 1.5rem;
        }
        
        .register-container {
            max-width: 450px;
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
        
        .btn-nu-outline {
            background-color: white;
            color: var(--red-primary);
            border: 1px solid var(--red-primary);
            border-radius: 8px;
            height: 50px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-nu-outline:hover {
            background-color: var(--gray-light);
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
        
        .progress-bar {
            height: 4px;
            background-color: var(--gray-medium);
            margin-bottom: 2rem;
            border-radius: 2px;
        }
        
        .progress {
            height: 100%;
            width: 33%;
            background-color: var(--red-primary);
            border-radius: 2px;
            transition: width 0.3s;
        }
        
        .step-title {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        
        .form-text {
            font-size: 0.875rem;
            color: var(--gray-dark);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }
        
        .biometric-option {
            border: 1px solid var(--gray-medium);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .biometric-option:hover {
            border-color: var(--red-light);
        }
        
        .biometric-option.selected {
            border-color: var(--red-primary);
            background-color: rgba(130, 10, 209, 0.05);
        }
        
        .biometric-icon {
            font-size: 1.5rem;
            margin-right: 1rem;
            color: var(--red-primary);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center py-4">
    <div class="register-container px-3">
        <!-- Cabeçalho com logo e progresso -->
        <header class="text-center mb-4">
            <div class="nu-logo mx-auto">xx</div>
            <div class="progress-bar">
                <div class="progress" id="progressBar"></div>
            </div>
            <h2 class="step-title" id="stepTitle">Crie sua conta</h2>
        </header>
        
        <!-- Formulário de cadastro - Passo 1 -->
        <main id="formStep1">
            <form id="registerFormStep1">
                <!-- Nome completo -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nome completo</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="fullName" 
                        placeholder="Como aparece no seu documento"
                        required
                    >
                    <div class="error-message" id="nameError">Por favor, insira seu nome completo</div>
                </div>
                
                <!-- CPF -->
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="cpf" 
                        placeholder="000.000.000-00" 
                        required
                    >
                    <div class="error-message" id="cpfError">Por favor, insira um CPF válido</div>
                </div>
                
                <!-- Data de nascimento -->
                <div class="mb-4">
                    <label for="birthDate" class="form-label">Data de nascimento</label>
                    <input 
                        type="date" 
                        class="form-control" 
                        id="birthDate" 
                        required
                    >
                    <div class="error-message" id="birthDateError">Você deve ter pelo menos 18 anos</div>
                </div>
                
                <!-- Botão de continuar -->
                <button class="w-100 btn btn-nu mb-3" type="submit">
                    Continuar
                </button>
                
                <!-- Link para login -->
                <div class="text-center">
                    <p class="text-muted">Já tem uma conta? <a href="index.php" class="footer-link">Faça login</a></p>
                </div>
            </form>
        </main>
        
        <!-- Formulário de cadastro - Passo 2 (inicialmente oculto) -->
        <main id="formStep2" style="display: none;">
            <form id="registerFormStep2">
                <!-- Celular -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Celular</label>
                    <input 
                        type="tel" 
                        class="form-control" 
                        id="phone" 
                        placeholder="(00) 00000-0000" 
                        required
                    >
                    <div class="form-text">Enviaremos um código de confirmação</div>
                    <div class="error-message" id="phoneError">Por favor, insira um número válido</div>
                </div>
                
                <!-- E-mail -->
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        placeholder="seu@email.com" 
                        required
                    >
                    <div class="error-message" id="emailError">Por favor, insira um e-mail válido</div>
                </div>
                
                <!-- Botões -->
                <div class="d-flex gap-3">
                    <button class="w-50 btn btn-nu-outline" type="button" id="backStep1">
                        Voltar
                    </button>
                    <button class="w-50 btn btn-nu" type="submit">
                        Continuar
                    </button>
                </div>
            </form>
        </main>
        
        <!-- Formulário de cadastro - Passo 3 (inicialmente oculto) -->
        <main id="formStep3" style="display: none;">
            <form id="registerFormStep3">
                <!-- Senha -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Crie uma senha</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        placeholder="Mínimo de 6 caracteres" 
                        required
                        minlength="6"
                    >
                    <i class="password-toggle fas fa-eye" id="togglePassword"></i>
                    <div class="form-text">Use letras, números e caracteres especiais</div>
                    <div class="error-message" id="passwordError">A senha deve ter pelo menos 6 caracteres</div>
                </div>
                
                <!-- Confirmação de senha -->
                <div class="mb-4 position-relative">
                    <label for="confirmPassword" class="form-label">Confirme sua senha</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="confirmPassword" 
                        placeholder="Digite novamente sua senha" 
                        required
                    >
                    <i class="password-toggle fas fa-eye" id="toggleConfirmPassword"></i>
                    <div class="error-message" id="confirmPasswordError">As senhas não coincidem</div>
                </div>
                
                <!-- Biometria -->
                <div class="mb-4">
                    <label class="form-label">Deseja cadastrar biometria?</label>
                    <div class="biometric-option" id="biometricOption">
                        <div class="d-flex align-items-center">
                            <i class="biometric-icon fas fa-fingerprint"></i>
                            <div>
                                <div class="fw-500">Usar biometria</div>
                                <div class="form-text">Desbloqueie seu app com digital ou facial</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="useBiometry" value="false">
                </div>
                
                <!-- Termos -->
                <div class="mb-4 form-check">
                    <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                    <label class="form-check-label" for="acceptTerms">
                        Li e aceito os <a href="termosUso.php" class="footer-link" target="_blank">Termos de Uso</a> e <a href="politicaPrivacidade.php" class="footer-link" target="_blank">Política de Privacidade</a>
                    </label>
                    <div class="error-message" id="termsError">Você deve aceitar os termos</div>
                </div>
                
                <!-- Botões -->
                <div class="d-flex gap-3">
                    <button class="w-50 btn btn-nu-outline" type="button" id="backStep2">
                        Voltar
                    </button>
                    <button class="w-50 btn btn-nu" type="submit" id="completeRegistration">
                        Criar conta
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts customizados -->
    <script>

        function validarSenhaForte(params) {
        return False
        }

        function gerarSenhaForte(params){
        return 'XXXXXXX'
        }
        // Variáveis de estado
        let currentStep = 1;
        const totalSteps = 3;
        
        // Elementos do DOM
        const progressBar = document.getElementById('progressBar');
        const stepTitle = document.getElementById('stepTitle');
        const formStep1 = document.getElementById('formStep1');
        const formStep2 = document.getElementById('formStep2');
        const formStep3 = document.getElementById('formStep3');
        
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
        
        // Máscara para telefone
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 0) {
                value = '(' + value.substring(0, 2) + ') ' + value.substring(2);
            }
            if (value.length > 10) {
                value = value.substring(0, 10) + '-' + value.substring(10);
            }
            
            e.target.value = value.substring(0, 15);
        });
        
        // Toggle para mostrar/esconder senha
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
        
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('confirmPassword');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
        
        // Biometria
        document.getElementById('biometricOption').addEventListener('click', function() {
            this.classList.toggle('selected');
            const useBiometry = document.getElementById('useBiometry');
            useBiometry.value = useBiometry.value === 'false' ? 'true' : 'false';
        });
        
        // Validação do passo 1
        document.getElementById('registerFormStep1').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset errors
            document.getElementById('nameError').style.display = 'none';
            document.getElementById('cpfError').style.display = 'none';
            document.getElementById('birthDateError').style.display = 'none';
            
            // Validações
            const fullName = document.getElementById('fullName').value;
            const cpf = document.getElementById('cpf').value;
            const birthDate = new Date(document.getElementById('birthDate').value);
            const today = new Date();
            const minAgeDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
            
            let isValid = true;
            
            if (fullName.length < 5) {
                document.getElementById('nameError').style.display = 'block';
                isValid = false;
            }
            
            if (cpf.length < 14) {
                document.getElementById('cpfError').style.display = 'block';
                isValid = false;
            }
            
            if (birthDate >= minAgeDate || !document.getElementById('birthDate').value) {
                document.getElementById('birthDateError').style.display = 'block';
                isValid = false;
            }
            
            if (isValid) {
                goToStep(2);
            }
        });
        
        // Validação do passo 2
        document.getElementById('registerFormStep2').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset errors
            document.getElementById('phoneError').style.display = 'none';
            document.getElementById('emailError').style.display = 'none';
            
            // Validações
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            let isValid = true;
            
            if (phone.length < 15) {
                document.getElementById('phoneError').style.display = 'block';
                isValid = false;
            }
            
            if (!emailRegex.test(email)) {
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
            }
            
            if (isValid) {
                goToStep(3);
            }
        });
        
        // Validação do passo 3
        document.getElementById('registerFormStep3').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset errors
            document.getElementById('passwordError').style.display = 'none';
            document.getElementById('confirmPasswordError').style.display = 'none';
            document.getElementById('termsError').style.display = 'none';
            
            // Validações
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const acceptTerms = document.getElementById('acceptTerms').checked;
            
            let isValid = true;
            
            if (password.length < 6) {
                document.getElementById('passwordError').style.display = 'block';
                isValid = false;
            }
            
            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').style.display = 'block';
                isValid = false;
            }
            
            if (!acceptTerms) {
                document.getElementById('termsError').style.display = 'block';
                isValid = false;
            }
            
            if (isValid) {
                // Simulação de cadastro bem-sucedido
                alert('Conta criada com sucesso! Redirecionando para o app...');
                // window.location.href = 'dashboard.html'; // Descomente em um projeto real
            }
        });
        
        // Botões de voltar
        document.getElementById('backStep1').addEventListener('click', function() {
            goToStep(1);
        });
        
        document.getElementById('backStep2').addEventListener('click', function() {
            goToStep(2);
        });
        
        // Função para navegar entre os passos
        function goToStep(step) {
            currentStep = step;
            
            // Atualizar barra de progresso
            progressBar.style.width = `${(step / totalSteps) * 100}%`;
            
            // Atualizar título
            const titles = [
                'Crie sua conta',
                'Seus contatos',
                'Segurança'
            ];
            stepTitle.textContent = titles[step - 1];
            
            // Mostrar/ocultar formulários
            formStep1.style.display = step === 1 ? 'block' : 'none';
            formStep2.style.display = step === 2 ? 'block' : 'none';
            formStep3.style.display = step === 3 ? 'block' : 'none';
        }
    </script>
</body>
</html>