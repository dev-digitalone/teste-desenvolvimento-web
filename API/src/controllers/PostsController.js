const knex = require('../database/knex')

class PostsController {
  async create(request, response) {
    const { title, description, img_url } = request.body

    const user_id = request.user.id

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

  async index(request, response) {
    const user_id = request.user.id

    const posts = await knex('posts')
    .where({ user_id })
    .orderBy('created_at')

    return response.json(posts)
  }

  async update(request, response) {
    const { title, description, img_url } = request.body

    const { id } = request.params

    await knex('posts').where({id}).update({title, description, img_url})

    return response.status(201).json()
  }
}

module.exports = PostsController
