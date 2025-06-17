import { Request } from 'express';

export interface User {
  id: number;
  username: string;
  password?: string; // Opcional, pois não queremos retornar a senha
}

export interface AuthenticatedRequest extends Request {
  user?: User;
}