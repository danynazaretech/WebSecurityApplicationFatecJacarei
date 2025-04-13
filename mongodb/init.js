db = db.getSiblingDB('bank_logs');
db.logs.insertMany([
  { event: "Servidor iniciado", timestamp: new Date() }
]);
