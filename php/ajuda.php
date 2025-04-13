<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XX - Termos de Uso</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
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
            color: var(--text-dark);
            background-color: white;
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
            margin: 2rem auto;
        }
        
        .terms-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px 60px;
        }
        
        h1 {
            color: var(--red-primary);
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        h2 {
            color: var(--red-dark);
            font-size: 1.4rem;
            margin: 2rem 0 1rem;
            font-weight: 500;
        }
        
        p, li {
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        ul {
            padding-left: 1.5rem;
        }
        
        .back-button {
            background-color: var(--red-primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            margin-top: 2rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .back-button:hover {
            background-color: var(--red-dark);
            color: white;
        }
        
        .highlight {
            background-color: rgba(130, 10, 209, 0.1);
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid var(--red-primary);
        }
        
        @media (max-width: 768px) {
            .terms-container {
                padding: 0 15px 40px;
            }
            
            h1 {
                font-size: 1.5rem;
            }
            
            h2 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center py-4">
    <div class="terms-container">
        <div class="nu-logo">XX</div>
        
        <h1>Ajuda</h1>
        <p class="text-muted">Última atualização</p>
        
        <div class="highlight">
            <p> Quais ajudas para acessar o aplicativo o cliente Precisa hoje?</p>
        </div>
        <p>
            <a href="https://www.youtube.com/watch?v=gjQg4rRHIt0" class="">Olha o golpe! Quando receber ligações de bancos, desconfie! | Brasil Urgente</a>
           
        </p>
        <p>
        <a href="https://www.youtube.com/watch?v=dNbEXSU__Gs" class="">Bancos alertam para golpe do pix errado; saiba como evitar | Jornal da Band</a>
        </p>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row g-4">
            <!-- Main Content -->
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">Perguntas frequentes</h2>
                
                <div class="accordion xx-accordion mb-5" id="faqAccordion">
                    <!-- Item 1 -->
                    <div class="accordion-item border-0 mb-3 ">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed highlight" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                <i class="fas fa-user-plus xx-icon"></i> Como faço meu primeiro acesso?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Para acessar sua conta pela primeira vez:</p>
                                <ol>
                                    <li>Baixe o app do xx na App Store ou Google Play</li>
                                    <li>Selecione "Primeiro acesso"</li>
                                    <li>Informe seu CPF e número do cartão (os 4 últimos dígitos)</li>
                                    <li>Crie uma senha segura</li>
                                    <li>Confirme seu e-mail e telefone</li>
                                </ol>
                                <p>Pronto! Agora você já pode usar todos os serviços da sua conta xx.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Item 2 -->
                    <div class="accordion-item border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed highlight" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                <i class="fas fa-key xx-icon"></i> Esqueci minha senha, como recuperar?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse " data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Para redefinir sua senha:</p>
                                <ol>
                                    <li>Na tela de login, toque em "Esqueci minha senha"</li>
                                    <li>Informe seu CPF</li>
                                    <li>Você receberá um código por SMS</li>
                                    <li>Insira o código no app</li>
                                    <li>Crie uma nova senha segura</li>
                                </ol>
                                <div class="alert alert-light mt-3 border-start border-5 border-warning">
                                    <i class="fas fa-exclamation-circle me-2 text-warning"></i>
                                    Dica: Use uma senha forte, com letras, números e caracteres especiais.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="accordion-item border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed highlight" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                <i class="fas fa-exchange-alt xx-icon"></i> Como faço uma transferência?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Para transferir dinheiro:</p>
                                <ol>
                                    <li>Toque em "Área Pix" no app</li>
                                    <li>Selecione "Pix" ou "Transferência"</li>
                                    <li>Escolha o contato ou digite os dados da conta</li>
                                    <li>Informe o valor</li>
                                    <li>Confira os dados e confirme com sua senha</li>
                                </ol>
                                <p class="mt-3"><span class="xx-badge">Novo</span> Agora você pode agendar transferências para qualquer dia!</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <a href="index.php" class="back-button mb-4">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                      <!-- Contact Card -->
                      <div class="text-center mb-5 rounded card padding">

                            <h2 class="fw-bold mb-4">Precisa de ajuda?</h2>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <i class="fas fa-comments xx-icon"></i>
                                    <strong>Chat online</strong><br>
                                    Disponível 24h no app
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-phone xx-icon"></i>
                                    <strong>0800 592 0506</strong><br>
                                    Seg a Sex, 8h às 20h
                                </li>
                                <li>
                                    <i class="fas fa-envelope xx-icon"></i>
                                    <strong>ajuda@xx.com.br</strong>
                                </li>
                            </ul>
                        
                    </div>

      
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>