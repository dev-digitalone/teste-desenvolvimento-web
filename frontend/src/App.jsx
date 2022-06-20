import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import Footer from './components/template/Footer';
import Header from './components/template/Header';
import ContainerContet from './components/template/ContainerContent';
import Home from './components/views/Home';
import Register from './components/views/auth/Register';
import ToastAlert from './components/template/ToastAlert';

import { UserProvider } from './context/UserContext';
import Login from './components/views/auth/Login';

function App() {
    return (
        <Router>
            <UserProvider>
                <Header />
                <ToastAlert />
                <ContainerContet>
                    <Routes>
                        <Route path="/entrar" element={<Login />} />
                        <Route path="/registrar" element={<Register />} />
                        <Route path="/" element={<Home />} />
                    </Routes>
                </ContainerContet>
                <Footer />
            </UserProvider>
        </Router>
    );
}

export default App;
