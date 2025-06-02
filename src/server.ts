import express, { Request, Response } from "express";
import path from 'path'; // Importa o módulo path


const app = express();
const PORT = process.env.PORT || 3000;


app.use(express.json());

app.get("/", (req: Request, res: Response) => {

  res.send("Welcome ok to the Node.js + TypeScript API!");
});


app.get('/pagina', (req: Request, res: Response) => {
  // Constrói o caminho absoluto para o arquivo index.html na raiz do projeto
  const htmlPath = path.join(__dirname, '../public', 'index.html');
  
  // Envia o arquivo HTML como resposta
  res.sendFile(htmlPath, (err) => {
    if (err) {
      console.error("Erro ao enviar o arquivo HTML:", err);
      res.status(500).send('Erro interno ao servir a página HTML.');
    }
  });
});

app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});

