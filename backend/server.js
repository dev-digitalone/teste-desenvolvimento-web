const app = require("./src/app");

const conn = require("./src/config/db/conn");

const port = 4000;

conn.sync()
    .then(() => {
        app.listen(port, () => {
            console.log(`Server is running on port ${port}.`);
        });
    })
    .catch((err) => console.log(err));
