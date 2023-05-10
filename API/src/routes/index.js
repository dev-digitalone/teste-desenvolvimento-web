const { Router } = require("express")

const usersRouter = require("./users.routes")
const postsRouter = require("./posts.routes")
const sessionsRouter = require('./sessions.routes')

const routes = Router()

routes.use('/users', usersRouter)
routes.use('/sessions', sessionsRouter)
routes.use('/posts', postsRouter)

module.exports = routes