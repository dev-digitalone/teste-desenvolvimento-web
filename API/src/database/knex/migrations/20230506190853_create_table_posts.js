exports.up = knex => {
  return knex.schema.createTable('posts', table => {
    table.increments('id')
    table.string('title', 245)
    table.string('description', 245)
    table.string('img_url', 245).notNullable()
    table.timestamp('created_at').default(knex.fn.now())

    table.integer('user_id').references('id').inTable('users')
  })
}

exports.down = knex => {
  return knex.schema.dropTable('posts')
}
