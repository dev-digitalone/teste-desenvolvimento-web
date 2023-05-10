import { Routes, Route } from 'react-router-dom'

import { Home } from '../pages/Home'
import { NewPost } from '../pages/NewPost'
import { EditPost } from '../pages/EditPost'

export function AppRoutes(){
  return(
    <Routes>
      <Route path='/' element={<Home/>}/>
      <Route path='/posts' element={<NewPost/>}/>
      <Route path='/posts/:id' element={<EditPost/>}/>
    </Routes>
  )
}