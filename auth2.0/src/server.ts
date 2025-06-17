

// npm install jsonwebtoken bcryptjs express dotenv axios
// npm install -D @types/jsonwebtoken @types/bcryptjs @types/express @types/dotenv @types/node @types/axios

import express from 'express';
import axios from 'axios';
import { URLSearchParams } from 'url'; // Para codificar parâmetros de URL

const app = express();
const PORT = 3000;

// Configurações do Google OAuth/OpenID Connect
const GOOGLE_CLIENT_ID = 'SEU_CLIENT_ID_DO_GOOGLE'; // Substitua pelo seu Client ID
const GOOGLE_CLIENT_SECRET = 'SEU_CLIENT_SECRET_DO_GOOGLE'; // Substitua pelo seu Client Secret
const GOOGLE_REDIRECT_URI = 'http://localhost:3000/auth/google/callback'; // Deve corresponder ao configurado no Google Cloud Console

// Endpoint para iniciar o fluxo de autorização
app.get('/auth/google', (req, res) => {
    const authUrl = `https://accounts.google.com/o/oauth2/v2/auth?` +
        `scope=openid%20profile%20email&` + // openid é para OpenID Connect, profile e email para obter dados do usuário
        `include_granted_scopes=true&` +
        `response_type=code&` + // Queremos um código de autorização
        `state=state_parameter_passthrough_value&` + // Parâmetro de estado para prevenir CSRF
        `redirect_uri=${encodeURIComponent(GOOGLE_REDIRECT_URI)}&` +
        `client_id=${GOOGLE_CLIENT_ID}`;
    res.redirect(authUrl);
});

// Endpoint de callback para receber o código de autorização e trocar por tokens
app.get('/auth/google/callback', async (req, res) => {
    const code = req.query.code as string;
    const state = req.query.state as string; // Você deve validar este estado com o que enviou

    if (!code) {
        return res.status(400).send('Código de autorização não fornecido.');
    }

    if (state !== 'state_parameter_passthrough_value') { // Valide o estado em um ambiente real
        return res.status(400).send('Parâmetro de estado inválido.');
    }

    try {
        // Trocar o código de autorização por um access token e id token
        const tokenResponse = await axios.post('https://oauth2.googleapis.com/token',
            new URLSearchParams({
                code: code,
                client_id: GOOGLE_CLIENT_ID,
                client_secret: GOOGLE_CLIENT_SECRET,
                redirect_uri: GOOGLE_REDIRECT_URI,
                grant_type: 'authorization_code',
            }).toString(),
            {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
            }
        );

        const { access_token, id_token } = tokenResponse.data;

        // O id_token é um JWT que contém informações do usuário (se estiver usando OpenID Connect)
        // Em um ambiente real, você decodificaria e verificaria o id_token.
        // Por simplicidade, vamos usar o access_token para obter informações do usuário da API do Google.

        const userInfoResponse = await axios.get('https://www.googleapis.com/oauth2/v3/userinfo', {
            headers: {
                Authorization: `Bearer ${access_token}`,
            },
        });

        const userInfo = userInfoResponse.data;

        res.send(`
            <h1>Autenticação Google bem-sucedida!</h1>
            <p>Bem-vindo, ${userInfo.name} (${userInfo.email})!</p>
            <p>Aqui estão algumas informações do seu perfil:</p>
            <pre>${JSON.stringify(userInfo, null, 2)}</pre>
            <p>Você está autenticado em nosso aplicativo, mas suas credenciais de login e senha permanecem seguras com o Google.</p>
        `);

    } catch (error: any) {
        console.error('Erro ao trocar código ou obter informações do usuário:', error.response?.data || error.message);
        res.status(500).send('Erro na autenticação.');
    }
});

// Página inicial (opcional)
app.get('/', (req, res) => {
    res.send(`
        <h1>Bem-vindo ao Exemplo OAuth 2.0 (Google)</h1>
        <p>Este aplicativo não lida diretamente com seu login e senha.</p>
        <p>Clique no botão abaixo para fazer login com sua conta Google:</p>
        <a href="/auth/google"><button>Entrar com Google</button></a>
    `);
});

app.listen(PORT, () => {
    console.log(`Servidor rodando em http://localhost:${PORT}`);
    console.log('Acesse http://localhost:3000 para iniciar o fluxo.');
});
