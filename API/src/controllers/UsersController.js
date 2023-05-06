const knex = require("../database/knex")

class UsersController {
  async create(request, response) {
    const { name, email, password } = request.body

    await knex('users').insert({
      name,
      email,
      password
    })

    return response.status(201).json()
  }

  async index(request, response) {
    const result = await knex('users')
    return response.json(result)
  }
}

module.exports = UsersController