import { useState, useEffect } from 'react'
import { useNavigate, useParams } from 'react-router-dom'
import { format } from 'date-fns'

import { Container, Content, Header, Controls, Text, ImgUrl } from './styles'

import { FiClock, FiEdit2 } from 'react-icons/fi'

import { useAuth } from '../../hooks/auth'
import { api } from '../../services/api'

import { Button } from '../../components/Button'

export function CardPost({ data, ...rest }){
  const { user } = useAuth()

  const formattedDate = data ? format(
    new Date(data.created_at), 'dd/MM/yyyy'
  ):""
  
  const params = useParams()
  const navigate = useNavigate()

  function handleEditPost() {
    navigate(`/posts/${data.id}`)
  }

  return(
    <Container {...rest}> 
      
      <Content>
        <Header>
          <div className='author'>
            <h2>
              {user.name}
            </h2>
            
            <div className='date'>
              <FiClock/>
              <p>{formattedDate}</p>
            </div>
          </div>

          <Controls>
            <Button 
              title='Editar' 
              icon={FiEdit2}
              onClick={handleEditPost}
            />
          </Controls>

        </Header>
        
        <div className='title'>
          <h1>
            {data.title}
          </h1>
          
        </div>

        <Text>
          <p>{data.description}</p>
        </Text>

        <ImgUrl>
          <a 
            href={data.img_url} 
            target='_blank'
          >
            {data.img_url}
          </a>
        </ImgUrl>

      </Content>
      

    </Container>
  )
}