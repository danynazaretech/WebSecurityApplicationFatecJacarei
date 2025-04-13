<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XX - Política de Privacidade</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --red-primary: #660000;;
            --red-dark: #b30000;
            --gray-light: #f5f5f5;
            --gray-medium: #e0e0e0;
            --text-dark: #212121;
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
        
        .privacy-container {
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
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        .data-table th, .data-table td {
            border: 1px solid var(--gray-medium);
            padding: 12px;
            text-align: left;
        }
        
        .data-table th {
            background-color: var(--gray-light);
        }
        
        @media (max-width: 768px) {
            .privacy-container {
                padding: 0 15px 40px;
            }
            
            h1 {
                font-size: 1.5rem;
            }
            
            h2 {
                font-size: 1.2rem;
            }
            
            .data-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="privacy-container">
        <div class="nu-logo">XX</div>
        
        <h1>Política de Privacidade do XX</h1>
        <p class="text-muted">Data de Atualização</p>
        <h3 class="highlight" > Aplique o "Regulamento de Segurança Cibernética Aplicada ao Setor de Telecomunicações" da Anatel no desenvolvimento
        da sua aplicação.</h3>
       <p>

       <a target="_blank" href="https://www.gov.br/anatel/pt-br/assuntos/seguranca-cibernetica/regulamentacao">Considerando as suas competências legais e as políticas públicas governamentais, a Agência editou o Regulamento de Segurança Cibernética Aplicada ao Setor de Telecomunicações, aprovado pela Resolução nº 740/2020.</a>

       </p>
        
        <ul>
            <li>autenticidade;</li>
            <li>confidencialidade;</li>
            <li>disponibilidade;</li>
            <li>diversidade;</li>
            <li>integridade;</li>
            <li>interoperabilidade;</li>
            <li>prioridade;</li>
            <li>responsabilidade e</li>
            <li>transparência.</li>
        </ul>

        
        
        
        
        

        
        
        <a class="back-button" href="cadastro.php">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>