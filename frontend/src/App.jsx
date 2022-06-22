import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import Footer from './components/template/Footer';
import Header from './components/template/Header';
import ContainerContet from './components/template/ContainerContent';
import Home from './components/views/Home';
import Register from './components/views/auth/Register';
import Login from './components/views/auth/Login';
import Profile from './components/views/user/Profile';
import CreateArticle from './components/views/articles/CreateArticle';
import MyArticles from './components/views/articles/MyArticles';
import ForgotPassword from './components/views/auth/ForgotPassword';
import ResetPassword from './components/views/auth/ResetPassword';

import ToastAlert from './components/template/ToastAlert';

import { UserProvider } from './context/UserContext';

function App() {
    return (
        <Router>
            <UserProvider>
                <Header />
                <ToastAlert />
                <ContainerContet>
                    <Routes>
                        <Route path="/meusartigos/" element={<MyArticles />} />
                        <Route path="/artigo" element={<CreateArticle />} />
                        <Route path="/perfil/:id" element={<Profile />} />
                        <Route
                            path="/resetar-senha/:token"
                            element={<ResetPassword />}
                        />
                        <Route
                            path="/recuperar-senha"
                            element={<ForgotPassword />}
                        />
                        <Route path="/entrar" element={<Login />} />
                        <Route path="/registrar" element={<Register />} />
                        <Route path="/" exact element={<Home />} />
                    </Routes>
                </ContainerContet>
                <Footer />
            </UserProvider>
        </Router>
    );
}

export default App;
