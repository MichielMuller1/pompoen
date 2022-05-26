const mariadb = require('mariadb');
const pool = mariadb.createPool({
     host: 'localhost', 
     user:'pi', 
     password: 'raspberry',
	 database: "pompoen"
});

pool.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  
  const now = new Date();
  const current = now.getHours() + ':' + now.getMinutes();
	
	pool.query("SELECT * FROM automatisch", function (err, result, fields) {
		if (err) throw err;
		if (fields[0].cyclus13A = "1"){
			const tijd = fields[0].cyclus13Astart;
			if (tijd = current){
			const minutesToAdd = fields[0].tijdvat3A;
			const newtijd = now + minutesToAdd*60000;
			var sql = "UPDATE automatisch SET vat3A = '1' WHERE ID = 1";
			con.query(sql, function (err, result) {
			if (err) throw err;
			console.log(result.affectedRows + " record(s) updated");
			}
			}
			if (newtijd = now){
			var sql = "UPDATE automatisch SET vat3A = '0' WHERE ID = 1";
			con.query(sql, function (err, result) {
			if (err) throw err;
			console.log(result.affectedRows + " record(s) updated");
			}	
			}
		}
		
		
   });
   
   	pool.query("SELECT * FROM automatisch", function (err, result, fields) {
		if (err) throw err;
		if (fields[0].cyclus23A = "1"){
			const tijd = fields[0].cyclus23Astart;
			if (tijd.toString() = current.toString()){
			const minutesToAdd = fields[0].tijdvat3A;
			const newtijd = now + minutesToAdd*60000;
			var sql = "UPDATE automatisch SET vat3A = '1' WHERE ID = 1";
			
			con.query(sql, function (err, result) {
			if (err) throw err;
			console.log(result.affectedRows + " record(s) updated");
			}
			}
			if (newtijd = now){
			var sql = "UPDATE automatisch SET vat3A = '0' WHERE ID = 1";
			}
			con.query(sql, function (err, result) {
			if (err) throw err;
			console.log(result.affectedRows + " record(s) updated");
			}	
			}
		
		
   });
   
      	pool.query("SELECT * FROM control", function (err, result, fields) {
		if (err) throw err;
		if (fields[0].vat3wateren = "1"){
			const minutesToAdd = fields[0].tijdvat3;
			const newtijd = now + minutesToAdd*60000;
			var sql = "UPDATE control SET vat3wateren = '1' WHERE ID = 1";
			con.query(sql, function (err, result) {
			if (err) throw err;
			console.log(result.affectedRows + " record(s) updated");
			}
			}
			if (newtijd = now){
			var sql = "UPDATE control SET vat3wateren = '0' WHERE ID = 1";
			con.query(sql, function (err, result) {
			if (err) throw err;
			console.log(result.affectedRows + " record(s) updated");
			}	
			}
		});
		
		
   });
 
	
});