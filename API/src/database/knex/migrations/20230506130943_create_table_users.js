exports.up = knex => {
  return knex.schema.createTable('users', function (table) {
    table.increments('id').primary()
    table.string('name', 245).notNullable()
    table.string('email', 245).unique().notNullable()
    table.string('password', 245).notNullable()
  })
}

exports.down = knex => {
  return knex.schema.dropTable('users')
}
