import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import Footer from './components/template/Footer';
import Header from './components/template/Header';
import ContainerContet from './components/template/ContainerContent';
import Home from './components/views/Home';

function App() {
    return (
        <Router>
            <Header />
            <ContainerContet>
                <Routes>
                    <Route path="/" element={<Home />} />
                </Routes>
            </ContainerContet>
            <Footer />
        </Router>
    );
}

export default App;
