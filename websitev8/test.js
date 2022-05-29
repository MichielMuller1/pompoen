var mysql = require('mysql');
var con = mysql.createConnection({
    host: 'localhost',
    user: 'pi',
    password: 'raspberry',
    database: "pompoen"
});

con.connect(function (err) {
    if (err) throw err;
    con.query("SELECT * FROM water", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
    });
});