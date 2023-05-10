import { useState } from 'react';
import { FiUser, FiMail, FiLock, FiArrowLeft} from 'react-icons/fi'
import { useNavigate } from 'react-router-dom';

import { api } from '../../services/api';

import { Input } from '../../components/Input'
import { Button } from '../../components/Button'
import { ButtonText } from '../../components/ButtonText';

import { Container, Form, Background } from "./styles";

export function SignUp() {
  const [name, setName] = useState('')
  const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')
  const [passwordConfirm, setPasswordConfirm] = useState('')

  const navigate = useNavigate()
  
  const passwordMatched = password === passwordConfirm
  const checkFields = !name || !email || !password || !passwordConfirm

  function handleSignUp(){
    if(checkFields){
      return alert('Preencha todos os campos!')
    }

    if(!passwordMatched){
      return alert('As senhas não correspondem!')
    }

    api.post('/users', {name, email, password})
    .then(() => {
      alert('Usuário cadastrado com sucesso!')
      navigate(-1)
    })
    .catch(error => {
      if(error.response){
        alert(error.response.data.message)
      }else {
        alert('Não foi possível cadastrar!')
      }
    })
    
  }

  return (
    <Container>
      <Form>
        <header>
          <h1>PostTrack</h1>
          <p>Aplicação web para controle de publicações.</p>

          <h2>Crie sua conta</h2>
        </header>

        <Input
          placeholder='Nome'
          type='text'
          icon={FiUser}
          onChange={event => setName(event.target.value)}
        />
        <Input
          placeholder='E-mail'
          type='text'
          icon={FiMail}
          onChange={event => setEmail(event.target.value)}
        />

        <Input
          placeholder='Senha'
          type='password'
          icon={FiLock}
          onChange={event => setPassword(event.target.value)}
        />
        <Input
          placeholder='Confirmar Senha'
          type='password'
          icon={FiLock}
          onChange={event => setPasswordConfirm(event.target.value)}
        />

        <Button 
          title='Cadastrar'
          onClick={handleSignUp}
        />

        <ButtonText 
          title='Voltar para o login'
          icon={FiArrowLeft}
          to={-1}
        />

      </Form>
      
      <Background
        alt='Imagem de um projetor de cinema'
      />
    </Container>
  )
}