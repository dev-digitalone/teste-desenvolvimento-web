import React from 'react';
import Footer from './components/template/Footer';
import Header from './components/template/Header';
import ContainerContet from './components/template/ContainerContent';
import Home from './components/views/Home';

function App() {
    return (
        <div className="App">
            <Header />
            <ContainerContet>
                <Home />
            </ContainerContet>
            <Footer />
        </div>
    );
}

export default App;
