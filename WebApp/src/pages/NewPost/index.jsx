import { useState } from 'react'

import { useNavigate } from 'react-router-dom'

import { Header } from '../../components/Header'
import { Input} from '../../components/Input'
import { TextArea } from '../../components/TextArea'
import { Button } from '../../components/Button'
import { ButtonText } from '../../components/ButtonText'

import { BsArrowLeft } from 'react-icons/bs'

import { api } from '../../services/api'
import { Container, Form } from "./styles";

export function NewPost() {
  const [title, setTitle] = useState('')
  const [description, setDescription] = useState('')
  const [img_url, setImg_url] = useState('')


  const navigate = useNavigate()

  function handleBack(){
    navigate(-1)
  }

  async function handleNewPost(){
    if(!title) {
      return alert('De um titulo para seu Post!')
    }

    if(!img_url) {
      return alert('Informe o Link da sua imagem!')
    }

    await api.post('/posts', {
      title, 
      description,
      img_url
    })

    alert('Post criado com sucesso!')
    handleBack()
  }

  return (
    <Container>
      <Header/>
      <main>
        <Form>
          <header>
            <ButtonText 
              title='Voltar'
              icon={BsArrowLeft}
              onClick={handleBack}
            />
            <h1>Novo Post</h1>
          </header>

          <Input 
            placeholder='Titulo'
            onChange={event => setTitle(event.target.value)}
          />
          <TextArea 
            placeholder='Descrição (Opcional)'
            onChange={event => setDescription(event.target.value)}
          />
          <Input 
            placeholder='Link da Imagem'
            onChange={event => setImg_url(event.target.value)}
          />

          <Button 
            title='Salvar' 
            onClick={handleNewPost}
          />
        </Form>
      </main>
    </Container>
  )
}