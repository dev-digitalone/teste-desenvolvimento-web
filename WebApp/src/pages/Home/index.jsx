import { useState, useEffect } from 'react'
import { useNavigate } from 'react-router-dom'

import { FiPlus } from 'react-icons/fi'
import { Container, Content, NewPost } from './styles'

import { api } from '../../services/api'

import { Header } from '../../components/Header'
import { CardPost } from '../../components/CardPost'
import { Button } from '../../components/Button'

export function Home(){
  const [posts, setPosts] = useState([])
  
  const navigate = useNavigate()

  function handleCreatePost() {
    navigate('/posts')
  }

  useEffect(() => {
    async function fetchPosts() {
      const response = await api.get(`/posts`)
      setPosts(response.data)
    }

    fetchPosts()
  },[])

  return (
    <Container>
      <Header/>
      
      <Content> 
        {
          posts.map(post => (
            <CardPost
              key={String(post.id)}
              data={post}
            />
          )
          )
        }

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