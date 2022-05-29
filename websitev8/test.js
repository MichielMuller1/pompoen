const mariadb = require('mariadb');
const pool = mariadb.createPool({
    host: 'localhost',
    user: 'pi',
    password: 'raspberry',
    database: "pompoen"

});
pool.getConnection()
    .then(conn => {

        conn.query("SELECT 1 as val")
            .then((rows) => {
                console.log(rows); //[ {val: 1}, meta: ... ]
                //Table must have been created before 
                // " CREATE TABLE myTable (id int, val varchar(255)) "
                return conn.query("UPDATE water SET roerder = 1 where id = '1'");
            })
            .then((res) => {
                console.log(res); // { affectedRows: 1, insertId: 1, warningStatus: 0 }
                conn.end();
            })
            .catch(err => {
                //handle error
                console.log(err);
                conn.end();
            })

    }).catch(err => {
        //not connected
    });