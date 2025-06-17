import { Request, Response, NextFunction } from 'express';
import jwt from 'jsonwebtoken';
import dotenv from 'dotenv';
import { AuthenticatedRequest, User } from './types';

dotenv.config();

const JWT_SECRET = process.env.JWT_SECRET || 'fallback_secret_if_not_set'; // Fallback para desenvolvimento

export const generateToken = (user: User): string => {
  return jwt.sign({ id: user.id, username: user.username }, JWT_SECRET, { expiresIn: '1h' });
};

export const authenticateToken = (req: Request, res: Response, next: NextFunction) => {
  const authHeader = req.headers['authorization'];
  const token = authHeader && authHeader.split(' ')[1];

  if (token == null) return res.sendStatus(401); // Sem token

  jwt.verify(token, JWT_SECRET, (err, user) => {
    if (err) return res.sendStatus(403); // Token inválido ou expirado
    (req as AuthenticatedRequest).user = user as User;
    next();
  });
};