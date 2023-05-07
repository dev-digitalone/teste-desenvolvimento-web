const { Router } = require('express')
const PostsController = require('../controllers/PostsController')

const postsRoutes = Router()

const postsController = new PostsController()

postsRoutes.get('/', postsController.index)
postsRoutes.post('/:user_id', postsController.create)
postsRoutes.get('/:id', postsController.read)
postsRoutes.delete('/:id', postsController.delete)

module.exports = postsRoutes