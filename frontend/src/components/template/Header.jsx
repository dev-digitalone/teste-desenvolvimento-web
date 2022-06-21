import React from 'react';
import { Button, Container, Nav, Navbar } from 'react-bootstrap';
import { Link } from 'react-router-dom';

import { Context } from '../../context/UserContext';

export default function Header() {
    const { authenticated, logout, user } = React.useContext(Context);

    return (
        <Navbar expand="lg" className="navbar-dark bg-dark">
            <Container fluid className="m-0 mx-3" style={{ maxWidth: '100%' }}>
                <Navbar.Brand className="navbar-brand" href="/">
                    Teste-DigitalOne
                </Navbar.Brand>
                <Navbar.Toggle aria-controls="navbarScroll" />
                <Navbar.Collapse
                    id="navbarScroll"
                    className="text-center py-4 justify-content-end"
                >
                    <Nav>
                        {authenticated ? (
                            <>
                                <Nav.Link href="/artigo">
                                    Adicionar artigo
                                </Nav.Link>
                                <Nav.Link href="/meusartigos">
                                    Meus artigos
                                </Nav.Link>
                                <Nav.Link href={`/perfil/${user.id}`}>
                                    Perfil
                                </Nav.Link>
                                <Button
                                    className="mx-2"
                                    variant="outline-primary"
                                    onClick={logout}
                                >
                                    Sair
                                </Button>
                            </>
                        ) : (
                            <Link to="/entrar">
                                <Button
                                    className="mx-2"
                                    variant="outline-primary"
                                    type="submit"
                                >
                                    Entrar
                                </Button>
                            </Link>
                        )}
                    </Nav>
                </Navbar.Collapse>
            </Container>
        </Navbar>
    );
}
