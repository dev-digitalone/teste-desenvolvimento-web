import React from 'react';
import Footer from './components/template/Footer';
import Header from './components/template/Header';
import ContainerContet from './components/template/ContainerContent';

function App() {
    return (
        <div className="App">
            <Header />
            <ContainerContet>
                <h1>Hello word</h1>
            </ContainerContet>
            <Footer />
        </div>
    );
}

export default App;
