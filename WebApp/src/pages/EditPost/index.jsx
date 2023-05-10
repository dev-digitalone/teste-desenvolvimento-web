import { useState, useEffect } from 'react'
import { Container, Content } from './styles'
import { useParams, useNavigate } from 'react-router-dom'

import { api } from '../../services/api'

import { BsArrowLeft, BsTrash } from 'react-icons/bs'

import { Header } from '../../components/Header'
import { Button } from '../../components/Button'
import { ButtonText } from '../../components/ButtonText'
import { Input } from '../../components/Input'

export function EditPost(){
  const [data, setData] = useState(null)

  const [title, setTitle] = useState('')
  const [description, setDescription] = useState('')
  const [img_url, setImg_url] = useState('')

  const params = useParams()
  const navigate = useNavigate()

  function handleBack(){
    navigate(-1)
  }

  async function handleUpdate() {
    const updatedPost = {
      title, 
      description,
      img_url
    };
  
    const response = await api.put(`/posts/${params.id}`, updatedPost);
    setData(response.data);
  
    handleBack();
  }

  async function handleRemove(){
    const confirm = window.confirm('Deseja excluir esse Post?')

    if(confirm){
      await api.delete(`/posts/${params.id}`)
      handleBack()
    }
  }

  useEffect(() => {
    async function fetchPost(){
      const response = await api.get(`/posts/${params.id}`)
      setData(response.data)
    }

    fetchPost()
  },[params.id])

  useEffect(() => {
    if (data) {
      setTitle(data.title);
      setDescription(data.description);
      setImg_url(data.img_url);
    }
  }, [data]);

  return (
    <Container>
      <Header/>
      
      {
        data &&
        <main>
          <Content>
            <div>
              <ButtonText 
                title='Voltar'
                icon={BsArrowLeft}
                onClick={handleBack}
              />

              <Button 
                title='Excluir'
                icon={BsTrash}
                onClick={handleRemove}
              />
            </div>

            <Input
              placeholder='Titulo'
              type='text'
              value={title}
              onChange={event => setTitle(event.target.value)}
            />
            <Input
              placeholder='Descrição'
              type='text'
              value={description}
              onChange={event => setDescription(event.target.value)}
            />
            <Input
              placeholder='Link da imagem'
              type='text'
              value={img_url}
              onChange={event => setImg_url(event.target.value)}
            />
            
            <Button 
              title='Salvar Alterações' 
              onClick={handleUpdate}
            />

          </Content>
        </main>
      }

    </Container>
  )
}