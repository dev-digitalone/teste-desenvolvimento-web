const app = require("./src/app");

const conn = require("./src/config/db/conn");

const port = 4000;

const User = require("./src/models/User");
const Articles = require("./src/models/Articles");

conn.sync()
    .then(() => {
        app.listen(port, () => {
            console.log(`Server is running on port ${port}.`);
        });
    })
    .catch((err) => console.log(err));
