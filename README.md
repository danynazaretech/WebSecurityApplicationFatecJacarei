# [XXX] Internet Banking

# 🚀 Projeto com Docker Compose

Este projeto utiliza **Docker** e **Docker Compose** para facilitar a execução em qualquer ambiente. Siga os passos abaixo para executar localmente.

---

## ✅ Pré-requisitos

- [Docker](https://www.docker.com/products/docker-desktop/) instalado na sua máquina.

---

## 🛍️ Passo a passo

1️⃣ **Instale o Docker**  
Se ainda não tiver, baixe e instale o Docker Desktop a partir do site oficial:  
👉 https://www.docker.com/products/docker-desktop/

2️⃣ **Clone este repositório**  
```bash
git clone https://github.com/danynazaretech/WebSecurityApplicationFatecJacarei.git
```

3️⃣ **Acesse a pasta do projeto**  
```bash
cd WebSecurityApplicationFatecJacarei
```

4️⃣ **Construa e execute o container com Docker Compose**  
```bash
docker-compose up --build
```

---

## 💡 Observações

- A aplicação será acessível via navegador ou terminal, dependendo do seu projeto.
- Para rodar em segundo plano:
  ```bash
  docker compose up -d --build
  ```
  - Ver os containers que estão rodando:
  ```bash
  docker ps
  ```
  - Parar apenas um container:
  ```bash
  docker stope container
  ```
- Parar todos os containers:
  ```bash
  docker-compose down
  ```

---

## 🛠️ Personalização

Você pode editar o arquivo `docker-compose.yml` e o `Dockerfile` para adaptar às suas necessidades específicas dos projetos.

---

## 🐳 Feito com Docker + Docker Compose ❤️

