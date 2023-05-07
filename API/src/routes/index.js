const { Router } = require("express")

const usersRouter = require("./users.routes")
const postsRouter = require("./posts.routes")

const routes = Router()
routes.use('/users', usersRouter)
routes.use('/posts', postsRouter)

module.exports = routes