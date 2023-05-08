import { useState } from 'react'
import { FiMail, FiLock, FiLogIn, FiUserPlus} from 'react-icons/fi'
import { BiSad } from 'react-icons/bi'

import { useAuth } from '../../hooks/auth'

import { Input } from '../../components/Input'
import { Button } from '../../components/Button'
import { ButtonText } from '../../components/ButtonText'

import { Container, Form, Background } from "./styles";

export function SignIn() {
  const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')

  const { signIn } = useAuth()

  function handleSignIn(){
    signIn({ email, password })
  }

  return (
    <Container>
      <Form>
        <header>
          <h1>PostTrack</h1>
          <p>Aplicação web para controle de publicações.</p>

          <h2>Faça seu Login</h2>
        </header>

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

        <Button 
          title='Entrar' 
          icon={FiLogIn}
          onClick={handleSignIn}
        />

        <ButtonText 
          title='Criar conta'
          icon={FiUserPlus}
          to='/register'
        />

        <ButtonText 
          title='Esqueci minha senha'
          icon={BiSad}
          to='/forgot_password'
        />

      </Form>
      
      <Background
        alt='Imagem de uma sala de cinema'
      />
    </Container>
  )
}