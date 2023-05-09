import { useState, useEffect } from 'react'
import { useNavigate } from 'react-router-dom'

import { FiPlus } from 'react-icons/fi'
import { Container, Content, NewPost } from './styles'

import { api } from '../../services/api'

import { Header } from '../../components/Header'
import { CardPost } from '../../components/CardPost'
import { Button } from '../../components/Button'

export function Home(){
  const navigate = useNavigate()

  function handleCreatePost() {
    navigate('/new_post')
  }

  return (
    <Container>
      <Header/>
      
      <Content>  
        <CardPost/>
        <CardPost/>
        <CardPost/>
      </Content>

      <NewPost>
        <Button
          title='Novo Post'
          icon={FiPlus}
          onClick={handleCreatePost}
        />
      </NewPost>
      
    </Container>
  )
}