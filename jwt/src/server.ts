

// npm install jsonwebtoken bcryptjs express dotenv
// npm install -D @types/jsonwebtoken @types/bcryptjs @types/express @types/dotenv @types/node 
import express from 'express';
import { register, login, getProtectedData } from './authController';
import { authenticateToken } from './jwt';

const app = express();
const PORT = process.env.PORT || 3000;

app.use(express.json()); // Habilitar o parsing de JSON no corpo das requisições

// Rotas de autenticação
app.post('/register', register);
app.post('/login', login);

// Rota protegida (requer token JWT)
app.get('/protected', authenticateToken, getProtectedData); // <-- Linha corrigida, sem a vírgula

app.get('/', (req, res) => {
  res.send('API de Autenticação JWT com Express e TypeScript');
});

app.listen(PORT, () => {
  console.log(`Servidor rodando na porta ${PORT}`);
  console.log('Rotas disponíveis:');
  console.log(`  POST /register`);
  console.log(`  POST /login`);
  console.log(`  GET /protected (requer JWT)`);
});