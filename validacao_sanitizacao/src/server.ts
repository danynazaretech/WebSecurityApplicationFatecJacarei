import express from 'express';
import path from 'path';
import sanitizeHtml from 'sanitize-html';

const app = express();
const PORT = 3000

// Middleware para ler corpo de formulário (x-www-form-urlencoded)
app.use(express.urlencoded({extended:true}));

//Middleware para ler JSON
app.use(express.json());


// Serve arquivos estáticos da pasta "public"
app.use(express.static(path.join(__dirname, '..', 'public')));


//Métodologia AllowList e DenyList
app.post('/allo_deny_list_email', (req,res)=>{
    const {login} = req.body;
    const whitelist: Set<string> = new Set([
        "joao@example.com",
        "ana@example.org",
        "dany@example.org",
        "@example.org"
      ]);
      
      const blacklist: Set<string> = new Set([
        "spam@example.com",
        "fraude@malicioso.com"
      ]);
      
      
        if (blacklist.has(login)) {
          res.status(400).send("❌ Acesso negado: e-mail na blacklist.");
        } else if (whitelist.has(login)) {
          res.status(400).send("✅ Acesso permitido: e-mail na whitelist.");
        } else {
          res.status(400).send("⚠️ E-mail desconhecido: verificação adicional necessária.");
        }
      
    
});


// Calcular se os digitos do cpf é válido
app.post('/validar_semantica', (req,res)=>{

    const {cpf} = req.body;
    
    // Remove caracteres não numéricos
    const cpf_numerico = cpf.replace(/[^\d]+/g,'');


    if(cpf_numerico.length != 11){ 
        res.status(400).send(`CPF deve ter 11 dígitos!`);
    }
      // Rejeita CPFs com todos os dígitos iguais (ex: 11111111111)
    if (/^(\d)\1{10}$/.test(cpf)){ 
        res.status(400).send(`CPF com todos os dígitos iguais! [XXX.XXX.XXX-XXX]`);
     }

    let somaDigito1: number = 0;
    let somaDigito2: number = 0;
    let calculaDigitos: number = 0;

    //Calcula 
    for(const num of cpf_numerico){
        if(calculaDigitos == 9){
            somaDigito2 += parseInt(num)* (11 - calculaDigitos);
            break;
        }
        somaDigito1 += parseInt(num)* (10 - calculaDigitos);
        somaDigito2 += parseInt(num)* (11 - calculaDigitos);
        
        calculaDigitos++;
    }

    let d1: number = 0;
    let d2: number = 0;
    if((somaDigito1%11) <2){
        d1 = 0;
    }else{
        d1 = 11-(somaDigito1%11) ;
       
    }
    if( d1 != parseInt(cpf_numerico.charAt(9)) ){
        res.status(400).send(`CPF inválido`);
    }
    if((somaDigito2%11) <2){

        d2 = 0;
    }else{
        d2 = 11 - (somaDigito2%11);
    }
    if( d2 != parseInt(cpf_numerico.charAt(10)) ){
        res.status(400).send(`CPF inválido`);
    }

    res.status(400).send(`CPF Válido`);
    

    
});

// Valida  o formato do Nome Completo
app.post('/validar_formato_nome', (req,res)=>{
    const {nome} = req.body;
    
    // Função que verifica se o tamanho do nome é válido
    const tamanhoNomeValido = (n:String)=> (n.length>2 && n.length<150);

    // Validando formato nome completo
    if(!nome){
        res.status(400).send('Entrada Vazia!');
    }else if(!tamanhoNomeValido(nome)){
        res.status(400).send('Tamanho nome Invalido!');
    }else if(!nome.includes(' ')){
        // Os registros brasileiros devem ter nome e sobrenome
        // de acordo com a Lei nº 6.015/1973 – Lei dos Registros Públicos
        res.status(400).send('Registros no Brasil devem conter nome e sobrenome.');
    }else if(nome.includes(' ')){
        
        const nomeSobrenome: string[] = nome.split(" ");
        
        for (const n of nomeSobrenome){
            
            if(!tamanhoNomeValido(n)){
                res.status(400).send('Tamanho do Nome ou Sobrenome Invalido!');
                break;
            }
        }
        res.send('Nome Valido!');
    }
});


//Valida o formato do CPF Completo
app.post('/validar_formato_cpf_regex', (req,res)=>{
    const {cpf} = req.body;

    // Regex formato do CPF válido
    console.log(`ola ${cpf}`)
    if(cpf){
        const regex_cpf: RegExp= /^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/;
        if (!cpf && regex_cpf.test(cpf)) {
            res.status(400).send('CPF Valido!');
        } else {
            res.status(400).send('CPF Invalido!');
        }
    }
    
});

 //Implemente o uso da biblioteca sanitize-html
 app.post('/verificando_sanitize_html',(req,res)=>{
    const {login} = req.body

    //exemplo
    console.log(sanitizeHtml("<img src=x onerror=alert('img') />"));
    console.log(sanitizeHtml("console.log('hello world');"));
    console.log(sanitizeHtml("<script>alert('hello world')</script>"));

    res.send(sanitizeHtml(login));
   
 });

//  curl -X POST http://localhost:3000/verificando_sanitize_html \ -H "Content-Type: application/json" \-d "{\"login\":\"AQUI<script>alert('hello world')</script>DEU CERTO\"}"





//[EXERCÍCIO] Valida o formato do email com regex
app.post('/valida_formato_email',()=>{});



//[EXERCÍCIO] Valida a semântica e o formato da data inicio e final
app.post('/valida_formato_semantica_data',()=>{});



//[EXERCÍCIO NOTA]Simule um servidor DNS
 //1 - Verificar se o DNS é válido com REGEX
 //2 - Testar dominios de DARK WEB
 //3 - Testar dominios dentro do padrao aceitavel
 //4 - Simular o AllowList and Blacklist para ambos os casos 
app.post('/valida_formato_semantica_data',()=>{});


 //[DESAFIO] Implemente um exemplo de Sani3223tização de HTML em em regex
 app.post('/sanitizacao_html',()=>{});


//[DESAFIO] Implemente validacao no Cliente e Servidor
app.post('/validacao_cliente_servidor',()=>{});


// RODANDO SERVIDOR
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
  });