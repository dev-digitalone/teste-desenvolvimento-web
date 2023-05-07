const knex = require('../database/knex')

class PostsController {
  async create(request, response) {
    const { title, description, img_url } = request.body

    const {user_id} = request.params

    await knex('posts').insert({
      title,
      description,
      img_url,
      user_id
    })

    return response.status(201).json()
  }

  async read(request, response) {
    const { id } = request.params

    const post = await knex('posts').where({id}).first()

    return response.json(post)
  }

  async delete(request, response) {
    const { id } = request.params

    await knex('posts').where({id}).delete()

    return response.json()
  }
}

module.exports = PostsController
