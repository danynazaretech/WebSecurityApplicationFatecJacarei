import { Request, Response } from 'express';
import bcrypt from 'bcryptjs';
import { generateToken } from './jwt';
import { User, AuthenticatedRequest } from './types';

// Simulação de um banco de dados em memória
const users: User[] = [];
let nextUserId = 1;

export const register = async (req: Request, res: Response) => {
  const { username, password } = req.body;

  if (!username || !password) {
    return res.status(400).json({ message: 'Nome de usuário e senha são obrigatórios.' });
  }

  // Verificar se o usuário já existe
  if (users.some(u => u.username === username)) {
    return res.status(409).json({ message: 'Nome de usuário já existe.' });
  }

  const hashedPassword = await bcrypt.hash(password, 10); // Hash da senha
  const newUser: User = { id: nextUserId++, username, password: hashedPassword };
  users.push(newUser);

  // Não retornamos a senha no objeto de usuário
  const userWithoutPassword = { id: newUser.id, username: newUser.username };

  res.status(201).json({ message: 'Usuário registrado com sucesso!', user: userWithoutPassword });
};

export const login = async (req: Request, res: Response) => {
  const { username, password } = req.body;

  if (!username || !password) {
    return res.status(400).json({ message: 'Nome de usuário e senha são obrigatórios.' });
  }

  const user = users.find(u => u.username === username);

  if (!user) {
    return res.status(400).json({ message: 'Credenciais inválidas.' });
  }

  const isMatch = await bcrypt.compare(password, user.password as string);

  if (!isMatch) {
    return res.status(400).json({ message: 'Credenciais inválidas.' });
  }

  const token = generateToken(user);

  // Não retornamos a senha no objeto de usuário
  const userWithoutPassword = { id: user.id, username: user.username };

  res.json({ message: 'Login bem-sucedido!', token, user: userWithoutPassword });
};

export const getProtectedData = (req: Request, res: Response) => {
  const authReq = req as AuthenticatedRequest;
  res.json({ message: 'Dados protegidos acessados com sucesso!', user: authReq.user });
};