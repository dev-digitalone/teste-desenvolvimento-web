const AppError = require("../utils/AppError")

class UsersController {

  create(request, response) {
    const { name, email, password } = request.body

    if(!name){
      throw new AppError("Nome obrigatório!")
    }    
    if(!email){
      throw new AppError("Email obrigatório!")
    }
    if(!password){
      throw new AppError("Senha obrigatória!")
    }

    response.status(201).json({ name, email, password })
  }
}

module.exports = UsersController