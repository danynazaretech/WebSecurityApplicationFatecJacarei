<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XX - Início</title>
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
            --success-color: #00cc66;
            --warning-color: #ff9500;
            --error-color: #ff3b30;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fafafa;
            color: var(--text-dark);
            padding-bottom: 70px; /* Espaço para a bottom-nav */
        }
        
        .nu-header {
            background-color: white;
            padding: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .greeting {
            font-size: 1.1rem;
            color: var(--gray-dark);
        }
        
        .username {
            font-size: 1.3rem;
            font-weight: 500;
        }
        
        .balance-card {
            background: linear-gradient(135deg, var(--red-primary), var(--red-dark));
            color: white;
            border-radius: 16px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 12px rgba(130, 10, 209, 0.2);
        }
        
        .balance-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .balance-amount {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 8px 0;
        }
        
        .account-info {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin: 20px 0;
        }
        
        .quick-action {
            background: none;
            border: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .action-icon {
            width: 50px;
            height: 50px;
            background-color: var(--red-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-bottom: 8px;
            font-size: 1.2rem;
        }
        
        .action-label {
            font-size: 0.75rem;
            color: var(--text-dark);
        }
        
        .section-title {
            font-size: 1.2rem;
            font-weight: 500;
            margin: 24px 0 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .see-all {
            font-size: 0.9rem;
            color: var(--red-primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .transactions-list {
            background-color: white;
            border-radius: 16px;
            padding: 0 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .transaction-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .transaction-item:last-child {
            border-bottom: none;
        }
        
        .transaction-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--gray-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--red-primary);
        }
        
        .transaction-details {
            flex: 1;
        }
        
        .transaction-name {
            font-weight: 500;
            margin-bottom: 2px;
        }
        
        .transaction-date {
            font-size: 0.8rem;
            color: var(--gray-dark);
        }
        
        .transaction-amount {
            font-weight: 500;
        }
        
        .credit {
            color: var(--success-color);
        }
        
        .debit {
            color: var(--error-color);
        }
        
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            display: flex;
            justify-content: space-around;
            padding: 12px 0;
            box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
        }
        
        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--gray-dark);
            font-size: 0.8rem;
        }
        
        .nav-item.active {
            color: var(--red-primary);
        }
        
        .nav-icon {
            font-size: 1.4rem;
            margin-bottom: 4px;
        }
        
        .promo-banner {
            background-color: white;
            border-radius: 16px;
            padding: 15px;
            margin: 20px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            border-left: 4px solid var(--warning-color);
        }
        
        .promo-icon {
            font-size: 1.5rem;
            color: var(--warning-color);
            margin-right: 15px;
        }
        
        .promo-text {
            flex: 1;
        }
        
        .promo-title {
            font-weight: 500;
            margin-bottom: 2px;
        }
        
        .promo-description {
            font-size: 0.9rem;
            color: var(--gray-dark);
        }

        .nu-logo-small {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--red-primary);
        }
        
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <header class="nu-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <i class="fas fa-chevron-left me-3"></i>
                <span class="nu-logo-small">XX</span>
            </div>
            <h1 class="h6 mb-0">Início</h1>
            <i class="fas fa-ellipsis-vertical"></i>
        </div>
    </header>
    
    <!-- Conteúdo Principal -->
    <main class="container">
        <!-- Saldo da Conta -->
        <div class="balance-card">
            <div class="balance-label">Saldo disponível</div>
            <div class="balance-amount" id="accountBalance">R$ 5.247,90</div>
            <div class="account-info">XXConta •••• 1234</div>
        </div>
        
        <!-- Ações Rápidas -->
        <div class="quick-actions">
            <button class="quick-action">
                <div class="action-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <div class="action-label">Transferir</div>
            </button>
            <button class="quick-action">
                <div class="action-icon">
                    <i class="fas fa-barcode"></i>
                </div>
                <div class="action-label">Pagar</div>
            </button>
            <button class="quick-action">
                <div class="action-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="action-label">Pix</div>
            </button>
            <button class="quick-action">
                <div class="action-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="action-label">Recarga</div>
            </button>
            <button class="quick-action">
                <div class="action-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="action-label">Cartão</div>
            </button>
            <button class="quick-action">
                <div class="action-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="action-label">Investir</div>
            </button>
            <button class="quick-action">
                <div class="action-icon">
                    <i class="fas fa-piggy-bank"></i>
                </div>
                <div class="action-label">Depositar</div>
            </button>
            <button class="quick-action">
                <div class="action-icon">
                    <i class="fas fa-ellipsis-h"></i>
                </div>
                <div class="action-label">Mais</div>
            </button>
        </div>
        
        <!-- Banner Promocional -->
        <div class="promo-banner">
            <div class="promo-icon">
                <i class="fas fa-gift"></i>
            </div>
            <div class="promo-text">
                <div class="promo-title">Cashback de 10%</div>
                <div class="promo-description">Ganhe de volta em compras selecionadas</div>
            </div>
            <i class="fas fa-chevron-right"></i>
        </div>
        
        <!-- Últimas Transações -->
        <h2 class="section-title">
            <span>Suas movimentações</span>
            <a href="#" class="see-all">Ver todas</a>
        </h2>
        
        <div class="transactions-list">
            <div class="transaction-item">
                <div class="transaction-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="transaction-details">
                    <div class="transaction-name">Restaurante Sabor</div>
                    <div class="transaction-date">Hoje • 14:30</div>
                </div>
                <div class="transaction-amount debit">- R$ 48,90</div>
            </div>
            
            <div class="transaction-item">
                <div class="transaction-icon">
                    <i class="fas fa-long-arrow-alt-down"></i>
                </div>
                <div class="transaction-details">
                    <div class="transaction-name">Transferência recebida</div>
                    <div class="transaction-date">Ontem • 09:15</div>
                </div>
                <div class="transaction-amount credit">+ R$ 500,00</div>
            </div>
            
            <div class="transaction-item">
                <div class="transaction-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="transaction-details">
                    <div class="transaction-name">Supermercado</div>
                    <div class="transaction-date">12/10 • 18:40</div>
                </div>
                <div class="transaction-amount debit">- R$ 127,35</div>
            </div>
            
            <div class="transaction-item">
                <div class="transaction-icon">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="transaction-details">
                    <div class="transaction-name">Dividendos</div>
                    <div class="transaction-date">10/10 • 08:00</div>
                </div>
                <div class="transaction-amount credit">+ R$ 89,50</div>
            </div>
        </div>
        
        <!-- Cartão de Crédito -->
        <h2 class="section-title">
            <span>Cartão de crédito</span>
            <a href="#" class="see-all">Detalhes</a>
        </h2>
        
        <div class="transactions-list">
            <div class="transaction-item">
                <div class="transaction-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="transaction-details">
                    <div class="transaction-name">Fatura atual</div>
                    <div class="transaction-date">Fecha em 5 dias</div>
                </div>
                <div class="transaction-amount debit">R$ 1.320,50</div>
            </div>
            
            <div class="transaction-item">
                <div class="transaction-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <div class="transaction-details">
                    <div class="transaction-name">Limite disponível</div>
                    <div class="transaction-date">de R$ 5.000,00</div>
                </div>
                <div class="transaction-amount credit">R$ 2.450,00</div>
            </div>
        </div>
    </main>
    
    <!-- Navegação Inferior -->
    <nav class="bottom-nav">
        <a href="index.html" class="nav-item active">
            <i class="fas fa-home nav-icon"></i>
            <span>Início</span>
        </a>
        <a href="cartoes.html" class="nav-item">
            <i class="fas fa-credit-card nav-icon"></i>
            <span>Cartões</span>
        </a>
        <a href="investir.html" class="nav-item">
            <i class="fas fa-chart-line nav-icon"></i>
            <span>Investir</span>
        </a>
        <a href="perfil.html" class="nav-item">
            <i class="fas fa-user nav-icon"></i>
            <span>Perfil</span>
        </a>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts Customizados -->
    <script>
        // Simular carregamento de dados do usuário
        document.addEventListener('DOMContentLoaded', function() {
            // Dados do usuário (em um app real, viria de uma API)
            const userData = {
                name: 'Maria Silva',
                balance: 5247.90,
                account: '123456-7'
            };
            
            // Atualizar interface
            document.getElementById('username').textContent = userData.name;
            document.getElementById('accountBalance').textContent = 
                'R$ ' + userData.balance.toLocaleString('pt-BR', {minimumFractionDigits: 2});
            
            // Simular interações
            document.querySelectorAll('.quick-action').forEach(action => {
                action.addEventListener('click', function() {
                    const actionName = this.querySelector('.action-label').textContent;
                    console.log('Ação selecionada:', actionName);
                    // Aqui você redirecionaria para a página correspondente
                });
            });
        });
    </script>
</body>
</html>