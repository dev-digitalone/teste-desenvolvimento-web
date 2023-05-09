import { Link } from "react-router-dom";

import { FiLogOut } from 'react-icons/fi'

import { useAuth } from '../../hooks/auth'
import { api } from '../../services/api';

import { Container, Brand, Profile } from "./styles";

import { ButtonText } from '../ButtonText'

export function Header() {
  const { signOut, user } = useAuth()

  return (
    <Container>

      <Brand>
        <h1>PostTrack</h1>
        <img src="../../../public/logo.svg" alt="logo" />
      </Brand>

      <Profile>
        <h3>{user.name}</h3>

        <ButtonText 
          title='sair'
          icon={FiLogOut}
          onClick={signOut}
          to='/'
        /> 
      </Profile>
      
    </Container>
  )
}